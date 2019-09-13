@extends('thuthuy.layouts.master')

@section('title', 'Thông tin chung')

@section('breadcrumb', 'thông tin chung')

@section('content')
<div class="card pd-20 pd-sm-40">
    <div class="table-wrapper">
        <h6 class="card-body-title">Quản lý các thông tin trong trang client</h6>

        <p class="mg-b-10 mg-sm-b-10 float-left">Cung cấp thông tin cơ bản cho một thông tin.</p>

        <a href="{{ route('ales.create') }}"><button class="btn btn-primary float-left">Thêm mới</button></a>

        <form action="{{ url('thuthuy/ales/del') }}" method="post">

        @csrf

        <button class="btn btn-danger btn-xs delete-all float-left" 
                data-url="" 
                id="delete_all"
                onclick="return confirm('Bạn có chắc muốn xoá danh mục đã chọn chứ ?')">
                Xoá tất cả
        </button>

        <table id="ales_table" class="table display responsive nowrap">
            <thead>

            <tr>
                <th><input type="checkbox" id="check_all"></th>

                <th>STT</th>

                <th>Tiêu đề</th>

                <th>key_name</th>

                <th>Hình ảnh</th>

                <th>Mô tả</th>

                <th>Nội dung</th>

                <th>Tình trạng</th>

                <th>Hành động</th>
            </tr>
            </thead>

            <tbody>
                @foreach($ale as $key => $value)
                <tr>
                    <td>
                        <input type="checkbox" class="checkbox" value="{{ $value->id }}" name="idAles[]">
                    </td>

                    <td>{{ $key+1 }}</td>

                    <td>
                        <a href="javscript:void(0)"
                        title="{{ 'Edit '.$value->name }}"
                        class="editAle"
                        data-toggle="modal" 
                        data-target="#editAle" 
                        data-id="{{ $value->id }}">{{ $value->title }}
                        </a>
                    </td>

                    <td style="color:#ba0645">{{ $value->key_name }}</td>

                    <td>
                        <img src="img/upload/ale/{{ $value->image }}" alt="{{ $value->name }}" width="200" height="120">
                    </td>

                    <td>{{ $value->description }}</td>

                    <td>{{ $value->content }}</td>

                    <td>
                        @if($value->status == 1)
                            Hiện
                        @else
                            Ẩn
                        @endif
                    </td>
                    
                    <td>
                        <a href="{{ url('/ales', ['id' => $value->id]) }}" data-toggle="modal" 
                            data-target="#deleteAle" data-id="{{ $value->id }}" 
                            class="deleteAle">
                            <button class="btn btn-danger">Xoá</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-right">{{ $ale->links() }}</div>
        </form>
    </div><!-- table-wrapper -->
</div><!-- card -->
<!-- edit modal -->
<div class="modal fade" id="editAle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:600px">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa 
                    <span class="aleName"></span>
                </h5>

                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form id="updateAle" enctype="multipart/form-data" method="post">

                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">

                            <fieldset class="form-group">
                                <label>Tiêu đề :</label>
                                <input class="form-control title" placeholder="Nhập tiêu đề cần sửa..." name="title">
                                <div class="alert alert-danger errorTitle"></div>
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Key_name :</label>
                                <input class="form-control key_name" name="key_name" readonly>
                            </fieldset>

                            <img class="img img-thumbnail imageThum" width="100" height="100" lign="center">
                            <fieldset class="form-group">
                                <label>Hình ảnh :</label>
                                <input class="form-control image" type="file" name="image">
                                <div class="alert alert-danger errorImage"></div>
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Mô tả :</label>
                                <input class="form-control description" name="description" placeholder="Bạn có muốn thêm mô tả ?">
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Nội dung :</label>
                                <textarea class="form-control content" 
                                    rows="10" cols="10" 
                                    name="content" id="demon">
                                </textarea>
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

                    <button type="submit" class="btn btn-success updateAle">Save</button>

                    <button class="btn btn-secondary cancelUpdateCategory" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </form>
    	</div>
    </div>
</div>
<!-- delete Modal-->
<div class="modal fade" id="deleteAle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa 
                    <span class="aleName"></span>
                </h5>

                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body" style="margin-left: 183px;">

                <button type="button" class="btn btn-success delAle">Có</button>

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
            <div>
        </div>
    </div>
</div>

@endsection