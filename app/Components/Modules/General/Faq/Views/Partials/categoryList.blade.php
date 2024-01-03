<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="row">
            <div class="col-sm-9"><span><i class="fa fa-th-list"></i> {{ _mt($moduleId,'Faq.categories') }}</span></div>
            <div class="col-sm-3">
                <button type="button" class="btn btn-transparent btn-outline btn-circle addNewCategory"><i
                            class="fa fa-plus-circle"
                            aria-hidden="true"></i> {{ _mt($moduleId,'Faq.add_new_category') }}</button>
            </div>
        </div>
    </div>
    <div class="panel-body" style="display: block">
        @if($categories->count())
            <div class="table-scrollable">
                <table class="table table-striped table-hover">
                    <thead>
                    <th>{{ _mt($moduleId,'Faq.sl_no') }}</th>
                    <th>{{ _mt($moduleId,'Faq.title') }}</th>
                    <th>{{ _mt($moduleId,'Faq.sort_order') }}</th>
                    <th>{{ _mt($moduleId,'Faq.action') }}</th>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ isset($category->title[Lang::locale()]) ? $category->title[Lang::locale()] : '' }}</td>
                            <td>{{ $category->sort_order }}</td>
                            <td>
                                <button class="btn btn-primary editCategory ladda-button" data-id="{{ $category->id }}"
                                        data-style="contract"><i
                                            class="fa fa-pencil-square-o"></i> {{--{{ _mt($moduleId,'Faq.edit') }}--}}
                                </button>
                                <button class="btn btn-danger deleteCategory ladda-button" data-id="{{ $category->id }}"
                                        data-style="contract"><i
                                            class="fa fa-trash-o"></i> {{--{{ _mt($moduleId,'Faq.delete') }}--}}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            {{ _mt($moduleId,'Faq.no_category_available') }}
        @endif
    </div>
</div>

<script>
    $(function () {
        Ladda.bind('.ladda-button');
    });
    $('.addNewCategory').click(function () {
        loadCategoryForm();
    });

    $('.editCategory').click(function () {
        loadCategoryForm($(this).attr('data-id'))
    });
    $('.deleteCategory').click(function () {
        var options = {id: $(this).attr('data-id')}
        $.post('{{ scopeRoute('faq.category.delete') }}', options, function (response) {
            toastr.success('{{ _mt($moduleId,'Faq.category_deleted_successfully') }}');
            loadCategoryList();
        })
    });
</script>
