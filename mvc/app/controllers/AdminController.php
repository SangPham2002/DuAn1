<?php

class AdminController
{

   
       
       
   
    
    public function loai_hang()
    {
        $tong_don_hang = DonHang::list__count_don_hang();
        $tong_san_pham = Product::list__count_hang_hoa();
        $tong_khach_hang = KhachHang::list__count_khach_hang();
        $tong_loai_hang = LoaiHang::list__count_loai_hang(); 
        // $tong_so_lh = $pdo_loai_hang->list__count_loai_hang();
        $tong_so_lh = LoaiHang::list__count_loai_hang();
        // var_dump($tong_so_hh);
        $so_trang = ceil($tong_so_lh / 5);
        // var_dump($so_trang);
        if (isset($_POST['all_product'])) {
            unset($_GET['search']);
        }
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
        }
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        // kiểm tra search
        if (isset($_POST['all_product'])) {
            unset($_GET['search']);
            unset($search);
            header("refresh:0.5;url=admin?act=list");
        }

        $error = "";
        extract($_REQUEST);

        if (isset($_GET['act'])) {

            $act = $_GET['act'];
            switch ($act) {
                case 'add':
                    $VIEWPAGE = "./app/views/pages/loai_hang/add.php";
                    break;
                case 'btn_add':
                    $ten_loai = $_POST['ten_loai'];
                    if ($ten_loai == "") {
                        $error = "Không được để trống tên loại";
                    } else {
                        $add = LoaiHang::add_loai_hang($ten_loai);
                    }

                    if (isset($add)) {
                        echo "<script> alert('$add')</script>";

                        // header("refresh:0.2;url=./app/views/pages/loai_hang/list.php");
                    }
                    $VIEWPAGE = "./app/views/pages/loai_hang/add.php";
                    break;
                case 'list':

                    $VIEWPAGE = "./app/views/pages/loai_hang/list.php";
                    break;
                case 'update':

                    // lấy dữ liệu từ form
                    $ma_loai = $_GET['ma_loai'];

                    $result = LoaiHang::list_loai_hang_by_id($ma_loai);
                    foreach ($result as $u) {
                        extract($u);
                    }
                    // show dữ liệu
                    $VIEWPAGE = "./app/views/pages/loai_hang/update.php";
                    break;

                case 'btn_update':
                    $loai_status = LoaiHang::list_loai_by_status();
                    $ten_loai = $_POST['ten_loai'];
                    $ma_loai = $_POST['ma_loai'];

                    if (isset($_POST['status']) && $_POST['status'] == 'Sử dụng') {
                        $status = 1;
                    } else {
                        $status = 0;
                    }

                    if ($ten_loai == "") {
                        $error = "Không được để trống tên loại";
                    } else {

                        //   var_dump(count($loai_status));
                        //   die;

                        if ($status == 0) {
                            $update_loai = LoaiHang::update_loai_hang($ten_loai, $ma_loai, $status);
                            if (isset($update_loai)) {
                                echo "<script> alert('$update_loai')</script>";
                                $categorys = LoaiHang::list_loai_hang();
                                header("refresh:0.5;url=admin?act=list");
                            }
                        } else {
                            if (count($loai_status) >= 4) {
                                $error = "Số lượng sp đã đầy trong danh sách sản phẩm theo loại";
                            } else {
                                $update_loai = LoaiHang::update_loai_hang($ten_loai, $ma_loai, $status);
                                if (isset($update_loai)) {
                                    echo "<script> alert('$update_loai')</script>";
                                    $categorys = LoaiHang::list_loai_hang();
                                    header("refresh:0.5;url=admin?act=list");
                                }
                            }
                        }
                    }
                    $VIEWPAGE = "./app/views/pages/loai_hang/update.php";
                    break;
                case 'delete':
                    $ma_loai = $_GET['id_delete'];

                    $check_ma_loai = Product::list_hang_hoa_theo_loai($ma_loai);

                    if (count($check_ma_loai) > 0) {
                        $error =  "Loại hàng này đã tồn tại trong sản phẩm khác, vui lòng kiểm tra lại !";
                        // header("refresh:0.2;url=admin?act=list");
                    } else {
                        $result_del = LoaiHang::delete_loai_hang($ma_loai);
                        echo "<script> alert('$result_del')</script>";
                        unset($ma_loai);

                        // hiển thị lại ds
                        $categorys = LoaiHang::list_loai_hang();
                        header("refresh:0.5;url=loai_hang?act=list");
                    }
                    $categorys = LoaiHang::list_loai_hang();
                    $VIEWPAGE = "./app/views/pages/loai_hang/list.php";
                    break;
                case 'del_click':

                    break;

                default:
                    # code...
                    break;
            }
        } else {
            $categorys = LoaiHang::list_loai_hang();
            $VIEWPAGE = "./app/views/pages/loai_hang/list.php";
        }

