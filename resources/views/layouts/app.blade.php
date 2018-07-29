<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<!-- Mirrored from www.g-axon.com/mouldifi-5.0/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Feb 2018 09:01:59 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Mouldifi - A fully responsive, HTML5 based admin theme">
<meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, Mouldifi, web design, CSS3">
<title>{{ config('app.name', 'Laravel') }}</title>
<!-- Site favicon -->
<link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico' />
<!-- /site favicon -->

<!-- Entypo font stylesheet -->
<link href="{{asset('css/entypo.css') }}" rel="stylesheet">
<!-- /entypo font stylesheet -->

<!-- Font awesome stylesheet -->
<link href="{{asset('css/font-awesome.min.css') }}" rel="stylesheet">
<!-- /font awesome stylesheet -->


<!-- Bootstrap stylesheet min version -->
<link href="{{asset('css/bootstrap.min.css') }}" rel="stylesheet">
<!-- /bootstrap stylesheet min version -->

<!-- Mouldifi core stylesheet -->
<link href="{{asset('css/mouldifi-core.css') }}" rel="stylesheet">
<!-- /mouldifi core stylesheet -->

<link href="{{asset('css/mouldifi-forms.css') }}" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
<![endif]-->

<!--Datatable-->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<!--end Datatale-->
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body class="login-page">
    <div class="login-pag-inner">
        <div class="animatedParent animateOnce z-index-50">
            <div class="login-container animated growIn slower">

                @yield('content')

            </div>
        </div>
    </div>
<!--Load JQuery-->
<script src="{{asset('js/jquery.min.js') }}"></script>
<script src="{{asset('js/bootstrap.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</body>

<!-- Mirrored from www.g-axon.com/mouldifi-5.0/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Feb 2018 09:01:59 GMT -->
<script>
$(document).ready(function() {
    $('#voucherTable').DataTable();
} );
</script>
</html>
