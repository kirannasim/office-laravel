<?php
/**
 *  -------------------------------------------------
 *  Hybrid MLM  Copyright (c) 2018 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Acemero Technologies Pvt Ltd
 * @link https://www.acemero.com
 * @see https://www.hybridmlm.io
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Blueprint\Services;

use App\Blueprint\Query\Builder;
use App\Eloquents\Config;
use App\Eloquents\ConfigField;
use App\Eloquents\ConfigFieldGroup;
use App\Eloquents\ConfigFieldTag;
use Illuminate\Http\Request;

/**
 * Class ConfigServices
 * @package App\Blueprint\Services
 */
class ConfigServices
{
    protected $groupAttributes = [
        'title', 'description', 'iconFont', 'image',
        'style', 'sort_order', 'parent', 'tag_id'
    ];

    protected $tagAttributes = ['title', 'description'];

    protected $fieldAttributes = ['field_type', 'label', 'field_group', 'placeholder', 'field_validation', 'sort_order',
        'conditional_rules', 'enableConditionalRules', 'link'];

    /**
     * get all config data
     * @param array $options
     * @return ConfigField|\Illuminate\Database\Eloquent\Builder
     */
    function configFields($options = [])
    {
        $options = collect([])->merge($options);

        return ConfigField::with('fieldGroup')
            ->when($fieldType = $options->get('fieldType'), function ($query) use ($fieldType) {
                /** @var Builder $query */
                if (is_array($fieldType))
                    $query->whereIn('field_type', $fieldType);
                else
                    $query->where('field_type', $fieldType);
            })->orderBy('sort_order', 'ASC')->get();
    }

