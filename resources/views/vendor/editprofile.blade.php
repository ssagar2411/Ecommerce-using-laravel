@extends('layouts.sellerlayouts.seller-design')
@section('content')
<div onload="toastr.showNotification('top','right')">
                    
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            @if (Session::has('msg'))
                <div class="alert alert-success">{{ Session::get('msg') }}</div>
            @endif
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">perm_identity</i>
                </div>
               
                <div class="card-content">
                    <h4 class="card-title">Edit Profile -
                        <small class="category">Complete your profile</small>
                    </h4>
                    <form method="post" enctype="multipart/form-data" action="{{ route('vendor.update-profile') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ $data->address }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Primary Email</label>
                                    <input type="text" class="form-control" name="primary_email" value="{{ $data->primary_email }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Secondary Email</label>
                                    <input type="text" class="form-control" name="secondary_email" value="{{ $data->secondary_email }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Primary Phone No.</label>
                                    <input type="text" class="form-control" name="primary_number" value="{{ $data->phone_number }}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Secondary Phone No.</label>
                                    <input type="text" class="form-control" name="secondary_number" value="{{ $data->secondary_phone_number }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Facebook Link</label>
                                    <input type="text" class="form-control" name="facebook_link" value="{{ $data->facebook_url }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Twitter Link</label>
                                    <input type="text" class="form-control" name="twitter_link" value="{{ $data->twitter_url }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Instagram Link</label>
                                    <input type="text" class="form-control" name="instagram_link" value="{{ $data->instagram_url }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>About Me</label>
                                    <div class="form-group label-floating">
                                        <textarea class="form-control" rows="5" name="description">{{ $data->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="oldimg" value="{{ $data->logo }}">
                        <button type="submit" class="btn btn-rose pull-right">Update Profile</button>
                        <div class="clearfix"></div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-profile">
                    <div class="card-avatar" id="image-preview">
                        <label for="image-upload" id="image-label"><i class="material-icons">border_color</i></label>
                        <input type="file" name="image" id="image-upload" />
                    </div>
                <div class="card-content">
                    <h6 class="category text-gray">CEO / Co-Founder</h6>
                    <h4 class="card-title">{{ $data->name }}</h4>
                    <h4 class="card-title">@ {{ $data->primary_email }}</h4>
                    <div class="row">
                        <div class="container-fluid">
                                <p class="description">
                                    {{ $data->description }}
                                </p>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="container-fluid">
                        <a href="{{ $data->facebook_url }}" ><img style="max-width: 12%; margin-right: 1em;" src="http://127.0.0.1:8000/images/vendor_images/profile/facebook.png" alt=""></a>
                        <a href="{{ $data->twitter_url }}" ><img style="max-width: 12%; margin-right: 1em;" src="http://127.0.0.1:8000/images/vendor_images/profile/twitter.png" alt=""></a>
                        <a href="{{ $data->instagram_url }}" ><img style="max-width: 12%;" src="http://127.0.0.1:8000/images/vendor_images/profile/instagram.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
    
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
      $.uploadPreview({
        input_field: "#image-upload",   // Default: .image-upload
        preview_box: "#image-preview",  // Default: .image-preview
        label_field: "#image-label",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "<i class='material-icons'>border_color</i>",  // Default: Change File
        no_label: false                 // Default: false
      });
      
    });
    toastr = {
    showNotification: function(from, align) {
        type = ['', 'info', 'success', 'warning', 'danger', 'rose', 'primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: "Welcome to <b>Material Dashboard</b> - a beautiful freebie for every web developer."

        }, {
            type: type[color],
            timer: 3000,
            placement: {
                from: from,
                align: align
            }
        });
    }
}

    </script>
@endsection