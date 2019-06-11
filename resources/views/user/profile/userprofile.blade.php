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
                @if (Session::has('msg'))
                    <div class="alert alert-success">{{ Session::get('msg') }}</div>
                @endif
                <div style="position:relative;min-height:400px;margin-bottom:30px;">
                <div class="dash-profile-wrapper mb-30">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="p-label">
                                First Name
                            </div>
                            <div class="p-value">
                                {{ Auth::user()->vendoruser->fname }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-label">
                                Last Name
                            </div>
                            <div class="p-value">
                                {{ Auth::user()->vendoruser->lname }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-label">
                                Email
                            </div>
                            <div class="p-value">
                                {{ Auth::user()->email }}
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="p-label mt-3">
                                Gender
                            </div>
                            <div class="p-value">
                                @if (Auth::user()->vendoruser->gender == null)
                                    <p disabled>Add your gender</p>
                                @else
                                    {{ Auth::user()->vendoruser->gender }}
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-label mt-3">
                                Date Of Birth
                            </div>
                            <div class="p-value">
                                @if (Auth::user()->vendoruser->dob == null)
                                    <p disabled>Add your date of birth</p>
                                @else
                                    {{ Auth::user()->vendoruser->dob }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="p-label">Phone No</div>
                            <div class="p-value">{{ Auth::user()->vendoruser->mobile_number }}</div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-label">Province</div>
                            <div class="p-value">
                                @if (Auth::user()->vendoruser->province == null)
                                    <p disabled>Add your Province</p>
                                @else
                                    {{ Auth::user()->vendoruser->province }}
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-label">City</div>
                            <div class="p-value">
                                @if (Auth::user()->vendoruser->city == null)
                                    <p disabled>Add your City</p>
                                @else
                                    {{ Auth::user()->vendoruser->city }}
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-label">Postal Code</div>
                            <div class="p-value">
                                @if (Auth::user()->vendoruser->postalcode == null)
                                    <p disabled>Add your postal code</p>
                                @else
                                    {{ Auth::user()->vendoruser->postalcode }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-label">
                                Billing Address
                            </div>
                            <div class="p-value">
                                @if (Auth::user()->vendoruser->billingaddress  == null)
                                    <p disabled>Add your billing Address</p>
                                @else
                                    {{ Auth::user()->vendoruser->billingaddress }}
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-label">
                                Shipping Address
                            </div>
                            <div class="p-value">
                                @if (Auth::user()->vendoruser->address == null)
                                    <p disabled>Add your shipping address</p>
                                @else
                                    {{ Auth::user()->vendoruser->address }}
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="#" class="btn essence-btn mt-5" id="edit-profile-btn">Edit Profile</a>
                        </div>
                    </div>
                </div>
                <div class="dash-edit-profile mb-30">
                    <form action="{{ route('user.update_profile') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="fname" class="form-control" placeholder="Enter Your First Name..." value="{{ Auth::user()->vendoruser->fname }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="lname" class="form-control" placeholder="Enter Your Last Name..." value="{{ Auth::user()->vendoruser->lname }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email..." value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date Of Birth</label>
                                    <input type="date" name="dob" class="form-control" placeholder="Enter Your DOB..." value="{{ Auth::user()->vendoruser->dob }}">
                                </div>
                            </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Phone No</label>
                                        <input type="text" name="phoneno" class="form-control" placeholder="Enter Phone No..." value="{{ Auth::user()->vendoruser->mobile_number }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Province</label>
                                        <input type="text" name="province" class="form-control" placeholder="Enter Province Name..." value="{{ Auth::user()->vendoruser->province }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" placeholder="Enter City Name..." value="{{ Auth::user()->vendoruser->city }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" name="postalcode" class="form-control" placeholder="Enter Postal Code..." value="{{ Auth::user()->vendoruser->postalcode }}">
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Shipping Address</label>
                                    <input type="text" name="ship_address" class="form-control" placeholder="Enter Shipping Address..." value="{{ Auth::user()->vendoruser->address }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Billing Address</label>
                                    <input type="text" name="bill_address" class="form-control" placeholder="Enter Billing Address..." value="{{ Auth::user()->vendoruser->billingaddress }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn essence-btn mt-2">Save</button>
                                <a href="#" class="btn btn-def mt-2" id="edit-cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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