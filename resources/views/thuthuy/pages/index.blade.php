@extends('thuthuy.layouts.master')

@section('title', 'Home')

@section('breadcrumb', 'Home')

@section('content')
    <div class="kt-pagebody">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="row row-sm">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body pd-b-0">
                                <h6 class="card-body-title tx-12 tx-spacing-2 mg-b-20 tx-success">Page Impressions</h6>
                                <h2 class="tx-lato tx-inverse">323,360</h2>
                                <p class="tx-12"><span class="tx-success">2.5%</span> change from yesterday</p>
                            </div>
                            <!-- card-body -->
                            <div id="rs1" class="ht-50 ht-sm-70 mg-r--1"></div>
                        </div>
                        <!-- card -->
                    </div>
                    <!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body pd-b-0">
                                <h6 class="card-body-title tx-12 tx-spacing-2 mg-b-20 tx-danger">Page Impressions</h6>
                                <h2 class="tx-lato tx-inverse">674,221</h2>
                                <p class="tx-12"><span class="tx-success">2.5%</span> change from yesterday</p>
                            </div>
                            <!-- card-body -->
                            <div id="rs2" class="ht-50 ht-sm-70 mg-r--1"></div>
                        </div>
                        <!-- card -->
                    </div>
                    <!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body pd-b-0">
                                <h6 class="card-body-title tx-12 tx-spacing-2 mg-b-20 tx-danger">Page Impressions</h6>
                                <h2 class="tx-lato tx-inverse">674,221</h2>
                                <p class="tx-12"><span class="tx-success">2.5%</span> change from yesterday</p>
                            </div>
                            <!-- card-body -->
                            <div id="rs2" class="ht-50 ht-sm-70 mg-r--1"></div>
                        </div>
                        <!-- card -->
                    </div>
                    <!-- col-4 -->

                </div>
                <!-- row -->

            </div>
            <!-- col-8 -->
            <div class="col-lg-8 mg-t-20">
                <div class="card-header d-flex justify-content-between">
                    <span class="tx-uppercase tx-12 tx-medium tx-inverse">Recent Messages</span>
                    <a href="" class="tx-gray-600"><i class="icon ion-more"></i></a>
                </div>
                <!-- card-header -->

                <div class="card mg-t-20">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="media">
                                <img src="assets/thuthuy/img/img1.jpg" class="wd-30 rounded-circle" alt="">
                                <div class="media-body mg-l-10">
                                    <h6 class="mg-b-0 tx-inverse tx-13">Katherine Lumaad</h6>
                                    <p class="mg-b-0 tx-gray-500 tx-12">an hour ago</p>
                                </div>
                                <!-- media-body -->
                            </div>
                            <!-- media -->
                            <p class="mg-t-10 mg-b-0 tx-13">The European languages are members of the same family. Their separate existence is a myth...</p>
                        </div>
                        <!-- list-group-item -->
                    </div>
                    <!-- list-group -->
                    <div class="card-footer"></div>
                    <!-- card-footer -->
                </div>
                <!-- card -->

            </div>
            <!-- col-4 -->
        </div>
        <!-- row -->
    </div>
    <!-- kt-pagebody -->
@endsection