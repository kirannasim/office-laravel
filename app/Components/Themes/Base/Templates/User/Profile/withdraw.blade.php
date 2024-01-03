@extends('User.Layout.master')
@section('content')
	<div class="row personalInfoGridWrapper">
		<div class="col-sm-2">
            <div class="infoGrid active">
                <h3>ONE</h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>TWO</h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>THREE</h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>FOUR</h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>FIVE</h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>SIX</h3>
            </div>
        </div>
	</div>
	<style type="text/css">
		.infoGrid
		{
			cursor: pointer;
		}

        .active
        {
            background-color: #08b790 !important;
        }

        .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu > li.active > a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu > li.active.open > a, .page-sidebar .page-sidebar-menu > li.active > a, .page-sidebar .page-sidebar-menu > li.active.open > a
        {
            background-color: #08b790 !important;
        }
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.infoGrid').click(function(){
				$('.infoGrid').each(function(){
					$(this).removeClass('active');
				})

				$(this).addClass('active');
			})
		})
	</script>
@endsection