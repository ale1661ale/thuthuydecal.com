<!-- ##### SIDEBAR LOGO ##### -->
<div class="kt-sideleft-header">
    <div class="kt-logo"><a href="thuthuy">Thuthuy</a></div>
    <div id="ktDate" class="kt-date-today"></div>
    <form method="post" action="{{ route('products.search') }}" >
            @csrf
        <div class="input-group kt-input-search">
            <input type="text" class="form-control search" name="search" placeholder="tìm kiếm...">
            <span class="input-group-btn mg-0">
                <button type="submit" class="btn"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
    <!-- input-group -->
</div><!-- kt-sideleft-header -->