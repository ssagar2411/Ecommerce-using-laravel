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
                <img src="{{ asset('images/backend_images/marc.jpg') }}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        Sagar Sitaula
                        <b class="caret"></b>
                    </span>
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
                            <a href="#">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Settings </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="{{ (Request::is('admin/dashboard') ? ' active' : '') }}"  >
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li >
                <a data-toggle="collapse" href="#catelogues" >
                    <i class="material-icons">image</i>
                    <p> Catalogues
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="catelogues">
                    <ul class="nav">
                        <li class="{{ (Request::is('admin/manage-brand') ? ' active' : '') }}">
                            <a href="{{ route('admin.manage-brand') }}">
                                <i class="material-icons">domain</i>
                                <p> Brands </p>
                            </a>
                        </li>
                        <li class="{{ (Request::is('admin/manage-tag') ? ' active' : '') }}">
                            <a href="{{ route('admin.manage-tag') }}">
                                <i class="material-icons">local_offer</i>
                                <p> Tags </p>
                            </a>
                        </li>
                        <li class="{{ (Request::is('admin/manage-attributes') ? ' active' : '') }}">
                            <a href="{{ route('admin.manage-attributes') }}">
                                <i class="material-icons">desktop_mac</i>
                                <p> Attributes </p>
                            </a>
                        </li>
                        <li class="{{ (Request::is('admin/manage-attribute-group') ? ' active' : '') }}">
                            <a href="{{ route('admin.manage-attribute-group') }}">
                                <i class="material-icons">phonelink</i>
                                <p> Attribute Groups </p>
                            </a>
                        </li>
                        <li >
                            <a data-toggle="collapse" href="#pagesExamples" >
                                <i class="material-icons">image</i>
                                <p> Category
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="collapse" id="pagesExamples">
                                <ul class="nav">
                                    <li class="{{ (Request::is('admin/add-category') ? ' active' : '') }}">
                                        <a href="{{ route('admin.add-category') }}">
                                            <span class="sidebar-mini"> AC </span>
                                            <span class="sidebar-normal"> Add Category </span>
                                        </a>
                                    </li>
                                    <li class="{{ (Request::is('admin/manage-category') ? ' active' : '') }}">
                                        <a href="{{ route('admin.manage-category') }}">
                                            <span class="sidebar-mini"> MC </span>
                                            <span class="sidebar-normal"> Manage Category </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
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
                                    <li class="{{ (Request::is('admin/add-product') ? ' active' : '') }}">
                                        <a href="{{ route('admin.add-product') }}">
                                            <span class="sidebar-mini"> AP </span>
                                            <span class="sidebar-normal"> Add Product </span>
                                        </a>
                                    </li>
                                    <li class="{{ (Request::is('admin/manage-product') ? ' active' : '') }}">
                                        <a href="{{ route('admin.manage-product') }}">
                                            <span class="sidebar-mini"> MP </span>
                                            <span class="sidebar-normal"> Manage Products </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>           
            
            <li>
                <a data-toggle="collapse" href="#collections">
                    <i class="material-icons">business_center</i>
                    <p> Collections
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="collections">
                    <ul class="nav">
                        <li class="{{ (Request::is('admin/manage-collection') ? ' active' : '') }}">
                            <a href="{{ route('admin.manage-collection') }}">
                                <span class="sidebar-mini"> CC </span>
                                <span class="sidebar-normal"> Create Collection </span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('admin/collection-products') ? ' active' : '') }}">
                            <a href="{{ route('admin.collection-products') }}">
                                <span class="sidebar-mini"> CP </span>
                                <span class="sidebar-normal"> Collection Products </span>
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
                        <li class="{{ (Request::is('admin/manage-sales') ? ' active' : '') }}">
                            <a href="{{ route('admin.manage-sales') }}">
                                <span class="sidebar-mini"> CS </span>
                                <span class="sidebar-normal"> Create Sale </span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('admin/sale-products') ? ' active' : '') }}">
                            <a href="{{ route('admin.sale-products') }}">
                                <span class="sidebar-mini"> SP </span>
                                <span class="sidebar-normal"> Sale Products </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#promotion">
                    <i class="material-icons">confirmation_number</i>
                    <p> Promotion
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="promotion">
                    <ul class="nav">
                        <li class="{{ (Request::is('admin/add-coupon') ? ' active' : '') }}">
                            <a href="{{ route('admin.add-coupon') }}">
                                <span class="sidebar-mini"> AC </span>
                                <span class="sidebar-normal"> Add Coupon </span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('admin/manage-coupon') ? ' active' : '') }}">
                            <a href="{{ route('admin.manage-coupon') }}">
                                <span class="sidebar-mini"> MC </span>
                                <span class="sidebar-normal"> Manage Coupons </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#vendors">
                    <i class="material-icons">assignment_ind</i>
                    <p> Vendors
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="vendors">
                    <ul class="nav">
                        <li class="{{ (Request::is('admin/vendor-list') ? ' active' : '') }}">
                            <a href="{{ route('admin.vendor-list') }}">
                                <span class="sidebar-mini"> VL </span>
                                <span class="sidebar-normal"> Vendor List </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#homepage">
                    <i class="material-icons">ballot</i>
                    <p> Homepage Settings
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="homepage">
                    <ul class="nav">
                        <li class="{{ (Request::is('admin/add-slider') ? ' active' : '') }}">
                            <a href="{{ route('admin.add-slider') }}">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Sliders </span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('admin/manage-menu') ? ' active' : '') }}">
                            <a href="{{ route('admin.manage-menu') }}">
                                <span class="sidebar-mini"> M </span>
                                <span class="sidebar-normal"> Menus </span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('admin/create-contactinfo') ? ' active' : '') }}">
                            <a href="{{ route('admin.create-contactinfo') }}">
                                <span class="sidebar-mini"> CI </span>
                                <span class="sidebar-normal"> Contact Info </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>