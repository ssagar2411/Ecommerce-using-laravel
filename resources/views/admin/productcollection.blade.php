@extends('layouts.adminlayouts.admin-design')

@section('content')
<div class="container-fluid">
<div class="row">
        <div class="col-md-12">
            @if (Session::has('msg'))
                <div class="alert alert-success">{{ Session::get('msg') }}</div>
            @endif
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="red">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Collection Products</h4>
                    <div class="content-view">
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sn.</th>
                                    <th>Name</th>
                                    <th>No of Products</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Sn.</th>
                                    <th>Name</th>
                                    <th>No of Products</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($collections as $collection)
                                <tr class="collection{{ $collection->collection_id }}">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $collection->collection_name }}</td>
                                    <td>{{ $collection->product_no }} Products</td>
                                    <td class="text-right">
                                        <a  class="add-modal btn btn-primary " href="{{ url('admin/collection-product/'. $collection->collection_id) }}">Add</a>
                                        <a  class="view-modal btn btn-info " href="{{ url('admin/edit-collection-products/'. $collection->collection_id) }}">View</a>
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
</div>

@endsection
@section('scripts')
<script>

</script>
@endsection