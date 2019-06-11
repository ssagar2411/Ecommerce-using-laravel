<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Paaila Shop::Seller Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/all.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/frontend-css/bootstrap.min.css') }}"> --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <style>
            .formwrap{
                margin-top: 50px;
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

		<div class="wrapper" style="background-image: url('/images/bg10.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="{{ asset('images/bg2.jpg') }}" alt="">
				</div>
				<form id="login-form" action="{{ route('user.postLogin') }}" method="POST">
                    <h3>Seller Login</h3>
                    @csrf
                    <div id="statusBox"></div>
					<div class="form-wrapper">
						<input type="email" name="email" class="form-controla" placeholder="E-mail">
						<i class="zmdi zmdi-email"></i>
                    </div>
					<div class="form-wrapper">
                        <input type="password" name="password" class="form-controla" placeholder="Password">
						<i class="zmdi zmdi-lock"></i>
					</div>
                    <div class="form-wrapper">
                        <input type="checkbox" name="remember" id="keeplogged">
                        <label for="keeplogged" class="color1">Keep me signed in</label><br>
                        
                    </div>
                    <div class="formwrap">
                        <p class="color1 text-center font-weight-bold mt-3"><a href="{{route('fpass')}}" class="">Forgot Password ? </a></p>
                    </div>
					<button id="load">Login
                        <i class="zmdi zmdi-arrow-right"></i>
                        
                       
                    </button>
                    <div class="formwrap">
                        <p class="color1 text-center font-weight-bold mt-3">Not a member yet? <a href="{{route('vendor.getRegister')}}" class="color-primary">Register here</a></p>
                    </div>
				</form>
			</div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/backend-js/jquery.validate.min.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
           $("#login-form").validate({
           ignore: [],
            rules: {               
               email: {
                   required: true,
                   email: true
               },
               password:{
                required:true
               }               
            },         
               
            messages: {
                email:{
                    required:"Please enter your email address",
                    email:"Please enter valid email address"
                },   
                password:{
                    required:"Enter your password"                    
                }            

            },
            errorPlacement: function(error, element){              
                error.appendTo( element.parent("div") ); 
            },
            submitHandler: function(form) {
            //  $('#email-error').html("");
            //  $('#password-error').html("");
            $("#load").html("Loading <i class='fa fa-circle-o-notch fa-spin fa-fw'></i>").attr("disabled","disabled");
            //  console.log(my_button);
              $.ajax({
                   url: form.action,
                   type: form.method,
                   data: $(form).serialize(),
                   dataType:'json',
                   success: function(data) {
                    //    $('#login-form')[0].reset();                        
                        if(data.success){
                            //console.log('hye');
                            $('#load').html('Login <i class="zmdi zmdi-arrow-right"></i>').removeAttr("disabled");
                            location.href = data.redirect_url;
                            
                        }else{
                            $('#load').html('Login <i class="zmdi zmdi-arrow-right"></i>').removeAttr("disabled");;
                            var statusBoxContent='<div class="alert alert-danger" role="alert">'+data.message+'</div>';
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