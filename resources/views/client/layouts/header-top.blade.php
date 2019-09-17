<div class="header-top black-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12 col-sm-4">
                <div class="welcome-area">
                    <?php $rs1 = DB::table('ales')->where('key_name', 'hotlinetop')->get(); ?>
                    @foreach($rs1 as $v)
                        {!! $v->content !!}
                    @endforeach
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-12 col-sm-8">
                <div class="account-curr-lang-wrap f-right">
                    <ul>
                        <li class="top-hover"><a href="#">Language: (ENG) <i class="ion-chevron-down"></i></a>
                            <ul>
                                <li><a href="#">Bangla </a>
                                </li>
                                <li><a href="#">Arabic</a>
                                </li>
                                <li><a href="#">Hindi </a>
                                </li>
                                <li><a href="#">Spanish</a>
                                </li>
                            </ul>
                        </li>
                        <li class="top-hover"><a href="#">Setting  <i class="ion-chevron-down"></i></a>
                            <ul>
                                <li><a href="wishlist.html">Wishlist  </a>
                                </li>
                                <li><a href="login-register.html">Login</a>
                                </li>
                                <li><a href="login-register.html">Register</a>
                                </li>
                                <li><a href="my-account.html">my account</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>