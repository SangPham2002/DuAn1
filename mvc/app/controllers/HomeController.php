<?php

class HomeController
{

    public function index()
    {
        $result = Product::select_hh_top_10();
        $banner = Banner::list_banner_by_status();
      
        $hh_by_loai = LoaiHang::list_hang_hoa_theo_loai_home();

         // kiểm tra search
        //  if (isset($_GET['submitSearch']) && !empty($_GET['search'])) {
        //     $search = $_GET['search'];
        //     $products = Product::search_product($_GET['search']);
        //     header("refresh:0.5;url=shop?act=list");
        // }
        include_once './app/views/home.php';
    }

    public function detail()
    {
        extract($_REQUEST);

        // add to cart
        if (isset($_GET['act'])) {
            $act = $_GET['act'];

            switch ($act) {
                case 'add_to_cart':
                    include_once './app/views/pages/gio_hang/add_to_cart.php';



                    echo "<script> alert('Thêm vào giỏ hàng thành công !')</script>";
                    header("refresh:0.1;url=detail?act=chi_tiet_sp&ma_sp=$id");

                    break;
                case 'chi_tiet_sp':
                    // tăng số lượt xem
                    $ma_sp = $_GET['ma_sp'];
                    Product::tang_so_luot_Xem($_GET['ma_sp']);
                    $result = Product::list_hang_hoa_theo_id($_GET['ma_sp']);
                    if (isset($_POST['rating'])) {
                        $star = $_POST['rating'];
                    } else {
                        $star = 0;
                    }
                    foreach ($result as $u) {
                        extract($u);
                        $list_so_sao = Product::so_binh_luan($ma_sp);
                        $tong_so_sao = 0;
                        foreach ($list_so_sao as $value) {
                            $tong_so_sao += $value['so_sao'];
                        }
                    }

                    $so_luong = count($list_so_sao);
                    // var_dump($tong_so_sao);
                    if ($so_luong > 0) {
                        $tb_so_sao = ceil($tong_so_sao / $so_luong);
                        // var_dump($tb_so_sao);
                    }


                    // var_dump($_SESSION['name']);
                    if (isset($_POST['binhluan']) && !empty($_POST['binhluan'])) {
                        $binh_luan = $_POST['binhluan'];
                        $ma_kh = $_SESSION['ma_kh'];
                        // var_dump($star)
                        $ngay_bl = date_format(date_create(), 'Y-m-d H:i:s');
                        $add_bl = BinhLuan::add_binh_luan($ma_kh, $_GET['ma_sp'], $binh_luan, $ngay_bl, $star);
                    }
                    $result_bl = BinhLuan::list_bl_by_ma_hh($_GET['ma_sp']);

                    // thêm vào giỏ hàng
                    if (isset($_POST['add_to_cart'])) {
                        $quantity = $_POST['quantity'];
                        $ma_sp = $_GET['ma_sp'];
                        header("refresh: 0.1;url=detail?act=add_to_cart&id_addtoCart=$ma_sp&quantity=$quantity");
                    }




                    // sản phẩm cùng loại
                    $result_list_hh = Product::list_hang_hoa_theo_loai($maloai);
                    include_once './app/views/chi_tiet_sp.php';
                    break;
                    
                default:
                    # code...
                    break;
            }
        }
    }

