@extends('layouts.adminlayouts.admin-design')
@section('content')
<div class="container-fluid">
    <div class="row">
            <div class="col-md-12">
            <button class="create_modal btn btn-fill btn-primary" >Add Tag</button>
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Tags</h4>
                        <div class="content-view">
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sn.</th>
                                        <th>Name</th>
                                        <th class="disabled-sorting text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; ?>
                                    @foreach($tags as $tag)
                                    <tr class="tag{{ $tag->id }}">
                                        <td>{{ $sn = $no++ }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td class="text-center">
                                            <button  class="edit-modal btn btn-just-icon btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="Edit" data-sn="{{ $sn }}" data-title="{{ $tag->name }}" data-id="{{ $tag->id }}"><i class="material-icons">border_color</i></button>
                                            <button  class="delete-modal btn btn-just-icon btn-round btn-danger" data-toggle="tooltip" data-placement="left" title="Delete" data-id="{{ $tag->id }}" data-title="{{ $tag->name }}"><i class="material-icons">delete_forever</i></button>
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
    <!--Add Tag  Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Tag</h5>
        </div>
        <div class="modal-body">
        <form role="form" onsubmit="return false;" id="group_form" class="formgroup">
              @csrf
              <div class="row">
                  <div class="col-md-8 pr-md-1">
                      <div class="form-group label-floating">
                      <label class="control-label">Tag Name</label>
                      <input type="text" class="form-control"  name="tag_name" id="tag_name">
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
  <!-- Delete Tag Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Tag</h5>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-md-4"><i class="material-icons text-warning" style="font-size: 60px; padding-top: 10px; ">warning</i></div>
                <div class="col-md-6"><h3>Are you Sure to Delete Tag ?</h3></div>
            </div>
            <form role="form" onsubmit="return false;" id="group_form" class="formgroup1">
                    @csrf
                    <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <input type="hidden" class="form-control"  name="id" id="tag_id2">
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

    <!-- Edit Attribute Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Tag</h5>
        </div>
        <div class="modal-body">
        <form role="form" onsubmit="return false;" id="group_form1" class="formgroup2">
              @csrf
              <div class="row">
                      <div class="col-md-8 pr-md-1">
                          <div class="form-group label-floating">
                          <input type="hidden" class="form-control"  name="id" id="tag_id1">
                         <input type="hidden" name="sn" id="sn">
                          </div>
                      </div>
              </div>
              <div class="row">
                  <div class="col-md-8 pr-md-1">
                      <div class="form-group label-floating">
                      <label class="control-label">Tag Name</label>
                      <input type="text" class="form-control" value=" "  name="tag_name" id="tag_name1">
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
@endsection
@section('scripts')
 <script>
    function addTag(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Tag has been <b>Added</b> Successfully . . ."

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
    function deleteTag(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Tag has been <b>Deleted</b> Successfully . . ."

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
    function updateTag(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Tag has been <b>Updated</b> Successfully . . ."

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
        var sn = "{{ $no }}";
        // console.log(sn);
        
        $(document).on('click','.create_modal',function(){
            $('#create').modal('show');
            $('.formgroup').show();
        });
        $('#add').click(function(){
            $.ajax({
                type : 'POST',
                url : '/admin/add-tag',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $('input[name=tag_name]').val()
                },
                success: function(data){
                    $('#datatables').append("<tr class='tag" + data.id + "'>"+
                    "<td>" + (sn++) + "</td>"+
                    "<td>" + data.name + "</td>"+
                    "<td class='text-center'><button data-toggle='modal tooltip' data-placement='top' title='Edit'  data-target='#editattribute' class='edit-modal btn btn-just-icon btn-round btn-primary' data-sn='" + sn + "' data-title='" + data.name + "' data-id='" + data.id + "'><i class='material-icons'>border_color</i></button>" +
                    "<button data-toggle='tooltip' data-placement='left' title='Delete'  class='delete-modal btn btn-just-icon btn-round btn-danger' data-id='" + data.id + "' data-title='" + data.name + "'><i class='material-icons'>delete_forever</i></button>" + 
                    "</td></tr>"
                    );
                    addTag('top','right');
                },
            });
        });

        $(document).on('click','.delete-modal',function(){
            $('#deletemodal').modal('show');
            $('.formgroup1').show();
            $('#tag_id2').val($(this).data('id'));
        });
        $('#delete').click(function(){
            $.ajax({
                type : 'post',
                url : '/admin/delete-tag',
                data : { 'id' : $('#tag_id2').val() },
                success : function(data){
                    $('.tag' + $("#tag_id2").val()).remove();
                    deleteTag('top','right');
                },
            });
        });

        $(document).on('click','.edit-modal',function(){
            $('#editmodal').modal('show');
            $('.formgroup2').show();
            $('#tag_id1').val($(this).data('id'));
            $('#tag_name1').val($(this).data('title'));
            $('#sn').val($(this).data('sn'));
            // debugger;
        });
        $('#update').click(function(){
            $.ajax({
                type : 'post',
                url : '/admin/update-tag',
                data : { 
                    'id' : $('#tag_id1').val(),
                    'name' : $('#tag_name1').val(),
                    'sn' : $('#sn').val()
                },
                success : function(data){
                    $('.tag' + data.id).replaceWith("<tr class='tag" + data.id + "'>"+
                    "<td>" + data.sn + "</td>"+
                    "<td>" + data.name + "</td>"+
                    "<td class='text-center'><button data-toggle='modal tooltip' data-placement='top' title='Edit'  data-target='#editattribute' class='edit-modal btn btn-just-icon btn-round btn-primary' data-sn='" + data.sn + "' data-title='" + data.name + "' data-id='" + data.id + "'><i class='material-icons'>border_color</i></button>" +
                    "<button data-toggle='tooltip' data-placement='left' title='Delete'  class='delete-modal btn btn-just-icon btn-round btn-danger' data-id='" + data.id + "' data-title='" + data.name + "'><i class='material-icons'>delete_forever</i></button>" + 
                    "</td></tr>"
                    );
                    updateTag('top','right');
                },
            });
        });
     });
 </script>   
@endsection