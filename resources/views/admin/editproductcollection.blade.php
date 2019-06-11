@extends('layouts.adminlayouts.admin-design')
@section('content')
<div class="container-fluid">
<div class="row">
        <div class="col-md-12">
            <h3>{{ $collectionname }}</h3>
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Products</h4>
                    <div class="collection-images">
                        <img src="{{ asset('images/backend_images/collections/'.$collectionimage) }}" alt="">
                    </div>
                    <div class="content-view">
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Product Code</th>
                                    <th>Name</th>
                                    <th>Mark Price</th>
                                    <th>Sell Price</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Product Code</th>
                                    <th>Name</th>
                                    <th>Mark Price</th>
                                    <th>Sell Price</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               
                                <?php $no=1; ?>
                                @foreach($abc as $ab)
                                <tr class="product{{ $ab->product_id }}">
                                @csrf
                                    <td>{{ $ab->product_code }}</td>
                                    <td>{{ $ab->product_name }}</td>
                                    <td>{{ $ab->mark_price }}</td>
                                    <td>{{ $ab->sell_price }}</td>
                                    <td class="text-right">
                                       <button class=" delete btn btn-danger" onClick="remove(this)" data-id="{{ $ab->product_id }}" data-collection="{{ $ab->collection_id }}">Remove</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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

@section('scripts')
<script>
function remove(p){
    var productid = p.dataset.id;
    var collectionid = p.dataset.collection;
    $.ajax({
        type: 'post',
        url: '/admin/delete-collection-product',
        data:{ '_token': $('input[name=_token]').val(), 'collection_id' : collectionid, 'product_id' : productid },
        success: function(data){
            $('.product'+productid).remove();
        },

    });
    console.log(collectionid);
}

$(document).ready(function(){

});
</script>
@endsection