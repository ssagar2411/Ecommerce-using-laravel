@extends('layouts.app')
@section('content')
<section class="signup-page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="signup-form">
                    <div id="statusBox">
                    </div>
                    <form  id="register-form" method="post" action="{{route('user.postRegister')}}">
                        @csrf
                        <h3 class="color1">Register as a user</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="E-mail Address">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="mobile_number" placeholder="Mobile No.">
                            <span class="text-danger">
                                <strong id="mobile_number-error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        </div>                        
                        <div class="form-group">
                            <input type="checkbox" name="agreetc" id="agreetc" value="1">
                            <label for="agreetc" class="color-secondary">I agree to the <a href="https://paailajob.com/terms-and-conditions" class="color-primary">Terms and conditions</a></label>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn1" type="submit">Register</button>
                        </div>
                        <p class="color-secondary text-center font-weight-bold">Already a member? <a href="{{route('user.getLogin')}}" class="color1">Sign in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
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
              $.ajax({
                   url: form.action,
                   type: form.method,
                   data: $(form).serialize(),
                   dataType:'json',
                   success: function(data) {    
                   $('#statusBox').html('');                  
                        if(data.errors){
                          $.each(data.errors, function(key,value) {
                               $('#statusBox').append('<div class="alert alert-danger">'+value+'</div');
                           });                       
                        }
                        if(data.success){
                            $('#register-form')[0].reset();
                            var statusBoxContent='<div class="alert alert-success">'+data.message+'</div>';
                            $("#statusBox").html(statusBoxContent);
                        }
                   }            
               });
           }
        });

    });
</script>
@endsection