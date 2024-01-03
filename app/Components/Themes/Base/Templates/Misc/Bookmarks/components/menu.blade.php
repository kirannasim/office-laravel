<ul class="bookmarkList {{ $data->first()->type->label }}">
    @forelse($data as $datum)
        <li class="bookmarkItem" data-type="{{ $datum->type->slug }}"
            data-id="{{ $datum->dynamic ? $datum->entity_id : $datum->id }}">
            <a href="{{ $datum->menu->href }}">
                <i class="{{ $datum->menu->ico }}"></i>
                <span class="title">{{ $datum->menu->getLabel() }}</span>
                <button type="button" class="deleteBookmark btn btn-circle btn-outline red ladda-button"
                        data-style="contract" data-spinner-color="red"
                        data-bookmarkId="{{ $datum->dynamic ? $datum->entity_id : $datum->id }}">
                    <i class="fa fa-trash"></i>
                </button>
            </a>
        </li>
    @empty
        <div class="noBookmarks">
            <i class="fa fa-exclamation"></i>No bookmarks found in this group
        </div>
    @endforelse
</ul>
