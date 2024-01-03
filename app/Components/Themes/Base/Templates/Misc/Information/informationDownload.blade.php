<html>
<meta>
<link href="{{ asset('global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('global/plugins/line-awesome-master/dist/css/line-awesome-font-awesome.css') }}"
      rel="stylesheet" type="text/css"/>
<script src="{{ asset('global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<title>{!! getConfig('company_information','company_name') !!} @if(isset($title)) -  {{ $title }}@endif</title>
<meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>
<body class="infoPage">
<div class="header infoHeader">
    <div class="row">
        <div class="container">
            <div class="col-sm-9">
                <div class="logo">
                    <img src="{{ logo() }}" alt="logo" style="" class="logo-default">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="printClass">
                    <span class="printPage"><i class="fa fa-print"></i></span>
                    <span class="downloadPage"><i class="fa fa-download"></i></span>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row infoContent">
    <div class="col-sm-12">
        <div class="container">
            {!! $content !!}
        </div>
    </div>
</div>
<div class="footer infoFooter">
    <div class="row">
        <div class="col-sm-12">
            <p> @php echo date('Y') @endphp &copy; {!! getConfig('company_information','company_name') !!}</p>
        </div>
    </div>
</div>
</body>
<style>
    .header.infoHeader {
        width: 100%;
        min-height: 60px;
        background-color: #2b3643;
        padding: 10px 0px;

    }

    .row.infoContent {
        min-height: 500px;
        width: 100%;
        padding: 30px 0px;
    }

    .footer.infoFooter {
        width: 100%;
        background-color: #485564;
        min-height: 45px;
        color: #fff;
        padding: 15px 0px;
        text-align: center;
    }

    body.infoPage .row {
        margin: 0px;
    }

    .header.infoHeader .logo img {
        width: 90px;
    }

    .printClass span i {
        font-size: 25px;
        color: #fff;
        padding: 30px 15px;
        cursor: pointer;
    }

    .printClass {
        float: right;
    }

    .printClass span i:hover {
        text-decoration: none;
        color: #ccc;
    }
</style>
</html>
