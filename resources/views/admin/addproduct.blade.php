@extends('layouts.adminlayouts.admin-design')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(Session::has('flash_message'))
            <div class="alert alert-success">
                <span>
                <b> Success - </b>{!! session('flash_message') !!}</span>
            </div>
            @endif
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">mail_outline</i>
                </div>

                <div class="card-content">
                    <h4 class="card-title">Add Product</h4>
                    <form action="{{ route('admin.add-product') }}" enctype="multipart/form-data" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Code</label>
                                <input type="text" class="form-control"  value="" name="product_code">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Name</label>
                                <input type="text" class="form-control"  value="" name="product_name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-8 pr-md-1">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Choose Product Brand</label>
                            <select class="selectpicker" id="exampleFormControlSelect1" name="brand_id" data-style="btn btn-primary" title="Select Product Brand" data-size="3">
                                <?php echo $branddropdown; ?>
                            </select>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-8 pr-md-1">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Choose Product Category</label>
                            <select class="selectpicker" id="exampleFormControlSelect1" name="category_id" data-style="btn btn-primary" title="Select Product Category" data-size="3">
                                <?php echo $categorydropdown; ?>
                            </select>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                <label class="control-label">Description</label>
                                <textarea rows="4" cols="80" class="form-control"  name="product_description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product SKU</label>
                                <input type="text" class="form-control"  value="" name="product_sku">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Mark Price</label>
                                <input type="text" class="form-control"  value="" name="mark_price">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Sell Price</label>
                                <input type="text" class="form-control"  value="" name="sell_price">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <label class="control-label">Featured Product</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="feature" value="1">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-8 pr-md-1">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Product Stock Status</label>
                            <select class="selectpicker" id="exampleFormControlSelect1" name="stockstatus_id" data-style="btn btn-primary" title="Select Stock Status" data-size="3">
                                <?php echo $statusdropdown; ?>
                            </select>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Quantity</label>
                                <input type="text" class="form-control"  value="" name="quantity">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Weight</label>
                                <input type="text" class="form-control"  value="" name="weight">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-8 pr-md-1">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Weight Class</label>
                            <select class="selectpicker" id="exampleFormControlSelect1" name="weight_class_id" data-style="btn btn-primary" title="Select Weight Class" data-size="3">
                                <option value="1">Gram</option>
                                <option value="2">Kilogram</option>
                                <option value="3">Miligram</option>
                            </select>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Length</label>
                                <input type="text" class="form-control"  value="" name="length">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Breadth</label>
                                <input type="text" class="form-control"  value="" name="breadth">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Height</label>
                                <input type="text" class="form-control"  value="" name="height">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-8 pr-md-1">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Dimension Class</label>
                            <select class="selectpicker" id="exampleFormControlSelect1" name="dimension_class_id" data-style="btn btn-primary" title="Select Dimension Class" data-size="3">
                               <option value="1">Milimeter(MM)</option>
                               <option value="2">Centimeter(CM)</option>
                               <option value="3">Meter(m)</option>
                            </select>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <label for="">Image</label>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{ asset('images/backend_images/image_placeholder.jpg') }}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-rose btn-round btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="product_images" />
                                        </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-8 pr-md-1">
                        <input type="submit" class="btn btn-fill btn-primary" value="submit">
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection