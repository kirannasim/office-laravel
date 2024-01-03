<div class="personalizedPanel active" data-target="basicRank">
    <form name="personalizeRank" id="personalizeRank">
        <input type="hidden" name="userId" value="{{ $userId }}" readonly>
        <div class="personalizedSection mfkToggleWrap">
            <h3 class="mfkToggle">{{_mt('Rank-AdvancedRank','AdvancedRank.set_default_basic_rank') }}</h3>
            <div class="personalizedSectionBody toggleBody" style="display: block">
                <fieldset>
                    <div class="eachField row">
                        <div class="col-md-5">
                            <label>{{_mt('Rank-AdvancedRank','AdvancedRank.current_rank') }}</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" value="{{$existingRank}}" readonly>
                        </div>
                    </div>
                    <div class="eachField row">
                        <div class="col-md-5">
                            <label>{{_mt('Rank-AdvancedRank','AdvancedRank.set_default_basic_rank') }}</label>
                        </div>
                        <div class="col-md-7">
                            <select class="form-control" name="defaultRank">
                                @foreach($ranks as $rank)
                                    <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="eachField row">
                        <div class="col-md-5">
                            <button type="button" class="btn btn-success ladda-button submitForm"
                                    data-style="contract">{{_mt('Rank-AdvancedRank','AdvancedRank.save') }}</button>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </form>
</div>
<script>
    "use strict";
    $('.submitForm').click(function () {
        var formData = $('#personalizeRank').serialize();
        $.post('{{ route("settings.basic_rank_personalize") }}', formData, function (response) {
            toastr.success('Default rank changed successfully');
        });
    });
</script>
