<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/backend_images/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('images/backend_images/favicon.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Dashboard :: Paaila Shop</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/backend-css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('css/backend-css/material-dashboard.css?v=1.2.1') }}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
    body.loading{
    position:fixed;
    height:100%;
    width:100%;
    margin:0;
    padding:0;
    overflow:hidden;
    } 
    body.loading:before{
    content:"";
    position:absolute;
    height:100%;
    width:100%;
    background-color:white;
    z-index:1999;
    }
    body.loading.transparent:before{
    background-color:rgba(255,255,255,0.8); 
    }
    body.loading:after{
    content:"";
    position: absolute;
    z-index:2000;
    top:calc(50% - 40px);
    left:calc(50% - 40px);
    margin:auto; 
    width: 80px;
    height: 80px;
    border: 2px solid #ccc;
    border-top:3px solid #66615b;
    border-radius: 100%;
    animation: spin 0.7s infinite linear;
    }
    body.loaded{
    opacity:1;
    animation: fadein 1s ease-in;
    }
    @keyframes spin {
    from{
    transform: rotate(0deg);
    }to{
    transform: rotate(360deg);
    }
    }
    @keyframes fadein {
    from{
    opacity:0;
    }to{
    opacity:1;
    }
    }
    .modal-footer .btn+.btn {
        margin-left: 5px;
    }
    .collection-images {
    height: 150px;
    overflow: hidden;
}
   
    </style>
</head>

<body>
    <div class="wrapper">
<!-- Side Bar Here-->
@include('layouts.adminlayouts.admin-sidebar')
        <div class="main-panel">
<!-- Nav Bar Here-->
@include('layouts.adminlayouts.admin-header')
            <div class="content">
@yield('content')
<!-- Content here-->
            </div>
<!-- Footer here-->
@include('layouts.adminlayouts.admin-footer')
        </div>
    </div>

</body>
<!--   Core JS Files   -->

<script src="{{ asset('js/backend-js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/backend-js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/backend-js/material.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/backend-js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<!-- Library for adding dinamically elements -->
<script src="{{ asset('js/backend-js/arrive.min.js') }}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('js/backend-js/moment.min.js') }}"></script>
<script src="{{ asset('js/backend-js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/backend-js/jquery.bootstrap-wizard.js') }}"></script>
<script src="{{ asset('js/backend-js/bootstrap-datetimepicker.js') }}"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{ asset('js/backend-js/bootstrap-notify.js') }}"></script>
<script src="{{ asset('js/backend-js/nouislider.min.js') }}"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('js/backend-js/jquery.select-bootstrap.js') }}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{ asset('js/backend-js/jquery.datatables.js') }}"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="{{ asset('js/backend-js/sweetalert2.js') }}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('js/backend-js/jasny-bootstrap.min.js') }}"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset('js/backend-js/jquery.tagsinput.js') }}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ asset('js/backend-js/material-dashboard.js?v=1.2.1') }}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('js/backend-js/demo.js') }}"></script>
<script src="{{ asset('js/backend-js/custom.js') }}"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    function preloader(){
        var b = document.getElementsByTagName("BODY")[0];
        b.classList.remove("loading");
        b.classList.add("loaded");
    }
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);
 </script>
@yield('scripts');

</html>