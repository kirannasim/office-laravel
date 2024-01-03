@extends('User.Layout.master')
@section('content')
	<div class="row personalInfoGridWrapper">
		<div class="col-sm-2">
            <div class="infoGrid active">
                <h3>Brochures</h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>Business Cards</h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>Banners</h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>Documents</h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>Videos</h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>Events</h3>
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