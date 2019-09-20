@extends('client.layouts.master')

@section('title', 'About-us')

@section('content')
<div class="breadcrumb-area gray-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="">Trang chủ</a></li>
                <li class="active">Giới thiệu</li>
            </ul>
        </div>
    </div>
</div>

<?php 
    $rs1 = DB::table('ales')->where('key_name', 'thongtingioithieu1')->get(); 
    $rs2 = DB::table('ales')->where('key_name', 'thongtingioithieu2')->get();
    $rs3 = DB::table('ales')->where('key_name', 'thongtingioithieu3')->get();
    $rs4 = DB::table('ales')->where('key_name', 'thongtingioithieu4')->get(); 
?>
@foreach($rs1 as $value)
<div class="about-us-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-5">
                <div class="overview-img text-center">
                    <a href="#">
                        <img src="img/upload/ale/{{ $value->image }}" alt="{{ $value->title }}">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-7 d-flex align-items-center">
                <div class="overview-content-2">
                    {!! $value->content !!}
                    <div class="overview-btn mt-45">
                        <a class="btn-style-2" href="">Xem hàng thôi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="project-count-area gray-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                @foreach($rs2 as $value)
                <div class="single-count text-center mb-30">
                    <div class="count-icon">	
                        <span class="{{ $value->description }}"></span>
                    </div>
                    <div class="count-title" id="count-ti">
                        {!! $value->content !!}
                    </div>
                </div>
                @endforeach
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                @foreach($rs3 as $value)
                <div class="single-count text-center mb-30">
                    <div class="count-icon">	
                        <span class="{{ $value->description }}"></span>
                    </div>
                    <div class="count-title" id="count-ti">
                        {!! $value->content !!}
                    </div>
                </div>
                @endforeach
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                @foreach($rs4 as $value)
                <div class="single-count text-center mb-30">
                    <div class="count-icon">	
                        <span class="{{ $value->description }}"></span>
                    </div>
                    <div class="count-title" id="count-ti">
                        {!! $value->content !!}
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

<div class="skill-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="skill-wrapper">
                    <div class="section-border section-mrg-none mb-45">
                        <div class="section-title-wrap">
                            <h3 class="section-title section-bg-white">Our skills</h3>
                        </div>
                    </div>
                    <div class="skill">
                        <div class="progress">
                            <div class="lead">Marketing</div>
                            <div class="progress-bar wow fadeInLeft" data-progress="50%" style="width: 50%;" data-wow-duration="1.5s" data-wow-delay="1.2s"> <span>50%</span></div>
                        </div>
                        <div class="progress">
                            <div class="lead">Wordpress Theme</div>
                            <div class="progress-bar wow fadeInLeft" data-progress="60%" style="width: 60%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>60%</span> </div>
                        </div>
                        <div class="progress">
                            <div class="lead">Shopify Theme</div>
                            <div class="progress-bar wow fadeInLeft" data-progress="70%" style="width: 70%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>70%</span> </div>
                        </div>	
                        <div class="progress">
                            <div class="lead">UI/UX Design</div>
                            <div class="progress-bar wow fadeInLeft" data-progress="80%" style="width: 80%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>80%</span> </div>
                        </div>												
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="our-work-wrapper">
                    <div class="section-border section-mrg-none mb-45">
                        <div class="section-title-wrap">
                            <h3 class="section-title section-bg-white">Our Work</h3>
                        </div>
                    </div>
                    <div class="work-list">
                        <div class="single-work">
                            <div class="work-number">
                                <span>1</span>
                            </div>
                            <div class="work-content">
                                <h5>LOREM IPSUM DOLOR SIT AMET</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                            </div>
                        </div>
                        <div class="single-work">
                            <div class="work-number">
                                <span>1</span>
                            </div>
                            <div class="work-content">
                                <h5>LOREM IPSUM DOLOR SIT AMET</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                            </div>
                        </div>
                        <div class="single-work">
                            <div class="work-number">
                                <span>1</span>
                            </div>
                            <div class="work-content">
                                <h5>LOREM IPSUM DOLOR SIT AMET</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                            </div>
                        </div>
                        <div class="single-work">
                            <div class="work-number">
                                <span>1</span>
                            </div>
                            <div class="work-content">
                                <h5>LOREM IPSUM DOLOR SIT AMET</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="team-area pt-100">
    
</div>
@endsection