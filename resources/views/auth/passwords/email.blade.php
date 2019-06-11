<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reset Password</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/backend-css/opensans-font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/backend-css/line-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/backend-css/material-dashboard.css') }}">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('css/backend-css/style.css') }}"/>
</head>
<body class="form-v7">
        <div class="page-content">
            <div class="form-v7-content">
                <div class="form-left">
                    <img src="{{ asset('images/reset.jpg') }}" alt="form">
                    <p class="text-1">Reset Password</p>
                    <p class="text-2">Paaila Shop : : 2019</p>
                </div>
                <form class="form-detail" action="{{ url('password/email') }}" method="post" id="myform">
                   @csrf
                   
                   @if (session('status'))
                   <div class="alert alert-success" style="margin-bottom: 10px;" role="alert">
                       {{ session('status') }}
                   </div>
                   @endif
                    <div class="form-row">
                        <label for="comfirm_password">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="input-text{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: #800303;">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-row-last">
                        <button type="submit" class="register">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
</body>
</html>