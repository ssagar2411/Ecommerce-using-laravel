@extends('layouts.userlayouts.user-design')

@section('content')
<div class="breadcumb_area register-banner bg-img" style="background-image: url({{ asset('images/frontend_images/reg_back1.jpg') }});">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Cart</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    button#prod-remove:hover {
    cursor: pointer;
}
</style>
<div style="position: relative; min-height: 400px;" >
    <div class="cart-section section-padding-80 loading_wrapper" id="content">
       
    </div>
</div>
@endsection

@section('scripts')
    <script>
        loadData();
	    function loadData(){
		$.ajax({
		    type: "get",
		    url: "{{route('public.viewcart')}}",
		    data: "",
		    cache: false,
		    beforeSend: function() {
		        $(".loading_wrapper").addClass('loading');   
                      
		    },
		    success: function (data){
		    	$(".loading_wrapper").removeClass('loading'); 
		    	$("#content").html(data);
	        },
	        error:function(data){
	        	console.log(data);
	        }
	    });
	}
        function updateCart(ucart){
            var productid = ucart.dataset.id;
            var quantity = ucart.value;
            $.ajax({
                type: 'post',
                url: '/updatecart',
                data: { 'productid': productid, 'quantity': quantity },
                success: function(data){
                    loadData();
                },
            });
        }
        function removeprod(e){
            var id = e.dataset.id;
            console.log(id);
            $.ajax({
                type: 'post',
                url: '/deletecart',
                data: {'id': id},
               success: function(data){
                   loadData();
               },
            });
        }
    </script>
@endsection