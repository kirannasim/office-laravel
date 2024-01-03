<!-- END PAGE CONTAINER -->
</div>
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
        @php echo date('Y') @endphp &copy; {!! getConfig('company_information','company_name') !!}
    </div>
    <div class="page-footer-tools">
        <span class="go-top">
        <i class="fa fa-angle-up"></i>
        </span>
    </div>
</div>
<!-- END FOOTER -->

<!-- END THEME SCRIPTS -->
@include('Employee.Layout.js')
@stack('scripts')
<!-- END THEME SCRIPTS -->

</div>
</body>
</html>