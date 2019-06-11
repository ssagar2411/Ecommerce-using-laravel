@extends('layouts.adminlayouts.admin-design')

@section('content')
<div class="container-fluid">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">assignment_ind</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Vendors</h4>
                        <div class="content-view">
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sn.</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Phone No.</th>
                                        <th>Verified</th>
                                        <th class="disabled-sorting text-center">Status</th>
                                        <th class="disabled-sorting text-center">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $no=1; ?>
                                    @foreach($vendors as $vendor)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                       <td class="text-center">{{ $vendor->name }}</td>
                                       <td class="text-center">{{ $vendor->email }}</td>
                                       <td class="text-center">{{ $vendor->phone }}</td>
                                       <td><input type="checkbox" name="featured" value='{{ $vendor->verified }}' onchange="setverified(this)" data-id ="{{ $vendor->id }}" @if($vendor->verified == 1) checked  @endif >
                                        <span class="label label-primary @if ($vendor->verified == 0)hidden @endif">Verified</span> 
                                        </td>
                                       @if ($vendor->active == 0)
                                           <td class="text-center"><span class="label label-danger">Inactive</span></td>
                                       @else
                                            <td class="text-center"><span class="label label-success">Active</span></td>
                                       @endif
                                       <td class="text-center"><a class="btn btn-primary" href="{{ url('admin/vendor-details/'. $vendor->id) }}">View</a></td>
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
    function setverified(p){
        //console.log(p.value);
        
        //console.log(p.dataset.id);
        if(p.value == 1){
            //console.log('featured');
            
            p.value = 0;
        }else if(p.value == 0){
            //console.log('unfeatured');
            p.value = 1;
        }

        $.ajax({
            type: 'post',
            url: '/admin/setverified',
            data: { 'verified': p.value, 'id': p.dataset.id },
            success: function(data){
                if(p.value==1){
                    $(p).siblings("span").removeClass("hidden");
                }else{
                    $(p).siblings("span").addClass("hidden");
                }
            },

        });
    }
</script>
@endsection