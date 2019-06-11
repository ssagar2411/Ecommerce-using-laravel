@extends('layouts.userlayouts.user-design')
@section('content')
    <!-- ##### Single Product Details Area Start ##### -->
    <section>
        <div class="container single_product_details_area my-4 py-4 d-flex align-items-center">
            
            <!-- Single Product Thumb -->
            <div class="single_product_thumb clearfix">
                <div class="single_image_wrapper">
                    <img src="{{ asset('images/backend_images/products/main_image/'.$product->product_images) }}" alt="" data-zoom_image="{{ asset('images/backend_images/products/main_image/'.$product->product_images) }}">
                </div>
                <div class="prod-thumb-wrapper owl-carousel py-3">
                    @foreach ($productimages as $productimage)
                        <a href="#" class="prod-thumb-btn">
                            <img src="{{ asset('images/backend_images/products/'.$productimage->image) }}" data-img="{{ asset('images/backend_images/products/'.$productimage->image) }}" data-zoom_img="{{ asset('images/backend_images/products/'.$productimage->image) }}">
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Single Product Description -->
            <div class="single_product_desc clearfix">
                <span>mango</span>
                <a href="cart.html">
                    <h2>{{ $product->product_name }}</h2>
                </a>
                @if ($product->sell_price == $product->mark_price)
                    <p class="product-price">Rs. {{ $product->sell_price }}</p>
                @else
                    <p class="product-price"><span class="old-price">Rs. {{ $product->mark_price }}</span> Rs. {{ $product->sell_price }}</p>
                @endif
                <p class="product-desc">Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus velit id urna vehicula, nec maximus est sollicitudin.</p>

                <!-- Form -->
                <form class="cart-form clearfix" method="post">
                    <!-- Select Box -->
                    <input type="hidden" name="id" value="{{ $product->product_id }}">
                    @csrf
                    <div class="select-box d-flex mt-50 mb-30">
                        <select name="productsize" id="productSize" class="mr-5" title="Sizes">
                                
                            @foreach ($productattributes as $attribute)
                                @if (strtolower($attribute->attribute_name)=="sizes" || strtolower($attribute->attribute_name)=="size" )
                                    <option value="{{ $attribute->attribute_value }}">Size: {{ $attribute->attribute_value }}</option>
                                @endif
                            @endforeach
                        </select>
                        <select name="productcolor" id="productColor" title="Colors">
                            @foreach ($productattributes as $attribute)
                                @if (strtolower($attribute->attribute_name)=="colors" || strtolower($attribute->attribute_name)=="color")
                                    <option value="{{ $attribute->attribute_value }}">Color: {{ $attribute->attribute_value }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control mb-3" id="quantity" name="quantity" value="1">
                    </div>
                    <!-- Cart & Favourite Box -->
                    <div class="cart-fav-box d-flex align-items-center">
                        <!-- Cart -->
                        <button type="button" id="addcart" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                        <!-- Favourite -->
                        <!-- <div class="product-favourite ml-4">
                            <a href="#" class="favme fa fa-heart"></a>
                        </div> -->
                    </div>
                </form>
             
            </div>
        </div>
    </section>
    <section class="product_details_section">
        <div class="container">

            <div class="row"> 
                <div class="col-md-9">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Product Details</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Reviews(2)</a>
                        </li>
                    </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <div class="product_details py-4">
            {!! $product->product_description !!}              
      </div>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
        <div class="product-review">
            <h5>Product Reviews</h5>
            <div class="user-reviews">
                <div class="review-breakdown my-3 d-flex">
                    <div class="review-summary">
                        <span class="avg-rating">
                            4.5
                        </span>
                        <span class="total">/5</span>
                        <div class="avg-rating-star">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="num_review">
                            20 ratings
                        </div>
                    </div>
                    <div class="user_individual_rating pl-5">
                        <div class="d-flex">
                            <span><i class="fa fa-star"></i> 5</span>
                            <div class="rating_progress_wrapper">
                                <span class="rating_progress" data-pct="80"></span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <span><i class="fa fa-star"></i> 4</span>
                            <div class="rating_progress_wrapper">
                                <span class="rating_progress" data-pct="20"></span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <span><i class="fa fa-star"></i> 3</span>
                            <div class="rating_progress_wrapper">
                                <span class="rating_progress" data-pct="0"></span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <span><i class="fa fa-star"></i> 2</span>
                            <div class="rating_progress_wrapper">
                                <span class="rating_progress" data-pct="0"></span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <span><i class="fa fa-star"></i> 1</span>
                            <div class="rating_progress_wrapper">
                                <span class="rating_progress" data-pct="0"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-review">
                    <div class="user-name mb-1 font-weight-bold">
                        khadga S. <span class="date ml-3 font-weight-normal">1 day ago</span>
                    </div>
                    <div class="user-rat">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="review-desc mt-1">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                         consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. 
                    </div>
                </div>
                <div class="user-review">
                    <div class="user-name mb-1 font-weight-bold">
                        khadga S. <span class="date ml-3 font-weight-normal">1 day ago</span>
                    </div>
                    <div class="user-rat">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="review-desc mt-1">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. 
                    </div>
                </div>
            </div>     
        </div>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
</div>
                <div class="col-md-3">
                    <div class="product-page-sidebar mt-3">
                        <h3 class="mb-3">Recommended Products</h3>
                        @foreach ($relatedproducts as $relatedproduct)
                            <div class="sidebar_product">
                                <a href="{{ $relatedproduct->product_id }}">
                                    <div class="img_wrapper">
                                        <img src="{{ asset('images/backend_images/products/main_image/'.$relatedproduct->product_images) }}">
                                    </div>
                                    <div class="sidebar-product-title"> 
                                        <h5>{{ $relatedproduct->product_name }}</h5>
                                    </div>
                                </a>
                            </div>
                        @endforeach 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->
@endsection
@section('scripts')
<script src="{{ asset('js/frontend-js/elevate.min.js') }}"></script>
<script type="text/javascript">
    $(document).on('click','#addcart',function(){
        var path = "{{ asset('images/backend_images/products/main_image') }}";
		var tq = parseInt($('#cartcount').text());
        $.ajax({
            type: 'POST',
            url: '/cart',
            data: {
                '_token': $('input[name=_token]').val(),
                'pid' : $('input[name=id]').val(),
                'color' : $('#productColor').val(),
                'size' : $('#productSize').val(),
                'quantity' : $('#quantity').val()
            },
            success: function(data){
                console.log(data);
                var nprods = '<div class="single-cart-item">'+
'				<a href="#" class="product-image">'+
'					<img src="'+path+'/'+ data.image +'" class="cart-thumb" alt="">'+
'					<!-- Cart Item Desc -->'+
'					<div class="cart-item-desc">'+
'					  <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>'+
'						<span class="badge">Mango</span>'+
'						<h6>'+ data.name +'</h6>'+
'						<p class="size">Size: '+ data.size +'</p>'+
'						<p class="color">Color: '+ data.color +'</p>'+
'						<p class="price">Rs. '+ data.price +'</p>'+
'					</div>'+
'				</a>'+
'			</div>';
                    tq = tq + parseInt(data.quantity);
							$("#cart-content .cart-list").append(nprods);
						
						if (tq == 0) {
							$("#cartstatus").html("No items in Cart");
						}else{
							$("#cartstatus").html("Recently Added item(s)");
						}
						$("#cartcount").html(tq);
            },
        });

   });
    $(document).on('click','#remove',function(){
       alert('hello');
    });
    
    $('.single_product_thumb .single_image_wrapper img').elevateZoom({
        zoomType: "inner",
    cursor: "crosshair",
    zoomWindowFadeIn: 500,
    zoomWindowFadeOut: 750
       }); 

   $(document).ready(function(){
       $(".prod-thumb-btn").on('click',function(){
          var new_src = $(this).find("img").data('img');
          var data_zoom = $(this).find("img").data('zoom_img');


          $(".single_image_wrapper img").attr({"src":new_src,"data-zoom_image":data_zoom});

              $('.single_product_thumb .single_image_wrapper img').elevateZoom({
        zoomType: "inner",
    cursor: "crosshair",
    zoomWindowFadeIn: 500,
    zoomWindowFadeOut: 750
       }); 


       });
   })
</script>
<style type="text/css">
   .zoomContainer{
       z-index: 100;
   }
</style>

@endsection