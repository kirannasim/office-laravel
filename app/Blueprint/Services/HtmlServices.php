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

use App\Blueprint\Facades\ConfigServer;
use App\Blueprint\Facades\ModuleServer;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Eloquents\ConfigField;
use Collective\Html\FormFacade as Form;
use Illuminate\Support\Collection;

/**
 * Class HtmlServices
 * @package App\Blueprint\Services
 */
class HtmlServices
{
    public $wrapperClass = 'eachConfigField row';

    public $fieldClass = 'htmlElementInput col-md-8';

    public $labelClass = 'col-md-4';

    /**
     * Render Html element
     *
     * @param $element
     * @param array $options
     * @param null $value
     * @return mixed
     */
    function render($element, $value = null, $options = [])
    {
        $this->sanitizeField($element);

        return $this->{$element->field_type}($element, $value, $options);
    }

    /**
     * Sanitize field element before rendering for security
     *
     * @param $element
     * @return mixed
     */
    protected function sanitizeField(&$element)
    {
        return tap($element, function ($element) {
            $element->field_name = preg_replace('|[\s+%#]|i', '_', session('advFieldName')) . '[' . $element->id . ']';
        });
    }

    /**
     * Render input text element
     *
     * @param ConfigField $element
     * @param $value
     * @param $options
     * @return string
     */
    function text(ConfigField $element, $value, $options)
    {
        $output = Form::text($element->field_name, $value, ['placeholder' => $element->getPlaceholder(), 'class' => isset($options['class']) ? $options['class'] : '']);

        return $this->processField($element, $output, $options);
    }

    /**
     * Process each field to add relevant classes, attributes and html wrappers
     *
     * @param $element
     * @param $rendered
     * @param array $options
     * @return mixed|string
     */
    protected function processField(ConfigField $element, $rendered, $options = [])
    {
        $required = in_array('required', array_keys((array)$element->field_validation));
        $conditionalClass = ($conditionalRules = $element->conditional_rules) ? 'conditional' : null;
        $options = collect($options);
        $container = collect($options->get('container'));
        $fieldOption = collect($options->get('field'));
        $output = $container->get('tagStart', "<div class='{$this->wrapperClass} {$conditionalClass} {$element->field_type}_field {$container->get('class')}'>");

        if ($conditionalClass) $output .= '<input type="hidden" class="conditionalRules" value="' . htmlspecialchars(json_encode($conditionalRules)) . '">';

        $output .= $this->processLabel($element, $options->get('label'), $required);
        $output .= $fieldOption->get('tagStart', "<div class='{$this->fieldClass} {$element->field_type} {$fieldOption->get('class')}'>");
        $output .= $rendered;
        $output .= $fieldOption->get('tagEnd', "</div>");
        $output .= $container->get('tagEnd', "</div>");

        return $output;
    }

    /**
     * Process label to include additional options
     *
     * @param ConfigField $element
     * @param array $options
     * @param bool $required
     * @return string
     */
    function processLabel(ConfigField $element, $options, $required = false)
    {
        $options = collect($options);
        $required = $required ? 'requiredField' : '';
        $labelClass = "{$this->labelClass} {$required} {$options->get('class')}";
        $labelOptions = [];
        $labelOptions['class'] = $labelClass;
        $output = '';
        $output .= ($container = $options->get('container')) ? $container['start'] : '';
        if ($link = $element->link) $output .= '<a href="' . $element->link . '">';
        $output .= Form::label($element->getTitle(), '', $labelOptions);
        if ($link = $element->link) $output .= '</a>';
        $output .= ($container = $options->get('container')) ? $container['end'] : '';

        return $output;
    }

    /**
     * Render input text element
     *
     * @param ConfigField $element
     * @param $value
     * @param $options
     * @return string
     */
    function textarea(ConfigField $element, $value, $options)
    {
        $output = Form::textarea($element->field_name, $value, ['class' => 'richText', 'placeholder' => $element->getPlaceholder()]);

        return $this->processField($element, $output, $options);
    }

    /**
     * Render input password element
     *
     * @param ConfigField $element
     * @param $value
     * @param $options
     * @return string
     */
    function password(ConfigField $element, $value, $options)
    {
        $output = Form::password($element->field_name);

        return $this->processField($element, $output, $options);
    }

