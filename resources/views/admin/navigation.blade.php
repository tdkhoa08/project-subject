<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-
        target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

        </button>
        <a class="navbar-brand" href="admin/index">Vùng Quản Trị -Quản Lý Bán Bánh</a>
    </div> <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown --> 
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="admin/thongtin"><i class="fa fa-user fa-fw"></i>Thông Tin Người Dùng</a></li>
                <li class="divider"></li>
                <li><a href="admin/dangxuat"><i class="fa fa-sign-out fa-fw"></i> Đăng Xuất</a></li>
            </ul> <!-- /.dropdown-user -->
        </li> <!-- /.dropdown -->
    </ul> <!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
    <li class="sidebar-search">
    <div class="input-group custom-search-form">
        <input type="text" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button class="btn btn-default" type="button">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>
    <!-- /input-group -->
    </li>

    <li><a href="#"><i class="fa fa-dashboard fa-fw"></i>Bảng Điều Khiển</a></li>

    <li><a href="admin/danhsachloai"><i class="fa fa-bar-chart-o fa-fw">
        </i>Phân Loại<span class="fa arrow"> </span></a>

        <ul class="nav nav-second-level">
            <li><a href="admin/danhsachloai">Danh Sách Phân Loại</a></li>
            <li><a href="admin/themloaisp">Thêm Phân Loại</a></li>
        </ul><!-- /.nav-second-level -->
    </li>

    <li><a href="admin/danhsachloai"><i class="fa fa-cube fa-fw"></i> Sản Phẩm<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="admin/danhsachsp">Danh Sách Sản Phẩm</a></li>
            <li><a href="admin/themsp">Thêm sản phẩm</a></li>
        </ul><!-- /.nav-second-level -->
    </li>

    <li><a href="admin/danhsachkh"><i class="fa fa-users fa-fw"></i>Khách Hàng<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="admin/danhsachkh">Danh Sách Khách hàng</a></li>
            <li><a href="admin/lietkedonhang">Quản lý đơn hàng</a></li>
        </ul><!-- /.nav-second-level -->
    </li>
</ul>
</div><!-- /.sidebar-collapse -->
</div><!-- /.navbar-static-side -->
</nav>