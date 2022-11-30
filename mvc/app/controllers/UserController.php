<?php

class UserController
{

    public function login()
    {
        $error = "";
        extract($_REQUEST);
        if (isset($_SESSION['ma_kh'])) {
            $so_thong_bao = count(DonHang::so_thong_bao_chua_xem($_SESSION['ma_kh']));
        }

        if (isset($_GET['act'])) {
            $act = $_GET['act'];
            switch ($act) {
                case 'login':
                    // include_once './app/views/myAccount.php';
                    include_once './app/views/pages/user/login.php';
                    break;
                case 'btn_login':
                    if (isset($_POST['btn_login'])) {
                        $username = $_POST['username'];
                        $pass = $_POST['pass'];
                        // $check = $_POST['check'];

                        if ($username == "" || $pass == "") {
                            $error = "Không được để trống thông tin ! ";
                        } else {
                            $result =  User::login($username);
                            if (!empty($result)) {
                                foreach ($result as $u) {
                                    $ma_hoa_mk = password_verify($pass, $u['pass']);
                                    // var_dump($ma_hoa_mk);
                                    // die;
                                }

                                if ($ma_hoa_mk == true) {
                                    // $_SESSION['isLogin'] = true;
                                    // if (isset($_SESSION['isLogin'])) {
                                    //     var_dump($_SESSION['isLogin']);
                                    // }
                                    foreach ($result as $u) {
                                        $_SESSION['name'] = $u['username'];
                                        $_SESSION['ma_kh'] = $u['ma_kh'];
                                        $_SESSION['ho_ten'] = $u['hoten'];
                                        if ($u['vaitro'] == 1) {
                                            $_SESSION['admin'] = $u['vaitro'];
                                        }
                                    }

                                    // var_dump($_SESSION['name']);
                                    echo "<script> alert('Đăng nhập thành công')</script>";
                                    header("refresh:0.5;url=index.php");
                                } else {
                                    $error = "Sai thông tin đăng nhập ! ";
                                }
                            } else {
                                $error = "Tên đăng nhập không chính xác";
                            }
                        }


                        // tạo cookie
                        if (isset($_POST['check'])) {
                            setcookie("username", $username, time() + (86400 * 1));
                            setcookie("pass", $pass, time() + (86400 * 1));
                            //  var_dump($_COOKIE['pass']);
                            //  die;

                        }
                    }




                    include_once './app/views/pages/user/login.php';
                    break;
                case 'register':
                    include_once './app/views/pages/user/register.php';
                    break;
                case 'btn_register':
                    if (isset($_POST['btn_register'])) {
                        $fullname = $_POST['fullname'];
                        $username = $_POST['username'];
                        $pass = $_POST['pass'];
                        $pass2 = $_POST['pass2'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];

                        $kh_old = User::thong_tin_kh();
                        if (!empty($kh_old)) {
                            foreach ($kh_old as $u) {
                                if ($u['username'] == $username) {
                                    // var_dump($u['ma_kh']);
                                    $tk_da_ton_tai = "Tên đăng nhập đã tồn tại !";
                                }
                            }
                        }


                        if ($fullname == "" || $username == "" || $pass == "" || $pass2 == "" || $email == "" || $address == "") {
                            $error = "Không được để trống thông tin";
                        } elseif (mb_strlen($fullname) < 10) {
                            $error = "Họ tên không được dưới 10 kí tự";
                        } elseif (mb_strlen($username, 'UTF-8') < 7) {
                            $error = "Tên đăng nhập không được dưới 7 kí tự";
                        } elseif (mb_strlen($pass, 'UTF-8') < 6) {
                            $error = "Mật khẩu không được dưới 6 kí tự";
                        } elseif (isset($tk_da_ton_tai)) {
                            $error = $tk_da_ton_tai;
                        } elseif ($pass2 != $pass) {
                            $error = "Mật khẩu không trùng khớp";
                        } else {
                            $pass = password_hash($pass, PASSWORD_DEFAULT);
                            // echo $pass;
                            $result_add_user = User::add_khach_hang_user($fullname, $username, $pass, $email, $address);
                        }
                    }

                    if (isset($result_add_user)) {
                        echo "<script> alert('$result_add_user')</script>";
                        header("refresh:0.5;url=login?act=login");
                    }
                    include_once './app/views/pages/user/register.php';
                    break;

                case 'forgetPassword':
                    if (isset($_POST['btn_forgot_password'])) {

                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $pass = $_POST['pass'];
                        $pass2 = $_POST['pass2'];
                        // check xem tài khoản đó có tồn tại hay không 

                        $result = User::thong_tin_tk_by_username($username);
                        if (!empty($result)) {
                            foreach ($result as $u) {
                                $username_kh = $u['username'];
                                $email_kh = $u['email'];
                                $mat_khau = $u['pass'];
                            }

                            // validate
                            if ($username == "" || $email == ""  || $pass == "" || $pass2 == "") {
                                $error = "Không được để trống thông tin";
                            } else if ($email != $email_kh) {
                                $error = "Email không chính xác";
                            } else if (mb_strlen($pass, 'UTF-8') < 6) {
                                $error = "Mật khẩu không nhỏ hơn 6 kí tự";
                            } elseif ($pass2 != $pass) {
                                $error = "Mật khẩu không trùng khớp";
                            } else {
                                $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
                                $new_pass = User::update_mk($_SESSION['ma_kh'], $pass_hash);
                                if (isset($new_pass)) {
                                    echo "<script> alert('$new_pass')</script>";
                                    header("refresh:0.5;url=login?act=login");
                                }
                            }
                        } else {
                            $error = "Tên tài khoản không tồn tại";
                        }
                    }






                    include_once './app/views/pages/user/forgetPassword.php';
                    unset($_SESSION['mo']);
                    break;
                case 'myAccount':
                    if (isset($_SESSION['ma_kh'])) {
                        $result = User::thong_tin_tk_by_id($_SESSION['ma_kh']);
                        foreach ($result as $u) {
                            extract($u);
                        }
                    }

                    if (isset($_POST['btn_update_user'])) {

                        $hoten = $_POST['hoten'];
                        // var_dump($hoten);
                        // die;
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $diachi = $_POST['diachi'];
                        $hinh_anh = $_FILES['hinh_anh']['name'];
                        $hinh_anh_tmp = $_FILES['hinh_anh']['tmp_name'];

                        if (isset($_POST['gioi_tinh']) && $_POST['gioi_tinh'] == 'Nam') {
                            $gioi_tinh = 1;
                        } else {
                            $gioi_tinh = 0;
                        }
                        if ($hinh_anh == "") {
                            $hinh_anh = $hinh;
                        }
                        if ($hoten == "" || $email == "" || $phone == "" || $diachi == "") {
                            $error = "Không được để trống thông tin";
                        } elseif (mb_strlen($hoten, 'UTF-8') < 10) {
                            $error = "Họ tên phải lớn hơn 10 kí tự";
                        } else {
                            $result_update_user = User::update_khach_hang($_SESSION['ma_kh'], $hoten, $hinh_anh, $email, $phone, $diachi, $gioi_tinh);
                            move_uploaded_file($hinh_anh_tmp, '../../Du_An_1/mvc/storage/image/' . $hinh_anh);

                            if (isset($result_update_user)) {
                                echo "<script> alert('$result_update_user')</script>";
                                header("refresh:0.5;url=login?act=myAccount");
                            }
                        }
                    }
                    $myPage = "./app/views/pages/user/myAccount.php";
                    include_once './app/views/pages/user/layout.php';
                    break;

                case 'changePassword':
                    if (isset($_SESSION['ma_kh'])) {
                        $result = User::thong_tin_tk_by_id($_SESSION['ma_kh']);
                        foreach ($result as $u) {
                            extract($u);
                        }
                    }
                    if (isset($_POST['btn_update_pass'])) {
                        $pass = $_POST['pass'];
                        $pass_new = $_POST['pass_new'];
                        $pass_new2 = $_POST['pass_new2'];

                        $result = User::check_mk($_SESSION['ma_kh']);
                        $ma_hoa_mk = password_verify($pass, $result);

                        if ($pass == "" || $pass_new == "" || $pass_new2 == "") {
                            $error = "Không được để trống thông tin";
                        } elseif ($pass != $ma_hoa_mk) {
                            $error = "Mật khẩu cũ không chính xác";
                        } elseif ($pass_new2 != $pass_new) {
                            $error = "Mật khẩu mới không trùng khớp";
                        } elseif (mb_strlen($pass_new, 'UTF-8') < 6) {
                            $error = "Mật khẩu mới phải lớn hơn 6 kí tự";
                        } else {
                            $pass_hash = password_hash($pass_new, PASSWORD_DEFAULT);
                            $result_mk = User::update_mk($_SESSION['ma_kh'], $pass_hash);

                            if (isset($result_mk)) {
                                echo "<script> alert('$result_mk')</script>";
                                header("refresh:0.5;url=login?act=changePassword");
                            }
                        }
                    }

                    $myPage = "./app/views/pages/user/changePassword.php";
                    include_once './app/views/pages/user/layout.php';
                    break;

                case 'thong_bao':

                    if (isset($_SESSION['ma_kh'])) {
                        $result = User::thong_tin_tk_by_id($_SESSION['ma_kh']);
                        foreach ($result as $u) {
                            extract($u);
                        }
                    }
                    $myPage = "./app/views/pages/user/thong_bao.php";
                    $list_don_hang_thong_bao = DonHang::list_don_hang_thong_bao($_SESSION['ma_kh']);

                    include_once './app/views/pages/user/layout.php';
                    break;
                case 'don_mua':

                    if (isset($_SESSION['ma_kh'])) {
                        $result = User::thong_tin_tk_by_id($_SESSION['ma_kh']);
                        foreach ($result as $u) {
                            extract($u);
                        }
                    }
                    $myPage = "./app/views/pages/user/don_mua.php";
                    $list_don_hang = DonHang::thong_tin_don_hang($_SESSION['ma_kh']);
                    // var_dump($_SESSION['ma_kh']);
                    // die;
                    include_once './app/views/pages/user/layout.php';

                    break;

                case 'chi_tiet_don_hang':

                    if (isset($_SESSION['ma_kh'])) {
                        $result = User::thong_tin_tk_by_id($_SESSION['ma_kh']);
                        foreach ($result as $u) {
                            extract($u);
                        }
                    }
                    $myPage = "./app/views/pages/user/chi_tiet_don_hang.php";
                    $ma_don_hang = $_GET['ma_don_hang'];
                    $ktra_trang_thai = DonHang::list_don_hang_by_id($ma_don_hang);
                    if (isset($_POST['huy_don_hang'])) {
                        
                        if ($ktra_trang_thai[0]['trang_thai'] == 3) {
                            echo "<script> alert('Đơn hàng đã giao không thể hủy')</script>";
                        }else {
                            $huy_don = DonHang::huy_don($ma_don_hang);
                            echo "<script> alert('$huy_don')</script>";
                            // header("refresh:0.5;url=login?act=chi_tiet_don_hang");
                        }

                       
                    }
                    
                    if (isset($_GET['ma_thong_bao'])) {
                        $da_xem_thong_bao = DonHang::da_xem_thong_bao($_GET['ma_thong_bao']);
                    }
                    $result = DonHang::list_don_hang_by_id($ma_don_hang);
                    foreach ($result as $tt_kh) {
                        extract($tt_kh);
                    }

                   
                    include_once './app/views/pages/user/layout.php';
                    break;
                case 'logout':
                    unset($_SESSION['name']);
                    unset($_SESSION['ma_kh']);
                    unset($_SESSION['admin']);
                    header('location: index.php');
                    exit;

                    break;
                default:
                    # code...
                    break;
            }
        }
    }
}
