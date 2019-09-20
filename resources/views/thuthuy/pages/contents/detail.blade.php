@extends('thuthuy.layouts.master')

@section('title', @$content->title)

@section('breadcrumb', @$content->title)

@section('content')
<div class="card pd-20 pd-sm-40">
    <div class="inline-block">
        <a href="{{ route('contents.index') }}" style="float:left;font-size: 22px;transform: translateY(-10px);">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
        <h6 class="card-body-title pd-l-30">Thông tin chi tiết của: {{ $content->title }}</h6>
    </div>
    
    <div class="form-layout">
        <form action="{{ route('contents.update', $content->id) }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="row mg-b-25">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Tiêu đề bài viết: (phãi trùng với tên banner) </label>
                    <input class="form-control title" 
                           type="text" 
                           name="title" 
                           value="{{ old('title', $content->title) ? : '' }}"
                    >
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Tên không dấu: </label>
                    <p class="form-control slug" name="slug">{{ $content->slug }}</p>
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-4">
                <label class="form-control-label">Ảnh minh hoạ: </label>
                <img src="img/upload/content/{{ $content->image }}" 
                class="img img-thumbnail imageThum" 
                width="200" height="100" style="margin-left:15%"
                lign="center" title="{{ old('title', $content->title )}}"
                >
            </div>
            <!-- col-4 -->

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">
                        @if (isset($content->image))
                            Thay đổi ảnh
                        @else
                            Nhập ảnh sản phẩm
                        @endif
                    </label>
                    <input class="form-control image" 
                           type="file" 
                           name="image"
                    >
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- col-4 -->

            <div class="col-lg-8">
                <div class="form-group">
                    <label class="form-control-label">Mô tả: </label>
                    <input class="form-control description" 
                           type="text" 
                           name="description"
                           value="{{ old('description', $content->description) ? : '' }}"
                           placeholder="{{ old('description', $content->description) ? : 'Bạn có muốn thêm mô tả ?'}}"
                    >
                </div>
            </div>
            <!-- col-8 -->

            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Nội dung: </label>
                    <textarea class="form-control content" rows="10" cols="10" name="content" id="demon">
                        {{ old('content', $content->content) ? : '' }}
                    </textarea>
                </div>
            </div>
            <!-- col-12 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Thể loại: </label>
                    <select class="form-control" name="id_content_type">
                    @foreach ($content_type as $key => $value)
                        <option value="{{ $value->id }}" {{ ( $value->id == $content->id_content_type) ? 'selected' : '' }}> 
                            {{ $value->name }} 
                        </option>
                    @endforeach 
                    </select>
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Status: </label>
                    <select class="form-control" name="status">
                        <option value="1" {{ $content->status == 1 ? 'selected' : '' }} class="hien">Hiển thị</option>
                        <option value="0" {{ $content->status == 0 ? 'selected' : '' }} class="an">Ẩn</option>
                    </select>
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Cập nhật gần đây nhất: </label>
                    <p class="form-control updated_at" name="updated_at">{{ $content->updated_at }}</p>
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Tạo vào lúc : </label>
                    <p class="form-control created_at" name="created_at">{{ $content->created_at }}</p>
                </div>
            </div>
            <!-- col-6 -->

        </div>
        <!-- row -->
        <div class="form-layout-footer">
            <button type="submit" class="pure-button fuller-button blue" name="create" value="one">Cập nhật mới</button>

            <a href="{{ route('contents.index') }}">
                <button type="button" class="pure-button fuller-button red">Huỷ</button>
            </a>
        </div>

        </form>
    </div><!-- form-layout -->
</div><!-- card -->
@endsection