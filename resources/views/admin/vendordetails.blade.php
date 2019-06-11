@extends('layouts.adminlayouts.admin-design')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 vendordetails">
            <h3 class="text-center" style="margin-top: 0px;">Vendor Details</h3>
            <br>
            <div class="nav-center">
                <ul class="nav nav-pills nav-pills-primary nav-pills-icons" role="tablist">
                    <li class="active">
                        <a href="#description" role="tab" data-toggle="tab" aria-expanded="true">
                            <i class="material-icons">info</i> Description
                        </a>
                    </li>
                    <li class="">
                        <a href="#products" role="tab" data-toggle="tab" aria-expanded="false">
                            <i class="material-icons">widgets</i> Products
                        </a>
                    </li>
                    <li class="">
                        <a href="#coupon" role="tab" data-toggle="tab" aria-expanded="false">
                            <i class="material-icons">confirmation_number</i> Coupons
                        </a>
                    </li>
                    <li class="">
                        <a href="#tasks-2" role="tab" data-toggle="tab" aria-expanded="false">
                            <i class="material-icons">help_outline</i> Help Center
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="description">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Description</h4>
                            <p class="category">
                                More information here
                            </p>
                            <h5>
                                @if ($vendordetails->active ==1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Inactive</span>
                                @endif
                                @if ($vendordetails->verified == 1)
                                    <span class="label label-primary">Verified</span>
                                @else
                                    <span class="label label-danger">Not Verified</span>
                                @endif
                            </h5>
                        </div>
                        <div class="card-content">
                           <div class="row">
                               <div class="col-md-8 vendor-detail">
                                <hr>
                                    <p>Name: {{ $vendordetails->name }}</p>
                                    <p>Address: {{ $vendordetails->address }}.</p>
                                    <p>Email: {{ $vendordetails->primary_email }}, {{ $vendordetails->secondary_email }}</p>
                                    <p>Phone: +977-{{ $vendordetails->phone_number }}, +977-{{ $vendordetails->secondary_phone_number }}</p>
                                    <p>Description: {{ $vendordetails->description }}</p>
                               </div>
                               <div class="col-md-4">
                                    <div class="card card-profile">
                                        <div class="card-avatar">
                                            <a>
                                                <img class="img" src="{{ asset('images/vendor_images/profile/'. $vendordetails->logo) }}" />
                                            </a>
                                        </div>
                                        <div class="card-content">
                                            <h6 class="category text-gray">Owner</h6>
                                            <h4 class="card-title">{{ $vendordetails->name }}</h4>
                                            <h4 class="card-title">{{ $vendordetails->primary_email }}</h4>
                                            <br>
                                            <hr>
                                            <div class="row">
                                                <div class="container-fluid">
                                                <a href="{{ $vendordetails->facebook_url }}" ><img style="max-width: 12%; margin-right: 1em;" src="{{ asset('images/vendor_images/profile/facebook.png') }}" alt=""></a>
                                                <a href="{{ $vendordetails->twitter_url }}" ><img style="max-width: 12%; margin-right: 1em;" src="{{ asset('images/vendor_images/profile/twitter.png') }}" alt=""></a>
                                                <a href="{{ $vendordetails->instagram_url }}" ><img style="max-width: 12%;" src="{{ asset('images/vendor_images/profile/instagram.png') }}" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="products">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Products</h4>
                            <p class="category">
                                Product's by {{ $vendordetails->name }}
                            </p>
                        </div>
                        <div class="card-content">
                            <div class="content-view">
                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Product Code</th>
                                                <th>Name</th>
                                                <th>image</th>
                                                <th>Brand</th>
                                                <th>Stock Status</th>
                                                <th>Quantity</th>
                                                <th>Featured</th>
                                                <th class="disabled-sorting text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{ $product->product_code }}</td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td><img style="max-width: 120px;" src="{{ asset('images/backend_images/products/main_image/'.$product->product_images) }}" alt=""></td>
                                                    <td>{{ $product->brand_name }}</td>
                                                    <td>{{ $product->stock_status_name }}</td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td><input type="checkbox" name="featured" value='{{ $product->featured }}' onchange="setfet(this)" data-id ="{{ $product->product_id }}" @if($product->featured == 1) checked  @endif >
                                                        <span class="label label-primary @if ($product->featured == 0)hidden @endif">Featured</span> 
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ url('/admin/view-product/'. $product->product_id) }}" data-toggle="tooltip" data-placement="top" title="View" class="btn  btn-just-icon btn-round btn-rose"><i class="material-icons">view_list</i></a>
                                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Edit" class="btn btn-just-icon btn-round btn-primary"><i class="material-icons">border_color</i></a>
                                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Delete" class="btn btn-just-icon btn-round btn-danger"><i class="material-icons">delete_forever</i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="coupon">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Coupons</h4>
                            <p class="category">
                                Coupon's by {{ $vendordetails->name }}
                            </p>
                        </div>
                        <div class="card-content">
                            <div class="content-view">
                                <div class="material-datatables">
                                    <table id="coupons" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sn</th>
                                                <th class="text-center">Coupon Code</th>
                                                <th class="text-center">Coupon Name</th>
                                                <th class="text-center">Started From</th>
                                                <th class="text-center">End To</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                            @foreach ($coupons as $coupon)
                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td class="text-center">{{ $coupon->coupon_code }}</td>
                                                    <td class="text-center">{{ $coupon->coupon_name }}</td>
                                                    <td class="text-center">{{ $coupon->start_time }}</td>
                                                    <td class="text-center">{{ $coupon->end_time }}</td>
                                                    <td class="text-center"><button  class="view_modal btn btn-rose btn-round btn-sm" data-code="{{ $coupon->coupon_code }}" data-name="{{ $coupon->coupon_name }}" data-starttime="{{ $coupon->start_time }}" data-endtime="{{ $coupon->end_time }}" data-discounttype="{{ $coupon->discount_type }}" data-discountvalue="{{ $coupon->discount_value }}" data-issuednumbercoupon="{{ $coupon->issued_number_coupon }}" data-minimumordervalue="{{ $coupon->minimum_order_value }}" data-limitpercustomer="{{ $coupon->limit_per_customer }}" data-discountpercent="{{ $coupon->discount_percent }}" data-maximumdiscountvalue="{{ $coupon->maximum_discount_value }}">Details</button></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tasks-2">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Help center</h4>
                            <p class="category">
                                More information here
                            </p>
                        </div>
                        <div class="card-content">
                            From the seamless transition of glass and metal to the streamlined profile, every detail was carefully considered to enhance your experience. So while its display is larger, the phone feels just right.
                            <br>
                            <br> Another Text. The first thing you notice when you hold the phone is how great it feels in your hand. The cover glass curves down around the sides to meet the anodized aluminum enclosure in a remarkable, simplified design.
                        </div>
                    </div>
                </div>
            </div>
            <button onclick="goback(this);" class="btn btn-danger">Go Back</button>
        </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
    <!-- Edit Attribute Modal -->
