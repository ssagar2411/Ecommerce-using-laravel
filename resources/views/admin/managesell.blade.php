@extends('layouts.adminlayouts.admin-design')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <button class="create_modal btn btn-fill btn-primary" >Create Sale</button>
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Sales</h4>
                    <div class="content-view">
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sn.</th>
                                    <th>Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Interval</th>
                                    <th class="disabled-sorting text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($sales as $sale)
                                <tr class="sale{{ $sale->sell_id }}">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $sale->sell_name }}</td>
                                    <td>{{ $sale->started_at }}</td>
                                    <td>{{ $sale->end_at }}</td>
                                    <td>{{ $sale->interval }}</td>
                                    <td class="text-center">
                                        <button data-toggle="tooltip" data-placement="top" title="Edit"  class="edit-modal btn btn-just-icon btn-round btn-primary" data-id="{{ $sale->sell_id }}" data-name="{{ $sale->sell_name }}" data-start="{{ $sale->started_at }} " data-end="{{ $sale->end_at }}" data-interval="{{ $sale->interval }}" ><i class="material-icons">border_color</i></button>
                                        <button data-toggle="tooltip" data-placement="left" title="Delete"  class="delete-modal btn btn-just-icon btn-round btn-danger" data-id="{{ $sale->sell_id }}" ><i class="material-icons">delete_forever</i></button>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Add Sale</h5>
      </div>
      <div class="modal-body">
      <form role="form" onsubmit="return false;" id="group_form" class="formgroup">
            @csrf
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                    <label class="control-label">Sale Name</label>
                    <input type="text" class="form-control"  name="sale_name" id="sale_name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                    <label class="label-control">Start Date and Time</label>
                    <input type="text" class="form-control datetimepicker" name="started_at" value="01/01/2019" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                    <label class="label-control">End Date and Time</label>
                    <input type="text" class="form-control datetimepicker" name="end_at" value="01/01/2019" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                    <label class="control-label">interval</label>
                    <input type="text" class="form-control"  name="interval" id="interval">
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
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Sale</h5>
      </div>
      <div class="modal-body">
      <form role="form" onsubmit="return false;" id="group_form1" class="formgroup2">
            @csrf
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                    <input type="hidden" class="form-control"  name="sale_id" id="sale_id1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                    <label class="control-label">Sale Name</label>
                    <input type="text" class="form-control" value=" "  name="sale_name" id="sale_name1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                    <label class="label-control">Start Date and Time</label>
                    <input type="text" class="form-control datetimepicker" name="started_at" value=" " id="started_at1" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                    <label class="label-control">End Date and Time</label>
                    <input type="text" class="form-control datetimepicker" name="end_at" value=" " id="end_at1" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 pr-md-1">
                    <div class="form-group label-floating">
                    <label class="control-label">Interval</label>
                    <input type="text" class="form-control" value=" "  name="sale_interval" id="sale_interval1">
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
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Collection</h5>
            </div>
            <div class="modal-body">
            <div><h3><i class="material-icons text-warning">warning</i>Are you Sure to Delete Sale ?</h3></div>
            <form role="form" onsubmit="return false;" id="group_form" class="formgroup1">
                    @csrf
                    <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <input type="hidden" class="form-control"  name="sell_id" id="sell_id2">
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
   function updateSale(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Sale has been <b>Updated</b> Successfully . . ."

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
    function deleteSale(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Sale has been <b>Deleted</b> Successfully . . ."

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
    function addSale(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Sale has been <b>Added</b> Successfully . . ."

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
        $('.datetimepicker').datetimepicker({
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        }
        });
        $('#add').click(function(){
            $.ajax({
                type: 'post',
                url: '/admin/add-sales',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'sale_name': $('input[name=sale_name]').val(),
                    'started_at': $('input[name=started_at]').val(),
                    'interval': $('input[name=interval]').val(),
                    'end_at': $('input[name=end_at]').val()
                },
                success: function(data){
                    $('#datatables').append("<tr class='sale" + data.sell_id + "'>"+
                    "<td>" + "<?php $no++ ?>" + "</td>"+
                    "<td>" + data.sell_name + "</td>"+
                    "<td>" + data.started_at + "</td>"+
                    "<td>" + data.end_at + "</td>"+
                    "<td>" + data.interval + "</td>"+
                    "<td class='text-right'><button data-toggle='modal tooltip' data-placement='top' title='Edit'  data-target='#editcollection' class='edit-modal btn btn-just-icon btn-round btn-primary' data-start='"+ data.started_at+"' data-end='"+ data.end_at+"' data-interval='"+ data.interval+"' data-name='" + data.sell_name + "' data-id='" + data.sell_id + "'><i class='material-icons'>border_color</i></button>" +
                    "<button data-toggle='tooltip' data-placement='left' title='Delete'  class='delete-modal btn btn-just-icon btn-round btn-danger' data-id='" + data.sell_id + "' data-title='" + data.sell_name + "'><i class='material-icons'>delete_forever</i></button>" + 
                    "</td></tr>"
                    );
                    addSale('top','right');
                },
            });
        });
        $(document).on('click','.delete-modal',function(){
            $('#deletemodal').modal('show');
            $('.formgroup1').show();
            $('#sell_id2').val($(this).data('id'));
        });
        $('#delete').click(function(){
            $.ajax({
                type: 'post',
                url: '/admin/delete-sale',
                data: { '_token': $('input[name=_token]').val(), 'sell_id': $('#sell_id2').val() },
                success: function(data){
                    $('.sale'+$('#sell_id2').val()).remove();
                    deleteSale('top','right');
                },
            });
        });
        $(document).on('click','.edit-modal',function(){
            $('#editmodal').modal('show');
            $('.formgroup2').show();
            $('#sale_id1').val($(this).data('id'));
            $('#sale_name1').val($(this).data('name'));
            $('#started_at1').val($(this).data('start'));
            $('#end_at1').val($(this).data('end'));
            $('#sale_interval1').val($(this).data('interval'));
        });
        $('#update').click(function(){
            $.ajax({
                type: 'post',
                url: '/admin/update-sale',
                data:{
                    '_token': $('input[name=_token]').val(),
                    'sell_id': $('#sale_id1').val(),
                    'sell_name': $('#sale_name1').val(),
                    'started_at': $('#started_at1').val(),
                    'end_at': $('#end_at1').val(),
                    'interval': $('#sale_interval1').val()
                },
                success: function(data){
                    $('.sale'+ data.sell_id).replaceWith("<tr class='sale" + data.sell_id + "'>"+
                    "<td>" + "<?php $no++ ?>" + "</td>"+
                    "<td>" + data.sell_name + "</td>"+
                    "<td>" + data.started_at + "</td>"+
                    "<td>" + data.end_at + "</td>"+
                    "<td>" + data.interval + "</td>"+
                    "<td class='text-center'><button data-toggle='modal tooltip' data-placement='top' title='Edit'  data-target='#editcollection' class='edit-modal btn btn-just-icon btn-round btn-primary' data-start='"+ data.started_at+"' data-end='"+ data.end_at+"' data-interval='"+ data.interval+"' data-name='" + data.sell_name + "' data-id='" + data.sell_id + "'><i class='material-icons'>border_color</i></button>" +
                    "<button data-toggle='tooltip' data-placement='left' title='Delete'  class='delete-modal btn btn-just-icon btn-round btn-danger' data-id='" + data.sell_id + "' data-title='" + data.sell_name + "'><i class='material-icons'>delete_forever</i></button>" + 
                    "</td></tr>"
                    );
                    updateSale('top','right');
                },
            });
        });
    });
</script>
@endsection