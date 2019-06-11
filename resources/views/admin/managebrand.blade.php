@extends('layouts.adminlayouts.admin-design')
@section('content')
<div class="container-fluid">
<div class="row">
        <div class="col-md-12">
        <button class="create_modal btn btn-fill btn-primary" >Add Brand</button>
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Brands</h4>
                    <div class="content-view">
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Sn.</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Logo</th>
                                    <th class="disabled-sorting text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="mytables">
                                <?php $no=1; ?>
                                @foreach($brands as $brand)
                                <tr class="brand{{ $brand->brand_id }}">
                                    <td class="text-center">{{ $sn = $no++ }}</td>
                                    <td class="text-center">{{ $brand->brand_name }}</td>
                                    <td class="text-center"><img style="max-width: 100px;" src="{{ url('images/backend_images/brands/'.$brand->brand_logo) }}"  alt=""></td>
                                    <td class="text-center">
                                        <a  class="edit-modal btn btn-just-icon btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="Edit" data-logoname="{{ $brand->brand_logo }}" data-logo="{{ url('images/backend_images/brands/'.$brand->brand_logo) }}" data-title="{{ $brand->brand_name }}" data-id="{{ $brand->brand_id }}" data-sn="{{ $sn }}"><i class="material-icons">border_color</i></a>
                                   
                                        <a  class="delete-modal btn btn-just-icon btn-round btn-danger" data-toggle="tooltip" data-placement="left" title="Delete" data-id="{{ $brand->brand_id }}" data-title="{{ $brand->brand_name }}"><i class="material-icons">delete_forever</i></a>
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

<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Brand</h5>
      </div>
      <div class="modal-body">
      <form role="form" id="modal_form_brand" class="formgroup" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                    <label class="control-label">Brand Name</label>
                    <input type="text" class="form-control"  name="brand_name" id="brand_name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <label for="">Brand Logo</label>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                            <img src="{{ asset('images/backend_images/image_placeholder.jpg') }}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                            <span class="btn btn-rose btn-round btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="brand_logo" id="brand_logo" />
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <input type="button" class="btn btn-outline btn-danger" data-dismiss="modal" value="Close">
        <button type="submit" class="btn btn-outline btn-primary" id="add" data-dismiss="modal" >Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Modal -->
<!-- Edit Attribute Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Brand</h5>
      </div>
      <div class="modal-body">
      <form role="form" id="modal_form_brand_edit" class="formgroup1" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                    <div class="col-md-8 pr-md-1">
                        <div class="form-group label-floating">
                        <input type="hidden" class="form-control"  name="brand_id" id="brand_id1">
                        <input type="hidden" class="form-control" name="sn" id="sn">
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                    <label class="control-label">Brand Name</label>
                    <input type="text" class="form-control" value=" "  name="brand_name" id="brand_name1">
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-8 pr-md-1">
                        <div class="form-group label-floating">
                        <input type="hidden" class="form-control"  name="brand_logo_old" id="brand_logo1">
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <label for="">Brand Logo</label>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                            <img  id="brand_logo_show" src="{{ asset('images/backend_images/image_placeholder.jpg') }}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                            <span class="btn btn-rose btn-round btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="brand_logo" id="brand_logo"/>
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <input type="button" class="btn btn-outline btn-danger" data-dismiss="modal" value="Close">
        <button type="submit" class="btn btn-outline btn-primary" id="update" data-dismiss="modal" >update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Of Modal -->
<!-- Delete Attribute Group Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Brand</h5>
            </div>
            <div class="modal-body">
            <div><h3><i class="material-icons text-warning">warning</i>Are you Sure to Delete Brand ?</h3></div>
            <form role="form" onsubmit="return false;" id="group_form2" class="formgroup2">
                    @csrf
                    <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <input type="hidden" class="form-control"  name="brand_id" id="brand_id2">
                                </div>
                            </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-outline btn-warning" data-dismiss="modal" value="Cancel">
                <button type="submit" class="btn btn-outline btn-danger" id="delete" data-dismiss="modal" >Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- End of Modal -->
