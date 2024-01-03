@forelse($bookmarks->chunk(2) as $chunk)
    <div class="bookmarkHolder row">
        @foreach($chunk as $type => $group)
            <div class="bookmarkGroup col-md-{{ $chunk->count() == 1 ? '12' : '6' }}">
                <div class="bookmarkGroupInner">
                    <h4>
                        @if($group->first()->type->icon_image)
                            <img src="{{ $group->first()->type->icon_image }}">
                        @else
                            <i class="{{ $group->first()->type->icon_font }}"></i>
                        @endif
                        {{ $group->first()->type->label }}
                    </h4>
                    @if ($component = ($group->count() ? $group->first()->type->view_component : ''))
                        @component($component, ['data' => $group]) @endcomponent
                    @else
                        <ul class="bookmarkList {{ $type }}">
                            @forelse($group as $item)
                                <li>{{ $item->label }}</li>
                            @empty
                                <div class="noBookmarks">
                                    <i class="fa fa-exclamation"></i>No bookmarks found in this group
                                </div>
                            @endforelse
                        </ul>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@empty
    <div class="noBookmarks">
        <i class="fa fa-exclamation"></i>No bookmarks found
    </div>
@endforelse

<script type="text/javascript">
    "use strict";

    $(function () {
        Ladda.bind('.ladda-button');

        $('body').on('click', '.bookmarkItem', function (e) {
            e.stopPropagation();
        });

        $('body')
            .off('click', '.bookmarkItem .deleteBookmark')
            .on('click', '.bookmarkItem .deleteBookmark', function (e) {
                e.preventDefault();

                var bookmarkItem = $(this).closest('.bookmarkItem');

                bookmarkItem.addClass('removing');

                removeBookmark(bookmarkItem.data('id'), bookmarkItem.data('type'));
            });
    });
</script>