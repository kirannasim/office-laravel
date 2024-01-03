<!-- END PAGE CONTAINER -->
</div>
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
        @php echo date('Y') @endphp &copy; {!! getConfig('company_information','company_name') !!}
    </div>
    <div class="footer-information">
        <ul>
            <li><a href="https://www.elysiumnetwork.io/legal/terms-of-use" target="_blank">Terms & Conditions</a></li>
            <li><a href="https://www.elysiumnetwork.io/legal/gdpr" target="_blank">Privacy Policy</a></li>
        </ul>
    </div>
    <div class="page-footer-tools">
        <span class="go-top">
        <i class="fa fa-angle-up"></i>
        </span>
    </div>
</div>
@include('User.Layout.js')
@stack('scripts')
{!! defineFilter('homeBottom', '', 'root') !!}
</div>
</body>
</html>