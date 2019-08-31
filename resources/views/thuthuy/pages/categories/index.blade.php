@extends('thuthuy.layouts.master')

@section('title', 'Categories')

@section('breadcrumb', 'Categories')

@section('title-content', 'Danh mục')

@section('content')
<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">Quản lý Danh mục</h6>
    <p class="mg-b-10 mg-sm-b-30">Cung cấp thông tin cơ bản cho danh mục.
        <a href="{{ route('categories.create') }}" class="float-right"><button class="btn btn-primary">Thêm mới</button></a>
    </p>
    
    <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên dm</th>
                <th>Tên không dấu</th>
                <th>Tình trạng</th>
                <th>Tạo vào lúc</th>
            </tr>
            </thead>
            <tbody>
                @foreach($category as $key => $value)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        <a href="javscript:void(0)"
                        title="{{ 'Edit '.$value->name }}"
                        class="editCategory"
                        data-toggle="modal" 
                        data-target="#editCategory" 
                        data-id="{{ $value->id }}">{{ $value->name }}
                        </a>
                    </td>
                    <td>{{ $value->slug }}</td>
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
    </div><!-- table-wrapper -->
</div><!-- card -->
<!-- edit modal -->
<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:500px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa <span class="categoryName"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin: 5px">
                    <div class="col-lg-12">
                          <fieldset class="form-group">
                              <label>Name :</label>
                              <input class="form-control name" placeholder="Nhập tên cần sửa..." name="name">
                              <div class="error" style="color: red"></div>
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
                <button type="button" class="btn btn-success updateCategory">Save</button>
                <button type="reset" class="btn btn-primary">Làm Lại</button>
                <button class="btn btn-secondary cancelUpdateCategory" type="button" data-dismiss="modal">Cancel</button>
            </div>
    	</div>
    </div>
</div>
<!-- delete Modal-->
<div class="modal fade" id="deleteCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa <span class="categoryName"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left: 183px;">
                <button type="button" class="btn btn-success delCategory">Có</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
            <div>
        </div>
    </div>
</div>
@endsection