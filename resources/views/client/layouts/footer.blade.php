<div class="footer-area black-bg-2 pt-70">
    <div class="footer-top-area pb-18">
        <div class="container">
            <div class="row">
            <?php $rs1 = DB::table('ales')->where('key_name', 'thongtincuoiwebsite')->get(); ?>
            @foreach($rs1 as $value)
            <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-22">
                            <img 
                                src="img/upload/ale/{{ $value->image }}" 
                                alt="thuthuydecal"
                                width="200" height="100"
                            >
                        </div>
                        <div class="footer-contact">
                           {!! $value->content !!}
                        </div>
                    </div>
                </div>
            @endforeach

                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-22">
                            <h4>Thông tin</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="">Trang chủ</a></li>

                                <li><a href="about-us.html">Giới thiệu</a></li>

                                <li><a href="#">Tin tức</a></li>

                                <li><a href="#">Hỗ trợ</a></li>
                                
                                <li><a href="#">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <?php $rs2 = DB::table('ales')->where('key_name', 'thongtincuoiwebsite2')->get(); ?>
                        @foreach($rs2 as $value)
                            <div class="footer-title mb-22">
                                <h4>{{ $value->description }}</h4>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    {!! $value->content !!}
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=340&height=279px&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=346890062928109" width="340" height="260px" style="border:none;overflow:hidden;max-width: 250px;" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area border-top-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-7">
                    <div class="copyright">
                        <p>Copyright © <a href="">Thuthuydecal.</a> . All Right Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-5">
                    <div class="footer-social">
                        <ul>
                            <li><a href="#"><i class="ion-social-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a>
                            </li>
                            <li><a href="#"><i class="ion-social-googleplus-outline"></i></a>
                            </li>
                            <li><a href="#"><i class="ion-social-rss"></i></a>
                            </li>
                            <li><a href="#"><i class="ion-social-dribbble-outline"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modals fade" id="deleteCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa</h5>

                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body" style="margin-left: 150px;">
                    <button type="button" class="btn btn-success delCart">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                <div>
        </div>
    </div>
</div>