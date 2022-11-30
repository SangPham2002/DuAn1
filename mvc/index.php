<?php
session_start();

$url = isset($_GET['url']) ? $_GET['url'] : "/";
// phpinfo();
// die;

require_once './app/controllers/HomeController.php';
require_once './app/controllers/UserController.php';
require_once './app/controllers/AdminController.php';
require_once './app/models/BaseModel.php';
require_once './app/models/Product.php';
require_once './app/models/LoaiHang.php';
require_once './app/models/KhachHang.php';
require_once './app/models/BinhLuan.php';
require_once './app/models/ThongKe.php';
require_once './app/models/GopY.php';
require_once './app/models/Banner.php';
require_once './app/models/User.php';
require_once './app/models/DonHang.php';
switch ($url) {
    case '/':
        $page = new HomeController();
        echo $page->index();
        break;
    case 'tim_cua_hang':
        $page = new HomeController();
        echo $page->tim_cua_hang();
        break;
    case 'menu':
        $page = new HomeController();
        echo $page->menu();
        break;
    case 'gioi_thieu':
        $page = new HomeController();
        echo $page->gioi_thieu();
        break;
    case 'cart':
        $page = new HomeController();
        echo $page->cart();
        break;
    case 'shop':
        $page = new HomeController();
        echo $page->shop();
        break;
    case 'detail':
        $page = new HomeController();
        echo $page->detail();
        break;
    case 'admin':
        $page = new AdminController();
        echo $page->loai_hang();
        break;

    case 'admin/loai_hang':
        $page = new AdminController();
        echo $page->loai_hang();
        break;
    case 'admin/san_pham':
        $page = new AdminController();
        echo $page->san_pham();
        break;

    case 'admin/khach_hang':
        $page = new AdminController();
        echo $page->khach_hang();
        break;

    case 'admin/binh_luan':
        $page = new AdminController();
        echo $page->binh_luan();
        break;

    case 'admin/gop_y':
        $page = new AdminController();
        echo $page->gop_y();
        break;
    case 'admin/banner':
        $page = new AdminController();
        echo $page->banner();
        break;
    case 'admin/thong_ke':
        $page = new AdminController();
        echo $page->thong_ke();
        break;

    case 'admin/don_hang':
        $page = new AdminController();
        echo $page->don_hang();
        break;
    case 'login':
        $page = new UserController();
        echo $page->login();
        break;

    default:
        # code...
        break;
}
