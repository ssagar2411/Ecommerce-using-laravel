@extends('layouts.userlayouts.user-design')

@section('content')
 <!-- ##### Slider Section ##### -->
<section class="hero-carousel owl-carousel">
    <div class="welcome_area bg-img background-overlay" style="background-image: url('../../images/frontend_images/bg-img/bg-1.jpg');">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>asoss</h6>
                        <h2>New Collection</h2>
                        <a href="#" class="btn essence-btn">view collection</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="welcome_area bg-img background-overlay" style="background-image: url('../../images/frontend_images/bg-img/bg-2.jpg');">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>asoss</h6>
                        <h2>New Collection</h2>
                        <a href="#" class="btn essence-btn">view collection</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="vendor_n_collection">
     <div class="container">
        <div class="row"> 
            <div class="col-md-3"> 
                <div class="vendors">
                    <a href="#"><img src="{{ asset('images/frontend_images/vendor.png') }}"> Vendors</a>
                </div>
            </div>
            <div class="col-md-3"> 
                <div class="deals">
                    <a href="#"><img src="{{ asset('images/frontend_images/flash.png') }}"> Flash Deals</a>
                </div>
            </div>
            <div class="col-md-3"> 
                <div class="collections">
                    <a href="#"><img src="{{ asset('images/frontend_images/collection.png') }}"> Collections</a>
                </div>
            </div>
            <div class="col-md-3"> 
                <div class="coupons">
                    <a href="#"><img src="{{ asset('images/frontend_images/voucher.png') }}"> Coupons</a> 
                </div>
            </div>
        </div>
     </div>
</section>
 <!-- ##### Slider Section End ##### -->
<section class="flash-deal-section clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2>Today's Deals</h2>
                    <a href="#" class="btn btn-outline">View all</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="flash-deal-carousel owl-carousel">
                    @foreach ($latestproducts as $latproduct)
                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ asset('images/backend_images/products/main_image/'.$latproduct->product_images) }}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{ asset('images/backend_images/products/main_image/'.$latproduct->product_images) }}" alt="">
                                <!-- Favourite -->
                                @if ($latproduct->sell_price != $latproduct->mark_price)
                                    <div class="product-badge offer-badge">
                                        <span> - {{ $latproduct->discountpercent }}%</span>
                                    </div>
                                @endif
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                {{-- <span>topshop</span> --}}
                                <a href="single-product-details.html">
                                    <h6>{{ $latproduct->product_name }}</h6>
                                </a>
                                @if ($latproduct->sell_price == $latproduct->mark_price)
                                <p class="product-price">Rs. {{ $latproduct->sell_price }}</p>
                                @else
                                <p class="product-price"><span class="old-price">Rs. {{ $latproduct->mark_price }}</span>Rs. {{ $latproduct->sell_price }}</p>
                                @endif

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="{{ url('/product/'.$latproduct->product_id) }}" class="btn essence-btn">View Product</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<div class="top_catagory_area clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2>Collections for you</h2>
                    <a href="#" class="btn btn-outline">View all</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="collections-carousel">
                @foreach ($collections as $collection)
                    <div>
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url('../../images/backend_images/collections/{{ $collection->collection_image }}');">
                            <div class="catagory-content">
                            <a href="#">{{ $collection->collection_name }}</a>
                            </div>
                            <div class="cat_num_products text-center">
                                230 products
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="cta-area">
    <div class="container">
       <div class="cta-area-carousel">
           <div class="row">
               <div class="col-12">
                   <div class="cta-content bg-img background-overlay" style="background-image: url('../../images/frontend_images/bg-img/bg-5.jpg') ;">
                       <div class="h-100 d-flex align-items-center justify-content-end">
                           <div class="cta--text">
                               <h6>-60%</h6>
                               <h2>Global Sale</h2>
                               <a href="#" class="btn essence-btn">Buy Now</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    </div>
</div>

<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2>Popular Products</h2>
                    <a href="#" class="btn btn-outline">View all</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">
                    @foreach ($products as $product)
                         <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ asset('images/backend_images/products/main_image/'. $product->product_images) }}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{ asset('images/backend_images/products/main_image/'. $product->product_images) }}" alt="">
                                <!-- Favourite -->
                                @if ($product->sell_price != $product->mark_price)
                                    <div class="product-badge offer-badge">
                                        <span> - {{ $product->discountpercent }}%</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Product Description -->
                            <div class="product-description">
                                {{-- <span>topshop</span> --}}
                                <a href="single-product-details.html">
                                    <h6>{{ $product->product_name }}</h6>
                                </a>
                                @if ($product->sell_price == $product->mark_price)
                                <p class="product-price">Rs. {{ $product->sell_price }}</p>
                                @else
                                <p class="product-price"><span class="old-price">Rs. {{ $product->mark_price }}</span>Rs. {{ $product->sell_price }}</p>
                                @endif
    
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="{{ url('/product/'.$product->product_id) }}" class="btn essence-btn">View Product</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### New Arrivals Area End ##### -->

<!-- ##### Brands Area Start ##### -->
<div class="brands-area owl-carousel">
    @foreach ($brands as $brand)
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('images/backend_images/brands/'.$brand->brand_logo) }}" alt="">
        </div>
    @endforeach
    
</div>
<!-- ##### Brands Area End ##### -->
@endsection