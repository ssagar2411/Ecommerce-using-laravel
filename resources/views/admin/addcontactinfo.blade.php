@extends('layouts.adminlayouts.admin-design')

@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
               <i class="material-icons">mail_outline</i>
            </div>
    
            <div class="card-content">
                <h4 class="card-title">Add Contact Info</h4>
                <form action="{{ route('admin.add-contactinfo') }}" enctype="multipart/form-data" method="post">
                @csrf
                    <div class="row">
                        <div class="col-md-8 pr-md-1">
                            <div class="form-group label-floating">
                            <label class="control-label">Address</label>
                            <input type="text" class="form-control"  value="" name="address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 pr-md-1">
                            <div class="form-group label-floating">
                            <label class="control-label">Phone No</label>
                            <input type="text" class="form-control"  value="" name="phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 pr-md-1">
                            <div class="form-group label-floating">
                            <label class="control-label">Email Address</label>
                            <input type="text" class="form-control"  value="" name="email">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-md-8 pr-md-1">
                    <input type="submit" class="btn btn-fill btn-primary" value="submit">
                    </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
    </div>
    
    </div>
    
@endsection