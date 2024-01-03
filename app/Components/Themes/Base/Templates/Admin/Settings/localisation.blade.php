@extends('Admin.Layout.master')
@section('title','getoncode Currency')
@section('content')
    <div class="row">
        <div class="col-sm-5">
            <div class="row">
                <div class="col-sm-6">Language</div>
                <div class="col-sm-6">
                    <button class="btn btn-primary editProvider" data-id="en"><i
                                class="fa fa-edit"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">Currency</div>
                <div class="col-sm-6">
                    <button class="btn btn-primary editProvider" data-id="en"><i
                                class="fa fa-edit"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">Country</div>
                <div class="col-sm-6">
                    <button class="btn btn-primary editProvider" data-id="en"><i
                                class="fa fa-edit"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">State</div>
                <div class="col-sm-6">
                    <button class="btn btn-primary editProvider" data-id="en"><i
                                class="fa fa-edit"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-7 settingsWrapper">
            Currencies
        </div>

    </div>

    <script>
        $('.editProvider').click(function () {
            var slug = $(this).attr('data-id');
            $.post("", {slug: slug}, function (response) {
                $(".settingsWrapper").html(response);
                $('.settingsWrapper').show();
            })
        });
    </script>
@endsection
