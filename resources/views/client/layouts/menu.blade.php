<div class="header-bottom transparent-bar black-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="main-menu">
                    <nav>
                        <ul>
                            <li class="top-hover"><a href="">Trang chủ</a></li>

                            @foreach($category as $cate)
                            <li class="mega-menu-position top-hover">
                                <a href="{{ route('collections', $cate->slug) }}">{{ $cate->name }} <i class="ion-chevron-down"></i></a>
                                <ul class="mega-menu">
                                    @if(count($cate->productType) > 0)
                                        @foreach($cate->productType as $protype)
                                            <li><a href="{{ route('collections.list', $protype->slug, $protype->id) }}">{{ $protype->name }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            @endforeach

                            <li><a href="{{ route('about_us.index') }}">Giới thiệu</a></li>

                            <li><a href="{{ route('contact.form') }}">Liên hệ</a></li>

                            <li class="top-hover"><a href="">Thiết kế <i class="ion-chevron-down"></i>
                                <ul class="submenu">
                                    <li><a href="#">home version 1</a></li>
                                    <li><a href="#">home version 2</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mobile-menu-area-start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow" id="nav">
                            <li><a href="index.html">Home</a>
                                <ul>
                                    <li><a href="index.html">home version 1</a>
                                    </li>
                                    <li><a href="index-2.html">home version 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">pages</a>
                                <ul>
                                    <li><a href="about-us.html">about us </a>
                                    </li>
                                    <li><a href="shop.html">shop Grid</a>
                                    </li>
                                    <li><a href="shop-list.html">shop list</a>
                                    </li>
                                    <li><a href="product-details.html">product details</a>
                                    </li>
                                    <li><a href="cart-page.html">cart page</a>
                                    </li>
                                    <li><a href="checkout.html">checkout</a>
                                    </li>
                                    <li><a href="wishlist.html">wishlist</a>
                                    </li>
                                    <li><a href="my-account.html">my account</a>
                                    </li>
                                    <li><a href="login-register.html">login / register</a>
                                    </li>
                                    <li><a href="contact.html">contact</a>
                                    </li>
                                    <li><a href="testimonial.html">Testimonials</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="shop.html"> Shop </a>
                                <ul>
                                    <li><a href="#">Categories 01</a>
                                        <ul>
                                            <li><a href="shop.html">salad</a>
                                            </li>
                                            <li><a href="shop.html">sandwich</a>
                                            </li>
                                            <li><a href="shop.html">bread</a>
                                            </li>
                                            <li><a href="shop.html">steak</a>
                                            </li>
                                            <li><a href="shop.html">tuna steak</a>
                                            </li>
                                            <li><a href="shop.html">spaghetti </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Categories 02</a>
                                        <ul>
                                            <li><a href="shop.html">rice</a>
                                            </li>
                                            <li><a href="shop.html">pizza</a>
                                            </li>
                                            <li><a href="shop.html">hamburger</a>
                                            </li>
                                            <li><a href="shop.html">eggs</a>
                                            </li>
                                            <li><a href="shop.html">sausages</a>
                                            </li>
                                            <li><a href="shop.html">apple juice</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Categories 03</a>
                                        <ul>
                                            <li><a href="shop.html">milk</a>
                                            </li>
                                            <li><a href="shop.html">grape juice</a>
                                            </li>
                                            <li><a href="shop.html">cookie</a>
                                            </li>
                                            <li><a href="shop.html">candy</a>
                                            </li>
                                            <li><a href="shop.html">cake</a>
                                            </li>
                                            <li><a href="shop.html">cupcake</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Categories 04</a>
                                        <ul>
                                            <li><a href="shop.html">pie</a>
                                            </li>
                                            <li><a href="shop.html">stoberry</a>
                                            </li>
                                            <li><a href="shop.html">sandwich</a>
                                            </li>
                                            <li><a href="shop.html">bread</a>
                                            </li>
                                            <li><a href="shop.html">steak</a>
                                            </li>
                                            <li><a href="shop.html">hamburger</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="blog-rightsidebar.html">blog</a>
                                <ul>
                                    <li><a href="blog.html">Blog No sidebar</a>
                                    </li>
                                    <li><a href="blog-rightsidebar.html">Blog sidebar</a>
                                    </li>
                                    <li><a href="blog-details.html">Blog details</a>
                                    </li>
                                    <li><a href="blog-details-gallery.html">Blog details gallery</a>
                                    </li>
                                    <li><a href="blog-details-video.html">Blog details video</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="contact.html">contact us</a>
                            </li>
                            <li><a href="shop.html">burger</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mobile-menu-area-end -->