@extends('User.Layout.master')
@section('content')
    @include('_includes.reports_nav')
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