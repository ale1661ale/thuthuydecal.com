@extends('thuthuy.layouts.master')

@section('title', 'Nội dung')

@section('breadcrumb', 'Nội dung')

@section('content')
<div class="card pd-20 pd-sm-40">
    <div class="table-wrapper">
        <h6 class="card-body-title">Quản lý nội dung bài viết</h6>

        <p class="mg-b-10 mg-sm-b-10 float-left">Cung cấp thông tin cơ bản cho nội dung bài viết.</p>

        <a href="{{ route('contents.create') }}"><button class="btn btn-primary float-left">Thêm mới</button></a>

        <form action="{{ url('thuthuy/contents/del') }}" method="post">

            @csrf

            <button class="btn btn-danger btn-xs delete-all float-left" 
                    data-url="" 
                    id="delete_all"
                    onclick="return confirm('Bạn có chắc muốn xoá dữ liệu đã chọn chứ ?')">
                    Xoá tất cả
            </button>

            <table id="contentss_table" class="table display responsive nowrap">
                <thead>

                <tr>
                    <th><input type="checkbox" id="check_all"></th>
                    <th>STT</th>
                    <th>Tên bài viết</th>
                    <th>Tình trạng</th>
                    <th>Thể loại</th>
                    <th>Hành động</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($content as $key => $value)
                    <tr>
                        <td>
                            <input type="checkbox" class="checkbox" value="{{ $value->id }}" name="idContents[]">
                        </td>

                        <td>{{ $key+1 }}</td>

                        <td>
                            {{ $value->title }}
                        </td>

                        <td>
                            @if($value->status == 1)
                                Hiện
                            @else
                                Ẩn
                            @endif
                        </td>
                        
                        <td>{{ $value->contentType->name }}</td>
                        <td>
                            <a href="{{ route('contents.edit', $value->id ) }}" 
                                data-id="{{ $value->id }}" 
                                class="btn btn-success">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        
                            <a href="javascript:void(0)" data-toggle="modal" class="btn btn-danger deleteContent"
                            data-target="#deleteContent"
                            data-id="{{ $value->id }}">
                                <i class="fa fa-eraser" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pull-right">{{ $content->links() }}</div>

        </form>
    </div><!-- table-wrapper -->
</div><!-- card -->

<!-- delete Modal-->
<div class="modal fade" id="deleteContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa</h5>

                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success delContent">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                <div>
        </div>
    </div>
</div>

@endsection