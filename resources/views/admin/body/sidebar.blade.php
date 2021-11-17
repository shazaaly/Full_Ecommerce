@php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Request;

    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();

@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{route('admin.dashboard')}}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png')}}" alt="">
                        <h3><b>Store</b> Admin</h3>

                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview {{ $route == 'admin.dashboard' ? 'active':'' }}">
{{--            <li class="{{ Request::is('*admin*') ? 'active' : '' }}">--}}
                <a href=" {{ route('admin.dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @php
                $brand = (\Illuminate\Support\Facades\Auth::guard('admin')->user()->brand == 1 );
             $category = (auth()->guard('admin')->user()->category == 1);
            $product = (auth()->guard('admin')->user()->product == 1);
            $slider = (auth()->guard('admin')->user()->slider == 1);
            $coupons = (auth()->guard('admin')->user()->coupons == 1);
            $shipping = (auth()->guard('admin')->user()->shipping == 1);
            $blog = (auth()->guard('admin')->user()->blog == 1);
            $settings = (auth()->guard('admin')->user()->settings == 1);
            $returnOrders = (auth()->guard('admin')->user()->returnOrder == 1);
            $reviews = (auth()->guard('admin')->user()->reviews == 1);
            $orders = (auth()->guard('admin')->user()->orders == 1);
            $stock = (auth()->guard('admin')->user()->stock == 1);
            $reports = (auth()->guard('admin')->user()->reports == 1);
            $allUsers = (auth()->guard('admin')->user()->allUsers == 1);
            $adminUserRole = (auth()->guard('admin')->user()->adminUserRole == 1);
            @endphp


            @if($brand == true )
                <li class="treeview {{ $prefix == '/brands' ? 'active':'' }}">
                    <a href="#">
                        <i data-feather="command"></i>
                        <span>Brands</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=" {{ ($prefix == "/brands") ? 'active' : '' }} ">
                            <a href="{{ route('all.brands') }}"><i class="ti-more"></i>All Brands</a>
                        </li>
                    </ul>
                </li>
            @else
            @endif

            @if($category == true )

                <li class="treeview {{ $prefix == '/category' ? 'active':'' }}">
                <a href="#">
                    <i data-feather="list"></i> <span>Categories</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $prefix =='/category'? 'active' : ''}}">
                        <a href="{{ route('all.categories') }}">
                            <i class="ti-more"></i>All Categories
                        </a>
                    </li>

                    <li class="{{ $prefix =='/category'? 'active' : ''}}">
                        <a href="{{ route('all.subcategories') }}">
                            <i class="ti-more"></i>Subcategories
                        </a>
                    </li>

                    <li class="{{ $prefix =='/category'? 'active' : ''}}">
                        <a href="{{ route('all.sub_subcategories') }}">
                            <i class="ti-more"></i>Sub-subcategories
                        </a>
                    </li>


                </ul>
            </li>
            @else
            @endif

            @if($product == true )

                <li class="treeview {{ $prefix == '/products' ? 'active':'' }}">
                <a href="#">
                    <i data-feather="layers"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{$route == 'Addproduct'? 'active':''}} "><a href="{{ route('Addproduct') }}"><i
                                class="ti-more"></i>Add Products</a></li>
                    <li class=" {{$route == 'manage.product'? 'active':''}}"><a href="{{ route('manage.product') }}"><i
                                class="ti-more"></i>Manage Products</a></li>

                </ul>
            </li>
            @else
            @endif



            @if($slider == true )
            <li class="treeview {{ $prefix == '/slider' ? 'active':'' }}">
                <a href="#">
                    <i data-feather="log-out"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>

            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{$route == 'manage_slider'? 'active':''}} "><a href="{{ route('manage_slider') }}">
                            <i class="ti-more"></i>Manage Slider</a></li>

                </ul>
            </li>
            @else
            @endif


            @if($coupons == true )

            <li class="treeview {{ $prefix == '/coupons' ? 'active':'' }}">
                <a href="#">
                    <i data-feather="log-out"></i>
                    <span>Coupons</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>

            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{$route == 'manage_coupon'? 'active':''}} "><a href="{{ route('manage_coupon') }}">
                            <i class="ti-more"></i>Manage Coupons</a></li>

                </ul>
            </li>
            @else
            @endif



            @if($shipping == true )

            <li class="treeview {{ $prefix == '/shipping' ? 'active':'' }}">
                <a href="#">
                    <i data-feather="log-out"></i>
                    <span>Shipping Area</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>

            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{$route == 'manage_division'? 'active':''}} "><a href="{{ route('manage_division') }}">
                            <i class="ti-more"></i>Ship Division</a></li>

                    <li class=" {{$route == 'manage_district'? 'active':''}} "><a href="{{ route('manage_district') }}">
                            <i class="ti-more"></i>Ship District</a></li>


                    <li class=" {{$route == 'manage_state'? 'active':''}} "><a href="{{ route('manage_state') }}">
                            <i class="ti-more"></i>Ship State</a></li>

                </ul>

            </li>
            @else
            @endif

            @if($orders == true )

            <li class="treeview {{ $prefix == '/orders' ? 'active':'' }}">
                <a href="#">
                    <i data-feather="log-out"></i>
                    <span>Orders</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>

            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{$route == 'pending_orders'? 'active':''}} "><a href="{{ route('pending_orders') }}">
                            <i class="ti-more"></i>Pending Orders</a></li>

                    <li class=" {{$route == 'confirmed_orders'? 'active':''}} "><a
                            href="{{ route('confirmed_orders') }}">
                            <i class="ti-more"></i>Confirmed Orders</a></li>

                    <li class=" {{$route == 'processing_orders'? 'active':''}} "><a
                            href="{{ route('processing_orders') }}">
                            <i class="ti-more"></i>Processing Orders</a></li>

                    <li class=" {{$route == 'picked_orders'? 'active':''}} "><a href="{{ route('picked_orders') }}">
                            <i class="ti-more"></i>Picked Orders</a></li>

                    <li class=" {{$route == 'shipped_orders'? 'active':''}} "><a href="{{ route('shipped_orders') }}">
                            <i class="ti-more"></i>Shipped Orders</a></li>

                    <li class=" {{$route == 'delivered_orders'? 'active':''}} "><a
                            href="{{ route('delivered_orders') }}">
                            <i class="ti-more"></i>Delivered Orders</a></li>

                    <li class=" {{$route == 'cancelled_orders'? 'active':''}} "><a
                            href="{{ route('cancelled_orders') }}">
                            <i class="ti-more"></i>Candelled Orders</a></li>


                </ul>

            </li>
            @else
            @endif

            @if($stock == true )

            <li class="treeview {{ $prefix == '/stock' ? 'active':'' }}">
                <a href="#">
                    <i data-feather="log-out"></i>
                    <span> Manage Stock</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>

            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{$route == 'product_stock'? 'active':''}} "><a href="{{ route('product_stock') }}">
                            <i class="ti-more"></i> Product Stock </a></li>


                </ul>

            </li>
            @else
            @endif

            @if($reports == true )

            <li class="treeview {{ $prefix == '/reports' ? 'active':'' }}">
                <a href="#">
                    <i data-feather="log-out"></i>
                    <span>  Reports</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>

            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{$route == 'all_reports'? 'active':''}} "><a href="{{ route('all_reports') }}">
                            <i class="ti-more"></i> Orders Reports</a></li>


                </ul>

            </li>
            @else
            @endif


            @if($returnOrders == true )
            <li class="treeview {{ $prefix == '/return' ? 'active':'' }}">
                <a href="#">
                    <i data-feather="log-out"></i>
                    <span>  Return Orders</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>

            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{$route == 'return.request'? 'active':''}} "><a href="{{ route('return.request') }}">
                            <i class="ti-more"></i> Return Requests</a></li>

                    <li class=" {{$route == 'Approved_return'? 'active':''}} ">
                        <a href="{{ route('Approved_return') }}">
                            <i class="ti-more"></i>Return Approves</a>
                    </li>


                </ul>

            </li>
            @else
            @endif


            @if($reviews == true )
            <li class="treeview {{ $prefix == '/reviews' ? 'active':'' }}">
                <a href="#">
                    <i data-feather="log-out"></i>
                    <span>  Reviews </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>

            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{$route == 'pending_reviews'? 'active':''}} "><a href="{{ route('pending_reviews') }}">
                            <i class="ti-more"></i> Pending Reviews</a></li>

                    <li class=" {{$route == 'approved_reviews'? 'active':''}} ">
                        <a href="{{ route('approved_reviews') }}">
                            <i class="ti-more"></i> Approved Reviews</a>
                    </li>


                </ul>

            </li>
            @else
            @endif

            @if($allUsers == true )
            <li class="treeview {{ $prefix == '/users' ? 'active':'' }}">
                <a href="#">
                    <i data-feather="log-out"></i>
                    <span> Users</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>

            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{$route == 'all_users'? 'active':''}} ">
                        <a href="{{ route('all_users') }}">
                            <i class="ti-more"></i> All Users</a>
                    </li>


                </ul>

            </li>
            @else
            @endif


            @if($adminUserRole == true )
            <li class="treeview {{ $prefix == '/adminUserRole' ? 'active':'' }}">
                <a href="#">
                    <i data-feather="log-out"></i>
                    <span> Admin User Role</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>

            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{$route == 'all_admins'? 'active':''}} ">
                        <a href="{{ route('all_admins') }}">
                            <i class="ti-more"></i> All Admins</a>
                    </li>


                </ul>

            </li>
            @else
            @endif


            @if($settings == true )
            <li class="treeview {{ $prefix == '/settings' ? 'active':'' }}">
                <a href="#">
                    <i data-feather="log-out"></i>
                    <span> Settings</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>

            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{$route == 'manage_settings'? 'active':''}} ">
                        <a href="{{ route('manage_settings') }}">
                            <i class="ti-more"></i> Site Settings</a>
                    </li>

                    <li class=" {{$route == 'seo_settings'? 'active':''}} ">
                        <a href="{{ route('seo_settings') }}">
                            <i class="ti-more"></i> Seo Settings</a>
                    </li>


                </ul>

            </li>
            @else
            @endif

            @if($blog == true )
            <li class="header nav-small-cap">Blog Section</li>

            <li class="treeview {{ $prefix == '/blog' ? 'active': '' }}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Manage Blog</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'blog.category'? 'active' : '' }}"><a href="{{ route('blog.category') }}"><i
                                class="ti-more"></i>Blog Category</a></li>
                    <li class="{{ $route == 'add.post'? 'active' : '' }}"><a href="{{ route('add.post') }}"><i
                                class="ti-more"></i> Add Blog Post</a></li>

                    <li class="{{ $route == 'view.post'? 'active' : '' }}"><a href="{{ route('view.post') }}"><i
                                class="ti-more"></i> View Blog Post</a></li>


                </ul>
            </li>
            @else
            @endif

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
           aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>
