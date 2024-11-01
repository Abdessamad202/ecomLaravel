
@php
    
    $categories = App\Models\Category::all();
@endphp
@php
        $panier = App\Models\Panier::all();
        $panierCount = $panier->count();

    @endphp
<div class="bg-dark py-lg-1 py-3">
    <div class="container">
        <div class="row position-relative align-items-center">
            <div class="col-lg-2 col-6"><a class="logo" href="index.html"><img class="img-fluid"
                        src="{{ asset('imgs/fd841ec5-29d7-467e-935a-f6c4950ad81e-removebg-preview.png') }}" alt="logo"
                        style="height:48px" /></a></div>
            <div class="col-lg-7 d-none d-lg-block">
                <ul class="nav main-nav  gap-3 text-dark-lead- justify-content-center py-2">
                    <li class="{{ request()->routeIs('home') ? '' : 'nav-item' }} dropdown small">
                        <a class="nav-link fw-bold py-3 px-1 hover:text-primary"
                            href="{{route("home")}}">Home</a>
                    </li>
                    <!-- <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.html">Home 01</a></li>
                            <li><a class="dropdown-item" href="index-02.html">Home 02</a></li>
                            <li><a class="dropdown-item" href="index-03.html">Home 03</a></li>
                            <li><a class="dropdown-item" href="index-04.html">Home 04</a></li>
                            <li><a class="dropdown-item" href="index-05.html">Home 05</a></li>
                        </ul> -->
                    <!-- <li class="nav-item small">
                        <a class="nav-link dropdown-toggle fw-bold py-3 px-1 hover:text-primary" href="#">Shop</a>
                        <div class="dropdown-menu mega-menu py-3">
                            <ul class="d-flex">
                                <li class="child-meaga col-lg-3">
                                    <p class="mega-title text-uppercase mb-0">Shop List</p>
                                    <ul class="flex flex-column gap-2">
                                        <li><a class="mega-link" href="shop-sidebar.html">Shop Sidebar</a></li>
                                        <li><a class="mega-link" href="shop-full-width-col-3.html">Shop Fullwidth Column 3</a></li>
                                        <li><a class="mega-link" href="shop-full-width-col-4.html">Shop Fullwidth Column 4</a></li>
                                        <li><a class="mega-link" href="shop-list-view.html">Shop List View</a></li>
                                    </ul>
                                </li>
                                <li class="child-meaga col-lg-3">
                                    <p class="mega-title text-uppercase mb-0">Product Layouts</p>
                                    <ul class="flex flex-column gap-2">
                                        <li><a class="mega-link" href="single-product.html">Product Simple</a></li>
                                        <li><a class="mega-link" href="single-product-variable.html">Variations Swatches</a></li>
                                        <li><a class="mega-link" href="single-product-vertical.html">Vertical Gallary</a></li>
                                        <li><a class="mega-link" href="#">With Video</a></li>
                                        <li><a class="mega-link" href="#">With Countdown Timer</a></li>
                                        <li><a class="mega-link" href="#">Product Presentation</a></li>
                                        <li><a class="mega-link" href="shop-list-view.html">List View</a></li>
                                        <li><a class="mega-link" href="#">Details Gallery</a></li>
                                    </ul>
                                </li>
                                <li class="child-meaga col-lg-3">
                                    <p class="mega-title text-uppercase mb-0">eCommerce</p>
                                    <ul class="flex flex-column gap-2">
                                        <li><a class="mega-link" href="cart.html">Shopping Cart</a></li>
                                        <li><a class="mega-link" href="#">Track Your Order</a></li>
                                        <li><a class="mega-link" href="compare.html">Compare</a></li>
                                        <li><a class="mega-link" href="wishlist.html">Wishlist</a></li>
                                        <li><a class="mega-link" href="checkout.html">Checkout</a></li>
                                        <li><a class="mega-link" href="my-account.html">My account</a></li>
                                    </ul>
                                </li>
                                <li class="child-meaga col-lg-3">
                                    <p class="mega-title text-uppercase mb-0">More Pages</p>
                                    <ul class="flex flex-column gap-2">
                                        <li><a class="mega-link" href="#">About Us</a></li>
                                        <li><a class="mega-link" href="login.html">Login</a></li>
                                        <li><a class="mega-link" href="register.html">Register</a></li>
                                        <li><a class="mega-link" href="#">Forget Password</a></li>
                                        <li><a class="mega-link" href="404.html">404 Error</a></li>
                                        <li><a class="mega-link" href="#">List View</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>  -->
                    <li class="{{ request()->routeIs('products') ? '' : 'nav-item' }}  small"><a class="nav-link fw-bold py-3 px-1 hover:text-primary"
                            href="{{ route('products') }}">Products</a>
                        <!-- <div class="dropdown-menu mega-menu">
                            <ul class="row">
                                <li class="child-meaga col-lg-3">
                                    <p class="mega-title text-uppercase mb-0">Shop List</p>
                                    <ul class="flex flex-column gap-2">
                                        <li><a class="mega-link" href="shop-sidebar.html">Shop Sidebar</a></li>
                                        <li><a class="mega-link" href="shop-full-width-col-3.html">Shop Fullwidth Column 3</a></li>
                                        <li><a class="mega-link" href="shop-full-width-col-4.html">Shop Fullwidth Column 4</a></li>
                                        <li><a class="mega-link" href="shop-list-view.html">Shop List View</a></li>
                                    </ul>
                                </li>
                                <li class="child-meaga col-lg-3">
                                    <p class="mega-title text-uppercase mb-0">Product Layouts</p>
                                    <ul class="flex flex-column gap-2">
                                        <li><a class="mega-link" href="single-product.html">Product Simple</a></li>
                                        <li><a class="mega-link" href="single-product-variable.html">Variations Swatches</a></li>
                                        <li><a class="mega-link" href="single-product-vertical.html">Vertical Gallary</a></li>
                                        <li><a class="mega-link" href="#">With Video</a></li>
                                        <li><a class="mega-link" href="#">With Countdown Timer</a></li>
                                        <li><a class="mega-link" href="#">Product Presentation</a></li>
                                        <li><a class="mega-link" href="shop-list-view.html">List View</a></li>
                                        <li><a class="mega-link" href="#">Details Gallery</a></li>
                                    </ul>
                                </li>
                                <li class="child-meaga col-lg-3">
                                    <p class="mega-title text-uppercase mb-0">eCommerce</p>
                                    <ul class="flex flex-column gap-2">
                                        <li><a class="mega-link" href="cart.html">Shopping Cart</a></li>
                                        <li><a class="mega-link" href="#">Track Your Order</a></li>
                                        <li><a class="mega-link" href="compare.html">Compare</a></li>
                                        <li><a class="mega-link" href="wishlist.html">Wishlist</a></li>
                                        <li><a class="mega-link" href="checkout.html">Checkout</a></li>
                                        <li><a class="mega-link" href="my-account.html">My account</a></li>
                                    </ul>
                                </li>
                                <li class="col-lg-3">
                                    <div class="d-flex flex-wrap">
                                        <div class="col-lg-6 pt-3 pe-2"><a class="shadow-sm" href="#"><img class="border border-silver-light w-100" src="https://z.nooncdn.com/cms/pages/20210410/2a23ead9569718f23f16e78305f07230/drop-brand-01.png" alt=""/></a></div>
                                        <div class="col-lg-6 pt-3 pe-2"><a href="#"><img class="border border-silver-light w-100" src="https://z.nooncdn.com/cms/pages/20210410/2a23ead9569718f23f16e78305f07230/drop-brand-02.png" alt=""/></a></div>
                                        <div class="col-lg-6 pt-3 pe-2"><a href="#"><img class="border border-silver-light w-100" src="https://z.nooncdn.com/cms/pages/20210410/2a23ead9569718f23f16e78305f07230/drop-brand-03.png" alt=""/></a></div>
                                        <div class="col-lg-6 pt-3 pe-2"><a href="#"><img class="border border-silver-light w-100" src="https://z.nooncdn.com/cms/pages/20210410/2a23ead9569718f23f16e78305f07230/drop-brand-04.png" alt=""/></a></div>
                                        <div class="col-lg-6 pt-3 pe-2"><a href="#"><img class="border border-silver-light w-100" src="https://z.nooncdn.com/cms/pages/20210410/2a23ead9569718f23f16e78305f07230/drop-brand-05.png" alt=""/></a></div>
                                        <div class="col-lg-6 pt-3 pe-2"><a href="#"><img class="border border-silver-light w-100" src="https://z.nooncdn.com/cms/pages/20210410/2a23ead9569718f23f16e78305f07230/drop-brand-06.png" alt=""/></a></div>
                                    </div>
                                </li>
                                <li class="col-lg-3">
                                    <div class="py-3 pe-3"><a href="#"><img class="w-100- h-100-" src="https://weblearnbd.net/tphtml/shofy-prv/shofy/assets/img/menu/product/menu-product-img-1.jpg" alt=""/></a></div>
                                </li>
                                <li class="col-lg-3">
                                    <div class="d-flex flex-wrap py-3 pe-3"><a href="#"><img class="w-100- h-100-" src="https://weblearnbd.net/tphtml/shofy-prv/shofy/assets/img/menu/product/menu-product-img-2.jpg" alt=""/></a></div>
                                </li>
                            </ul>
                        </div> -->
                    </li>
                    <li class="nav-item dropdown small"><a
                            class="nav-link dropdown-toggle fw-bold py-3 px-1 hover:text-primary"
                            data-bs-toggle="dropdown">Categories</a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category )
                            <li>
                                <a href="{{route("categories",$category->name)}}" class="dropdown-item">{{$category->name}}</a>
                            </li>
                            @endforeach
                            {{-- <li><a class="dropdown-item" href="#">Link 2</a></li>
                            <li><a class="dropdown-item" href="#">Link 3</a></li> --}}
                        </ul>
                    </li>
                    <!-- <li class="nav-item dropdown small"><a class="nav-link dropdown-toggle fw-bold py-3 px-1 hover:text-primary" data-bs-toggle="dropdown" href="#">Blogs</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="news-grid-full.html">Blog Grid</a></li>
                            <li><a class="dropdown-item" href="news-grid-left-sidebar.html">Blog Grid With Sidebar</a></li>
                            <li><a class="dropdown-item" href="single-news-full.html">Blog Details Full Width</a></li>
                            <li><a class="dropdown-item" href="single-news-left-sidebar.html">Blog Details</a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item small"><a class="nav-link fw-bold py-3 px-1 hover:text-primary" href="contact-us.html">Contact Us</a></li> -->
                </ul>
            </div>
            <div class="col-lg-3 col-md-2 col-6 small">
                <div class="d-flex gap-4 align-items-center justify-content-end">
                    <!-- Cart Icon with Badge -->
                    <a class="text-white d-flex flex-column btn-cart-offcanvas align-items-center position-relative" style="width: 50px">
                        <i class="text-white fs-3 bi bi-person-circle"></i>
                    </a>
                    
                    <!-- Menu Icon for smaller screens -->
                    <a class="text-white d-lg-none d-flex flex-column align-items-center" href="#" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                        <i class="bi bi-list h4 m-0"></i>
                    </a>
            
                    <!-- Account Icon -->
                    <a class="text-white d-none d-lg-flex flex-column align-items-center position-relative" href="{{route("p")}}">
                        <i class="bi bi-bag-fill h5 m-0"></i>
                        <span class="badge-circle text-white">{{$panierCount}}</span>
                        {{-- <span class="smaller text-capitalize">Account</span> --}}
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div class="mobile-footer shadow-sm py-2 d-block d-lg-none">
    <ul class="nav align-items-center justify-content-between px-2">
        <li class="nav-item"> <a class="text-dark nav-link px-1 d-flex flex-column align-items-center"
                href="index.html"><i class="fs-4 bi bi-house"></i><span
                    class="smaller text-capitalize">Home</span></a></li>
        <li class="nav-item"> <a class="text-dark nav-link px-1 d-flex flex-column align-items-center"
                href="shop-full-width.html"><i class="fs-4 bi bi-bookmarks"></i><span
                    class="smaller text-capitalize">Categories</span></a></li>
        <li class="nav-item"> <a class="text-dark nav-link px-1 d-flex flex-column align-items-center"
                href="cart.html"><i class="fs-4 bi bi-bag"></i><span class="smaller text-capitalize">Cart</span></a>
        </li>
        <li class="nav-item"> <a class="text-dark nav-link px-1 d-flex flex-column align-items-center"
                href="my-account.html"><i class="fs-4 bi bi-person-circle"></i><span
                    class="smaller text-capitalize">Account</span></a></li>
        <li class="nav-item"> <a class="text-dark nav-link px-1 d-flex flex-column align-items-center"
                href="#"><i class="fs-4 bi bi-search"></i><span class="small text-capitalize">Search</span></a>
        </li>
    </ul>
