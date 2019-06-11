@extends('layouts.adminlayouts.admin-design')

@section('content')
<div class="container-fluid">
    <div class="row">
            <div class="col-md-12">
                <button class="create-modal btn btn-fill btn-primary">Add Attribute Group</button>
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
                        <h4 class="card-title">Attributes Group</h4>
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
                                    @foreach( $attribute_groups as $attribute_group)
                                    <tr class="attribute_group{{ $attribute_group->attribute_group_id }}">
                                    <td>{{ $sn = $no++ }}</td>
                                    <td>{{ $attribute_group->attribute_group_name}}</td>
                                    <td class="text-center">
                                        <button data-toggle="tooltip" data-placement="top" title="Edit" class="edit-modal btn btn-just-icon btn-round btn-primary" data-sn="{{ $sn }}" data-title="{{ $attribute_group->attribute_group_name }}" data-id="{{ $attribute_group->attribute_group_id }}"><i class="material-icons">border_color</i></button>
                                        <button data-toggle="tooltip" data-placement="left" title="Delete" class="delete-modal btn btn-just-icon btn-round btn-danger" data-id="{{ $attribute_group->attribute_group_id }}" data-title="{{ $attribute_group->attribute_group_name }}"><i class="material-icons">delete_forever</i></button>
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
<!-- Add Attribute Group Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Attribute Group</h5>
      </div>
      <div class="modal-body">
      <form role="form" onsubmit="return false;" id="group_form" class="formgroup">
            @csrf
            <div class="row">
                    <div class="col-md-8 pr-md-1">
                        <div class="form-group label-floating">
                        <label class="control-label">Group Name</label>
                        <input type="text" class="form-control"  name="attribute_group_name" id="attribute_group_name">
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
<!-- Modal End -->
<!-- Edit Attribute Group Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Attribute Group</h5>
      </div>
      <div class="modal-body">
      <form role="form" onsubmit="return false;" id="group_form1" class="formgroup1">
            @csrf
            <div class="row">
                    <div class="col-md-8 pr-md-1">
                        <div class="form-group label-floating">
                        <input type="hidden" class="form-control"  name="attribute_group_id" id="attribute_group_id1">
                        <input type="hidden" name="sn" id="sn">
                        </div>
                    </div>
            </div>
            <div class="row">
                    <div class="col-md-8 pr-md-1">
                        <div class="form-group label-floating">
                        <label class="control-label">Group Name</label>
                        <input type="text" class="form-control" value=" "  name="attribute_group_name" id="attribute_group_name1">
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
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Attribute Group</h5>
            </div>
            <div class="modal-body">
            <div><h3><i class="material-icons text-warning">warning</i>Are you Sure to Delete Attribute Group ?</h3></div>
            <form role="form" onsubmit="return false;" id="group_form2" class="formgroup2">
                    @csrf
                    <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <input type="hidden" class="form-control"  name="attribute_group_id" id="attribute_group_id2">
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
    function updateAttributegroup(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Attribute Group has been <b>Updated</b> Successfully . . ."

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
    function deleteAttributegroup(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Attribute Group has been <b>Deleted</b> Successfully . . ."

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
    function addAttributegroup(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Attribute Group has been <b>Added</b> Successfully . . ."

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
    window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
        var no = "{{ $no }}"

    //function add save
    $(document).ready(function(){
    $(document).on('click','.create-modal', function() {
    $('#create').modal('show');
    $('.formgroup').show();
    });
    $('#add').click(function(){
        $.ajax({
            type: 'POST',
            url: '/admin/add-attribute-group',
            data : {
                '_token': $('input[name=_token]').val(),
                'attribute_group_name': $('input[name=attribute_group_name]').val()
            },
            success : function(data){
                if((data.errors)){
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.attribute_group_name);
                } else{
                    $('.error').remove();
                    $('#datatables').append("<tr class='attribute_group" + data.attribute_group_id + "'>"+
                    "<td>" + (no) + "</td>"+
                    "<td>" + data.attribute_group_name + "</td>"
                    +"<td class='text-center'><button data-toggle='modal tooltip' data-placement='top' title='Edit'  data-target='#editattribute' class='edit-modal btn btn-just-icon btn-round btn-primary' data-sn='"+ no +"' data-title='" + data.attribute_group_name + "' data-id='" + data.attribute_group_id + "'><i class='material-icons'>border_color</i></button>"
                    +"<button data-toggle='tooltip' data-placement='left' title='Delete'  class='delete-modal btn btn-just-icon btn-round btn-danger' data-id='" + data.attribute_group_id + "' data-title='" + data.attribute_group_name + "'><i class='material-icons'>delete_forever</i></button>" + 
                    "</td>");
                    addAttributegroup('top','right');
                }
            },
        });
        $('#attribute_group_name').val('');
    });
    $(document).on('click','.edit-modal', function(){
    $('#editmodal').modal('show');
    $('.formgroup1').show();
    $('#attribute_group_id1').val($(this).data('id'));
    $('#attribute_group_name1').val($(this).data('title'));
    $('#sn').val($(this).data('sn'));
    });
    $('#update').click(function(){
        $.ajax({
            type: 'POST',
            url: '/admin/edit-attribute-group',
            data : {
                '_token': $('input[name=_token]').val(),
                'attribute_group_id': $("#attribute_group_id1").val(),
                'attribute_group_name': $('#attribute_group_name1').val(),
                'sn': $('input[name=sn]').val()
            },
            success : function(data){
                $('.attribute_group' + data.attribute_group_id).replaceWith(""+
                "<tr class='attribute_group" + data.attribute_group_id + "'>"+
                "<td>" + data.sn + "</td>"+
                "<td>" + data.attribute_group_name + "</td>"+
                "<td class='text-center'>"+
                "<button data-toggle='tooltip' data-placement='top' title='Edit' class='edit-modal btn btn-just-icon btn-round btn-primary' data-sn='"+ data.sn +"' data-title='" + data.attribute_group_name + "' data-id='" + data.attribute_group_id + "'><i class='material-icons'>border_color</i></button>"+
                "<button data-toggle='tooltip' data-placement='left' title='Delete' class='delete-modal btn btn-just-icon btn-round btn-danger' data-title='" + data.attribute_group_name + "' data-id='" + data.attribute_group_id + "'><i class='material-icons'>delete_forever</i></button>"+
                "</td>"+
                "</tr>");
                updateAttributegroup('top','right');
            },
        });
    });
    $(document).on('click','.delete-modal', function(){
    $('#deletemodal').modal('show');
    $('.formgroup2').show();
    $('#attribute_group_id2').val($(this).data('id'));
    });
    $('#delete').click(function(){
        $.ajax({
            type: 'post',
            url: '/admin/delete-attribute-group',
            data: {
                '_token': $('input[name=_token]').val(),
                'attribute_group_id': $("#attribute_group_id2").val()
            },
            success : function(data){
                $('.attribute_group' + $("#attribute_group_id2").val()).remove();
                deleteAttributegroup('top','right');
            },
        });
    });
    });
</script>
@endsection