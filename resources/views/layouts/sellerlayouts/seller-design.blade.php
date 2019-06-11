<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/backend_images/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('images/backend_images/favicon.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Vendor :: Dashboard</title>
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
#image-preview {
  width: 400px;
  height: 400px;
  position: relative;
  overflow: hidden;
  background-color: #ffffff;
  color: #ecf0f1;
  background-size: cover;
  background-position: center;
}
#image-preview input {
  line-height: 200px;
  font-size: 200px;
  position: absolute;
  opacity: 0;
  z-index: 10;
}
#image-preview label {
  position: absolute;
  z-index: 5;
  opacity: 0.8;
  cursor: pointer;
  background-color: #050708;
  width: 50px;
  height: 50px;
  font-size: 20px;
  line-height: 50px;
  text-transform: uppercase;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  text-align: center;
  color: #ffffff;
}
    .modal-footer .btn+.btn {
        margin-left: 5px;
    }
   
    </style>
</head>

<body>
    <div class="wrapper">
<!-- Side Bar Here-->
@include('layouts.sellerlayouts.seller-sidebar')
        <div class="main-panel">
<!-- Nav Bar Here-->
@include('layouts.sellerlayouts.seller-header')
            <div class="content">
@yield('content')
<!-- Content here-->
            </div>
<!-- Footer here-->
@include('layouts.sellerlayouts.seller-footer')
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
<script src="{{ asset('js/backend-js/bootstrap-notify.js') }}"></script>
<script src="{{ asset('js/backend-js/bootstrap-datetimepicker.js') }}"></script>
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
<script src="{{ asset('js/backend-js/jquery.uploadPreview.min.js') }}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('js/backend-js/demo.js') }}"></script>
<script src="{{ asset('js/backend-js/custom.js') }}"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $(document).ready(function() {
        $id = "{{ Auth::user()->id }}"
        $url = "{{ asset('images/vendor_images/profile/') }}";
        //console.log($url);
        $.ajax({
            type: 'post',
            url: '/vendor/get-profile',
            data: { '_token': '{{ csrf_token() }}','id': $id },
            success: function(data){
                $('#image-preview').css({
                    'background': 'url("'+$url+'/'+data.logo+'")',
                    'width': '400px',
                    'height': '400px',
                    'position': 'relative',
                    'overflow': 'hidden',
                    'background-color': '#ffffff',
                    'color': '#ecf0f1',
                    'background-size': 'cover',
                    'background-position': 'center'

                });
                //console.log($url+'/'+data.name);
                $('#userphoto').attr("src", $url+'/'+data.logo);
                document.getElementById("vendorname").innerHTML =  data.name ;
            }
        });
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