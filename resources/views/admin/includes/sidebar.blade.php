<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/dashboard')}}" class="brand-link">
        <img src="{{asset('website/images/setting/'.$settings->image)}}" alt="No Logo" class="brand-image img-circle elevation-3"style="opacity: .8">
        <span class="brand-text font-weight-light">{{Auth::user()->name}}</span>
    </a>
<br/>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                   <!--li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            
                        </p>
                    </a>
                    </li-->
                
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-stream"></i>
                        <p>
                            Product Info
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/products/view')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Manage Products</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('manage-top-products')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Manage Key Products</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>
                            Offer Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/master/masterOfferView')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Manage Master offer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('specialOfferView',['status'=>'Active'])}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Manage Special offer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/bestDeals/view')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Best Deals</p>
                            </a>
                        </li>
                        <!--<li class="nav-item">
                            <a href="{{route('hotOfferView',['status'=>'Active'])}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Manage Hot offer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/products/specialDealsView')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Manage Special Deals</p>
                            </a>
                        </li>-->
                        <li class="nav-item">
                            <a href="{{url('/coupon/view/coupon')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Coupon</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/coupon/view/voucher')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Voucher</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-audio-description"></i>
                        <p>
                            Banner Management 
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/banner/frontEndView')}}" class="nav-link">
                                <i class="far fa-play-circle nav-icon"></i>
                                <p>Manage FrontEnd Banner</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-stream"></i>
                        <p>
                            Order Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('order-list')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Order Info</p>
                            </a>
                        </li>
                    </ul>
                    
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-stream"></i>
                        <p>
                            User Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('manage-user-list')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Users Info</p>
                            </a>
                        </li>
                    </ul>
                    
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('manage-content')}}" class="nav-link">
                        <i class="nav-icon fas fa-stream"></i>
                        <p>
                            Content Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    
                    
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('manage-message-portal')}}" class="nav-link">
                        <i class="nav-icon fas fa-stream"></i>
                        <p>
                            Message Portal
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    {{--<ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('manage-user-list')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Users Info</p>
                            </a>
                        </li>
                    </ul>--}}

                </li>

                <li class="nav-item has-treeview">
                    <a href="{{route('manage-reports')}}" class="nav-link">
                        <i class="nav-icon fas fa-stream"></i>
                        <p>
                            Report Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    
                    
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/category/view')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Manage Category</p>
                            </a>
                        </li>
                        <li class="d-none nav-item">
                            <a href="{{url('/sub-category/view')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Manage Sub-Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('brands/view')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Manage Brand</p>
                            </a>
                        </li>
                        <li class="nav-item d-none">
                            <a href="{{url('/unit/view/unit')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Manage Unit</p>
                            </a>
                        </li>
                        <li class="d-none nav-item">
                            <a href="{{url('/manufacturer/view')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Manage Manufacturer</p>
                            </a>
                        </li>
                        <li class="d-none nav-item">
                            <a href="{{url('/unit/view/warehouse')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Manage Warehouse</p>
                            </a>
                        </li>
                        <li class="nav-item  d-none">
                            <a href="{{url('/unit/view/paymentmethod')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Manage Payment method</p>
                            </a>
                        </li>
                        <li class="d-none nav-item">
                            <a href="{{route('manage-carring-cost')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Manage Carring Cost</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('edit-shop-setting')}}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Manage Shop Setting</p>
                            </a>
                        </li>

                        
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
