@extends('layouts.sellerlayouts.seller-design')

@section('content')
<div class="container-fluid">
    <form action="{{ route('vendor.update-password') }}" method="post" id="password-change">
        <div class="row">
            <div class="col-md-8">
                @if (Session::has('msg'))
                    <div class="alert alert-success">{{ Session::get('msg') }}</div>
                @endif
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">vpn_key</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Settings -
                            <small class="category">Change Password Here</small>
                        </h4>  
                        @csrf
                        <input type="hidden" value="{{ Auth::user()->id }}">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label">Primary Email Address</label>
                                    <input type="text" class="form-control" name="primary_email" value="{{ $primaryemail }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label">Current Password</label>
                                    <input type="password" class="form-control" name="current_password" id="currentpassword">
                                    <span id="chkpwd"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label">New Password</label>
                                    <input type="password" class="form-control" name="new_password" id="new_password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label">Re-Type Password</label>
                                    <input type="password" class="form-control" name="retype_password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <button class="btn btn-primary btn-round" type="submit">Save</button>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
            <div class="col-md-4">
                    <div class="card card-testimonial">
                        <div class="icon">
                            <i class="material-icons">format_quote</i>
                        </div>
                        <div class="row">
                            <div class="container-fluid">
                            <a href="{{ $data->facebook_url }}" ><img style="max-width: 12%; margin-right: 1em;" src="http://127.0.0.1:8000/images/vendor_images/profile/facebook.png" alt=""></a>
                            <a href="{{ $data->twitter_url }}" ><img style="max-width: 12%; margin-right: 1em;" src="http://127.0.0.1:8000/images/vendor_images/profile/twitter.png" alt=""></a>
                            <a href="{{ $data->instagram_url }}" ><img style="max-width: 12%;" src="http://127.0.0.1:8000/images/vendor_images/profile/instagram.png" alt=""></a>
                            </div>
                        </div>
                        <div class="card-content">
                            <h5 class="card-description" >
                            Phone : {{ $data->phone_number }}<br>
                            Email : {{ $data->secondary_email }}
                            </h5>
                        </div>
                        <div class="footer">
                            <h4 class="card-title">{{ $data->name }}</h4>
                            <h6 class="category">@ {{ $data->name }}</h6>
                            <div class="card-avatar">
                                <a href="{{ url('vendor/edit-profile/'.Auth::user()->id) }}">
                                    <img class="img" src="{{ asset('images/vendor_images/profile/'.$data->logo) }}" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#password-change").validate({
                ignore: [],
                rules:{
                    new_password: {
                        required: true,
                        minlength: 8
                    },
                    retype_password: {
                        required: true,
                        minlength: 8,
                        equalTo: "#new_password"
                    }
                },
                messages: {
                    new_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 8 characters long"
                    },
                    retype_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 8 characters long",
                        equalTo: "Please enter the same password as above"
                    }
                },
                errorPlacement: function(error, element){              
                    error.appendTo( element.parent("div") ); 
                },
            });
        });
        $("#currentpassword").on('change',function(){
            var pass = document.getElementById('currentpassword').value;
            console.log(pass);
            $.ajax({
                type: 'post',
                url: '/vendor/matchpassword',
                data: {'currentpass' : pass},
                success: function(data){
                    if(data == "true"){
                        $("#chkpwd").html("<p class='text-success'>Correct Password</p>");
                    }else if(data == "false"){
                        $("#chkpwd").html("<p class='text-danger'>Incorrect Password</p>");
                    }
                },
            });
        });

    </script>
@endsection