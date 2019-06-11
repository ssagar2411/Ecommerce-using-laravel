@extends('layouts.userlayouts.user-design')
@section('content')
<section class="user-dashboard-section">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="dash-sidebar">
                    <div class="dash-side-user font-weight-bold">
                        {{ Auth::user()->vendoruser->fname }} {{ Auth::user()->vendoruser->lname }}
                    </div>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('user.profile') }}">Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('user.order') }}">Orders</a>
                        </li>
                        <li>
                            <a href="#">Vouchers</a>
                        </li>
                        <li>
                            <a href="#">Returns</a>
                        </li>
                        <li>
                            <a href="{{ route('user.cancelled-order') }}">Cancellations</a>
                        </li>
                        <li>
                            <a href="#">Reviews</a>
                        </li>
                        <li>
                            <a href="{{route('user.getLogout')}}">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="dash-content-wrapper">
                    <div class="dash-table-wrapper">
                        <div class="dash-table-header">
                            <h5>Recent Orders</h5>
                        </div>
                        <table class="table">
                            <thead>
                                <th>Order #</th>
                                <th>Placed On</th>
                                <th>Items</th>
                                <th>total</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>PS14251</td>
                                    <td>01/05/2019</td>
                                    <td><img src="{{ asset('images/frontend_images/product-img/product-6.jpg') }}" width="50px"></td>
                                    <td>Rs. 1050</td>
                                    <td><a href="#">manage</a></td>
                                </tr>
                                <tr>
                                    <td>PS14251</td>
                                    <td>01/05/2019</td>
                                    <td><img src="{{ asset('images/frontend_images/product-img/product-5.jpg') }}" width="50px"></td>
                                    <td>Rs. 1050</td>
                                    <td><a href="#">manage</a></td>
                                </tr>    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')

@endsection