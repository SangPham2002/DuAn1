<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../../Du_An_1/mvc/app/views/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../../../Du_An_1/mvc/app/views/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../../../Du_An_1/mvc/app/views/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../../../Du_An_1/mvc/app/views/admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../../Du_An_1/mvc/app/views/admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../../../Du_An_1/mvc/app/views/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../../../Du_An_1/mvc/app/views/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../../../Du_An_1/mvc/app/views/admin/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/css/all.min.css">
  <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/fileCss/admin.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <style>
    table {
      border: 1px solid #343A40;
      border-collapse: collapse;
      width: 100%;
      text-align: center;
      font-weight: 600;

    }

    th {
      border: 1px solid #343A40;
      border-right: 1px solid #fff;
      background-color: #343A40;
      color: white;
      padding: 5px 10px;
    }

    td {
      padding: 10px 0;
      border: 1px solid #ddd;
      border-right: 1px solid inherit;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../../../../Du_An_1/mvc/app/views/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../../../../../Du_An_1/mvc" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Notifications Dropdown Menu -->

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../../../../Du_An_1/mvc/storage/image/logo_footer.png" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Bee Tea</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="#" class="nav-link">

                <i class="nav-icon fas fa-clipboard-list"></i>

                <p>
                  Loại hàng
                  <i class="fas fa-angle-left right"></i>

                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../../../../Du_An_1/mvc/admin/loai_hang?act=add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm loại hàng</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../../../../Du_An_1/mvc/admin/loai_hang?act=list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách loại hàng</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item">
              <a href="#" class="nav-link ">
                <!-- <i class="nav-icon fas fa-chart-pie"></i> -->
                <i class="nav-icon fas fa-coffee"></i>

                <p>
                  Sản phẩm
                  <i class="right fas fa-angle-left"></i>

                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../../../../Du_An_1/mvc/admin/san_pham?act=list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách Sản phẩm</p>

                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../../../../Du_An_1/mvc/admin/san_pham?act=add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm sản phẩm</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">

                <i class="nav-icon fas fa-user"></i>
                <p>
                  Khách hàng
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../../../../Du_An_1/mvc/admin/khach_hang?act=list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách khách hàng</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../../../../Du_An_1/mvc/admin/khach_hang?act=add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm khách hàng</p>
                  </a>
                </li>

              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Bình luận
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../../../../Du_An_1/mvc/admin/binh_luan?act=list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách bình luận</p>
                  </a>
                </li>


              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Thống kê
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../../../../Du_An_1/mvc/admin/thong_ke?act=list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách thống kê</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../../../../Du_An_1/mvc/admin/thong_ke?act=bieu_do" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Biểu đồ thống kê</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Góp ý
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../../../../Du_An_1/mvc/admin/gop_y?act=list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách góp ý</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">

                <i class="nav-icon fas fa-box"></i>
                <p>
                  Banner
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../../../../Du_An_1/mvc/admin/banner?act=list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách banner</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../../../../../Du_An_1/mvc/admin/banner?act=add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm banner</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-truck"></i>

                <p>
                  Đơn hàng
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">
                  <?php
                   $so_don_hang_moi = DonHang::list_don_hang_moi();
                  echo $so_don_hang_moi ?></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../../../../Du_An_1/mvc/admin/don_hang?act=list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách đơn hàng</p>
                  </a>
                </li>

              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Admin</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Admin</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->


        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?= $tong_don_hang ?></h3>

                  <p>Đơn Hàng</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="../../../../../Du_An_1/mvc/admin/don_hang?act=list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?= $tong_san_pham ?></h3>

                  <p>Sản Phẩm</p>
                </div>
                <div class="icon">
                  <!-- <i class="ion ion-stats-bars"></i> -->
                  <i class="nav-icon fas fa-coffee"></i>
                </div>
                <a href="../../../../../Du_An_1/mvc/admin/san_pham?act=list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?= $tong_khach_hang ?></h3>

                  <p>Khách Hàng</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="../../../../../Du_An_1/mvc/admin/khach_hang?act=list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?= $tong_loai_hang ?></h3>

                  <p>Loại hàng</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-clipboard-list"></i>
                </div>
                <a href="../../../../../Du_An_1/mvc/admin/loai_hang?act=list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->


          <!-- Main row -->
          <div class="row">

            <section class="col-lg-12 connectedSortable">

              <?php require_once $VIEWPAGE; ?>
            </section>
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../../../Du_An_1/mvc/app/views/admin/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../../../../Du_An_1/mvc/app/views/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../../../../Du_An_1/mvc/app/views/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../../../../Du_An_1/mvc/app/views/admin/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../../../../Du_An_1/mvc/app/views/admin/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../../../../Du_An_1/mvc/app/views/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../../../../Du_An_1/mvc/app/views/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../../../../Du_An_1/mvc/app/views/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../../../../Du_An_1/mvc/app/views/admin/plugins/moment/moment.min.js"></script>
  <script src="../../../../Du_An_1/mvc/app/views/admin/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../../../../Du_An_1/mvc/app/views/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../../../../Du_An_1/mvc/app/views/admin/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../../../../Du_An_1/mvc/app/views/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../../../Du_An_1/mvc/app/views/admin/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../../../Du_An_1/mvc/app/views/admin/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../../../../Du_An_1/mvc/app/views/admin/dist/js/pages/dashboard.js"></script>
</body>

</html>