</div>
<div class="offcanvas offcanvas-start offcanvas-295" id="offcanvasScrolling" data-bs-scroll="true"
    data-bs-backdrop="false" tabindex="-1" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header offcanvas-border-light">
        <div class="offcanvas-title col-5" id="offcanvasScrollingLabel"> <a class="logo" href="#"><img
                    class="max-width-180-" src="assets/images/logo.png" alt="" /></a></div>
        <button
            class="btn btn-light btn-sm rounded-circle x-icon small d-flex align-items-center justify-content-center"
            type="button" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="offcanvas-body">
        <div class="border input-group group-circle mx-auto w-100">
            <input class="form-control border-0" type="text" placeholder="Search" />
            <button class="btn px-3" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <ul class="mobile-menu">
            <li class="nav-item"><a class="nav-link" href="#"> <span> <i
                            class="bi bi-house me-1"></i>Home</span></a>
                <!-- <ul class="hidden">
                    <li><a class="dropdown-item" href="index.html">Home 01</a></li>
                    <li><a class="dropdown-item" href="index-02.html">Home 02</a></li>
                    <li><a class="dropdown-item" href="index-03.html">Home 03</a></li>
                    <li><a class="dropdown-item" href="index-04.html">Home 04</a></li>
                    <li><a class="dropdown-item" href="index-05.html">Home 05</a></li>
                </ul> -->
            </li>
            <!-- <li class="nav-item"><a class="nav-link" href="#"> <span> <i class="bi bi-basket me-1"></i>Shop List</span><i class="arrow small fa-solid fa-chevron-down"></i></a>
                <ul class="hidden">
                    <li><a class="dropdown-item" href="index.html">Home 01</a></li>
                    <li><a class="dropdown-item" href="shop-sidebar.html">Shop Sidebar</a></li>
                    <li><a class="dropdown-item" href="shop-full-width-col-3.html">Shop Fullwidth Column 3</a></li>
                    <li><a class="dropdown-item" href="shop-full-width-col-4.html">Shop Fullwidth Column 4</a></li>
                    <li><a class="dropdown-item" href="shop-list-view.html">Shop List View</a></li>
                </ul>
            </li> -->
            <li class="nav-item"><a class="nav-link" href="{{ route('products') }}"> <span> <i
                            class="bi bi-shop me-1"></i>Products</span></a>
                <!-- <ul class="hidden">
                    <li><a class="dropdown-item" href="single-product.html">Product Simple</a></li>
                    <li><a class="dropdown-item" href="single-product-variable.html">Variations Swatches</a></li>
                    <li><a class="dropdown-item" href="single-product-vertical.html">Vertical Gallary</a></li>
                    <li><a class="dropdown-item" href="#">With Video</a></li>
                    <li><a class="dropdown-item" href="#">With Countdown Timer</a></li>
                    <li><a class="dropdown-item" href="#">Product Presentation</a></li>
                    <li><a class="dropdown-item" href="shop-list-view.html">List View</a></li>
                    <li><a class="dropdown-item" href="#">Details Gallery</a></li>
                </ul> -->
            </li>
            <li class="nav-item"><a class="nav-link" href="#"> <span> <i class="fs-4 bi bi-bookmarks me-1"
                            style="width: 16px;height: 16px; font-size: 10px;"></i>Categories</span></a>
            </li>
            <!-- <i class="arrow small fa-solid fa-chevron-down"></i> -->
            <!-- <li class="nav-item"><a class="nav-link" href="#"> <span> <i class="bi bi-archive me-1"></i>E-Commerce</span><i class="arrow small fa-solid fa-chevron-down"></i></a> -->
            <!-- <ul class="hidden">
                    <li><a class="dropdown-item" href="cart.html">Shopping Cart</a></li>
                    <li><a class="dropdown-item" href="#">Track Your Order</a></li>
                    <li><a class="dropdown-item" href="compare.html">Compare</a></li>
                    <li><a class="dropdown-item" href="wishlist.html">Wishlist</a></li>
                    <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
                    <li><a class="dropdown-item" href="my-account.html">My account</a></li>
                </ul> -->
            </li>
            <!-- <li class="nav-item"><a class="nav-link" href="#"> <span> <i class="bi bi-bookmarks me-1"></i>Blog</span><i class="arrow small fa-solid fa-chevron-down"></i></a>
                <ul class="hidden">
                    <li><a class="dropdown-item" href="#">Blog Standard</a></li>
                    <li><a class="dropdown-item" href="#">Blog Grid</a></li>
                    <li><a class="dropdown-item" href="#">Blog List</a></li>
                    <li><a class="dropdown-item" href="#">Blog Details Full Width</a></li>
                    <li><a class="dropdown-item" href="#">Blog Details</a></li>
                </ul>
            </li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li> -->
        </ul>
    </div>
</div>
