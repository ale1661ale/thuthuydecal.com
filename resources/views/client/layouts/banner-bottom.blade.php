<?php $rs = DB::table('ales')->where('key_name', 'bannerbottom')->get(); ?>
<div class="banner-area pt-20">
    <div class="container">
        @foreach($rs as $value)
        <div 
            class="discount-overlay bg-img-bottom pt-130 pb-130" 
            style="background-image:url(img/upload/ale/{{ $value->image}});"
            alt="{{ $value->title }}"
        >
            <div class="discount-content text-center">
                <h3>{{ $value->description }}</h3>
                {!! $value->content !!}
                <div class="banner-btn">
                    <a href="#">Xem thêm</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>