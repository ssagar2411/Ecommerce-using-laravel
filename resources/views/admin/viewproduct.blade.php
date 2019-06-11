@extends('layouts.adminlayouts.admin-design')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Products -
                            <small class="category">Details</small>
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-2">
                                <ul class="nav nav-pills nav-pills-icons nav-pills-rose nav-stacked" role="tablist">
                                    <li class="active">
                                        <a href="#general-info" role="tab" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">info</i> General Info
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#productimages" role="tab" data-toggle="tab" aria-expanded="true">
                                            <i class="material-icons">photo_library</i> Images Gallery
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#productattribute" role="tab" data-toggle="tab" aria-expanded="true">
                                            <i class="material-icons">notes</i> Attributes
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-10">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="general-info">
                                        <div class="row">
                                        <div class="col-md-6"><h2 style="text-transform: uppercase;"><strong>{{ $productdetail->product_name }}</strong></h2></div>
                                        <div class="col-md-6"><img class="img img-responsive img-round" style="max-width: 120px;" src="{{ asset('images/backend_images/products/main_image/'. $productdetail->product_images) }}" alt=""></div>
                                        </div>
                                        <hr>
                                        <form onsubmit="return false;" class="form-horizontal">
                                        <div class="row">
                                            <label class="col-md-2 label-on-right text-primary">Product Link</label>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                <input type="text" class="form-control" value="{{ url('/product/'. $productdetail->product_id) }}" id="prodlink">
                                                <span class="material-input"></span></div>
                                            </div>
                                            <div class="col-md-4">
                                                <button onclick="selectLink()" class="btn btn-round btn-primary">Copy</button>
                                            </div>
                                        </div>
                                        </form>
                                        <hr>
                                        <p class="prod-desc"><strong>Product Code: </strong>{{ $productdetail->product_code }}</p>
                                        <p class="prod-desc"><strong>Description: </strong>{{ $productdetail->product_description }}</p>
                                        <p class="prod-desc"><strong>Category: </strong><span class="label label-rose">{{ $productdetail->parent_category }}</span></p>
                                        <p class="prod-desc"><strong>Brand: </strong>{{ $productdetail->brand_name }}</p>
                                        <p class="prod-desc"><strong>Stock Status: </strong>{{ $productdetail->stockstatus }}</p>
                                        <p class="prod-desc"><strong>Mark Price: </strong>Rs. {{ $productdetail->mark_price }}</p>
                                        <p class="prod-desc"><strong>Sell Price: </strong>Rs. {{ $productdetail->sell_price }}</p>
                                        <p class="prod-desc"><strong>Quantity: </strong>{{ $productdetail->quantity }}</p>
                                        <p class="prod-desc"><strong>Weight: </strong>{{ $productdetail->weight }} {{ $productdetail->weight_class }}</p>
                                        <p class="prod-desc"><strong>Dimension: </strong>{{ $productdetail->length }}{{ $productdetail->dimension_class }} x {{ $productdetail->width }}{{ $productdetail->dimension_class }} x {{ $productdetail->height }}{{ $productdetail->dimension_class }}</p>
                                        @if ($productdetail->featured == 1)
                                        <p class="prod-desc"><strong>Featured: </strong><span class="label label-primary">Featured</span></p>
                                        @else
                                        <p class="prod-desc"><strong>Featured: </strong><span class="label label-danger">Not Featured</span></p>
                                        @endif
                                        
                                    </div>
                                    <div class="tab-pane" id="productimages">
                                        <h3>PRODUCT IMAGES</h3>
                                        <hr>
                                        <div class="row">
                                            @foreach ($productimages as $productimage)
                                            <div class="col-md-4 fileinput">
                                                <div class="thumbnail">
                                                    <img src="{{ asset('images/backend_images/products/'. $productimage->image) }}" alt="">
                                                </div>
                                            </div>  
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="productattribute">
                                       <h3>ATTRIBUTES</h3>
                                       <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function selectLink(){
            var copylink = document.getElementById("prodlink");
            copylink.select();
            document.execCommand("copy");
            copyLink('top','right');
        }
        function copyLink(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Link has been <b>Copied</b> to clipboard"

        }, {
            type: type[color],
            delay: 2000,
            timer: 200,
            placement: {
                from: from,
                align: align
            }
        });
    }
    </script>
@endsection