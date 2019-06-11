<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>PaailaShop</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('images/frontend_images/core-img/favicon.ico') }}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/frontend-css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend-css/style.css') }}">
    <style>
      a.nav-brand img{
        width : auto;
        height : 50px;
      }
      .right-side-cart-area .cart-content .cart-list .single-cart-item .product-image .cart-item-desc {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.6);
    padding-top: 10px;
    padding-left: 10px;
    /* padding: 50px 15px 15px; */
    /* padding-bottom: 20px; */
    /* margin-bottom: 20px; */
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
}
.loading{
    position: absolute;
    height:100%;
    width:100%;
    margin:0;
    padding:0;
    overflow:hidden;
    } 
    .loading:before{
    content:"";
    position:absolute;
    height:100%;
    width:100%;
    background-color:white;
    z-index:1999;
    }
    .loading.transparent:before{
    background-color:rgba(255,255,255,0.8); 
    }
    .loading:after{
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
    .loaded{
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
    
    </style>
    @yield('style')

</head>

<body class="">
	
	<!-- #### User Header With Cart Section #### -->
	@include('layouts.userlayouts.user-header')
	<!-- #### User Header With Cart Section End #### -->

   
	
    @yield('content')

    <!-- ##### Footer Area Start ##### -->
		@include('layouts.userlayouts.user-footer')
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{asset('js/frontend-js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/backend-js/jquery.validate.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('js/frontend-js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/frontend-js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('js/frontend-js/plugins.js') }}"></script>
    <!-- Classy Nav js -->
    <script src="{{ asset('js/frontend-js/classy-nav.min.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('js/frontend-js/active.js') }}"></script>
    @yield('scripts')
    <script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
				var path = "{{ asset('images/backend_images/products/main_image') }}";
				var tq = 0;
				$.ajax({
					type: 'post',
					url: '/getcart',
					data: {},
					success: function(data){
						// console.log(data);
						$.each(data,function(key,value){
							console.log(value); 
							console.log(value.attributes.color);
              console.log(value.attributes.size);
							
							var nprods = '<div class="single-cart-item">'+
'				<a href="#" class="product-image">'+
'					<img src="'+path+'/'+ value.attributes.image +'" class="cart-thumb" alt="">'+
'					<!-- Cart Item Desc -->'+
'					<div class="cart-item-desc">'+
'					  <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>'+
'						<span class="badge">Mango</span>'+
'						<h6>'+ value.name +'</h6>'+
'						<p class="size">Size: '+ value.attributes.size +'</p>'+
'						<p class="color">Color: '+ value.attributes.color +'</p>'+
'						<p class="price">Rs. '+ value.price +'</p>'+
'					</div>'+
'				</a>'+
'			</div>';
	

							tq = tq + parseInt(value.quantity);
							$("#cart-content .cart-list").append(nprods);
						});
						if (tq == 0) {
							$("#cartstatus").html("No items in Cart");
						}else{
							$("#cartstatus").html("Recently Added item(s)");
						}
						$("#cartcount").html(tq);
					},
				});
			});
    </script>

</body>

</html>