    /**
     * get all config data
     * @param null $tag
     * @param array $options
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function configFieldGroups($tag = null, $options = [])
    {
        $tag = $tag ? (is_int($tag) ? $tag : (($model = ConfigFieldTag::where('slug', $tag)
            ->first()) ? $model->id : false)) : false;
        $options = collect($options);

        return ConfigFieldGroup::with('tag')
            ->when($tag, function ($query) use ($tag) {
                /** @var Builder $query */
                $query->where('tag_id', $tag);
            })->when($childrenRelation = $options->get('childrenRelation'), function ($query) use ($childrenRelation) {
                /** @var Builder $query */
                $query->{$childrenRelation}('children');
            })->when($parentRelation = $options->get('parentRelation'), function ($query) use ($parentRelation) {
                /** @var Builder $query */
                $query->{$parentRelation}('parentGroup');
            })->with('fields')->get();
    }

    /**
     * Get field tags and their use in number
     * @return \Illuminate\Support\Collection
     */
    function configFieldTags()
    {
        return ConfigFieldTag::with('fieldGroups')->get();
    }

    /**
     * Get field group model from id or slug
     *
     * @param $groupIdOrSlug
     * @param null $tag
     * @return ConfigFieldGroup
     */
    function getConfigGroup($groupIdOrSlug, $tag = null)
    {
        $needle = is_int($groupIdOrSlug) ? 'id' : 'slug';

        return ConfigFieldGroup::where($needle, $groupIdOrSlug)->when(($needle == 'slug'), function ($query) use ($tag) {
            $query->where('tag_id', $this->getConfigTag($tag));
        })->first();
    }

    /**
     * Get field tag model from id or slug
     *
     * @param $tagIdOrSlug
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    function getConfigTag($tagIdOrSlug)
    {
        $needle = is_int($tagIdOrSlug) ? 'id' : 'slug';

        return ConfigFieldTag::where($needle, $tagIdOrSlug)->first();
    }

    /**
     * Save field Tag
     *
     * @param Request $data field group
     * @return ConfigFieldTag
     */
    function saveFieldTag(Request $data)
    {
        $dispatch = $data->only($this->tagAttributes);

        return ConfigFieldTag::create($this->sanitizeTag($dispatch));
    }

    /**
     * Sanitize field tag element before inserting for security
     *
     * @param $entry
     * @return mixed
     */
    protected function sanitizeTag($entry)
    {
        $slug = $entry['title'][currentLocal()] ?: 'tag_' . uniqid();
        $entry['slug'] = strtolower(preg_replace('|[\s+%#]|i', '_', $slug));

        return $entry;
    }

    /**
     * Save field Group
     *
     * @param array|Request $data field group
     * @return ConfigFieldGroup
     */
    function saveFieldGroup(Request $data)
    {
        $dispatch = $data->only($this->groupAttributes);

        return ConfigFieldGroup::create($this->sanitizeFieldGroup($dispatch));
    }

    /**
     * Sanitize field group element before inserting for security
     *
     * @param $entry
     * @return mixed
     */
    protected function sanitizeFieldGroup($entry)
    {
        $slug = $entry['title'][currentLocal()] ?: 'group_' . uniqid();
        $entry['slug'] = strtolower(preg_replace('|[\s+%#]|i', '_', $slug));

        return $entry;
    }

    /**
     * Update field Group
     *
     * @param array|Request $data field group
     * @return ConfigField
     */
    function saveField(Request $data)
    {
        $dispatch = $this->handleField($data);

        return ConfigField::create($this->sanitizeField($dispatch));
    }

    /**
     * Handles/Formats field parameters prior to db insertion
     *
     * @param Request $data
     * @return array
     */
    function handleField(Request $data)
    {
        $dispatch = $data->only($this->fieldAttributes);
        $fieldChoices = [];

        unset($dispatch['enableConditionalRules']);

        if (!$data->input('enableConditionalRules')) unset($dispatch['conditional_rules']);

        switch ($data->input('field_type')) {
            case 'select':
            case 'multiSelect':
                $fieldChoices['choice_type'] = $data->input('choice_type');
                $fieldChoices['custom_choice'] = array_values($data->input('customOption.select'));

                if ($data->input('choice_type') == 'module') $fieldChoices['pool'] = $data->input('module_pool');
                break;
            case 'checkbox':
            case 'radio':
                $fieldChoices['custom_choice'] = $data->input('customOption.' . $data->input('field_type'));
                $fieldChoices['show_switch'] = $data->input('showSwitch');
                break;
            case 'button':
                $fieldChoices = $data->input('button');
                break;
        }

        $dispatch['field_choices'] = $fieldChoices;

        if ($data->input('action') == 'update') $dispatch['id'] = $data['field_id'];

        return $dispatch;
    }

    /**
     * Sanitize field element before inserting for security
     *
     * @param $entry
     * @return mixed
     */
    protected function sanitizeField($entry)
    {
        $slug = $entry['label'][currentLocal()] ?: 'field_' . uniqid();
        $entry['field_name'] = strtolower(preg_replace('|[\s+%#]|i', '_', $slug));

        return $entry;
    }

    /**
     * Update field Group
     *
     * @param Request $request
     * @return bool status of operation
     */
    function updateFieldTag(Request $request)
    {
        if (!ConfigFieldTag::find($request->input('tag_id'))->editable)
            return response()->json(['privilage' => 'Tag reserved from updating !'], 422);

        $dispatch = $request->intersect($this->tagAttributes);

        ConfigFieldTag::find($request->input('tag_id'))->update($this->sanitizeTag($dispatch));

        return response(['status' => true]);
    }

    /**
     * Update field Group
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function updateFieldGroup(Request $request)
    {
        if (!ConfigFieldGroup::find($request->input('group_id'))->editable)
            return response(['privilage' => 'Group reserved from updating !'], 422);

        $dispatch = $request->only($this->groupAttributes);

        ConfigFieldGroup::find($request->input('group_id'))->update($this->sanitizeFieldGroup($dispatch));

        return response(['status' => true]);
    }

    /**
     * Update field Group
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function updateField(Request $request)
    {
        if (!ConfigField::find($request->input('field_id'))->fieldGroup->editable)
            return response(['403' => 'Field reserved from updating !'], 422);

        $dispatch = $this->handleField($request);

        ConfigField::find($request->input('field_id'))->update($dispatch);

        return response(['status' => true]);
    }

    /**
     * Delete field Tag
     *
     * @param array $data field group datas
     * @return boolean status of operation
     * @throws \Exception
     */
    function deleteFieldTag($data)
    {
        if (ConfigFieldTag::find($data->input('id'))->core)
            return response(['403' => 'Tag reserved from deleting !'], 422);

        ConfigFieldTag::find($data->get('id'))->delete();

        return response(['status' => true]);
    }

    /**
     * Delete field Group
     *
     * @param array $data field group datas
     * @return boolean status of operation
     * @throws \Exception
     */
    function deleteFieldGroup($data)
    {
        if (ConfigFieldGroup::find($data->input('id'))->core)
            return response(['403' => 'Group reserved from deleting !'], 422);

        ConfigFieldGroup::find($data->get('id'))->delete();

        return response(['status' => true]);
    }

    /**
     * Delete field
     *
     * @param array $data field datas
     * @return boolean status of operation
     * @throws \Exception
     */
    function deleteField($data)
    {
        if (ConfigField::find($data->input('id'))->fieldGroup->core)
            return response(['403' => 'Field reserved from deleting !'], 422);

        ConfigField::find($data->get('id'))->delete();

        return response(['status' => true]);
    }

    /**
     * Query config field
     *
     * @param Request $request
     * @return bool|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    function queryField(Request $request)
    {
        if (!ConfigField::find($request->input('field_id'))) return false;
        $dispatch = ConfigField::with('fieldGroup')->find($request->input('field_id'));

        return $dispatch;
    }

    /**
     * Query Field group
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    function queryFieldGroup(Request $request)
    {
        return ConfigFieldGroup::with('fields', 'tag')->find($request->input('id'));
    }

    /**
     * Query Field group
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    function queryFieldTag(Request $request)
    {
        return ConfigFieldTag::find($request->input('id'));
    }

    /**
     * save data to config table
     *
     * @param $id
     * @param $options
     * @return mixed
     */
    function saveConfigData($id, $options)
    {
        return Config::where('id', $id)->update($options);
    }

    /**
     * get config data
     *
     * @param $group
     * @param string $key
     * @return mixed
     */
    function getConfigData($group, $key = '')
    {
        $group = is_int($group) ? ConfigFieldGroup::find($group)->slug : $group;
        $key = is_int($key) ? ConfigField::find($key)->field_name : $key;

        if ($key) {
            $entry = Config::where(array(['group', $group], ['meta_key', $key]))->first();

            return $entry ? $entry->meta_value : false;
        }

        return Config::where('group', $group)->get();
    }

    /**
     * Custom fields validation pre-process
     *
     * @param Request $request
     * @return array
     */
    function fieldValidationPreProcess(Request $request)
    {
        $rules = $attributes = [];
        //If there are no custom field in the request we return
        //the empty arrays itself to avoid possible errors
        if (!$request->has(session('advFieldName'))) return [$rules, $attributes];
        //Iterates over each custom fields to extract their values
        foreach ($request->input(session('advFieldName')) as $field => $value) {
            if (!$fieldEntity = ConfigField::find($field)) continue;

            $fieldRules = $fieldEntity->field_validation;
            $fieldName = session('advFieldName') . '.' . $field;
            $attributes[$fieldName] = $fieldEntity->getTitle();

            if ($fieldRules) $rules[$fieldName] = implode('|', $this->processRules($fieldRules));
        }

        return [$rules, $attributes];
    }

    /**
     * @param array $rules
     * @return array
     */
    function processRules($rules = [])
    {
        foreach ($rules as $index => $rule) {
            $exploded = explode(':', $rule);
            $ruleName = $exploded[0];

            switch ($ruleName) {
                case 'required_if':
                    $rulesPart = explode(',', $exploded[1]);

                    foreach ($rulesPart as $key => $value) {
                        if (isEven($key) && ($field = ConfigField::where('field_name', $value)->first())) {
                            $rulesPart[$key] = session('advFieldName') . '.' . $field->id;
                        }
                    }

                    $rules[$index] = $ruleName . ':' . implode(',', $rulesPart);
                    break;
                default:
                    break;
            }
        }

        return $rules;
    }

    /**
     * extracting custom field input values from request
     *
     * @param array $data
     * @return array
     */
    function extractCustomFields($data = [])
    {
        $fieldEntries = [];

        if (!isset($data[session('advFieldName')])) return $fieldEntries;

        foreach ($data[session('advFieldName')] as $field => $value) {
            if (!$fieldEntity = ConfigField::find($field)) continue;
            $fieldEntries[] = [
                'meta_key' => $fieldEntity->field_name,
                'meta_value' => is_array($value) ? json_encode($value) : $value,
                'group' => $fieldEntity->fieldGroup->slug,
                'status' => true,
            ];
        }

        return $fieldEntries;
    }

    /**
     * get config id
     *
     * @param string $group
     * @param string $key
     * @return bool|mixed
     */
    function getConfigId($group, $key)
    {
        $entry = Config::where(array(['group', $group], ['meta_key', $key]))->first();

        return $entry ? $entry->id : false;
    }
}
