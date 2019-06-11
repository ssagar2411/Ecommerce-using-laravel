<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{ asset('images/backend_images/sidebar-1.jpg') }}">
    <!--
Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
Tip 2: you can also add an image using data-image tag
Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
<div class="logo">
<a href="#" class="simple-text logo-mini">
    PS
</a>
<a href="#" class="simple-text logo-normal">
    PAAILA SHOP
</a>
</div>
<div class="sidebar-wrapper">
<div class="user">
    <div class="photo">
        <img id="userphoto"  />
    </div>
    <div class="info">
        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
            <span id="vendorname">
                
                
            </span>
            <b class="caret"></b>
        </a>
        <div class="clearfix"></div>
        <div class="collapse" id="collapseExample">
            <ul class="nav">
                <li>
                    <a href="#">
                        <span class="sidebar-mini"> MP </span>
                        <span class="sidebar-normal"> My Profile </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('vendor/edit-profile/'.Auth::user()->id) }}">
                        <span class="sidebar-mini"> EP </span>
                        <span class="sidebar-normal"> Edit Profile </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('vendor.setting') }}">
                        <span class="sidebar-mini"> S </span>
                        <span class="sidebar-normal"> Settings </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<ul class="nav">
    <li >
        <a href="./dashboard.html">
            <i class="material-icons">dashboard</i>
            <p> Dashboard </p>
        </a>
    </li>
    <li>
        <a data-toggle="collapse" href="#componentsExamples">
            <i class="material-icons">business_center</i>
            <p> Products
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="componentsExamples">
            <ul class="nav">
                <li class="{{ (Request::is('vendor/add-product') ? ' active' : '') }}">
                    <a href="{{ route('vendor.add-product') }}">
                        <span class="sidebar-mini"> AP </span>
                        <span class="sidebar-normal"> Add Product </span>
                    </a>
                </li>
                <li class="{{ (Request::is('vendor/manage-product') ? ' active' : '') }}">
                    <a href="{{ route('vendor.manage-product') }}">
                        <span class="sidebar-mini"> MP </span>
                        <span class="sidebar-normal"> Manage Products </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li>
        <a data-toggle="collapse" href="#promotion">
            <i class="material-icons">local_offer</i>
            <p> Promotion
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="promotion">
            <ul class="nav">
                <li class="{{ (Request::is('vendor/add-coupon') ? ' active' : '') }}">
                    <a href="{{ route('vendor.add-coupon') }}">
                        <span class="sidebar-mini"> AC </span>
                        <span class="sidebar-normal"> Add Coupon </span>
                    </a>
                </li>
                <li class="{{ (Request::is('vendor/manage-coupon') ? ' active' : '') }}">
                    <a href="{{ route('vendor.manage-coupon') }}">
                        <span class="sidebar-mini"> MC </span>
                        <span class="sidebar-normal"> Manage Coupons </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li>
        <a data-toggle="collapse" href="#sales">
            <i class="material-icons">shopping_basket</i>
            <p> Sales
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="sales">
            <ul class="nav">
                <li class="{{ (Request::is('vendor/sale-products') ? ' active' : '') }}">
                    <a href="{{ route('vendor.sale-products') }}">
                        <span class="sidebar-mini"> SP </span>
                        <span class="sidebar-normal"> Sale Products </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>
</div>
</div>