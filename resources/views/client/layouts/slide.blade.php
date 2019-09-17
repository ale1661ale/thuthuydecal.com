<?php $rs1 = DB::table('slides')->where('status', 1)->get(); ?>
<div class="slider-area">
    <div class="slider-active owl-dot-style owl-carousel">

        @foreach($rs1 as $value)
            <div 
                class="single-slider pt-330 bg-img" 
                style="background-image:url(img/upload/ale/{{ $value->image }} );"
            >
                <div class="container">
                    <div class="slider-content slider-animated-1">
                        <div class="rgba">
                            <div class="half-width">
                                <h2 class="animated">{{ $value->description }}</h2>
                                <h4 class="animated">{{ $value->content }}</h4>
                                <div class="slider-btn mt-50">
                                    <a class="animated" href="#">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>