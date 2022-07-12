<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ url('/admin') }}" class="d-block">Bảng điều khiển</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <div class="info">
                <a href="#" class="d-block">Quản lý hệ thống</a>
            </div>
            <li class="nav-item">
                <a href="{{ url('/admin') }}" class="nav-link">
                    <i class="fas fa-chart-line"></i>
                    <p>
                        Bảng điều khiển
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/hoc-vien/') }}" class="nav-link">
                    <i class="fa fa-graduation-cap"></i>
                    <p>Học viên</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/mon-hoc/') }}" class="nav-link">
                    <i class="fa fa-book"></i>
                    <p>Môn học</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/lop-hoc/') }}" class="nav-link">
                    <i class="fa fa-table"></i>
                    <p>Lớp học</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/qua-trinh-hoc/') }}" class="nav-link">
                    <i class="fa fa-chart-bar"></i>
                    <p>Quá trình học</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/hoc-phi/') }}" class="nav-link">
                    <i class="fa fa-money-bill"></i>
                    <p>Học phí</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/giang-vien/') }}" class="nav-link">
                    <i class="fa fa-chalkboard-teacher"></i>
                    <p>Giảng viên</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/voucher/') }}" class="nav-link">
                    <i class="fa fa-gifts"></i>
                    <p>Khuyến mại</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/canh-bao/') }}" class="nav-link">
                    <i class="fa fa-exclamation-triangle"></i>
                    <p>Cảnh báo</p>
                </a>
            </li>
            <br>
            <div class="info">
                <a href="#" class="d-block">Quản lý website</a>
            </div>
            <li class="nav-item">
                <a href="{{ url('/admin/canh-bao/') }}" class="nav-link">
                    <i class="fa fa-pager"></i>
                    <p>Quản lý bài viết</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/canh-bao/') }}" class="nav-link">
                    <i class="fa fa-images"></i>
                    <p>Quản lý sliders</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/canh-bao/') }}" class="nav-link">
                    <i class="fa fa-envelope-open-text"></i>
                    <p>Quản lý slogan</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
