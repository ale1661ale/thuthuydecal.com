@extends('thuthuy.layouts.master')

@section('title', 'Product-types')

@section('breadcrumb', 'Product-types')

@section('content')
<div class="card pd-20 pd-sm-40">
    <div class="table-wrapper">
        <h6 class="card-body-title">Quản lý thể loại</h6>

        <p class="mg-b-10 mg-sm-b-10 float-left">Cung cấp thông tin cơ bản cho thể loại.</p>

        <a href="{{ route('product-types.create') }}"><button class="btn btn-primary float-left">Thêm mới</button></a>

        <form action="{{ url('thuthuy/product-types/del') }}" method="post">
        @csrf

        <button class="btn btn-danger btn-xs delete-all float-left" 
                data-url="" 
                id="delete_all"
                onclick="return confirm('Bạn có chắc muốn xoá thể loại đã chọn chứ ?')">
                Xoá tất cả
        </button>

        <table id="product_types_table" class="table display responsive nowrap">
            <thead>

            <tr>
                <th><input type="checkbox" id="check_all"></th>
                <th>STT</th>
                <th>Tên tl</th>
                <th>Danh mục</th>
                <th>hot</th>
                <th>Trạng thái</th>
                <th>Tạo vào lúc</th>
                <th>Hành động</th>
            </tr>
            </thead>

            <tbody>
                @foreach($productType as $key => $value)
                <tr>
                    <td>
                        <input type="checkbox" class="checkbox" value="{{ $value->id }}" name="idCategories[]">
                    </td>
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
                    <td>{{ $value->Category->name }}</td>
                    <td>
                        @if ($value->hot == 0)
                            Thể loại thường
                        @else
                            Thể loại nổi bật
                        @endif
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
                        <a href="{{ url('/categories', ['id' => $value->id]) }}" data-toggle="modal" 
                        data-target="#deleteCategory">
                        <button class="btn btn-danger"><i class="fa fa-eraser pd-r-10" aria-hidden="true"></i>Xoá</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-right">{{ $productType->links() }}</div>
        </form>
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


@endsection