@endsection
@section('scripts')
<script>
    function updateBrand(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Brand has been <b>Updated</b> Successfully . . ."

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
    function deleteBrand(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Brand has been <b>Deleted</b> Successfully . . ."

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
    function addBrand(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Brand has been <b>Added</b> Successfully . . ."

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
$(document).ready(function(){
    $(document).on('click','.create_modal',function(){
        $('#create').modal('show');
        $('.formgroup').show();
    });
    $('#add').click(function(){
        var postData = new FormData($('#modal_form_brand')[0]);
        var sno =  "{{ $sn }}";
        var imgpath = "{{ asset('images/backend_images/brands/') }}";
        console.log(sno);
        $.ajax({
            type: 'POST',
            url: '/admin/add-brand',
            processData: false,
            contentType: false,
            data: postData,
            success: function(data){
                $('#datatables').append("<tr class='brand" + data.brand_id + "'>"+
                    "<td class='text-center' >" + (++sno) + "</td>"+
                    "<td class='text-center' >" + data.brand_name + "</td>"+
                    "<td class='text-center' > <img style='max-width: 100px;' src='"+ imgpath + "/" + data.brand_logo +"' ></td>"+
                    "<td class='text-center'><a data-toggle='modal tooltip' data-placement='top' title='Edit' data-target='#editbrand' class='edit-modal btn btn-just-icon btn-round btn-primary' data-logoname='"+ data.brand_logo + "' data-logo='{{ url('images/backend_images/brands/"+data.brand_logo+"') }}'  data-title='" + data.brand_name + "' data-id='" + data.brand_id + "'><i class='material-icons'>border_color</i></a>" +
                    "<a  class='delete-modal btn btn-just-icon btn-round btn-danger' data-toggle='tooltip' data-placement='left' title='Delete' data-id='" + data.brand_id + "' data-title='" + data.brand_name + "'><i class='material-icons'>delete_forever</i></a>" + 
                    "</td></tr>");
                addBrand('top','right');
            },
        });
    });
    $(document).on('click','.delete-modal',function(){
        $('#deletemodal').modal('show');
        $('#formgroup2').show();
        $('#brand_id2').val($(this).data('id'));
    });
    $('#delete').click(function(){
        $.ajax({
            type: 'POST',
            url: '/admin/delete-brand',
            data:{
                '_token': $('input[name=_token]').val(),
                'brand_id': $("#brand_id2").val()
            },
            success: function(data) {
                $('.brand' + $("#brand_id2").val()).remove();
                deleteBrand('top','right');
            },
        });
    });
    $(document).on('click','.edit-modal',function(){
        $('#editmodal').modal('show');
        $('#formgoup1').show();
        $('#brand_id1').val($(this).data('id'));
        $('#brand_name1').val($(this).data('title'));
        $('#brand_logo1').val($(this).data('logoname'));
        $('#sn').val($(this).data('sn'));
        var imagesource = $(this).data('logo');
        $('#brand_logo_show').attr("src",imagesource);
    });
    $('#update').click(function(){
        var editpostData = new FormData($('#modal_form_brand_edit')[0]);
        var imagepath = "{{ asset('images/backend_images/brands/') }}";
       
        $.ajax({
            type: 'POST',
            url: '/admin/edit-brand',
            processData: false,
            contentType: false,
            data: editpostData,
            success: function(data){
            $('.brand' + data.brand_id).replaceWith("<tr class='brand" + data.brand_id + "'>"+
                    "<td class='text-center'>" + data.sn + "</td>"+
                    "<td class='text-center' >" + data.brand_name + "</td>"+
                    "<td class='text-center' > <img style='max-width: 100px;' src='"+ imagepath +"/" + data.brand_logo + "' ></td>"+
                    "<td class='text-center'><a data-toggle='modal tooltip' data-placement='top' title='Edit'  data-target='#editbrand' class='edit-modal btn btn-just-icon  btn-round btn-primary' data-sn='"+ data.sn +"' data-logoname='"+ data.brand_logo +"' data-logo='"+ imagepath +"/" + data.brand_logo +"'  data-title='" + data.brand_name + "' data-id='" + data.brand_id + "'><i class='material-icons'>border_color</i></a>" +
                    "<a data-toggle='tooltip' data-placement='left' title='Delete'  class='delete-modal btn btn-just-icon btn-round btn-danger' data-id='" + data.brand_id + "' data-title='" + data.brand_name + "'><i class='material-icons'>delete_forever</i></a>" + 
                    "</td></tr>");
            updateBrand('top','right');
        },
        });
    });
});
</script>
@endsection