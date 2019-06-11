@extends('layouts.app')
@section('content')
<div class="login-page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="login-form">
                    <form id="login-form" class="log-form" method="post" action="{{route('user.postLogin')}}">
                        @csrf
                        <div id="statusBox"></div>
                        <h3 class="color1 mb-4">Login</h3>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="E-mail">
                            <span class="text-danger">
                                <strong id="email-error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <span class="text-danger">
                                <strong id="password-error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember" id="keeplogged">
                            <label for="keeplogged" class="color1">Keep me signed in <a href="{{route('fpass')}}" class="text-muted float-right">Forgot Password</a></label>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn1">Sign in</button>
                        </div>
                        <p class="font-weight-bold mb-0">Sign in with:</p>
                        <a href="https://paailajob.com/jobseeker/auth/facebook" class="btn btn-fb">
                            <i class="ion-social-facebook"></i>
                        </a>  

                        <a href="https://paailajob.com/jobseeker/auth/linkedin" class="btn btn-in">
                             <i class="ion-social-linkedin"></i>
                        </a>   



                         <p class="color1 text-center font-weight-bold mt-3">Not a member yet? <a href="{{route('user.getRegister')}}" class="color-primary">Register here</a></p>
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
                            location.href = data.redirect_url;
                        }else{
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