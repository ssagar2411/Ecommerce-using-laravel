<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Paaila Shop::Seller Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/backend-css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <style>
            .formwrap{
                margin-top: 10px;
                text-align: center;
                font-weight: bold;
            }
            #load:disabled{
                opacity:0.7;
                cursor: not-allowed;
            }
        </style>
	</head>

	<body>

		<div class="wrapper" style="background-image: url('/images/bg-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="{{ asset('images/bg6.jpg') }}" alt="">
				</div>
				<form id="register-form" action="{{ route('vendor.postRegister') }}" method="POST">
                    <h3>Seller Registration</h3>
                    <div id="statusBox">
                    </div>
                    {{ csrf_field() }}
					<div class="form-wrapper">
                        <input type="text" name="vname" id="vname" placeholder="Seller Name" class="form-controla">
                        <i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="email" name="email" id="email" placeholder="Email Address" class="form-controla">
						<i class="zmdi zmdi-email"></i>
                    </div>
                    <div class="form-wrapper">
						<input type="text" name="phone_number" id="phone_number" placeholder="Phone Number" class="form-controla">
						<i class="zmdi zmdi-phone"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password" name="password" id="password" class="form-controla">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="password_confirmation" id="cpassword" placeholder="Confirm Password" class="form-controla">
						<i class="zmdi zmdi-lock"></i>
                    </div>
                    <div class="form-wrapper">
                        <input type="checkbox" name="agreetc" id="agreetc" value="1">
                        <label for="agreetc" class="color-secondary">I agree to the <a href="https://paailajob.com/terms-and-conditions" class="color-primary">Terms and conditions</a></label>
                    </div>
					<button id="load">Register
						<i class="zmdi zmdi-arrow-right"></i>
                    </button>
                    <div class="formwrap">
                            <p class="color-secondary text-center font-weight-bold">Already a member ? <a href="{{route('vendor.getLogin')}}" class="color1">Sign in</a></p>
                    </div>
				</form>
			</div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/backend-js/jquery.validate.min.js') }}"></script>
		<script type="text/javascript">
            $(document).ready(function(){
               $("#register-form").validate({
                   ignore: [],
                    rules: {               
                       vname: {
                           required: true,
                           minlength: 2
                       },               
                       password: {
                            required: true,
                            minlength: 8
                        },
                        password_confirmation: {
                            required: true,
                            minlength: 8,
                            equalTo: "#password"
                        },
                       email: {
                           required: true,
                           email: true
                       },
                       phone_number:{
                           required:true,
                           minlength:10,
                       },
                       agreetc: "required"          
                    },         
                       
                    messages: {
                        email:{
                            required:"Please enter your email address",
                            email:"Please enter valid email address"
                        },   
                        password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 8 characters long"
                        },
                        password_confirmation: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 8 characters long",
                            equalTo: "Please enter the same password as above"
                        },
                        vname:{
                            required:"Enter Vendor Name"
                        },                
                        phone_number:{
                            required:"Enter Mobile Number"
                        }, 
                        agreetc:"Please accept our policy"         
        
                    },
                    errorPlacement: function(error, element){              
                        error.appendTo( element.parent("div") ); 
                    },
                    submitHandler: function(form) {
                    $("#load").html("Loading <i class='fa fa-circle-o-notch fa-spin fa-fw'></i>").attr("disabled","disabled");
                      $.ajax({
                           url: form.action,
                           type: form.method,
                           data: $(form).serialize(),
                           dataType:'json',
                           success: function(data) {    
                           $('#statusBox').html('');                  
                                if(data.errors){
                                  $.each(data.errors, function(key,value) {
                                    $('#load').html('Login <i class="zmdi zmdi-arrow-right"></i>').removeAttr("disabled");
                                       $('#statusBox').append('<div class="alert alert-danger">'+value+'</div');
                                   });                       
                                }
                                if(data.success){
                                    $('#register-form')[0].reset();
                                    $('#load').html('Login <i class="zmdi zmdi-arrow-right"></i>').removeAttr("disabled");
                                    var statusBoxContent='<div class="alert alert-success">'+data.message+'</div>';
                                    $("#statusBox").html(statusBoxContent);
                                }
                           }            
                       });
                   }
                });
        
            });
        </script>
	</body>
</html>