    public function shop()
    {
        $list_loai_hang = LoaiHang::list_loai_hang_shop();
        $sp_top_10 = Product::select_hh_top_10();


        // -----------------phân trang ----------------------------
        $tong_so_hh = Product::list__count_hang_hoa();
        // var_dump($tong_so_hh);
        $so_trang = ceil($tong_so_hh / 15);
        // var_dump($so_trang);

        $page = isset($_GET['page']) ? $_GET['page'] : 1;


        // -----------------hiển thị sản phẩm----------------------
        if (isset($_POST['all_product'])) {
            unset($_GET['search']);
            // unset($_GET('submitSearch'));
            header("refresh:0.5;url=shop");
            $products = Product::list_hang_hoa_shop();
        }
        // kiểm tra search
        if (isset($_GET['submitSearch']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $products = Product::search_product($_GET['search']);
            if ($products) {
                $so_sp =  "<h3 class=' m-1' style='color: green;font-weight: 600;'> Tìm thấy " . count($products) . " sản phẩm </h3>";
            } else {
                $so_sp = "<h3 class=' m-1' style='color:red;font-weight: 600;'> Không tìm thấy sản phẩm nào !</h3>";
            }
        } else if (isset($_GET['name_category'])) {
            $name_category = $_GET['name_category'];
            $products = Product::search_product_by_ten_loai($name_category);
        } else if (isset($_GET['search_loai'])) {
            $search_loai = $_GET['search_loai'];
            $products = Product::search_product_by_ten_loai($_GET['search_loai']);
        } else if (isset($_GET['name_product'])) {
            $name_product = $_GET['name_product'];
            $products = Product::list_product_by_ten_hh($_GET['name_product']);
        } else {
            $products = Product::list_hang_hoa_shop();
        }
        include_once "./app/views/shop.php";
    }




    public function tim_cua_hang()
    {
        $error = "";
        if (isset($_POST['gui_ngay'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $cmt = $_POST['cmt'];
            $ngay_nhap = date_format(date_create(), 'Y-m-d H:i:s');
            if ($name == "" || $email == "" || $cmt == "") {
                $error = "Không được để trống thông tin";
            }else{
                $add = GopY::add_gop_y($cmt, $ngay_nhap, $name, $email);
            }
            if (isset($add)) {
                echo "<script> alert('$add')</script>";

                // header("refresh:0.2;url=./app/views/pages/loai_hang/list.php");
            }
        }

        include_once './app/views/tim_cua_hang.php';
    }


    public function cart()
    {

        $error = "";
        extract($_REQUEST);

        if (isset($_GET['act'])) {
            $act = $_GET['act'];

            switch ($act) {
                case 'add_to_cart':
                    include_once './app/views/pages/gio_hang/add_to_cart.php';
                    // header("location:../mvc/");

                    break;
                case 'add_to_cart_shop':
                    include_once './app/views/pages/gio_hang/add_to_cart.php';
                    header("location:../mvc/shop");

                    break;
                case 'cart':

                    // session_destroy();
                    $id = isset($_GET['id_del']) ? (int)$_GET['id_del'] : '';
                    // var_dump($id);
                    if ($id) {
                        if (array_key_exists($id, $_SESSION['cart'])) {
                            unset($_SESSION['cart'][$id]);
                            $_SESSION['success_gio_hang'] = "Xóa sản phẩm thành công !";
                            header("refresh:0.2;url=../mvc/cart?act=cart");
                        }
                    }
                    if (isset($_POST['btn_thanh_toan'])) {
                        if (isset($_POST['check_sp'])) {

                            include_once './app/views/thanh_toan.php';
                        } else {
                            echo "<script> alert('Vui lòng chọn sản phẩm muốn thanh toán')</script>";
                            header("refresh:0.2;url=../mvc/cart?act=cart");
                        }
                    }


                    include_once './app/views/cart.php';
                    break;

                case 'thanh_toan':

                    if (isset($_POST['thanh_toan'])) {
                        // var_dump("Thanh toán thành c");

                        $ho_ten = $_POST['ho_ten'];
                        $phone = $_POST['phone'];
                        $diachi = $_POST['diachi'];
                        $diachi_cu_the = $_POST['diachi_cu_the'];
                        $ngay_mua = date_format(date_create(), 'Y-m-d H:i:s');
                        $trang_thai = 0;
                        $noi_nhan = $_POST['noi_nhan'];
                        // var_dump($noi_nhan);
                        
                      
                        if ($loai_diachi == "Nhà riêng") {
                            $loai_diachi = 1;
                           
                        } else {
                            $loai_diachi = 0;
                        }

                        if ($noi_nhan == "Nội thành") {
                            $noi_nhan = 1;
                            $phi_vc = 10;
                        } else if ($noi_nhan == "Ngoại thành") {
                            $noi_nhan = 2;
                            $phi_vc = 20;
                        }else {
                            $noi_nhan == "";
                        }

                        if ($ho_ten == "" || $phone == "" || $diachi == "" || $diachi_cu_the == "")  {
                            $error = "Không được để trống thông tin";
                        }else if ($noi_nhan == "") {
                            $error = "Bạn chưa chọn nơi nhận";
                        }   else {
            
                            $tong_tien = 0;
                            foreach ($_SESSION['cart'] as $key => $value) {  
                                $dem = (int)$value['qtity'] *  (int)$value['gia'];
                                $tong_tien += $dem;    
                            }
                            $tong_tien = $tong_tien + $phi_vc;
                            // var_dump("tổng tiền = ".$tong_tien);
                            // die;
                            $add_don_hang = DonHang::add_don_hang($_SESSION['ma_kh'], $ngay_mua, $tong_tien, $trang_thai);
                            $ma_don_hang = DonHang::don_hang_new();

                            foreach ($_SESSION['cart'] as $key => $value) {
                                $ma_sp = $key;
                                $ten_sp = $value['ten_sp'];
                                $hinh_sp = $value['hinh'];
                                $so_luong = $value['qtity'];
                                $gia_tien_sp = $value['gia'];
                                // var_dump($diachi_cu_the);
                                // die;
                              
                                $add_chi_tiet_don_hang = DonHang::add_don_hang_chi_tiet($ma_don_hang, $ho_ten, $phone, $diachi, $diachi_cu_the, $loai_diachi, $noi_nhan, $ten_sp, $phi_vc, $so_luong, $hinh_sp, $gia_tien_sp, $ma_sp );
                               
                            }
                           
                            if (isset($add_chi_tiet_don_hang)) {
                                echo "<script> alert('$add_don_hang')</script>";
                                // unset($result_del_sp);
                                // header("refresh:0.5;url=khach_hang?act=list");
                            }
                        }
                        
                    }
                    include_once './app/views/thanh_toan.php';


                    break;

                default:
                    # code...
                    break;
            }
        }
        // else {
        //     include_once './app/views/cart.php';
        // }


    }

    public function gioi_thieu()
    {
        include_once './app/views/gioi_thieu.php';
    }

    public function menu()
    {
        include_once './app/views/menu.php';
    }
}
