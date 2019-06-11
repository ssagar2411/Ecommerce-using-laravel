@extends('layouts.adminlayouts.admin-design')

@section('content')
<div class="container-fluid">
<div class="row">
        <div class="col-md-12">
        <button class="create_modal btn btn-fill btn-primary" >Add Collection</button>
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Collections</h4>
                    <div class="content-view">
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Sn.</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Description</th>
                                    <th class="disabled-sorting text-center">Actions</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($collections as $collection)
                                <tr class="collection{{ $collection->collection_id }}">
                                    <td class="text-center">{{ $sn = $no++ }}</td>
                                    <td class="text-center">{{ $collection->collection_name }}</td>
                                    <td class="text-center"> <img src="{{ asset('images/backend_images/collections/'. $collection->collection_image) }}" style="max-width: 100px;" alt=""> </td>
                                    <td class="text-center">{{ str_limit($collection->collection_description, 100)  }}</td>
                                    <td class="text-center">
                                        <button data-toggle="tooltip" data-placement="top" title="Edit"  class="edit-modal btn btn-just-icon btn-round btn-primary" data-desc="{{ $collection->collection_description }}"  data-title="{{ $collection->collection_name }}" data-sn="{{ $sn }}" data-id="{{ $collection->collection_id }}" data-image="{{ $collection->collection_image }}"><i class="material-icons">border_color</i></button>
                                        <button data-toggle="tooltip" data-placement="left" title="Delete"  class="delete-modal btn btn-just-icon btn-round btn-danger" data-id="{{ $collection->collection_id }}" data-title="{{ $collection->name }}"><i class="material-icons">delete_forever</i></button>
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
<!--Add Collection Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Collection</h5>
      </div>
      <div class="modal-body">
      <form role="form" id="group_form" class="formgroup" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 pr-md-1">
                            <div class="form-group label-floating">
                            <label class="control-label">Collection Name</label>
                            <input type="text" class="form-control"  name="collection_name" id="collection_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pr-md-1">
                            <div class="form-group label-floating">
                                <label class="control-label">Collection Description</label>
                                <textarea rows="4" cols="80" class="form-control" id="collection_desc"  name="collection_description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-4 pr-md-1">
                    <label for="">Collection Image</label>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                            <img src="{{ asset('images/backend_images/image_placeholder.jpg') }}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                            <span class="btn btn-rose btn-round btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="collection_image" id="collection_image" />
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
<!-- Edit Collection Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Collection</h5>
        </div>
        <div class="modal-body">
        <form role="form" enctype="multipart/form-data" method="POST" id="group_form1" class="formgroup2">
              @csrf
              <div class="row">
                  <div class="col-md-8 pr-md-1">
                      <div class="form-group label-floating">
                     <input type="hidden" class="form-control"  name="collection_id" id="collection_id1">
                     <input type="hidden" name="sn" id="sn">
                      </div>
                  </div>
              </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 pr-md-1">
                            <div class="form-group label-floating">
                            <label class="control-label">Collection Name</label>
                            <input type="text" class="form-control" value=" "  name="collection_name" id="collection_name1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pr-md-1">
                            <div class="form-group label-floating">
                                <label class="control-label">Collection Description</label>
                                <textarea rows="4" cols="80" class="form-control" id="collection_description1"  name="collection_desc"> </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-4 pr-md-1">
                    <input type="hidden" name="collection_img" id="collection_image1">
                    <label for="">Collection Image</label>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                            <img id="collection_image_show" src="{{ asset('images/backend_images/image_placeholder.jpg') }}" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                            <span class="btn btn-rose btn-round btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="collection_image" id="collection_image1" />
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
<!-- Delete Collection Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Collection</h5>
            </div>
            <div class="modal-body">
            <div><h3><i class="material-icons text-warning">warning</i>Are you Sure to Delete Collection ?</h3></div>
            <form role="form" onsubmit="return false;" id="group_form" class="formgroup1">
                    @csrf
                    <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <input type="hidden" class="form-control"  name="collection_id" id="collection_id2">
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
    function updateCollection(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Collection has been <b>Updated</b> Successfully . . ."

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
    function deleteCollection(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Collection has been <b>Deleted</b> Successfully . . ."

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
    function addCollection(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Collection has been <b>Added</b> Successfully . . ."

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
    var sno =  "{{ $no }}";
    $(document).ready(function(){
        $(document).on('click','.create_modal',function(){
            $('#create').modal('show');
            $('.formgroup').show();
            console.log(sno);
        });
        $('#add').click(function(){
            var postData = new FormData($('#group_form')[0]);
            var imgpath = "{{ asset('images/backend_images/collections/') }}";
            $.ajax({
                type: 'post',
                url: '/admin/add-collection',
                processData: false,
                contentType: false,
                data : postData,
                success: function(data){
                    $('#datatables').append("<tr class='collection" + data.collection_id + "'>"+
                    "<td class='text-center'>" + (sno++) + "</td>"+
                    "<td class='text-center'>" + data.collection_name + "</td>"+
                    "<td class='text-center'><img style='max-width: 100px;' src='"+ imgpath + "/" + data.collection_image +"' ></td>"+
                    "<td class='text-center'>" + data.collection_description.substr(0,100) + "</td>"+
                    "<td class='text-center'><button data-toggle='modal tooltip' data-placement='top' title='Edit'  data-target='#editcollection' class='edit-modal btn btn-just-icon btn-round btn-primary' data-title='" + data.collection_name + "' data-id='" + data.collection_id + "' data-image='"+ data.collection_image +"'><i class='material-icons'>border_color</i></button>" +
                    "<button data-toggle='tooltip' data-placement='left' title='Delete' class='delete-modal btn btn-just-icon btn-round btn-danger' data-id='" + data.collection_id + "' data-title='" + data.name + "'><i class='material-icons'>delete_forever</i></button>" + 
                    "</td></tr>"
                    );
                    addCollection('top','right');
                },
            });
        });
        $(document).on('click','.delete-modal',function(){
            $('#deletemodal').modal('show');
            $('.formgroup1').show();
            $('#collection_id2').val($(this).data('id'));
        });
        $('#delete').click(function(){
            $.ajax({
                type : 'post',
                url: '/admin/delete-collection',
                data: {'_token': $('input[name=_token]').val(), 'collection_id': $("#collection_id2").val() },
                success: function(data){
                    $('.collection' + $("#collection_id2").val()).remove();
                    deleteCollection('top','right');
                },
            });
        });
        $(document).on('click','.edit-modal',function(){
            $('#editmodal').modal('show');
            $('.formgroup2').show();
            $('#collection_id1').val($(this).data('id'));
            // console.log($(this).data('title'));
            $('#collection_name1').val($(this).data('title'));
            $('#collection_image1').val($(this).data('image'));
            var imagesource = "{{ asset('images/backend_images/collections/') }}"+ "/" + $(this).data('image');
            // console.log(imagesource);
            $('#collection_image_show').attr("src",imagesource);
            $('#sn').val($(this).data('sn'));
            document.getElementById("collection_description1").value = $(this).data('desc'); 
        });
        $('#update').click(function(){
            var editpostData = new FormData($('#group_form1')[0]);
            var imagepath = "{{ asset('images/backend_images/collections/') }}";
            $.ajax({
                type : 'post',
                url : '/admin/edit-collection',
                processData: false,
                contentType: false,
                data: editpostData,
                success : function(data){
                    $('.collection'+data.collection_id).replaceWith("<tr class='collection" + data.collection_id + "'>"+
                    "<td class='text-center'>" + data.sn + "</td>"+
                    "<td class='text-center'>" + data.collection_name + "</td>"+
                    "<td class='text-center'><img style='max-width: 100px;' src='"+ imagepath + "/" + data.collection_image +"' ></td>"+
                    "<td class='text-center'>" + data.collection_description.substr(0,100) + "</td>"+
                    "<td class='text-center'><button data-toggle='modal tooltip' data-placement='top' title='Edit'  data-target='#editcollection' class='edit-modal btn btn-just-icon btn-round btn-primary' data-sn='"+ data.sn +"' data-desc='"+ data.collection_description +"' data-title='" + data.collection_name + "' data-id='" + data.collection_id + "' data-image='"+ data.collection_image +"'><i class='material-icons'>border_color</i></button>" +
                    "<button data-toggle='tooltip' data-placement='left' title='Delete' class='delete-modal btn btn-just-icon btn-round btn-danger' data-id='" + data.collection_id + "' data-title='" + data.name + "'><i class='material-icons'>delete_forever</i></button>" + 
                    "</td></tr>"
                    );
                    updateCollection('top', 'right');
                },
            });
        });
    });
    </script>
@endsection