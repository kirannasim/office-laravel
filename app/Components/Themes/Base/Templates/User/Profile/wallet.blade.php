@extends('User.Layout.master')
@section('content')
    @include('_includes.wallets_nav')
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