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
                        <span href="javascript:;">
                            <div class="header-icon-style">
                                <i class="icon-handbag icons"></i>
                                <span class="count-style">{{ Cart::count() }}</span>
                            </div>
                            <div class="cart-text">
                                <span class="digit">Giỏ hàng</span>
                            </div>
                        </span>

                        <div class="shopping-cart-content">
                        
                            <ul>

                                <?php $cart = Cart::content(); ?>
                                @foreach($cart as $key => $value)
                                <li class="single-shopping-cart">
                                    <div class="shopping-cart-img">
                                        <a href="#">
                                            <img 
                                                alt="{{ $value->name }}" 
                                                src="img/upload/product/{{ $value->options->img }}"
                                                width="100"
                                                height="72"
                                            >
                                        </a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="#">{{ $value->name }}</a></h4>
                                        <h6>{{ $value->qty }}</h6>
                                        <span>{{ number_format($value->price) }} VNĐ</span>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a 
                                            href="javascript:void(0)" 
                                            data-toggle="modal" 
                                            class="deleteCart"
                                            data-target="#deleteCart"
                                            data-id="{{ $value->rowId }}"
                                            >
                                            <i class="ion ion-close"></i>
                                        </a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>

                            <div class="shopping-cart-total">
                                <h4>Shipping : <span>$20.00</span></h4>
                                <h4>Tổng : <span class="shop-total">{{ Cart::total() }} VNĐ</span></h4>
                            </div>

                            <div class="shopping-cart-btn">
                                <a href="{{ route('carts.index') }}">Xem chi tiết</a>
                                <a href="">Thanh toán</a>
                            </div>
                            
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>