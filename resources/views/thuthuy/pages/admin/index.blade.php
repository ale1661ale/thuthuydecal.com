@extends('thuthuy.layouts.master')

@section('title', 'Danh sách admin')

@section('breadcrumb', 'list admin')

@section('content')
<div class="card pd-20 pd-sm-40">
    <div class="table-wrapper">
        <h6 class="card-body-title">Quản lý admin</h6>

        <p class="mg-b-10 mg-sm-b-10 float-left">Cung cấp thông tin cơ bản cho admin.</p>

        <a href=" {{ route('admins.create') }} "><button class="btn btn-primary float-left">Thêm mới</button></a>

        <table id="admins_table" class="table display responsive nowrap">
            <thead>

            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th>avatar</th>
                <th>Chức danh</th>
                <th>Hành động</th>
            </tr>
            </thead>

            <tbody>
                @foreach($admin as $key => $value)
                <tr>
                    <td>{{ $key+1 }}</td>

                    <td>
                        {{ $value->name }}
                    </td>

                    <td>{{ $value->email }}</td>

                    <td>
                        <img 
                            src="img/upload/user/{{ $value->avatar }}" 
                            alt="{{ $value->name }}" 
                            width="200" 
                            height="120"
                            >
                    </td>

                    <td>
                        @if($value->role == 1)
                            Admin
                        @else
                            User
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('admins.edit', $value->id) }}" data-id="{{ $value->id }}" class="btn btn-success">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>

                        
                            <a href="javascript:void(0)" data-toggle="modal" class="btn btn-danger deleteAdmin"
                            data-target="#deleteAdmin"
                            data-id="{{ $value->id }}">
                                <i class="fa fa-eraser" aria-hidden="true"></i>
                            </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pull-right">{{ $admin->links() }}</div>

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
<div class="modal fade" id="deleteAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa </h5>

                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="margin-left: 183px;">

                    <button type="button" class="btn btn-success delAdmin">Có</button>

                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                <div>
        </div>
    </div>
</div>
@endsection