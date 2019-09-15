@extends('thuthuy.layouts.master')

@section('title', 'Image types')

@section('breadcrumb', 'thể loại ảnh')

@section('content')
<div class="card pd-20 pd-sm-40">
    <div class="table-wrapper">

        <h6 class="card-body-title">Quản lý image type</h6>

        <p class="mg-b-10 mg-sm-b-10 float-left">Cung cấp thông tin cơ bản cho thể loại ảnh.</p>

        <table id="image_types_table" class="table display responsive nowrap">

            <thead>

            <tr>
                <th></th>
                <th>STT</th>
                <th>Tên</th>
                <th>Quản lý</th>
                <th>Tình trạng</th>
                <th>Tạo vào lúc</th>
            </tr>
            </thead>

            <tbody>
                @foreach($image_type as $key => $value)
                <tr>
                    <td></td>
                    
                    <td>{{ $key+1 }}</td>

                    <td>
                        {{ $value->name }}
                    </td>

                    <td>
                        <a href="thuthuy/{{ $value->slug }}s">Quản lý: {{ $value->name }}</a>
                    </td>

                    <td>
                        @if($value->status == 1)
                            Hiện
                        @else
                            Ẩn
                        @endif
                    </td>

                    <td>{{ $value->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pull-right">{{ $image_type->links() }}</div>
    </div><!-- table-wrapper -->
</div><!-- card -->
<!-- edit modal -->
<div class="modal fade" id="editImageType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:500px">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa </h5>
                
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row" style="margin: 5px">
                    <div class="col-lg-12">

                        <fieldset class="form-group">
                            <label>Tên :</label>
                            <input class="form-control name" placeholder="Nhập tên cần sửa..." name="name">
                            <div class="alert alert-danger errorName" style="color: red"></div>
                        </fieldset>
                        
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control status" name="status">
                                <option value="1" class="hien">Hiện thị</option>
                                <option value="0" class="an">Ẩn</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success updateImageType">Save</button>

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
    	</div>
    </div>
</div>
<!-- delete Modal-->
<div class="modal fade" id="deleteImageType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa </h5>

                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body" style="margin-left: 183px;">

                <button type="button" class="btn btn-success delImageType">Có</button>

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
            <div>
        </div>
    </div>
</div>

@endsection