@extends('layouts.sellerlayouts.seller-design')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('msg'))
                <div class="alert alert-success">{{ Session::get('msg') }}</div>
            @endif
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Products</h4>
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
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Product Code</th>
                                    <th>Name</th>
                                    <th>image</th>
                                    <th>Brand</th>
                                    <th>Stock Status</th>
                                    <th>Quantity</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->product_code }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_images }}</td>
                                    <td>{{ $product->brand_name }}</td>
                                    <td>{{ $product->stock_status_name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td class="text-right">
                                        <a href="#" class="btn  btn-simple btn-info btn-icon  like"><i class="material-icons">favorite</i></a>
                                        <a href="#" class="btn btn-simple  btn-warning btn-icon  edit"><i class="material-icons">dvr</i></a>
                                        <a href="#" class="btn btn-simple  btn-danger btn-icon  remove"><i class="material-icons">close</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
            <!-- end col-md-12 -->
    </div>
        <!-- end row -->
</div>
@endsection