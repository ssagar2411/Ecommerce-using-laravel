@extends('layouts.adminlayouts.admin-design')

@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
        @if(Session::has('flash_message'))
        <div class="alert alert-success">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
            <i class="tim-icons icon-simple-remove"></i>
            </button>
            <span>
            <b> Success - </b>{!! session('flash_message') !!}</span>
        </div>
        @endif
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
               <i class="material-icons">view_carousel</i>
            </div>
    
            <div class="card-content">
                <h4 class="card-title">Add Slider</h4>
                <form action="{{ route('admin.insert-slider') }}" enctype="multipart/form-data" method="post">
                @csrf
                    <div class="row">
                        <div class="col-md-8 pr-md-1">
                            <div class="form-group label-floating">
                            <label class="control-label">Primary Text</label>
                            <input type="text" class="form-control"  name="primary_text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 pr-md-1">
                            <div class="form-group label-floating">
                            <label class="control-label">Secondary Text</label>
                            <textarea type="text" class="form-control" name="secondary_text"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <label for="">Slider Image</label>
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{ asset('images/backend_images/image_placeholder.jpg') }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                    <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="slider_image" />
                                    </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 pr-md-1">
                            <div class="form-group label-floating">
                            <label class="control-label">Button Text</label>
                            <input type="text" class="form-control"  value="" name="button_text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 pr-md-1">
                            <div class="form-group label-floating">
                                <h4 class="card-title">Slider Links</h4>
                            </div>
                            <div class="row">
                                <div class="radio col-md-4">
                                    <label>
                                        <input type="radio" name="linkradio" value="1" onchange="organize()" id="customlinkradio"> Custom Link
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group label-floating">
                                     <label class="control-label">Custom Link</label>
                                    <input type="text" class="form-control" id="customlink" value="" name="custom_link" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="radio col-md-4">
                                    <label>
                                        <input type="radio" name="linkradio" value="2" onchange="organize()" id="brandradio"> Brand
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <select id="brand" class="form-control" name="brands" data-style="btn btn-primary" title="Single Select" data-size="7" disabled>
                                        <option selected disabled>Choose Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="radio col-md-4">
                                    <label>
                                        <input type="radio" name="linkradio" value="3" onchange="organize()" id="collectionradio"> Collection
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <select id="collection" class="form-control" name="collections" data-style="btn btn-primary" title="Single Select" data-size="7" disabled>
                                        <option disabled selected>Choose Collection</option>
                                        @foreach ($collections as $collection)
                                            <option value="{{ $collection->collection_id }}">{{ $collection->collection_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="radio col-md-4">
                                    <label>
                                        <input type="radio" name="linkradio" value="4" onchange="organize()" id="saleradio"> Sale
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <select id="sale" class="form-control" name="sales" data-style="btn btn-primary" title="Single Select" data-size="7" disabled>
                                        <option disabled selected>Choose Sale</option>
                                        @foreach ($onsells as $onsell)
                                            <option value="{{ $onsell->sell_id }}">{{ $onsell->sell_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="radio col-md-4">
                                    <label>
                                        <input type="radio" name="linkradio" value="5" onchange="organize()" id="categoryradio"> Category
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <select id="category" class="form-control" name="categories"  data-style="btn btn-primary" data-size="3" disabled=true>
                                        <option disabled selected>Choose Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->cat_id }}">{{ $category->cat_name }}</option>
                                        @endforeach
                                    </select>
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
@endsection
@section('scripts')
    <script>
        function organize(){
            document.getElementById('customlink').disabled= !document.getElementById('customlinkradio').checked;
            document.getElementById('brand').disabled= !document.getElementById('brandradio').checked;
            document.getElementById('collection').disabled= !document.getElementById('collectionradio').checked;
            document.getElementById('sale').disabled= !document.getElementById('saleradio').checked;
            document.getElementById('category').disabled= !document.getElementById('categoryradio').checked;
        }
    </script>
@endsection