    /**
     * Render input radio element
     *
     * @param ConfigField $element
     * @param $value
     * @param $options
     * @return string
     */
    function radio(ConfigField $element, $value, $options)
    {
        $choices = $element->field_choices ?: [];
        $choiceHtml = '';

        if (isset($choices['custom_choice'])) {
            $switchClass = (isset($choices['show_switch']['radio']) && $choices['show_switch']['radio']) ? 'bootstrapSwitch' : 'icheck';
            $labelStatus = (count($choices['custom_choice']) > 1) ? true : false;

            foreach ($choices['custom_choice'] as $key => $choice) {
                $labelCollection = collect($choice['label']);
                $choiceLabel = $labelCollection->get(currentLocal(), $labelCollection->get(defaultLocal(), 'No title'));
                $choiceHtml .= '<div class="eachRadio">';
                $choiceHtml .= Form::radio($element->field_name, $choice['value'], $value ? (($choice['value'] == $value) ? true : false) : ($key == 0 ? true : false), ['class' => $switchClass]);
                $choiceHtml .= $labelStatus ? Form::label($choiceLabel) : '';
                $choiceHtml .= '</div>';
            }
        }

        return $this->processField($element, $choiceHtml, $options);
    }

    /**
     * Render input checkbox element
     *
     * @param ConfigField $element
     * @param $value
     * @param $options
     * @return string
     */
    function checkbox(ConfigField $element, $value, $options)
    {
        $choices = $element->field_choices ?: [];
        $choiceHtml = '';

        if (isset($choices['custom_choice'])) {
            $switchClass = (isset($choices['show_switch']['checkbox']) && $choices['show_switch']['checkbox']) ? 'bootstrapSwitch' : 'icheck';
            $labelStatus = (count($choices['custom_choice']) > 1) ? true : false;

            foreach ($choices['custom_choice'] as $choice) {
                $labelCollection = collect($choice['label']);
                $choiceLabel = $labelCollection->get(currentLocal(), $labelCollection->get(defaultLocal(), 'No title'));
                $choiceHtml .= '<div class="eachCheckbox">';
                $choiceHtml .= $labelStatus ? Form::label($choiceLabel) : '';
                $choiceHtml .= Form::checkbox($element->field_name, $value, ($choice == $value) ? true : false, ['class' => $switchClass]);
                $choiceHtml .= '</div>';
            }
        }

        return $this->processField($element, $choiceHtml, $options);
    }

    /**
     * Render input radio element
     *
     * @param ConfigField $element
     * @param $value
     * @param $options
     * @return string
     */
    function select(ConfigField $element, $value, $options)
    {
        $choice = $element->field_choices ?: [];
        $options = [];

        switch ($choice['choice_type']) {
            case 'custom':
                foreach ($choice['custom_choice'] as $key => $value) {
                    $labelCollection = collect($value['label']);
                    $choiceLabel = $labelCollection->get(currentLocal(), $labelCollection->get(defaultLocal(), 'No title'));
                    $options[$value['value']] = $choiceLabel;
                }
                break;
            case 'module':
                if ((isset($choice['pool']) && $choice['pool'])) {
                    $modules = [$choice['pool'] => ModuleServer::getModules()[$choice['pool']]];
                } else {
                    $modules = ModuleServer::getModules();
                }
                foreach ($modules as $pool => $batch) {
                    /** @var ModuleBasicAbstract $module */
                    foreach ($batch as $i => $module) {
                        $dispatch = [];
                        $dispatch[$module->registry['slug']] = $module->registry['name'];
                        $options[$pool] = $dispatch;
                    }
                }
                break;
            case 'language':
                foreach (app('laravellocalization')->getSupportedLocales() as $key => $value) {
                    $options[$key] = $value['name'];
                }
                break;
            case 'currency':
                foreach (currency()->getCurrencies() as $key => $value) {
                    $options[$value['code']] = $value['name'];
                }
                break;
            case 'country':
                foreach (getCountries() as $key => $value) {
                    $options[$value['code']] = $value['name'];
                }
                break;
            default:
                # code...
                break;
        }
        $select = Form::select($element->field_name, $options, $value, ['class' => 'select2select']);

        return $this->processField($element, $select, $options);
    }

