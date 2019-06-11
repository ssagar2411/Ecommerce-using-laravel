@extends('layouts.userlayouts.user-design')
@section('content')
<div class="breadcumb_area register-banner bg-img" style="background-image: url('../../images/frontend_images/reg_back.jpg');">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Register</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="login_signup_section section-padding-80">
    <div class="container">
        {{-- <div class="alert alert-danger">
          <strong>Success!</strong> You should <a href="" class="alert-link">read this message</a>.
        </div> --}}
        <div id="statusBox">
        </div>
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="checkout_details_area registration-area clearfix">

                    <div class="cart-page-heading mb-30">
                        <h5>Register</h5>
                    </div>

                    <form action="{{route('user.postRegister')}}" method="post"  id="register-form">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">First Name <span>*</span></label>
                                <input type="text" class="form-control" id="fname" name="fname" value="" >
                                {{-- <label class="error">Worng password</label> --}}
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Last Name <span>*</span></label>
                                <input type="text" class="form-control" id="lname" name="lname" value="" >
                                {{-- <label class="error">Worng password</label> --}}
                            </div>
                            <div class="col-12 mb-3">
                                <label for="email_address">Email Address <span>*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="">
                                {{-- <label class="error">Worng password</label> --}}
                            </div>
                            <div class="col-12 mb-3">
                                <label for="phone_number">Phone No <span>*</span></label>
                                <input type="text" class="form-control" id="phone_number" name="mobile_number" value="">
                                {{-- <label class="error">Worng password</label> --}}
                            </div>
                            <div class="col-12 mb-3">
                                <label for="password">Password <span>*</span></label>
                                <input type="password" class="form-control" id="password" name="password">
                                {{-- <label class="error">Worng password</label> --}}
                            </div>
                            <div class="col-12 mb-4">
                                <label for="cpassword">Confirm Password <span>*</span></label>
                                <input type="password" class="form-control" id="cpassword"  name="password_confirmation">
                                {{-- <label class="error">Worng password</label> --}}
                            </div>        
                            <div class="col-12">
                                <div class="custom-control custom-checkbox d-block mb-2">
                                    <input type="checkbox" class="custom-control-input" id="agreetc" name="agreetc">
                                    <label class="custom-control-label" for="agreetc">I agree to <a href="#">Terms and conitions</a></label>
                                </div>
                                <button id="register" type="submit" class="btn essence-btn mt-3">Register</button>

                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>

           <div class="col-12 col-md-6">
               <div class="checkout_details_area login-area clearfix">

                   <div class="cart-page-heading mb-30">
                       <h5>Login</h5>
                   </div>

                   <form action="{{route('user.postLogin')}}" method="post" id="login-form">
                       <div class="row">
                           <div class="col-md-12 mb-3">
                               <label for="l_email">Email <span>*</span></label>
                               <input type="text" class="form-control" id="l_email" name="email" value="" required>
                               {{-- <label class="error">Worng password</label> --}}
                           </div>
                           <div class="col-md-12 mb-3">
                               <label for="l_password">Password <span>*</span></label>
                               <input type="password" class="form-control" id="l_password" name="password" value="" required>
                               {{-- <label class="error">Worng password</label> --}}
                           </div>
                           <div class="col-md-12">
                               <button id="login" type="submit" class="btn essence-btn mt-3">Login</button>
                                <a href="#" class="btn btn-outline float-right mt-3">Forgot password ?</a>
                                <div class="clearfix"></div>
                           </div>
                           <div class="col-md-12">
                               <div class="social-login-seperator">
                                    <span>OR</span>
                                </div>
                                <div class="social-login-btns">
                                    <a href="#" class="btn btn-block btn-fb"><i class="fa fa-facebook"></i>  Login With Facebook</a>
                                    <a href="#" class="btn btn-block btn-google"><i class="fa fa-google-plus"></i> Login With Google</a>
                                </div>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
       $("#register-form").validate({
           ignore: [],
            rules: {               
               fname: {
                   required: true,
                   minlength: 2
               },
               lname: {
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
               mobile_number:{
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
                fname:{
                    required:"Enter First Name"
                },
                lname:{
                    required:"Enter Last Name"
                },
                mobile_number:{
                    required:"Enter Mobile Number"
                }, 
                agreetc:"Please accept our policy"         

            },
            errorPlacement: function(error, element){              
                error.appendTo( element.parent("div") ); 
            },
            submitHandler: function(form) {
                $("#register").html("Loading <i class='fa fa-circle-o-notch fa-spin fa-fw'></i>").attr("disabled","disabled");
              $.ajax({
                   url: form.action,
                   type: form.method,
                   data: $(form).serialize(),
                   dataType:'json',
                   success: function(data) {    
                   $('#statusBox').html('');                  
                        if(data.errors){
                          $.each(data.errors, function(key,value) {
                                $('#register').html('Register').removeAttr("disabled");
                               $('#statusBox').append('<div class="alert alert-danger">'+value+'</div');
                           });                       
                        }
                        if(data.success){
                            $('#register-form')[0].reset();
                            $('#register').html('Register').removeAttr("disabled");
                            var statusBoxContent='<div class="alert alert-success">'+data.message+'</div>';
                            $("#statusBox").html(statusBoxContent);
                        }
                   }            
               });
           }
        });

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
             $('#email-error').html("");
             $('#password-error').html("");
             $("#login").html("Loading <i class='fa fa-circle-o-notch fa-spin fa-fw'></i>").attr("disabled","disabled");
              $.ajax({
                   url: form.action,
                   type: form.method,
                   data: $(form).serialize(),
                   dataType:'json',
                   success: function(data) {
                       $('#login-form')[0].reset();
                        if(data.errors){                    
                            if(data.errors.email){
                                $('#email-error' ).html(data.errors.email[0] );
                            }
                            if(data.errors.password){
                                $('#password-error' ).html(data.errors.password[0] );
                            }                    
                        }
                        if(data.success){
                            $('#login').html('Login').removeAttr("disabled");
                            location.href = data.redirect_url;
                        }else{
                            $('#login').html('Login').removeAttr("disabled");
                            var statusBoxContent='<div class="alert alert-danger">'+data.message+'</div>';
                            $("#statusBox").html(statusBoxContent);
                        }
                   }            
               });
           }
        });

    });
</script>
@endsection
@section('style')
    <style>
        #register:disabled{
                opacity:0.7;
                cursor: not-allowed;
                background-color: #2874f0;
                color: #ffffff;
            }

        #login:disabled{
            opacity: 0.7;
            cursor: not-allowed;
            background-color: #2874f0;
            color: #ffffff;
        }
    </style>
@endsection