        if (array_key_exists('del_click', $_REQUEST)) {
            $mang = array();
            $mang = count($_POST['check_sp']);
            // var_dump("delete11111");


            for ($i = 0; $i < $mang; $i++) {
                $delete_id = $_POST['check_sp'][$i];
                $check_ma_loai = Product::list_hang_hoa_theo_loai($delete_id);

                if (count($check_ma_loai) > 0) {
                    $error =  "Loại hàng này đã tồn tại trong sản phẩm khác, vui lòng kiểm tra lại !";
                } else {
                    $result_del_sp = LoaiHang::delete_loai_hang($delete_id);
                }
            }
            if (isset($result_del_sp)) {
                echo "<script> alert('$result_del_sp')</script>";
                unset($result_del_sp);
                // header("refresh:0.5;url=index.php");

            }

            $categorys = LoaiHang::list_loai_hang();
            $VIEWPAGE = "./app/views/pages/loai_hang/list.php";
        }

        include_once './app/views/admin/index.php';
    }



    public function san_pham()
    {
        $tong_don_hang = DonHang::list__count_don_hang();
        $tong_san_pham = Product::list__count_hang_hoa();
        $tong_khach_hang = KhachHang::list__count_khach_hang();
        $tong_loai_hang = LoaiHang::list__count_loai_hang(); 

        $tong_so_hh = Product::list__count_hang_hoa();
        // var_dump($tong_so_hh);
        $so_trang = ceil($tong_so_hh / 3);
        // var_dump($so_trang);
        if (isset($_POST['all_product'])) {
            unset($_GET['search']);
            unset($search);
            header("refresh:0.5;url=san_pham?act=list");
        }
        $page = isset($_GET['page']) ? $_GET['page'] : 1;


        $error = "";
        extract($_REQUEST);

        if (isset($_GET['act'])) {

            $act = $_GET['act'];
            switch ($act) {
                case 'add':
                    $VIEWPAGE = "./app/views/pages/san_pham/add.php";
                    break;
                case 'btn_add':
                    $ten_hang_hoa = $_POST['ten_sp'];
                    $don_gia = $_POST['dongia'];
                    $giam_gia = $_POST['giamgia'];
                    $loai_hang = $_POST['loaihang'];
                    $so_luong = $_POST['soluong'];
                    $hinh_anh = $_FILES['productImage']['name'];
                    $hinh_anh_tmp = $_FILES['productImage']['tmp_name'];


                    $ngay_nhap = $_POST['ngaynhap'];
                    $mo_ta = $_POST['mota'];

                    if (isset($_POST['hangDacBiet']) && $_POST['hangDacBiet'] == 'Đặc biệt') {
                        $hangDacBiet = 1;
                    } else {
                        $hangDacBiet = 0;
                    }
                    // var_dump($hangDacBiet);
                    // die;
                    // validate
                    if ($ten_hang_hoa == "") {
                        $error = "Tên hàng hóa không được để trống";
                    } else if ($don_gia == "") {
                        $error = "Đơn giá không được để trống";
                    } else if ($giam_gia == "") {
                        $error = "Giảm giá không được để trống";
                    } else if ($so_luong == "") {
                        $error = "Số lượng không được để trống";
                    } else if ($hinh_anh == "") {
                        $error = "Hình ảnh không được để trống";
                    } else if ($ngay_nhap == "") {
                        $error = "Ngày nhập không được để trống";
                    } else {
                        $result_add = Product::add_hang_hoa($ten_hang_hoa, $hinh_anh, $so_luong, $don_gia, $giam_gia, $ngay_nhap, $mo_ta, $hangDacBiet, $loai_hang);
                        move_uploaded_file($hinh_anh_tmp, '../../Du_An_1/mvc/storage/image/' . $hinh_anh);
                    }

                    if (isset($result_add)) {
                        echo "<script> alert('$result_add')</script>";
                        // echo $update_user;
                        // header("refresh:0.5;url=index.php");
                    }
                    $VIEWPAGE = "./app/views/pages/san_pham/add.php";
                    break;
                case 'list':

                    $VIEWPAGE = "./app/views/pages/san_pham/list.php";
                    break;
                case 'update':

                    // lấy dữ liệu từ form
                    $ma_sp = $_GET['ma_sp'];

                    $result = Product::list_hang_hoa_theo_id($ma_sp);
                    foreach ($result as $u) {
                        extract($u);
                    }
                    // show dữ liệu
                    $VIEWPAGE = "./app/views/pages/san_pham/update.php";
                    break;

                case 'btn_update':
                    $ma_sp = $_REQUEST['ma_sp'];
                    $result = Product::list_hang_hoa_theo_id($ma_sp);
                    foreach ($result as $u) {
                        extract($u);
                    }
                    $ten_hang_hoa = $_POST['ten_sp'];
                    $don_gia2 = $_POST['dongia'];
                    $giam_gia2 = $_POST['giamgia'];
                    $loai_hang2 = $_POST['loaihang'];
                    $so_luong2 = $_POST['soluong'];
                    $productImage = $_FILES['productImage']['name'];
                    $hinh_anh_tmp = $_FILES['productImage']['tmp_name'];


                    $ngay_nhap2 = $_POST['ngaynhap'];
                    $mo_ta2 = $_POST['mota'];

                    if (isset($_POST['hangDacBiet']) && $_POST['hangDacBiet'] == 'Đặc biệt') {
                        $hangDacBiet = 1;
                    } else {
                        $hangDacBiet = 0;
                    }

                    if ($productImage == "") {
                        $productImage = $u['hinh'];
                    }


                    // validate
                    if ($ten_hang_hoa == "") {
                        $error = "Tên hàng hóa không được để trống";
                    } else if ($don_gia2 == "") {
                        $error = "Đơn giá không được để trống";
                    } else if ($giam_gia2 == "") {
                        $error = "Giảm giá không được để trống";
                    } else if ($so_luong2 == "") {
                        $error = "Số lượng không được để trống";
                    } else if ($ngay_nhap2 == "") {
                        $error = "Ngày nhập không được để trống";
                    } else {

                        $result_update = Product::update_hang_hoa($ten_hang_hoa, $don_gia2, $giam_gia2,$so_luong2, $productImage, $ngay_nhap2, $mo_ta2, $hangDacBiet, $loai_hang2, $ma_sp);
                        move_uploaded_file($hinh_anh_tmp, '../../Du_An_1/mvc/storage/image/' . $productImage);
                    }

                    if (isset($result_update)) {
                        echo "<script> alert('$result_update')</script>";
                        // echo $update_user;
                        header("refresh:0.5;url=san_pham?act=list");
                    }
                    $VIEWPAGE = "./app/views/pages/san_pham/update.php";
                    break;
                case 'delete':
                    $ma_sp = $_GET['id_delete'];

                    $result_del = Product::delete_hang_hoa($ma_sp);
                    if (isset($result_del)) {
                        echo "<script> alert('$result_del')</script>";
                        unset($result_del);
                        header("refresh:0.5;url=san_pham?act=list");
                    }


                    $VIEWPAGE = "./app/views/pages/san_pham/list.php";
                    break;

                default:
                    # code...
                    break;
            }
        } else {

            $VIEWPAGE = "./app/views/pages/san_pham/list.php";
        }

        if (array_key_exists('del_click', $_REQUEST)) {
            $mang = array();
            $mang = count($_POST['check_sp']);
            for ($i = 0; $i < $mang; $i++) {
                $delete_id = $_POST['check_sp'][$i];
                $result_del_sp = Product::delete_hang_hoa($delete_id);
            }

            if ($result_del_sp) {
                echo "<script> alert('$result_del_sp')</script>";
                unset($result_del_sp);
                header("refresh:0.5;url=san_pham?act=list");
            }

            $VIEWPAGE = "./app/views/pages/san_pham/list.php";
        }

        // include_once './app/views/admin.php';
        include_once './app/views/admin/index.php';
        // return "Trang admin";
    }

    public function khach_hang()
    {
        $tong_don_hang = DonHang::list__count_don_hang();
        $tong_san_pham = Product::list__count_hang_hoa();
        $tong_khach_hang = KhachHang::list__count_khach_hang();
        $tong_loai_hang = LoaiHang::list__count_loai_hang(); 

        $tong_so_lh = KhachHang::list__count_khach_hang();
        // var_dump($tong_so_hh);
        $so_trang = ceil($tong_so_lh / 10);
        // var_dump($so_trang);
        if (isset($_POST['all_product'])) {
            unset($_GET['search']);
            unset($search);
            header("refresh:0.5;url=khach_hang?act=list");
        }
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
        }
        $page = isset($_GET['page']) ? $_GET['page'] : 1;


        $error = "";
        extract($_REQUEST);

        if (isset($_GET['act'])) {

            $act = $_GET['act'];
            switch ($act) {
                case 'add':
                    $VIEWPAGE = "./app/views/pages/khach_hang/add.php";
                    break;
                case 'btn_add':
                    $username = $_POST['username'];
                    $ho_ten = $_POST['ho_va_ten'];
                    $mat_khau = $_POST['pass'];
                    $xac_nhan_mat_khau = $_POST['xac_nhan_mat_khau'];
                    $email = $_POST['email'];
                    $diachi = $_POST['diachi'];
                    $phone = $_POST['phone'];

                    $hinh_anh = $_FILES['hinh_anh']['name'];
                    $tmp_hinh_anh = $_FILES['hinh_anh']['tmp_name'];

                    if (isset($_POST['kick_hoat']) && $_POST['kick_hoat'] == 'Kích hoạt') {
                        $kick_hoat = 1;
                    } else {
                        $kick_hoat = 0;
                    }
                    if (isset($_POST['vai_tro']) && $_POST['vai_tro'] == 'Nhân viên') {
                        $vai_tro = 1;
                    } else {
                        $vai_tro = 0;
                    }
                    $list_kh = KhachHang::list_khach_hang();
                    foreach ($list_kh as $u) {
                        if ($username == $u['username']) {
                            $ma_kh_tt = "Đã tồn tại";
                        }
                    }
                    // validate
                    if ($username == "") {
                        $error = "Tên tài khoản không được để trống !";
                    } else if (strlen($username) < 6) {
                        $error = "Tên tài khoản phải lớn hơn 6 kí tự !";
                    } else if (isset($ma_kh_tt)) {
                        $error = "Tên tài khoản đã tồn tại, vui lòng nhập id khác !";
                    } else if ($ho_ten == "") {
                        $error = "Họ tên không được để trống !";
                    } else if (strlen($ho_ten) < 6) {
                        $error = "Họ tên không được nhỏ hơn 6 kí tự !";
                    } else if ($mat_khau == "") {
                        $error = "Mật khẩu không được để trống !";
                    } else if (strlen($mat_khau) < 6) {
                        $error = "Mật khẩu không được nhỏ hơn 6 kí tự !";
                    } else if ($xac_nhan_mat_khau != $mat_khau) {
                        $error = 'Mật khẩu không trùng khớp';
                    } else if ($hinh_anh == "") {
                        $error = 'Hình ảnh không được để trống !';
                    } else if ($diachi == "") {
                        $error = 'Địa chỉ không được để trống !';
                    } else if ($phone == "") {
                        $error = 'Số điện thoại không được để trống !';
                    } else {
                        // var_dump($_POST['vai_tro']);
                        // mã hóa mk
                        $mat_khau = password_hash($mat_khau, PASSWORD_DEFAULT);
                        $result = KhachHang::add_khach_hang($username, $mat_khau, $ho_ten, $kick_hoat, $hinh_anh, $email, $vai_tro, $diachi, $phone);
                        move_uploaded_file($tmp_hinh_anh, '../../Du_An_1/mvc/storage/image/' . $hinh_anh);
                    }
                    if (isset($result)) {
                        echo "<script> alert('$result')</script>";
                        header("refresh:0.5;url=khach_hang?act=list");
                    }
                    $VIEWPAGE = "./app/views/pages/khach_hang/add.php";
                    break;
                case 'list':

                    $VIEWPAGE = "./app/views/pages/khach_hang/list.php";
                    break;
                case 'update':

                    // lấy dữ liệu từ form
                    $ma_kh = $_GET['ma_kh'];

                    $result = KhachHang::list_kh_theo_id($ma_kh);
                    foreach ($result as $u) {
                        extract($u);
                    }
                    // show dữ liệu
                    $VIEWPAGE = "./app/views/pages/khach_hang/update.php";
                    break;

                case 'btn_update':
                    $ma_kh = $_POST['ma_kh'];

                    $result = KhachHang::list_kh_theo_id($ma_kh);
                    foreach ($result as $u) {
                        extract($u);
                    }
                    $ma_kh = $_POST['ma_kh'];
                    $username = $_POST['username'];
                    $ho_ten = $_POST['ho_va_ten'];
                    $mat_khau = $_POST['mat_khau'];
                    $xac_nhan_mat_khau = $_POST['xac_nhan_mat_khau'];
                    $email = $_POST['email'];
                    $diachi = $_POST['diachi'];
                    $phone = $_POST['phone'];
                    $hinh_anh = $_FILES['hinh_anh']['name'];
                    $tmp_hinh_anh = $_FILES['hinh_anh']['tmp_name'];

                    if (isset($_POST['kick_hoat']) && $_POST['kick_hoat'] == 'Kích hoạt') {
                        $kick_hoat = 1;
                    } else {
                        $kick_hoat = 0;
                    }
                    if (isset($_POST['vai_tro']) && $_POST['vai_tro'] == 'Nhân viên') {
                        $vai_tro = 1;
                    } else {
                        $vai_tro = 0;
                    }

                    if ($hinh_anh == "") {
                        $hinh_anh = $hinh;
                    }

                    // validate
                    if ($ho_ten == "") {
                        $error = "Họ tên không được để trống !";
                    } else if (strlen($ho_ten) < 6) {
                        $error = "Họ tên không được nhỏ hơn 6 kí tự !";
                    } else if ($mat_khau == "") {
                        $error = "Mật khẩu không được để trống !";
                    } else if (strlen($mat_khau) < 6) {
                        $error = "Mật khẩu không được nhỏ hơn 6 kí tự !";
                    } else if ($xac_nhan_mat_khau != $mat_khau) {
                        $error = 'Mật khẩu không trùng khớp';
                    } else {

                        $result = KhachHang::update_khach_hang($ma_kh, $username, $mat_khau, $ho_ten, $kick_hoat, $hinh_anh, $email, $vai_tro, $diachi, $phone);
                        move_uploaded_file($tmp_hinh_anh, '../../Du_An_1/mvc/storage/image/' . $hinh_anh);
                        if (isset($result)) {
                            echo "<script> alert('$result')</script>";
                            header("refresh:0.5;url=khach_hang?act=list");
                        }
                    }
                    $VIEWPAGE = "./app/views/pages/khach_hang/list.php";
                    break;
                case 'delete':
                    $ma_kh = $_GET['id_delete'];
                    $check_ma_bl = KhachHang::list_khach_hang_bl($ma_kh);
                    $kh = KhachHang::list_kh_theo_id($ma_kh);
        
                    if ($kh['0']['vaitro'] == 1 ) {
                        $error =  "Tài khoản này là admin, vui lòng kiểm tra lại !";
                        
                    }else {
                      
                        $result_del = KhachHang::delete_khach_hang($ma_kh);
                        if (isset($result_del)) {
                            echo "<script> alert('$result_del')</script>";
                            unset($result_del);
                            header("refresh:0.5;url=khach_hang?act=list");
                        }
                    }
              


                    $VIEWPAGE = "./app/views/pages/khach_hang/list.php";
                    break;
                default:
                    # code...
                    break;
            }
        } else {

            $VIEWPAGE = "./app/views/pages/khach_hang/list.php";
        }

        if (array_key_exists('del_click', $_REQUEST)) {
            $mang = array();
            $mang = count($_POST['check_sp']);
            for ($i = 0; $i < $mang; $i++) {
                $delete_id = $_POST['check_sp'][$i];
                $result_del_sp = KhachHang::delete_khach_hang($delete_id);
            }

            if ($result_del_sp) {
                echo "<script> alert('$result_del_sp')</script>";
                unset($result_del_sp);
                header("refresh:0.5;url=khach_hang?act=list");
            }

            $VIEWPAGE = "./app/views/pages/khach_hang/list.php";
        }

        include_once './app/views/admin/index.php';
        // return "Trang admin";

    }


    //  bình luận
    public function binh_luan()
    {
        $tong_don_hang = DonHang::list__count_don_hang();
        $tong_san_pham = Product::list__count_hang_hoa();
        $tong_khach_hang = KhachHang::list__count_khach_hang();
        $tong_loai_hang = LoaiHang::list__count_loai_hang(); 

        $tong_so_lh = BinhLuan::list_binh_luan();
        // var_dump(count($tong_so_lh));
        // die;
        $so_trang = ceil(count($tong_so_lh) / 10);
        // var_dump($so_trang);
        if (isset($_POST['all_product'])) {
            unset($_GET['search']);
            unset($search);
            header("refresh:0.5;url=binh_luan?act=list");
        }
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
        }
        $page = isset($_GET['page']) ? $_GET['page'] : 1;


        $error = "";
        extract($_REQUEST);

        if (isset($_GET['act'])) {

            $act = $_GET['act'];
            switch ($act) {
                case 'chi_tiet':
                    $ma_hh = $_GET['ma_sp'];
                    $ten_hh = BinhLuan::name_hh_by_id($ma_hh);
                    // var_dump($ten_hh);

                    

                    $tong_so_bl = BinhLuan::list_count_binh_luan_by_id_masp($_GET['ma_sp']);
                    // var_dump($tong_so_bl);
                    // die;

                    // var_dump($tong_so_hh);
                    $so_trang = ceil($tong_so_bl / 10);
                    // var_dump($so_trang);
                    if (isset($_POST['all_product'])) {
                        unset($_GET['search']);
                    }
                    if (isset($_GET['search'])) {
                        $search = $_GET['search'];
                    }
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    
                    $result = BinhLuan::list_bl_by_ma_hh($ma_hh);
                    $VIEWPAGE = "./app/views/pages/binh_luan/chi_tiet.php";
                    break;

                case 'list':
                    
                    $VIEWPAGE = "./app/views/pages/binh_luan/list.php";
                    break;

                case 'delete':
                    $ma_bl = $_GET['id_delete'];

                    $result_del = BinhLuan::delete_binh_luan($ma_bl);
                    if (isset($result_del)) {
                        echo "<script> alert('$result_del')</script>";
                        unset($result_del);
                        header("refresh:0.5;url=binh_luan?act=list");
                    }


                    $VIEWPAGE = "./app/views/pages/binh_luan/list.php";
                    break;

                default:
                    # code...
                    break;
            }
        } else {

            $VIEWPAGE = "./app/views/pages/binh_luan/list.php";
        }

        if (array_key_exists('del_click', $_REQUEST)) {
            $mang = array();
            $mang = count($_POST['check_sp']);

            for ($i = 0; $i < $mang; $i++) {
                $delete_id = $_POST['check_sp'][$i];
                $result_del_sp = BinhLuan::delete_binh_luan($delete_id);
            }

            if ($result_del_sp) {
                echo "<script> alert('$result_del_sp')</script>";
                unset($result_del_sp);
                header("refresh:0.5;url=binh_luan?act=list");
            }

            $VIEWPAGE = "./app/views/pages/binh_luan/list.php";
        }

        include_once './app/views/admin/index.php';
        // return "Trang admin";
    }

    public function thong_ke()
    {
        $tong_don_hang = DonHang::list__count_don_hang();
        $tong_san_pham = Product::list__count_hang_hoa();
        $tong_khach_hang = KhachHang::list__count_khach_hang();
        $tong_loai_hang = LoaiHang::list__count_loai_hang(); 

        $error = "";
        extract($_REQUEST);

        if (isset($_GET['act'])) {

            $act = $_GET['act'];
            switch ($act) {
                case 'bieu_do':
                    $VIEWPAGE = "./app/views/pages/thong_ke/bieu_do.php";
                    break;
                case 'list':
                    $VIEWPAGE = "./app/views/pages/thong_ke/list.php";
                    break;


                default:
                    # code...
                    break;
            }
        } else {

            $VIEWPAGE = "./app/views/pages/thong_ke/list.php";
        }


        include_once './app/views/admin/index.php';
    }

    public function gop_y()
    {
        $tong_don_hang = DonHang::list__count_don_hang();
        $tong_san_pham = Product::list__count_hang_hoa();
        $tong_khach_hang = KhachHang::list__count_khach_hang();
        $tong_loai_hang = LoaiHang::list__count_loai_hang(); 

        $tong_so_gop_y = GopY::list__count_gop_y();
        // var_dump($tong_so_hh);
        $so_trang = ceil($tong_so_gop_y / 5);
        // var_dump($so_trang);
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
        }
        if (isset($_POST['all_product'])) {
            unset($_GET['search']);
            unset($search);
            header("refresh:0.5;url=gop_y?act=list");
        }
        $page = isset($_GET['page']) ? $_GET['page'] : 1;


        $error = "";
        extract($_REQUEST);

        if (isset($_GET['act'])) {

            $act = $_GET['act'];
            switch ($act) {
                case 'list':

                    $VIEWPAGE = "./app/views/pages/gop_y/list.php";
                    break;





                case 'delete':
                    $ma_gop_y = $_GET['id_delete'];

                    $result_del = GopY::delete_gop_y($ma_gop_y);
                    if (isset($result_del)) {
                        echo "<script> alert('$result_del')</script>";
                        unset($result_del);
                        header("refresh:0.5;url=gop_y?act=list");
                    }

                    $VIEWPAGE = "./app/views/pages/gop_y/list.php";
                    break;

                default:
                    # code...
                    break;
            }
        } else {

            $VIEWPAGE = "./app/views/pages/gop_y/list.php";
        }

        if (array_key_exists('del_click', $_REQUEST)) {
            $mang = array();
            $mang = count($_POST['check_sp']);
            for ($i = 0; $i < $mang; $i++) {
                $delete_id = $_POST['check_sp'][$i];
                $result_del_sp = GopY::delete_gop_y($delete_id);
            }

            if ($result_del_sp) {
                echo "<script> alert('$result_del_sp')</script>";
                unset($result_del_sp);
                header("refresh:0.5;url=gop_y?act=list");
            }

            $VIEWPAGE = "./app/views/pages/gop_y/list.php";
        }

        include_once './app/views/admin/index.php';
        // return "Trang admin";
    }


    public function banner()
    {
        $tong_don_hang = DonHang::list__count_don_hang();
        $tong_san_pham = Product::list__count_hang_hoa();
        $tong_khach_hang = KhachHang::list__count_khach_hang();
        $tong_loai_hang = LoaiHang::list__count_loai_hang(); 

        // $tong_so_lh = $pdo_loai_hang->list__count_loai_hang();
        $tong_so_lh = Banner::list__count_banner();
        // var_dump($tong_so_hh);
        $so_trang = ceil($tong_so_lh / 5);
        // var_dump($so_trang);
        if (isset($_POST['all_product'])) {
            unset($_GET['search']);
        }
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
        }
        $page = isset($_GET['page']) ? $_GET['page'] : 1;


        // kiểm tra search
        if (isset($_POST['all_product'])) {
            unset($_GET['search']);
            unset($search);
            header("refresh:0.5;url=banner?act=list");
        }
        $error = "";
        extract($_REQUEST);

        if (isset($_GET['act'])) {

            $act = $_GET['act'];
            switch ($act) {
                case 'add':
                    $VIEWPAGE = "./app/views/pages/banner/add.php";
                    break;
                case 'btn_add':

                    $hinh_anh = $_FILES['productImage']['name'];
                    $hinh_anh_tmp = $_FILES['productImage']['tmp_name'];
                    if ($hinh_anh == "") {
                        $error = "Không được để trống hình ảnh";
                    } else {
                        $add = Banner::add_banner($hinh_anh);
                        move_uploaded_file($hinh_anh_tmp, '../../Du_An_1/mvc/storage/image/' . $hinh_anh);
                    }

                    if (isset($add)) {
                        echo "<script> alert('$add')</script>";

                        // header("refresh:0.2;url=./app/views/pages/loai_hang/list.php");
                    }
                    $VIEWPAGE = "./app/views/pages/banner/add.php";
                    break;
                case 'list':

                    $VIEWPAGE = "./app/views/pages/banner/list.php";
                    break;
                case 'update':

                    // lấy dữ liệu từ form
                    $ma_banner = $_GET['ma_banner'];

                    $result = Banner::list_banner_by_id($ma_banner);
                    foreach ($result as $u) {
                        extract($u);
                    }
                    // show dữ liệu
                    $VIEWPAGE = "./app/views/pages/banner/update.php";
                    break;

                case 'btn_update':
                    $result = Banner::list_banner_by_id($ma_banner);
                    $banner = Banner::list_banner_by_status();
                    foreach ($result as $u) {
                        extract($u);
                    }


                    $ma_banner = $_POST['ma_banner'];
                    $hinh_anh = $_FILES['productImage']['name'];
                    $hinh_anh_tmp = $_FILES['productImage']['tmp_name'];


                    if ($hinh_anh == "") {
                        $hinh_anh = $hinh;
                    }
                    if (isset($_POST['status']) && $_POST['status'] == 'Sử dụng') {
                        $status = 1;
                    } else {
                        $status = 0;
                    }

                    if ($status == 0) {
                        $update_loai = Banner::update_banner($hinh_anh, $status, $ma_banner);
                        move_uploaded_file($hinh_anh_tmp, '../../Du_An_1/mvc/storage/image/' . $hinh_anh);
                        if (isset($update_loai)) {
                            echo "<script> alert('$update_loai')</script>";

                            // header("refresh:0.5;url=banner?act=list");

                        }
                    } else {
                        if (count($banner) >= 3) {
                            $error = "Số lượng sp đã đầy trong banner";
                        } else {
                            $update_loai = Banner::update_banner($hinh_anh, $status, $ma_banner);
                            move_uploaded_file($hinh_anh_tmp, '../../Du_An_1/mvc/storage/image/' . $hinh_anh);
                            if (isset($update_loai)) {
                                echo "<script> alert('$update_loai')</script>";

                                // header("refresh:0.5;url=banner?act=list");

                            }
                        }
                    }

                    $VIEWPAGE = "./app/views/pages/banner/update.php";
                    break;
                case 'delete':
                    $ma_banner = $_GET['id_delete'];

                    $result_del = Banner::delete_banner($ma_banner);
                    echo "<script> alert('$result_del')</script>";
                    unset($ma_banner);

                    // hiển thị lại ds

                    header("refresh:0.5;url=banner?act=list");

                    $VIEWPAGE = "./app/views/pages/banner/list.php";
                    break;
                case 'del_click':

                    break;

                default:
                    # code...
                    break;
            }
        } else {

            $VIEWPAGE = "./app/views/pages/banner/list.php";
        }

        if (array_key_exists('del_click', $_REQUEST)) {
            $mang = array();
            $mang = count($_POST['check_sp']);
            // var_dump("delete11111");

            for ($i = 0; $i < $mang; $i++) {
                $delete_id = $_POST['check_sp'][$i];
                // $result_del_sp = $pdo_loai_hang->delete_loai_hang($delete_id);
                $result_del_sp = Banner::delete_banner($delete_id);
            }

            if ($result_del_sp) {
                echo "<script> alert('$result_del_sp')</script>";
                unset($result_del_sp);
                header("refresh:0.5;url=banner?act=list");
            }
            $VIEWPAGE = "./app/views/pages/banner/list.php";
        }

        include_once './app/views/admin/index.php';
    }

    public function don_hang()
    {
        $tong_don_hang = DonHang::list__count_don_hang();
        $tong_san_pham = Product::list__count_hang_hoa();
        $tong_khach_hang = KhachHang::list__count_khach_hang();
        $tong_loai_hang = LoaiHang::list__count_loai_hang();    

        $tong_so_lh = DonHang::list__count_don_hang();
        // var_dump($tong_so_hh);
        $so_trang = ceil($tong_so_lh / 10);
        // var_dump($so_trang);
        if (isset($_POST['all_product'])) {
            unset($_GET['search']);
            unset($search);
            header("refresh:0.5;url=don_hang?act=list");
        }
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            
        }
        $page = isset($_GET['page']) ? $_GET['page'] : 1;


        $error = "";
        extract($_REQUEST);

        if (isset($_GET['act'])) {

            $act = $_GET['act'];
            switch ($act) {
                case 'chi_tiet':
                    $ma_don_hang = $_GET['ma_don_hang'];
                    // $ten_hh = BinhLuan::name_hh_by_id($ma_hh);
                    // var_dump($ten_hh);

                    $result = DonHang::list_don_hang_by_id($ma_don_hang);
                    foreach ($result as $tt_kh) {
                        extract($tt_kh);
                    }
                //    var_dump( $result[0]['ma_kh']);
                //    die;
                    
                    if (isset($_POST['cap_nhat'])) {

                        $trang_thai = $_POST['trang_thai'];

                        if ($trang_thai == 1) {
                            $noi_dung = "Đơn hàng có mã $ma_don_hang đã được duyệt";
                        }elseif ($trang_thai == 2) {
                            $noi_dung = "Đơn hàng có mã $ma_don_hang đang được giao";
                        }elseif ($trang_thai == 3) {
                            $noi_dung = "Đơn hàng có mã $ma_don_hang đã giao thành công";
                        }elseif ($trang_thai == 4) {
                            $noi_dung = "Đơn hàng có mã $ma_don_hang đã hủy";
                        }
                        $thoi_gian_giao= date_format(date_create(), 'Y-m-d H:i:s');

                        
                        $giao_hang = DonHang::giao_hang($trang_thai, $ma_don_hang);
                        $add_thong_bao = DonHang::add_thong_bao($thoi_gian_giao, $ma_don_hang, $noi_dung ,$result[0]['ma_kh']);
                        if (isset($giao_hang)) {
                            echo "<script> alert('Cập nhật thông tin đơn hàng thành công !')</script>";

                        }
                    }
                    

                    $VIEWPAGE = "./app/views/pages/don_hang/chi_tiet.php";
                    break;

                case 'list':
                    $VIEWPAGE = "./app/views/pages/don_hang/list.php";
                    break;
               
                case 'delete':
                    $ma_bl = $_GET['id_delete'];

                    $result_del = BinhLuan::delete_binh_luan($ma_bl);
                    if (isset($result_del)) {
                        echo "<script> alert('$result_del')</script>";
                        unset($result_del);
                        header("refresh:0.5;url=binh_luan?act=list");
                    }


                    $VIEWPAGE = "./app/views/pages/don_hang/list.php";
                    break;

                default:
                    # code...
                    break;
            }
        } else {

            $VIEWPAGE = "./app/views/pages/don_hang/list.php";
        }

        if (array_key_exists('del_click', $_REQUEST)) {
            $mang = array();
            $mang = count($_POST['check_sp']);

            for ($i = 0; $i < $mang; $i++) {
                $delete_id = $_POST['check_sp'][$i];
                $result_del_sp = DonHang::delete_don_hang($delete_id);
            }

            if ($result_del_sp) {
                echo "<script> alert('$result_del_sp')</script>";
                unset($result_del_sp);
                header("refresh:0.5;url=don_hang?act=list");
            }

            $VIEWPAGE = "./app/views/pages/don_hang/list.php";
        }

        include_once './app/views/admin/index.php';
        // return "Trang admin";
    }
}
