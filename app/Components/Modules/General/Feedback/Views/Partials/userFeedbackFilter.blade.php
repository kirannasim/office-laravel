<form class="filterForm">
    <div class="filters row">
        <div class="eachFilter operation col-md-3">
            <label>{{ _mt($moduleId,'Feedback.User') }}</label>
            <input type="text" class="form-control userFiller" name="user_name" id="user_name" value="">
            <input type="hidden" name="filters[user_id]" id="user_id" value="">
        </div>
        <div class="eachFilter operation col-md-3">
            <label>{{ _mt($moduleId,'Feedback.Title') }} </label>
            <select name="filters[form_id]">
                <option value="">{{ _mt($moduleId,'Feedback.All') }}</option>
                @foreach($feedbackForms as $feedbackForm)
                    <option value="{{ $feedbackForm->id }}">{{ $feedbackForm->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="eachFilter operation col-md-3">
            <label>{{ _mt($moduleId,'Feedback.From_date') }}</label>
            <input type="text" class="datePicker" value="" name="filters[fromDate]">
        </div>
        <div class="eachFilter operation col-md-3">
            <label>{{ _mt($moduleId,'Feedback.To_date') }}</label>
            <input type="text" class="datePicker" value="" name="filters[toDate]">
        </div>
    </div>
    <div class="filters row">
        <div class="filterButtonWrapper col-md-4 col-sm-offset-8 filterButton">
            <button type="button" class="btn  dark ladda-button feedbackFilterButton" data-style="contract">
                <i class="fa fa-filter"></i>{{ _mt($moduleId,'Feedback.Filter') }}
            </button>
            <button type="button" class="btn  dark ladda-button clearFilter" data-style="contract">
                <i class="fa fa-filter"></i>{{ _mt($moduleId,'Feedback.reset') }}
            </button>
        </div>
    </div>
</form>
