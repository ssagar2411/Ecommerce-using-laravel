@extends('layouts.sellerlayouts.seller-design')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('msg'))
                <div class="alert alert-success">{{ Session::get('msg') }}</div>
            @endif
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">local_offer</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Coupons</h4>
                    <div class="content-view">
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Coupon Code</th>
                                    <th>Coupon Name</th>
                                    <th>Started From</th>
                                    <th>End To</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Coupon Code</th>
                                    <th>Coupon Name</th>
                                    <th>Started From</th>
                                    <th>End To</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{ $coupon->coupon_code }}</td>
                                        <td>{{ $coupon->coupon_name }}</td>
                                        <td>{{ $coupon->start_time }}</td>
                                        <td>{{ $coupon->end_time }}</td>
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
    
@endsection