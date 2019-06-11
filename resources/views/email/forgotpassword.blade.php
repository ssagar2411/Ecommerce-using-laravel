
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Welcome to {{env('APP_NAME')}}</title>
<style>
/* -------------------------------------
		GLOBAL
------------------------------------- */
* {
	margin: 0;
	padding: 0;
	font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
	font-size: 100%;
	line-height: 1.6;
}

img {
	max-width: 100%;
}

body {
	-webkit-font-smoothing: antialiased;
	-webkit-text-size-adjust: none;
	width: 100%!important;
	height: 100%;
}


/* -------------------------------------
		ELEMENTS
------------------------------------- */
a {
	color: #348eda;
}

.btn-primary {
	text-decoration: none;
	color: #FFF;
	background-color: rgb(229, 57, 53);
	border: solid rgb(229, 57, 53);
	border-width: 5px 20px;
	line-height: 2;
	font-weight: bold;
	margin-right: 10px;
	text-align: center;
	cursor: pointer;
	display: inline-block;
	border-radius: 0px;
}

.btn-secondary {
	text-decoration: none;
	color: #FFF;
	background-color: #aaa;
	border: solid #aaa;
	border-width: 10px 20px;
	line-height: 2;
	font-weight: bold;
	margin-right: 10px;
	text-align: center;
	cursor: pointer;
	display: inline-block;
	border-radius: 25px;
}

.last {
	margin-bottom: 0;
}

.first {
	margin-top: 0;
}

.padding {
	padding: 10px 0;
}


/* -------------------------------------
		BODY
------------------------------------- */
.body-wrap {
	width: 100%;
	padding: 20px;
	text-align: center;
	
}

.body-wrap .container {
	border-top: 5px solid rgb(229, 57, 53);
	box-shadow: 0 0 15px 2px rgba(90,90,90,0.2);
	padding-bottom:0;
    background-color: #ffffff;
}
.footer{
	background-color: rgb(229, 57, 53);
	padding:10px 15px;
	color:#fff;
	text-align: center;
	margin:0 -20px;
	margin-top:30px;
	box-shadow: 0 2px 10px 1px rgba(229, 57, 53, 0.3);
}

.footer a{
	color:#fff;
	text-decoration: none;
}
/* -------------------------------------
		FOOTER
------------------------------------- */
.footer-wrap {
	width: 100%;	
	clear: both!important;
}

.footer-wrap .container p {
	font-size: 12px;
	color: #666;
	
}

.footer-wrap a {
	color: #999;
}


/* -------------------------------------
		TYPOGRAPHY
------------------------------------- */
h1, h2, h3 {
	font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
	line-height: 1.1;
	margin-bottom: 15px;
	color: #000;
	margin: 40px 0 10px;
	line-height: 1.2;
	font-weight: 200;
}

h1 {
	font-size: 36px;
}
h2 {
	font-size: 28px;
}
h3 {
	font-size: 22px;
}

p, ul, ol {
	margin-bottom: 10px;
	font-weight: normal;
	font-size: 16px;
}

ul li, ol li {
	margin-left: 5px;
	list-style-position: inside;
}

/* ---------------------------------------------------
		RESPONSIVENESS
		Nuke it from orbit. It's the only way to be sure.
------------------------------------------------------ */

/* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
.container {
	display: block!important;
	max-width: 600px!important;
	margin: 0 auto!important; /* makes it centered */
	clear: both!important;
}

/* Set the padding on the td rather than the div for Outlook compatibility */
.body-wrap .container {
	padding: 20px;
	padding-bottom:0;
}

/* This should also be a block element, so that it will fill 100% of the .container */
.content {
	max-width: 600px;
	margin: 0 auto;
	display: block;
}
.no-wrap{
    word-break: break-all;
}

</style>
</head>

<body bgcolor="#f6f6f6">

	<!-- body -->
	<div class="body-wrap">

		<div class="container" bgcolor="#FFFFFF">

			<!-- content -->
			<div class="content">
				<div style="text-align: center;margin-bottom:30px"><img src="https://i.imgur.com/YXw70Vv.png" height="60px"></div>
				<p>We have sent you this email in response to your request to reset your password on {{env('APP_NAME')}}.</p>
				<p style="margin-top:15px;">To reset your password for  {{env('APP_NAME')}}  please follow the link below.</p>
				<p style="margin:25px 0"><a href="{{route('password.reset',['token'=>$token])}}" class="btn-primary">Reset Password</a></p>
				<p>Please click on link below if the above button doesn't work.</p>
				<p><a class="no-wrap" href="{{route('password.reset',['token'=>$token])}}">{{route('password.reset',['token'=>$token])}}</a></p>
			</div>
			<!-- /content -->
			<div class="footer">
				Copyright &copy; 2019 <a href="https://paailatechnologies.com">Paaila Technologies.</a>
			</div>

		</body>
		</html>