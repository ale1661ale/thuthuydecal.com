@extends('thuthuy.layouts.master')

@section('title', 'Banner')

@section('breadcrumb', 'banner')

@section('content')
<div class="card pd-20 pd-sm-40">
    <div class="table-wrapper">

        <a  
            href="thuthuy/image-types"
            style="float:left;font-size: 22px;transform: translateY(-10px);"
            class="mg-r-10">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>

        <h6 class="card-body-title">Quản lý banner quảng cáo</h6>

        <p class="mg-b-10 mg-sm-b-10 float-left">Cung cấp thông tin cơ bản cho banner quảng cáo.</p>

        <a href="{{ route('banners.create') }}"><button class="btn btn-primary float-left">Thêm mới</button></a>

        <form action="{{ url('thuthuy/banners/del') }}" method="post">

            @csrf

            <button class="btn btn-danger btn-xs delete-all float-left" 
                    data-url="" 
                    id="delete_all"
                    onclick="return confirm('Bạn có chắc muốn xoá dữ liệu đã chọn chứ ?')">
                    Xoá tất cả
            </button>

            <table id="banners_table" class="table display responsive nowrap">

                <thead>

                <tr>
                    <th><input type="checkbox" id="check_all"></th>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Key_name</th>
                    <th>Hình ảnh</th>
                    <th>Tình trạng</th>
                    <th>Tạo vào lúc</th>
                    <th>Hành động</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($banner as $key => $value)
                    <tr>
                        <td>
                            <input type="checkbox" class="checkbox" value="{{ $value->id }}" name="idBanners[]">
                        </td>

                        <td>{{ $key+1 }}</td>

                        <td>
                            <a href="javscript:void(0)"
                                title="{{ 'Edit '.$value->name }}"
                                class="editBanner"
                                data-toggle="modal" 
                                data-target="#editBanner" 
                                data-id="{{ $value->id }}">
                                {{ $value->name }}
                            </a>
                        </td>

                        <td style="color:#ba0645;">{{ $value->slug }}</td>

                        <td>
                            <img src="img/upload/ale/{{ $value->image }}" width="210" 
                            height="130" 
                            alt="{{ $value->name }}">
                        </td>

                        <td>
                            @if($value->status == 1)
                                Hiện
                            @else
                                Ẩn
                            @endif
                        </td>

                        <td>{{ $value->created_at }}</td>

                        <td>
                            <a 
                                data-toggle="modal" 
                                data-target="#deleteBanner" data-id="{{ $value->id }}" class="deleteBanner">
                                <button class="btn btn-danger">Xoá</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pull-right">{{ $banner->links() }}</div>

        </form>
    </div><!-- table-wrapper -->
</div><!-- card -->
<!-- edit modal -->
<div class="modal fade" id="editBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:600px">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa </h5>
                
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="updateBanner" enctype="multipart/form-data" method="post">
            
            <div class="modal-body">
                <div class="row" style="margin: 5px">
                    <div class="col-lg-12">

                        <fieldset class="form-group">
                            <label>Tên :</label>
                            <input 
                                class="form-control name" 
                                placeholder="Nhập tên cần sửa..." 
                                name="name"
                            >
                            <div class="alert alert-danger errorName"></div>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>Key_name :</label>
                            <input class="form-control slug" readonly>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>Link :</label>
                            <input class="form-control link" placeholder="Không cần thiết" name="link">
                        </fieldset>

                        <img 
                            class="img img-thumbnail imageThum" 
                            width="200" height="100" style="margin-left:15%"
                            lign="center"
                        >

                        <fieldset class="form-group">
                            <label>Hình ảnh :</label>
                            <input class="form-control image" name="image" type="file">
                            <div class="alert alert-danger errorImage"></div>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>Mô tả :</label>
                            <input 
                                class="form-control description" 
                                placeholder="Nhập mô tả banner" 
                                name="description"
                            >
                        </fieldset>
                        
                        <div class="form-group">
                            <label>Tình trạng :</label>
                            <select class="form-control status" name="status">
                                <option value="1" class="hien">Hiện thị</option>
                                <option value="0" class="an">Ẩn</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success updateBanner">Save</button>

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>

            </form>
    	</div>
    </div>
</div>

<!-- delete Modal-->
<div class="modal fade" id="deleteBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa </h5>

                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body" style="margin-left: 183px;">

                <button type="button" class="btn btn-success delBanner">Có</button>

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
            <div>
        </div>
    </div>
</div>

@endsection