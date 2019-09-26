<!-- ##### SIDEBAR MENU ##### -->
<div class="kt-sideleft">

    <ul class="nav kt-sideleft-menu">

        <li class="nav-item">
            <a href="thuthuy" class="nav-link">
            <i class="icon ion-ios-home-outline"></i>
            <span>Trang Chủ</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('introduces.index') }}" class="nav-link">
                <i class="icon ion-laptop"></i>
                <span>Giới thiệu</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="" class="nav-link with-sub">
                <i class="ionicons ion-ios-albums-outline"></i>
                <span>Sản phẩm</span>
            </a>
            <ul class="nav-sub">
                <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link">Danh mục</a></li>
                <li class="nav-item"><a href="{{ route('product-types.index') }}" class="nav-link">Thể loại</a></li>
                <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link">Danh sách sản phẩm</a></li>
            </ul>
        </li><!-- nav-item -->

        <li class="nav-item">
            <a href="" class="nav-link with-sub">
                <i class="ionicons ion-social-buffer-outline"></i>
                <span>Nội dung</span>
            </a>
            <ul class="nav-sub">
                <li class="nav-item"><a href="{{ route('content-types.index') }}" class="nav-link">Thể loại nội dung</a></li>
                <li class="nav-item"><a href="{{ route('contents.index') }}" class="nav-link">Danh sách nội dung</a></li>
            </ul>
        </li><!-- nav-item -->

        <li class="nav-item">
            <a href="" class="nav-link with-sub">
                <i class="ionicons ion-android-contact"></i>
                <span>Khách hàng liên hệ</span>
            </a>
            <ul class="nav-sub">
                <li class="nav-item"><a href="{{ route('customer-messages.index') }}" class="nav-link">Danh sách tin nhắn</a></li>
                <li class="nav-item"><a href="table-datatable.html" class="nav-link">Data Table</a></li>
            </ul>
        </li><!-- nav-item -->

        <li class="nav-item">
            <a href="" class="nav-link with-sub">
                <i class="ionicons ion-beer"></i>
                <span>Thông tin chung</span>
            </a>
            <ul class="nav-sub">
                <li class="nav-item"><a href="{{ route('image-types.index') }}" class="nav-link">Thể loại ảnh</a></li>
                <li class="nav-item"><a href="{{ route('ales.index') }}" class="nav-link">Thông tin trong website</a></li>
            </ul>
        </li><!-- nav-item -->

        <li class="nav-item">
            <a href="" class="nav-link with-sub">
                <i class="ionicons ion-beer"></i>
                <span>Bán hàng</span>
            </a>
            <ul class="nav-sub">
                <li class="nav-item"><a href="{{ route('image-types.index') }}" class="nav-link">Thể loại ảnh</a></li>
                <li class="nav-item"><a href="{{ route('ales.index') }}" class="nav-link">Thông tin trong website</a></li>
            </ul>
        </li><!-- nav-item -->

    </ul>

</div><!-- kt-sideleft -->