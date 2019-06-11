@extends('layouts.userlayouts.user-design')
@section('content')
     <!-- ##### Breadcumb Area Start ##### -->
     <div class="breadcumb_area bg-img" style="background-image: url({{ asset('images/frontend_images/reg_back1.jpg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>

                        <form action="{{ route('user.postcheckout') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">First Name <span>*</span></label>
                                    <input type="text" class="form-control" id="first_name" value="{{ Auth::user()->vendoruser->fname }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Last Name <span>*</span></label>
                                    <input type="text" class="form-control" id="last_name" value="{{ Auth::user()->vendoruser->lname }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="country">Country <span>*</span></label>
                                    <select class="w-100" id="country" disabled>
                                        <option value="usa">Nepal</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Billing Address <span>*</span></label>
                                    <input type="text" class="form-control mb-3" id="billing_address" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Shipping Address <span>*</span></label>
                                    <input type="text" class="form-control mb-3" id="shipping_address" value="">
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                        <input type="checkbox" class="custom-control-input" id="billing_same">
                                        <label class="custom-control-label" for="billing_same">Same as billing addrress</label>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="postcode">Postcode <span>*</span></label>
                                    <input type="text" class="form-control" id="postcode" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="city">Town/City <span>*</span></label>
                                    <input type="text" class="form-control" id="city" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="state">Province <span>*</span></label>
                                    <input type="text" class="form-control" id="state" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input type="number" disabled class="form-control" id="phone_number"  value="{{ Auth::user()->vendoruser->mobile_number }}">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" class="form-control" id="email_address" value="{{ Auth::user()->email }}">
                                </div>

                                <div class="col-12">
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">I agree to <a href="#">Terms and conitions</a></label>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">
                                <li><span>Product</span> <span>qty</span><span>Price</span><span>Total</span></li>
                                @foreach ($items as $item)
                                <li><span>{{ $item->name }}</span> <span>{{ $item->quantity }}</span><span>Rs. {{ $item->price }}</span><span>Rs. {{ $item->itemtotalprice }}</span></li>
                                @endforeach
                                <li><span>Subtotal</span> <span></span><span></span>Rs. {{ $subtotalprice }}</span></li>
                                <li><span>Shipping</span> <span></span><span></span><span>Rs. {{ $shippingcost }}</span></li>
                                <li><span>Total</span> <span></span><span></span><span>Rs. {{ $totalprice }}</span></li>
                        </ul>
                        <style>
                            .order-details-form li span:nth-child(1){
                                width:50%;
                            }
                            .order-details-form li span:nth-child(2){
                                width:12%;
                            }
                            .order-details-form li span:nth-child(3){
                                width:18%
                            }
                            .order-details-form li span:nth-child(4){
                                width:20%;
                                text-align:right;
                            }
                        </style>
                        <div id="accordion" role="tablist" class="mb-4">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <div class="custom-control custom-radio d-block mb-2">
                                        <input type="radio" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Cash On Delivery</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <button type="submit" class="btn essence-btn">Place Order</button>
                    </form>
                    </div>
                    <div class="order-details-confirmation mt-4">
                        <label>Apply coupon</label>
                        <input type="text" name="" class="form-control rounded-0">
                        <button id="applycoupon" class="btn essence-btn mt-2">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
@endsection
@section('scripts')
<script type="text/javascript">
    $('#applycoupon').on('click',function(){
        $("#applycoupon").html("Loading <i class='fa fa-circle-o-notch fa-spin fa-fw'></i>").attr("disabled","disabled");
    });

    $("#billing_same").change(function(){
        if($(this).prop('checked')){
            $("#shipping_address").val($("#billing_address").val())
        }
        else{
            $("#shipping_address").val("");
        }
    })
</script>
@endsection