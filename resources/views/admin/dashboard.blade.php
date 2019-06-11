@extends('layouts.adminlayouts.admin-design')
@section('content')
<div class="container-fluid">
    <div class="row">    
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="rose">
                    <i class="material-icons">equalizer</i>
                </div>
                <div class="card-content">
                    <p class="category">Brands</p>
                    <h3 class="card-title">{{ $brandno }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> All Brands
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="red">
                    <i class="material-icons">equalizer</i>
                </div>
                <div class="card-content">
                    <p class="category">Categories</p>
                    <h3 class="card-title">{{ $categoryno }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> All Categories
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="blue">
                    <i class="material-icons">equalizer</i>
                </div>
                <div class="card-content">
                    <p class="category">Products</p>
                    <h3 class="card-title">{{ $productno }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> All Products
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">    
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="purple">
                    <i class="material-icons">equalizer</i>
                </div>
                <div class="card-content">
                    <p class="category">Featured Products</p>
                    <h3 class="card-title">{{ $featno }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> All Featured Products
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="orange">
                    <i class="material-icons">equalizer</i>
                </div>
                <div class="card-content">
                    <p class="category">Collections</p>
                    <h3 class="card-title">{{ $collectionno }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> All Collections
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="material-icons">equalizer</i>
                </div>
                <div class="card-content">
                    <p class="category">Vendors</p>
                    <h3 class="card-title">{{ $vendorno }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> All Vendors
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection