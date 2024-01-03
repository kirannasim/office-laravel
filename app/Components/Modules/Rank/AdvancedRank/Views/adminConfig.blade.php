<script src="{{ asset('global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
<div class="row AdvancedRank moduleConfiq"></div>
<script>

    $(function () {
        loadBasicRankConfig();
    });

    //load AdvancedRank configuration
    function loadBasicRankConfig() {
        simulateLoading('.AdvancedRank');
        $.post('{{ route('advancedRank.rankConfiguration') }}', function (response) {
            $('.AdvancedRank').html(response);
        });
    }

    function loadRankBenefitConfiguration() {
        simulateLoading('.AdvancedRank');
        $.post('{{ route('advancedRank.rankBenefitConfiguration') }}', function (response) {
            $('.AdvancedRank').html(response);
        });
    }
</script>

<style>
    .page-content {
        background: #fff;
    }

    .moduleConfiq .panel-primary .panel-heading {
        color: #4d4d4d;
        background-color: #eeeeee;
        border-color: #eeeeee;
        font-weight: 600;
    }

    .moduleConfiq .panel-primary .panel-heading {
        color: #919191;
    }

    .moduleConfiq .panel-primary {
        border-color: #eeeeee;
    }

    .moduleConfiq .mt-radio-inline {
        padding: 0px;
    }

    .moduleConfiq input.form-control {
        margin-bottom: 10px;
    }
</style>