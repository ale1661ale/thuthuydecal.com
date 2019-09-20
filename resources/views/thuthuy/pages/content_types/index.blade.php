@extends('thuthuy.layouts.master')

@section('title', 'Content-types')

@section('breadcrumb', 'Content-types')

@section('content')
<div class="card pd-20 pd-sm-40">
    <div class="table-wrapper">
        <h6 class="card-body-title">Quản lý thể loại nội dung</h6>

        <p class="mg-b-10 mg-sm-b-10 float-left">Cung cấp thông tin cơ bản cho thể loại nội dung.</p>

        <a href="{{ route('content-types.create') }}"><button class="btn btn-primary float-left">Thêm mới</button></a>

        <form action="{{ url('thuthuy/content-types/del') }}" method="post">

        @csrf

            <button class="btn btn-danger btn-xs delete-all float-left" 
                    data-url="" 
                    id="delete_all"
                    onclick="return confirm('Bạn có chắc muốn xoá dữ liệu đã chọn chứ ?')">
                    Xoá tất cả
            </button>

            <table id="content-types_table" class="table display responsive nowrap">
                <thead>

                <tr>
                    <th><input type="checkbox" id="check_all"></th>
                    <th>STT</th>
                    <th>Tên thể loại</th>
                    <th>Tên không dấu</th>
                    <th>Tình trạng</th>
                    <th>Tạo vào lúc</th>
                    <th>Hành động</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($content_type as $key => $value)
                    <tr>
                        <td>
                            <input type="checkbox" class="checkbox" value="{{ $value->id }}" name="idContentTypes[]">
                        </td>

                        <td>{{ $key+1 }}</td>

                        <td>
                            <a href="javscript:void(0)"
                            title="{{ 'Edit '.$value->name }}"
                            class="editContentType"
                            data-toggle="modal" 
                            data-target="#editContentType" 
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

                        <td>
                            <a href="{{ url('/content-types', ['id' => $value->id]) }}" data-toggle="modal" 
                            data-target="#deleteContentType">
                                <button class="btn btn-danger">Xoá</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
            <div class="pull-right">{{ $content_type->links() }}</div>

        </form>
    </div><!-- table-wrapper -->
</div><!-- card -->
<!-- edit modal -->
<div class="modal fade" id="editContentType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:500px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa <span class="contentTypeName"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row" style="margin: 5px">
                    <div class="col-lg-12">
                          <fieldset class="form-group">
                              <label>Tên thể loại :</label>
                              <input class="form-control name" placeholder="Nhập tên cần sửa..." name="name">
                              <div class="error" style="color: red"></div>
                          </fieldset>

                          <div class="form-group">
                              <label>Tình trạng</label>
                              <select class="form-control status" name="status">
                                  <option value="1" class="hien">Hiện thị</option>
                                  <option value="0" class="an">Ẩn</option>
                              </select>
                          </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success updateContentType">Save</button>
                
                <button class="btn btn-secondary cancelUpdateCategory" type="button" data-dismiss="modal">Cancel</button>
            </div>
    	</div>
    </div>
</div>
<!-- delete Modal-->
<div class="modal fade" id="deleteContentType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @foreach($content_type as $value)
            <form action="{{ route('content-types.destroy', $value->id) }}" method="post">
            @endforeach
                @method('delete')

                @csrf

                <div class="modal-header">
                    @foreach($content_type as $value)
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa 
                        <span>{{ $content_type[0]->name }}</span>
                    </h5>
                    @endforeach
                    
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body" style="margin-left: 183px;">

                    <button type="submit" class="btn btn-success">Có</button>

                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                <div>
            </form>
        </div>
    </div>
</div>
@endsection