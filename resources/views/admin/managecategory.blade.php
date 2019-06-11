@extends('layouts.adminlayouts.admin-design')
@section('content')

<div class="container-fluid">
<div class="row">
        <div class="col-md-12">
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
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Categories</h4>
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="content-view">
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center" >Name</th>
                                    <th class="text-center">image</th>
                                    <th class="text-center">Parent Category</th>
                                    <th class="disabled-sorting text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td class="text-center">{{ $category->cat_name }}</td>
                                    <td class="text-center"><img style="max-width: 120px;" src="{{ asset('images/backend_images/categories/'. $category->cat_image) }}" alt=""></td>
                                    <td class="text-center"><span class="label label-primary">{{ $category->parentlists }}</span></td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/edit-category/'.$category->cat_id) }}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn  btn-just-icon btn-round btn-primary"><i class="material-icons">border_color</i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Delete" class="btn  btn-just-icon btn-round btn-danger"><i class="material-icons">delete_forever</i></a>
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
@section('scripts')
<script type="text/javascript">
/*loadData();
function loadData(){
    $.ajax({
        type: "get",
        url: "{{ url('admin/manage-category') }}",
        data: "",
        cache: false,
        beforeSend: function(){
            $("body").addClass('loading');
        },
        success: function(data){
            $("body").removeClass('loading');
            $("#content-view").html(data);
        },
        error:function(data){
            console.log(data);
        }
    });
}*/
</script>
@endsection