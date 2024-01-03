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
                <h3>Two</h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>Three</h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>Four</h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>Five</h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>Six</h3>
            </div>
        </div>
	</div>
	<style type="text/css">
		.infoGrid
		{
			cursor: pointer;
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