    /**
     * Render input radio element
     *
     * @param ConfigField $element
     * @param $values
     * @param $options
     * @return string
     */
    function multiSelect(ConfigField $element, $values, $options)
    {
        $choice = $element->field_choices ?: [];
        $options = [];

        switch ($choice['choice_type']) {
            case 'custom':
                foreach ($choice['custom_choice'] as $key => $value) {
                    $labelCollection = collect($value['label']);
                    $choiceLabel = $labelCollection->get(currentLocal(), $labelCollection->get(defaultLocal(), 'No title'));
                    $options[$value['value']] = $choiceLabel;
                }
                break;
            case 'module':
                if ((isset($choice['pool']) && $choice['pool'])) {
                    $modules = [$choice['pool'] => ModuleServer::getModules()[$choice['pool']]];
                } else {
                    $modules = ModuleServer::getModules();
                }
                foreach ($modules as $pool => $batch) {
                    /** @var ModuleBasicAbstract $module */
                    $dispatch = [];

                    foreach ($batch as $i => $module)
                        $dispatch[$module->registry['slug']] = $module->registry['name'];

                    $options[$pool] = $dispatch;
                }
                break;
            case 'language':
                foreach (app('laravellocalization')->getSupportedLocales() as $key => $value) {
                    $options[$key] = $value['name'];
                }
                break;
            case 'currency':
                foreach (currency()->getCurrencies() as $key => $value) {
                    $options[$value['code']] = $value['name'];
                }
                break;
            case 'country':
                foreach (getCountries() as $key => $value) {
                    $options[$value['code']] = $value['name'];
                }
                break;
            default:
                # code...
                break;
        }

        $select = Form::select($element->field_name . '[]', $options, json_decode($values), ['class' => 'select2select', 'multiple' => true]);

        return $this->processField($element, $select, $options);
    }

    /**
     * Render input button element
     *
     * @param ConfigField $element
     * @param $value
     * @param $options
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    function button(ConfigField $element, $value, $options)
    {
        $options = collect($options);
        $data = collect($element->field_choices ?: []);
        $action = $data->get('action');
        $data->put('options', $options);
        $data->put('label', $element->getTitle());

        switch ($action) {
            case (preg_match('|(.+)\/(.+)\/?(.+)?|i', $action, $matches) == true):
                $data->put('route', route($matches[1]));
                $data->put('action', $matches[2]);
                $data->put('params', isset($matches[3]) ? $matches[3] : '');
                $data->put('buttonType', 'action');
                $data->put('uniqueId', uniqid('ApiButton-'));
                return $this->renderButton($data);
                break;
            case 'link':
                $data->put('buttonType', 'link');
                $data->put('uniqueId', uniqid('LinkButton-'));
                return $this->renderButton($data);
                break;
            default:
                return false;
                break;
        }
    }

    /**
     * Render button with variety of actions
     *
     * @param Collection $options
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    protected function renderButton(Collection $options)
    {
        return view('Admin.Settings.Partials.Elements.button', $options->all())->render();
    }

    /**
     * Generate image upload
     *
     * @param $element
     * @param $value
     * @param $options
     * @return string
     * @throws \Throwable
     */
    function image($element, $value, $options)
    {
        $data = [
            'salt' => 'imgPicker' . uniqid(),
            'name' => $element->field_name,
            'value' => $value,
            'src' => $value ? asset($value) : asset('images/placeholder.jpg'),
        ];
        $rendered = view('Admin.Settings.Partials.Elements.image', $data)->render();

        return $this->processField($element, $rendered, $options);
    }

    /**
     * Generate icon picker
     *
     * @param $element
     * @return string
     * @throws \Throwable
     */
    function icon($element, $value)
    {
        $data = [
            'label' => $element->getTitle(),
            'salt' => 'iconPicker' . uniqid(),
            'name' => $element->field_name,
            'value' => $value,
        ];

        return view('Admin.Settings.Partials.Elements.icon', $data)->render();
    }

    /**
     * Render field group with its fields
     *
     * @param $groupIdOrSlug
     * @param null $tag
     * @param array $options
     * @param bool $hideEmptyDialogue
     * @return string
     * @throws \Throwable
     */
    function renderFieldGroup($groupIdOrSlug, $tag = null, $options = [], $hideEmptyDialogue = false)
    {
        $options = collect($options);

        if (!$data['group'] = ConfigServer::getConfigGroup($groupIdOrSlug, $tag)) return false;

        $data['options'] = $options;
        $data['hideEmptyDialogue'] = $hideEmptyDialogue;

        return view('Admin.Settings.Partials.Config.group', $data)->render();
    }

    /**
     * Render configuration form with given tagId or tagName
     *
     * @param $options
     * @return string
     * @throws \Throwable
     */
    function renderConfigForm($options)
    {
        /** @var ConfigServices $configServices */
        $configServices = app(ConfigServices::class);
        $defaults = [];
        $options = collect(array_merge($defaults, $options));
        $tag = ConfigServer::getConfigTag($options->get('tag'));
        $data['fieldGroups'] = $configServices->configFieldGroups($tag, [
            'parentRelation' => 'doesntHave'
        ]);

        return view('Admin.Settings.Partials.Config.formStandard', $data)->render();
    }
}
