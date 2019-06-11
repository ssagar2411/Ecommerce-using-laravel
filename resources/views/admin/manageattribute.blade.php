@extends('layouts.adminlayouts.admin-design')

@section('content')
<div class="container-fluid">
<div class="row">
        <div class="col-md-12">
        <button class="create_modal btn btn-fill btn-primary" >Add Attribute</button>
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Attributes</h4>
                    <div class="content-view">
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sn.</th>
                                    <th>Name</th>
                                    <th>Attribute Group</th>
                                    <th>Status</th>
                                    <th class="disabled-sorting text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($attributes as $attribute)
                                <tr class="attribute{{ $attribute->attribute_id }}">
                                    <td>{{ $sn = $no++ }}</td>
                                    <td>{{ $attribute->attribute_name }}</td>
                                    <td>{{ $attribute->attribute_group_name }}</td>
                                    <td>{{ $attribute->statusname}}</td>
                                    <td class="text-center">
                                        <button  class="edit-modal btn btn-just-icon btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="Edit" data-sn="{{ $sn }}" data-group="{{ $attribute->attribute_group_id }}" data-status="{{ $attribute->attribute_status }}" data-title="{{ $attribute->attribute_name }}" data-id="{{ $attribute->attribute_id }}"><i class="material-icons">border_color</i></button>
                                        <button  class="delete-modal btn btn-just-icon btn-round btn-danger" data-toggle="tooltip" data-placement="left" title="Delete" data-id="{{ $attribute->attribute_id }}" data-title="{{ $attribute->attribute_name }}"><i class="material-icons">delete_forever</i></button>
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
<!--Add Attribute  Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Attribute</h5>
      </div>
      <div class="modal-body">
      <form role="form" onsubmit="return false;" id="group_form" class="formgroup">
            @csrf
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                    <label class="control-label">Attribute Name</label>
                    <input type="text" class="form-control"  name="attribute_name" id="attribute_name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                        <label class="">Attribute Group</label>
                        <select class="selectpicker" data-live-search="true" id="attributegroups" name="attribute_group_id" data-style="btn btn-primary btn-round" title="Single Select" data-size="3">
                        <option disabled>Select Attribute Group</option>
                        @foreach($attribute_groups as $attribute_group)
                        <option value="{{ $attribute_group->attribute_group_id }}">{{ $attribute_group->attribute_group_name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                        <label class="control-label">Attribute Status</label>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" id="attributestatus" name="optionsRadios"  value="1">Active
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" id="attributestatus" name="optionsRadios" value="0">Inactive
                            </label>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Attribute</h5>
      </div>
      <div class="modal-body">
      <form role="form" onsubmit="return false;" id="group_form1" class="formgroup2">
            @csrf
            <div class="row">
                    <div class="col-md-8 pr-md-1">
                        <div class="form-group label-floating">
                        <input type="hidden" class="form-control"  name="attribute_id" id="attribute_id1">
                       <input type="hidden" name="sn" id="sn">
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                    <label class="control-label">Attribute Name</label>
                    <input type="text" class="form-control" value=" "  name="attribute_name" id="attribute_name1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                        <label class="">Attribute Group</label>
                        <select class="selectpicker" data-live-search="true" id="attributegroups1" name="attribute_group_id" data-style="btn btn-primary btn-round" title="Single Select" data-size="3">
                        @foreach($attribute_groups as $attribute_group)
                        <option value="{{ $attribute_group->attribute_group_id }}">{{ $attribute_group->attribute_group_name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                        <label class="control-label">Attribute Status</label>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="optionsRadios1" id="active"  value="1">Active
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="optionsRadios1" id="inactive" value="0">Inactive
                            </label>
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
<!-- Delete Attribute Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Attribute Group</h5>
            </div>
            <div class="modal-body">
            <div><h3><i class="material-icons text-warning">warning</i>Are you Sure to Delete Attribute ?</h3></div>
            <form role="form" onsubmit="return false;" id="group_form" class="formgroup1">
                    @csrf
                    <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <input type="hidden" class="form-control"  name="attribute_id" id="attribute_id2">
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
    function updateAttribute(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Attribute has been <b>Updated</b> Successfully . . ."

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
    function deleteAttribute(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Attribute has been <b>Deleted</b> Successfully . . ."

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
    function addAttribute(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Attribute has been <b>Added</b> Successfully . . ."

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
        console.log(sn);
        $(document).on('click','.create_modal',function(){
            $('#create').modal('show');
            $('.formgroup').show();
        });
        $('#add').click(function(){
            $.ajax({
                type: 'post',
                url: '/admin/add-attribute',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'attribute_name': $('input[name=attribute_name]').val(),
                    'attribute_group': $('#attributegroups').val(),
                    'attribute_status': $('input[name=optionsRadios]:checked').val()
                },
                success: function(data){
                    $('#datatables').append("<tr class='attribute" + data.attribute_id + "'>"+
                    "<td>" + (sn++) + "</td>"+
                    "<td>" + data.attribute_name + "</td>"+
                    "<td>" + data.attribute_group_name + "</td>"+
                    "<td>" + data.attribute_status_name + "</td>"+
                    "<td class='text-center'><button data-toggle='modal tooltip' data-placement='top' title='Edit'  data-target='#editattribute' class='edit-modal btn btn-just-icon btn-round btn-primary' data-group='" + data.attribute_group_id + "' data-title='" + data.attribute_name + "' data-id='" + data.attribute_id + "'><i class='material-icons'>border_color</i></button>" +
                    "<button data-toggle='tooltip' data-placement='left' title='Delete'  class='delete-modal btn btn-just-icon btn-round btn-danger' data-id='" + data.attribute_id + "' data-title='" + data.attribute_name + "'><i class='material-icons'>delete_forever</i></button>" + 
                    "</td></tr>"
                    );
                    addAttribute('top','right');
                },
            });
        });
        $(document).on('click','.delete-modal',function(){
            $('#deletemodal').modal('show');
            $('.formgroup1').show();
            $('#attribute_id2').val($(this).data('id'));
        });
        $('#delete').click(function(){
            $.ajax({
                type: 'POST',
                url: '/admin/delete-attribute',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'attribute_id': $('#attribute_id2').val()
                },
                success: function(data){
                    $('.attribute' + $("#attribute_id2").val()).remove();
                    deleteAttribute('top','right');
                },
            });
        });
        $(document).on('click','.edit-modal',function(){
            $('#editmodal').modal('show');
            $('.formgroup2').show();
            $('#attribute_id1').val($(this).data('id'));
            $('#attribute_name1').val($(this).data('title'));
            $('#attributegroups1').val($(this).data('group'));
            $('#attributestatus').val($(this).data('status'));
            $('#sn').val($(this).data('sn'));

            console.log($(this).data('group'));
            if( $(this).data('status') == 1 ){
                $('#active').attr('checked',true);
            } else if( $(this).data('status') == 0 ){
                $('#inactive').attr('checked', true);
            }
            $('#attributegroups1').selectpicker('val', $(this).data('group'));
            // debugger;
        });
        $('#update').click(function(){
            $.ajax({
                type: 'POST',
                url: '/admin/edit-attribute',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'attribute_id': $('#attribute_id1').val(),
                    'attribute_name': $('#attribute_name1').val(),
                    'attribute_group': $('#attributegroups1').val(),
                    'attribute_status': $('input[name=optionsRadios1]:checked').val(),
                    'sn': $('input[name=sn]').val()
                },
                success: function(data){
                    $('.attribute' + data.attribute_id).replaceWith("<tr class='attribute" + data.attribute_id + "'>"+
                    "<td>" + data.sn + "</td>"+
                    "<td>" + data.attribute_name + "</td>"+
                    "<td>" + data.attribute_group_name + "</td>"+
                    "<td>" + data.attribute_status_name + "</td>"+
                    "<td class='text-center'><button data-toggle='modal tooltip' data-placement='top' title='Edit'  data-target='#editattribute' class='edit-modal btn btn-just-icon btn-round btn-primary' data-sn='"+ data.sn +"' data-title='" + data.attribute_name + "' data-id='" + data.attribute_id + "' data-group='" + data.attribute_group_id + "' data-status='" + data.attribute_status + "'><i class='material-icons'>border_color</i></button>" +
                    "<button data-toggle='tooltip' data-placement='left' title='Delete'  class='delete-modal btn btn-just-icon btn-round btn-danger' data-id='" + data.attribute_id + "' data-title='" + data.attribute_name + "'><i class='material-icons'>delete_forever</i></button>" + 
                    "</td></tr>"
                    );
                    updateAttribute('top','right');
                },
            });
        });
    });
</script>
@endsection