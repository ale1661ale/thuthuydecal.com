<div class="header-middle">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12 col-sm-4">
                <div class="logo">
                    <?php $rs1 = DB::table('logos')->where('id_image_type', 1)->where('status', 1)->get(); ?>
                    @foreach($rs1 as $value)
                    <a href="">
                        <img alt="{{ $value->name }}" src="img/upload/ale/{{ $value->image }}">
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-12 col-sm-8">
                <div class="header-middle-right f-right">
                    <div class="header-login">
                        <a href="login-register.html">
                            <div class="header-icon-style">
                                <i class="icon-user icons"></i>
                            </div>
                            <div class="login-text-content">
                                <p>Đăng nhập</p>
                            </div>
                        </a>
                    </div>

                    <div class="header-wishlist"></div>

                    <div class="header-cart">
                        <a href="#">
                            <div class="header-icon-style">
                                <i class="icon-handbag icons"></i>
                                <span class="count-style">02</span>
                            </div>
                            <div class="cart-text">
                                <span class="digit">Giỏ hàng</span>
                            </div>
                        </a>
                        <div class="shopping-cart-content">
                            <ul>
                                <li class="single-shopping-cart">
                                    <div class="shopping-cart-img">
                                        <a href="#"><img alt="" src="assets/client/img/cart/cart-1.jpg">
                                        </a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="#">Phantom Remote </a></h4>
                                        <h6>Qty: 02</h6>
                                        <span>$260.00</span>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="ion ion-close"></i></a>
                                    </div>
                                </li>
                                <li class="single-shopping-cart">
                                    <div class="shopping-cart-img">
                                        <a href="#"><img alt="" src="assets/client/img/cart/cart-2.jpg">
                                        </a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="#">Phantom Remote</a></h4>
                                        <h6>Qty: 02</h6>
                                        <span>$260.00</span>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="ion ion-close"></i></a>
                                    </div>
                                </li>
                            </ul>
                            <div class="shopping-cart-total">
                                <h4>Shipping : <span>$20.00</span></h4>
                                <h4>Total : <span class="shop-total">$260.00</span></h4>
                            </div>
                            <div class="shopping-cart-btn">
                                <a href="cart-page.html">view cart</a>
                                <a href="checkout.html">checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>