@extends('layouts.adminlayouts.admin-design')

@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
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
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">menu</i>
            </div>
    
            <div class="card-content">
                <h4 class="card-title">Add Menu</h4>
            <form action="{{ route('admin.add-menu') }}" method="post">
                @csrf
                    <div class="row">
                        <div class="col-md-5 pr-md-1">
                            <div class="form-group label-floating">
                            <label class="control-label">Menu Name</label>
                            <input type="text" class="form-control"  name="menu_name">
                            </div>
                        </div>
                        <div class="col-md-5 pr-md-1">
                            <div class="form-group">
                                <select data-live-search="true" class="selectpicker" id="exampleFormControlSelect1" name="category_id" data-style="btn btn-primary" title="Select Parent Category" data-size="5">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->cat_id }}">{{ $category->cat_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 pr-md-1">
                            <div class="form-group"><input type="submit" class="btn btn-fill btn-primary" value="submit"></div>
                        </div>
                    </div>
                </form>
            </div>
            {{-- {{$menuPrinter->buildMenu()}} --}} 
        </div>
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">menu</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Menu Lists</h4>
                <div class="row">
                <div class="col-md-12">
                <ul class="items-list">
                <li class="" style="border-bottom:#bbb 1px solid;padding:10px;">
                        <div>
                    <span class="text text-primary">
                        Mens | 
                                <a href="#s" style="text-decoration:none; font-weight: bold; padding-right: 5px; padding-left: 5px;"  data-show="0" onclick="
                        if(this.dataset.show==0){
                            this.dataset.show=1;
                            this.innerHTML='Hide FullMenu';
                        }else{
                            this.dataset.show=0;
                            this.innerHTML='Show FullMenu';
                        }
                        $('#menu-9').toggle('slow');
                        ">Show FullMenu</a>
                                </span>
                    |
                    <span style="left:10px;">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><i class="material-icons text-danger">delete_forever</i></a>
                    </span>
                    <div>
                        
                    <div id="menu-9" class="row" style="display:none;border-top:1px blue solid;margin-top:5px;padding:10px;">
                    <div class='col-md-4'><dl><dt>Topware</dt><dd>T-shirt</dd><dd>Causal Shirt</dd><dd>Formal Shirt</dd><dd>Suits</dd><dd>jacket</dd></dl></div><div class='col-md-4'><dl><dt>Bottomware</dt><dd>Jeans</dd><dd>Causal Trousers</dd><dd>Formal</dd><dd>Track Pants</dd></dl></div><div class='col-md-4'><dl><dt>Footware</dt><dd>Causal Shoes</dd><dd>Formal Shoes</dd><dd>Sports Shoes</dd><dd>Flip Flops</dd><dd>Socks</dd></dl></div><div class='col-md-4'><dl><dt>Accessories</dt><dd>Wallets</dd><dd>Tie</dd><dd>Belts</dd><dd>Caps</dd></dl></div>
                    </div>
                </li>
                <li class="" style="border-bottom:#bbb 1px solid;padding:10px;">
                    <div>
                    <span class="text text-primary">Women | 
                        <a href="#s" style="text-decoration:none; font-weight: bold; padding-right: 5px; padding-left: 5px;"  data-show="0" onclick="
                        if(this.dataset.show==0){
                            this.dataset.show=1;
                            this.innerHTML='Hide FullMenu';
                        }else{
                            this.dataset.show=0;
                            this.innerHTML='Show FullMenu';
                        }
                        $('#menu-10').toggle('slow');
                    ">Show FullMenu</a>
                    </span>
                    |
                    <span style="left:10px;">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="text-danger material-icons">delete_forever</i></a>
                    </span>
                    <div>
                        
                    <div id="menu-10" class="row" style="display:none;border-top:1px blue solid;margin-top:5px;padding:10px;">
                    <div class='col-md-4'><dl><dt>western wear</dt><dd>Tops,T-shirts & shirts</dd><dd>Trousers & Capris</dd><dd>Shorts & Skirts</dd><dd>Jackets & Coats</dd><dd>Blaizers & Waistcoats</dd></dl></div><div class='col-md-4'><dl><dt>Footwear</dt><dd>Flats & Casual Shoes</dd><dd>Heels </dd><dd>Boots</dd><dd>Sports shoes & floaters</dd></dl></div><div class='col-md-4'><dl><dt>Sports & Active Wear</dt><dd>clothings</dd><dd>footwear</dd><dd>sports Accessories</dd><dd>sports equipment</dd></dl></div><div class='col-md-4'><dl><dt>Handbags,bags & wallets</dt><dd>Handbags,bags & wallets</dd></dl></div><div class='col-md-4'><dl><dd>Watches & wearables</dd></dl></div><div class='col-md-4'><dl><dd>Sunglasses & frames</dd></dl></div>
                    </div>
                </li>
                </ul>
                </div>
                </div>
            </div>
        </div>
    </div>  
</div>
</div>
@endsection