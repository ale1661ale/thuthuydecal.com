@extends('thuthuy.layouts.master')

@section('title', @$product->name)

@section('breadcrumb', @$product->name)

@section('content')
<div class="card pd-20 pd-sm-40">
    <div class="inline-block">
        <a href="{{ route('products.index') }}" style="float:left;font-size: 22px;transform: translateY(-10px);">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
        <h6 class="card-body-title pd-l-30">Thông tin chi tiết của: {{ $product->name }}</h6>
    </div>
    
    <div class="form-layout">
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="row mg-b-25">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Tên sản phẩm: </label>
                    <input class="form-control name" 
                           type="text" 
                           name="name" 
                           value="{{ old('name', $product->name) ? : '' }}"
                    >
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Tên không dấu: </label>
                    <p class="form-control slug" name="slug">{{ $product->slug }}</p>
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Số lượng: </label>
                    <input class="form-control quantity" 
                            type="number" 
                            name="quantity" 
                            value="{{ old('quantity', $product->quantity) ? : '1' }}"
                    >
                    @error('quantity')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- col-4 -->

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Đơn giá: </label>
                    <input class="form-control price" 
                           type="number" 
                           name="price" 
                           value="{{ old('price', $product->price) ? : '0' }}"
                    >
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- col-4 -->

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Giá khuyến mãi: </label>
                    <input class="form-control promotion" 
                           type="number" 
                           name="promotion" 
                           value="{{ old('promotion', $product->promotion) ? : '0' }}"
                    >
                    @error('promotion')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- col-4 -->

            <div class="col-lg-4">
                <label class="form-control-label">Ảnh minh hoạ: </label>
                <img src="img/upload/product/{{ $product->image }}" 
                class="img img-thumbnail imageThum" 
                width="200" height="100" style="margin-left:15%"
                lign="center" title="{{ old('name', $product->name )}}"
                >
            </div>
            <!-- col-4 -->

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">
                        @if (isset($product->image))
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

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Từ khoá: </label>
                    <p class="form-control key_word" name="key_word">{{ $product->key_word }}</p>
                </div>
            </div>
            <!-- col-4 -->

            <div class="col-lg-8">
                <div class="form-group">
                    <label class="form-control-label">Mô tả: </label>
                    <input class="form-control description" 
                           type="text" 
                           name="description"
                           value="{{ old('description', $product->description) ? : '' }}"
                           placeholder="{{ old('description', $product->description) ? : 'Bạn có muốn thêm mô tả ?'}}"
                    >
                </div>
            </div>
            <!-- col-8 -->

            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Nội dung: </label>
                    <textarea class="form-control content" rows="10" cols="10" name="content" id="demon">
                        {{ old('content', $product->content) ? : '' }}
                    </textarea>
                </div>
            </div>
            <!-- col-12 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Hot: </label>
                    <select class="form-control" name="hot">
                        <option value="0"  {{ $product->hot == 0 ? 'selected' : '' }} class="thuong">Sản phẩm thường</option>
                        <option value="1"  {{ $product->hot == 1 ? 'selected' : '' }} class="noibat">Sản phẩm nổi bật</option>
                        <option value="2"  {{ $product->hot == 2 ? 'selected' : '' }} class="banchay">Sản phẩm bán chạy</option>
                        <option value="3"  {{ $product->hot == 3 ? 'selected' : '' }} class="moi">Sản phẩm mới</option>
                    </select>
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Status: </label>
                    <select class="form-control" name="status">
                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }} class="hien">Hiển thị</option>
                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }} class="an">Ẩn</option>
                    </select>
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Danh mục: </label>
                    <p class="form-control id_cate" name="id_cate">{{ $product->Category->name }}</p>
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Thể loại: </label>
                    <p class="form-control id_protype" name="id_protype">{{ $product->productType->name }}</p>
                </div>
            </div>
            <!-- col-6 -->

            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Cập nhật gần đây nhất: </label>
                    <p class="form-control updated_at" name="updated_at">{{ $product->updated_at }}</p>
                </div>
            </div>
            <!-- col-6 -->

        </div>
        <!-- row -->
        <div class="form-layout-footer">
            <button type="submit" class="pure-button fuller-button blue" name="create" value="one">Cập nhật mới</button>

            <a href="{{ route('products.index') }}">
                <button type="button" class="pure-button fuller-button red">Huỷ</button>
            </a>
        </div>
        <!-- form-layout-footer -->
        </form>
    </div><!-- form-layout -->
</div><!-- card -->
@endsection