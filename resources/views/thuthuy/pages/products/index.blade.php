@extends('thuthuy.layouts.master')

@section('title', 'Products')

@section('breadcrumb', 'Products')

@section('content')
<div class="card pd-20 pd-sm-40">
    <div class="table-wrapper">
        @if(isset($details))
        <a href="{{ route('products.index') }}" style="float: left;"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        <h5 class="pd-l-20"> Kết quả tìm kiếm của <b> {{ $query }} </b> là :</h5>
        <table id="products_table" class="table display responsive nowrap">
            <thead>

            <tr>
                <th><input type="checkbox" id="check_all"></th>
                <th>STT</th>
                <th>Tên dm</th>
                <th>Hình ảnh</th>
                <th>Tình trạng</th>
                <th>Tạo vào lúc</th>
                <th>Hành động</th>
            </tr>
            </thead>

            <tbody>
                @foreach($details as $key => $value)
                <tr>
                    <td>
                        <input type="checkbox" class="checkbox" value="{{ $value->id }}" name="idProducts[]">
                    </td>

                    <td>{{ $key+1 }}</td>

                    <td>
                        <a href="javscript:void(0)"
                        title="{{ 'Edit '.$value->name }}"
                        class="editProduct"
                        data-toggle="modal" 
                        data-target="#editProduct" 
                        data-id="{{ $value->id }}">{{ $value->name }}
                        </a>
                    </td>

                    <td>
                        <img src="img/upload/product/{{ $value->image }}" alt="{{ $value->name }}" width="200" height="120">
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
                        <a href="{{ route('products.details', $value->id) }}" data-id="{{ $value->id }}" class="btn btn-success">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                    
                        <a href="{{ url('/thuthuy/products', ['id' => $value->id]) }}" data-toggle="modal" 
                        data-target="#deleteProduct">
                            <button class="btn btn-danger"><i class="fa fa-eraser" aria-hidden="true"></i></button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @elseif (isset($message))
            <a href="{{ route('products.index') }}" style="float: left;">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
            <span class="pd-l-20">{{ $message }}</span>

        @else

        <h6 class="card-body-title">Quản lý sản phẩm</h6>

        <p class="mg-b-10 mg-sm-b-10 float-left">Cung cấp thông tin cơ bản cho sản phẩm.</p>

        <a href="{{ route('products.create') }}"><button class="btn btn-primary float-left">Thêm mới</button></a>

        <div class="form-search float-right" style="transform: translateY(-10px);">
            <form action="{{ route('products.search')}}" method="post" role="search">
                @csrf
                <div class="input-group">
                    <input class="thuthuy-search" type="text" name="search" placeholder="Search..">
                    <button type="submit" class="btn btn-search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </form>
        </div>

        <form action="{{ url('thuthuy/products/del') }}" method="post">
        @csrf

        <button class="btn btn-danger btn-xs delete-all float-left" 
                data-url="" 
                id="delete_all"
                onclick="return confirm('Bạn có chắc muốn xoá sản phẩm đã chọn chứ ?')">
                Xoá tất cả
        </button>

        <table id="products_table" class="table display responsive nowrap">
            <thead>

            <tr>
                <th><input type="checkbox" id="check_all"></th>
                <th>STT</th>
                <th>Tên dm</th>
                <th>Hình ảnh</th>
                <th>Tình trạng</th>
                <th>Tạo vào lúc</th>
                <th>Hành động</th>
            </tr>
            </thead>

            <tbody>
                @foreach($product as $key => $value)
                <tr>
                    <td>
                        <input type="checkbox" class="checkbox" value="{{ $value->id }}" name="idProducts[]">
                    </td>

                    <td>{{ $key+1 }}</td>

                    <td>
                        <a href="javscript:void(0)"
                        title="{{ 'Edit '.$value->name }}"
                        class="editProduct"
                        data-toggle="modal" 
                        data-target="#editProduct" 
                        data-id="{{ $value->id }}">{{ $value->name }}
                        </a>
                    </td>

                    <td>
                        <img src="img/upload/product/{{ $value->image }}" alt="{{ $value->name }}" width="200" height="120">
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
                        <a href="{{ route('products.details', $value->id) }}" data-id="{{ $value->id }}" class="btn btn-success">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                    
                        <a href="javascript:void(0)" data-toggle="modal" class="deleteProduct"
                        data-target="#deleteProduct"
                        data-id="{{ $value->id }}">
                            <button class="btn btn-danger"><i class="fa fa-eraser" aria-hidden="true"></i></button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-right">{{ $product->links() }}</div>
        </form>
        @endif
    </div><!-- table-wrapper -->
</div><!-- card -->
<!-- edit modal -->
<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left: 183px;">
                <button type="button" class="btn btn-success delProduct">Có</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
            <div>
        </div>
    </div>
</div>

@endsection