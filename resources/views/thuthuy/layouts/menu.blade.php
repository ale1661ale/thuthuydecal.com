<!-- ##### SIDEBAR MENU ##### -->
<div class="kt-sideleft">
    <label class="kt-sidebar-label">Navigation</label>
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
        <li class="nav-item"><a href="table-basic.html" class="nav-link">Basic Table</a></li>
        <li class="nav-item"><a href="table-datatable.html" class="nav-link">Data Table</a></li>
        </ul>
    </li><!-- nav-item -->

    <li class="nav-item">
        <a href="" class="nav-link with-sub">
        <i class="ionicons ion-android-contact"></i>
        <span>Khách hàng liên hệ</span>
        </a>
        <ul class="nav-sub">
        <li class="nav-item"><a href="table-basic.html" class="nav-link">Basic Table</a></li>
        <li class="nav-item"><a href="table-datatable.html" class="nav-link">Data Table</a></li>
        </ul>
    </li><!-- nav-item -->

    <li class="nav-item">
        <a href="widgets.html" class="nav-link">
        <i class="ionicons ion-beer"></i>
        <span>Thông tin chung</span>
        </a>
    </li><!-- nav-item -->
    </ul>
</div><!-- kt-sideleft -->