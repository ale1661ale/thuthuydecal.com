<?php 
    $rs1 = DB::table('banners')->where('slug', 'banner-top')->get();
    $rs2 = DB::table('banners')->where('slug', 'banner-top-2')->get();
    $rs3 = DB::table('banners')->where('slug', 'banner-top-3')->get();
?>
<div class="banner-area row-col-decrease pt-100 pb-75 clearfix">
    <div class="container">
        <div class="banner-left-side mb-20">
            <div class="single-banner">
                <div class="hover-style">
                    @foreach($rs1 as $value)
                        <a href="#"><img src="img/upload/ale/{{ $value->image }}" alt="{{ $value->name }}" height="600">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="banner-right-side mb-20">
            <div class="single-banner mb-20">
                <div class="hover-style">
                    @foreach($rs2 as $value)
                        <a href="#"><img src="img/upload/ale/{{ $value->image }}" alt="{{ $value->name }}" height="278">
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="single-banner">
                <div class="hover-style">
                    @foreach($rs3 as $value)
                        <a href="#">
                            <img 
                                src="img/upload/ale/{{ $value->image }}" 
                                alt="{{ $value->name }}" 
                                height="278" 
                                style="margin-top:25px;"
                            >
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>