<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Coupon Details</h5>
        </div>
        <div class="modal-body">
            <form class="formgroup" >
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                        <label class="control-label">Coupon Code</label>
                        <input type="text" class="form-control" value=" "   id="coupon_code" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                        <label class="control-label">Coupon Name</label>
                        <input type="text" class="form-control" value=" "   id="coupon_name" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                        <label class="control-label">Start From</label>
                        <input type="text" class="form-control" value=" "   id="start_time" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                        <label class="control-label">End To</label>
                        <input type="text" class="form-control" value=" "   id="end_time" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                        <label class="control-label">Discount Type</label>
                        <input type="text" class="form-control" value=" "   id="discount_type" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                        <label class="control-label">Discount Value Rs.</label>
                        <input type="text" class="form-control" value=" "   id="discount_value" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                        <label class="control-label">Discount Percentage %</label>
                        <input type="text" class="form-control" value=" "   id="discount_percent" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                        <label class="control-label">Minimum Order to Apply</label>
                        <input type="text" class="form-control" value=" "   id="minimum_order_value" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                        <label class="control-label">Maximum Discount Rs.</label>
                        <input type="text" class="form-control" value=" "   id="maximum_discount_value" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                        <label class="control-label">Number of Issued Coupon</label>
                        <input type="text" class="form-control" value=" "   id="issued_number_coupon" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                        <label class="control-label">Usage Limit Times Per Customer</label>
                        <input type="text" class="form-control" value=" "   id="limit_per_customer" disabled>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-outline btn-danger" data-dismiss="modal" value="Close">
        </div>
      </div>
    </div>
  </div>
  <!-- End Of Modal -->

@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click','.view_modal',function(){
                $('#viewmodal').modal('show');
                $('.formgroup').show();
                $('#coupon_code').val($(this).data('code'));
                $('#coupon_name').val($(this).data('name'));
                $('#start_time').val($(this).data('starttime'));
                $('#end_time').val($(this).data('endtime'));
                $('#discount_value').val($(this).data('discountvalue'));
                $('#discount_percent').val($(this).data('discountpercent'));
                $('#issued_number_coupon').val($(this).data('issuednumbercoupon'));
                $('#minimum_order_value').val($(this).data('minimumordervalue'));
                $('#limit_per_customer').val($(this).data('limitpercustomer'));
                $('#maximum_discount_value').val($(this).data('maximumdiscountvalue'));
                var dtype = $(this).data('discounttype');
                if (dtype == 1) {
                    $('#discount_type').val('Money Value Discount');
                } else if (dtype == 2) {
                    $('#discount_type').val('Percentage Value Discount');
                }
            });
            $('#coupons').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
            });
        });
        function goback(p){
            // window.location.reload(history.back());
            window.location=document.referrer;
        }
        function setfet(p){
            if(p.value == 1){
                //console.log('featured');
                
                p.value = 0;
            }else if(p.value == 0){
                //console.log('unfeatured');
                p.value = 1;
            }

            $.ajax({
                type: 'post',
                url: '/admin/setfeatured',
                data: { 'feature': p.value, 'product_id': p.dataset.id },
                success: function(data){
                    if(p.value==1){
                        $(p).siblings("span").removeClass("hidden");
                    }else{
                        $(p).siblings("span").addClass("hidden");
                    }
                },

            });
        }

    </script>
@endsection