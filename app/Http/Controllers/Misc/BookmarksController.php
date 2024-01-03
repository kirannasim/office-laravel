<?php

namespace App\Http\Controllers\Misc;

use App\Blueprint\Services\MenuServices;
use App\Eloquents\Bookmark;
use App\Eloquents\BookmarkType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


/**
 * Class BookmarksController
 * @package App\Http\Controllers\Misc
 */
class BookmarksController
{
    protected $attributes = ['type', 'data', 'action', 'entity_id', 'label', 'sort_order', 'user_id'];

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function bookmarksManagerView()
    {
        $data = [
            'bookmarks' => $this->formatFromDb(Bookmark::with('getType')->where('user_id', loggedId())->get())
        ];

        return view('Misc.Bookmarks.manager', $data);
    }

    /**
     * @param Model|\Illuminate\Database\Eloquent\Collection $data
     * @return array|\Illuminate\Database\Eloquent\Collection|Model
     */
    function formatFromDb($data)
    {
        if ($data instanceof \Illuminate\Database\Eloquent\Collection)
            /** @var \Illuminate\Database\Eloquent\Collection $data */
            return $data->map(function ($model) {
                return $this->formatFromDb($model);
            })->groupBy(function ($item) {
                return $item->type->slug;
            });

        $data->type = BookmarkType::find($data->type);

        switch ($data->type->slug) {
            case 'leftMenu':
                /** @var MenuServices $menuServices */
                $menuServices = app(MenuServices::class);
                $method = (int)$data['entity_id'] == 0 ? 'resolveDynamicMenu' : 'getMenu';
                $data['menu'] = $menuServices->{$method}($data['entity_id']);
                break;
        }

        return $data;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function addBookmark(Request $request)
    {
        try {
            if (!$this->bookmarkExists($data = collect($request->input('bookmark'))))
                return response()->json(['status' => true, 'bookmark' => (new Bookmark)->create($this->formatForDb($data))]);
        } catch (\Exception $exception) {
            return response()->json(['status' => false, 'message' => $exception->getMessage()], 500);
        }
    }

    /**
     * @param Collection $data
     * @return Bookmark|bool|Model
     */
    function bookmarkExists(Collection $data)
    {
        $bookmark = (new Bookmark)
            ->when($bookmarkId = $data->get('bookmarkId'), function ($query) use ($bookmarkId) {
                /** @var Builder $query */
                $query->where('id', $bookmarkId);
            })->when(($entityId = $data->get('entity_id')), function ($query) use ($data, $entityId) {
                /** @var Builder $query */
                $query->where('entity_id', $entityId)->where('type', $data->get('type'));
            })->get();

        if ($bookmark->count()) return true;

        return false;
    }

    /**
     * @param Collection $bookmark
     * @return array
     */
    function formatForDb(Collection $bookmark)
    {
        return $bookmark->put('user_id', loggedId())->map(function ($item, $key) {
            switch ($key) {
                case 'type':
                    return $this->findType($item);
                    break;
                case 'action':
                    return $item ?: 'link';
                    break;
                default:
                    return $item;
                    break;
            }
        })->only($this->attributes)->all();
    }

    /**
     * @param $needle
     * @return null
     */
    function findType($needle)
    {
        return (int)$needle == 0 ? (($type = BookmarkType::where('slug', $needle)->first()) ? $type->id : null) : (($type = BookmarkType::find($needle)) ? $type->id : null);
    }

    /**
     * @param Request $request
     * @return bool|null
     * @throws \Exception
     */
    function removeBookmark(Request $request)
    {
        if (Bookmark::find($request->input('bookmarkId'))->delete())
            return response()->json(['status' => true]);
    }
}