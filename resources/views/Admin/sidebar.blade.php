<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="/admin">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Trang chủ
                </a>
                <div class="sb-sidenav-menu-heading">Quản trị</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Quản lý Tỉnh thành
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/admin/province/list">Danh sách</a>
                            <a class="nav-link" href="/admin/province/add">Thêm mới</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Quản lý Địa danh
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/admin/famousplace/list">Danh sách</a>
                            <a class="nav-link" href="/admin/famousplace/add">Thêm mới</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Đăng nhập bởi:</div>
            @php
                $login = Session::get('LoggedUser');
                $name = Session::get('name');
            @endphp
            @if(is_null($login))
                <a class="nav-link" href="/admin/users/login">Vui lòng đăng nhập</a>
            @else
                @if($name)
                    {{$name}}
                @else
                    Lỗi
                @endif
            @endif
        </div>
    </nav>
</div>