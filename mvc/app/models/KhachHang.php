<?php
// require '../../PDO/pdo.php';

class KhachHang
{

    function add_khach_hang($username, $pass, $hoten, $kickhoat, $hinh, $email, $vaitro, $diachi, $phone)
    {
        $sql = "INSERT into khachhang(username, pass , hoten, kichhoat,hinh, email, vaitro, diachi ,phone) values(?,?,?,?,?,?,?,?,?)";
        $new_khach_hang = pdo_execute($sql, $username, $pass,  $hoten,  $kickhoat, $hinh, $email, $vaitro, $diachi, $phone);

        if ($new_khach_hang) {
            return "Thêm thành viên " . $new_khach_hang;
        } else {
            return "Thêm thành viên " . $new_khach_hang;
        }
    }


    function update_khach_hang($ma_kh, $username, $pass, $hoten, $kickhoat, $hinh, $email, $vaitro, $diachi, $phone)
    {
        $sql = "UPDATE khachhang SET username=?, pass=?, hoten=?, kichhoat=?, hinh=?, email=?, vaitro=?,  diachi=? ,phone=? WHERE ma_kh=?";
        $new_khach_hang = pdo_execute($sql, $username, $pass, $hoten, $kickhoat, $hinh,  $email, $vaitro, $diachi, $phone, $ma_kh);

        if ($new_khach_hang) {
            return "Update thành viên " . $new_khach_hang;
        } else {
            return "Update thành viên " . $new_khach_hang;
        }
    }


    function list_khach_hang()
    {
        $limit = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $start = ($page - 1) * $limit;
        // $so_trang = ceil();
        //    $row = 3; số lượng bản ghi trên 1 trang
        //    $from = ($pages - 1) * $row; vị trí bắt đầu lấy ra các bản ghi

        $sql = "SELECT * FROM khachhang order by ma_kh desc limit $start, $limit";
        $row = pdo_query($sql);
        return $row;
    }

    function list_khach_hang_bl($ma_kh)
    {
        $sql = "SELECT * FROM binhluan 
        where ma_kh=? order by ma_kh desc ";
        $row = pdo_query($sql, $ma_kh);
        return $row;
    }

    function list__count_khach_hang()
    {
        $sql = "SELECT count(ma_kh) as 'count_kh' FROM khachhang order by ma_kh desc";
        $value = pdo_query_value($sql);
        return $value;
    }

    // danh sách hàng hóa theo id
    function list_kh_theo_id($ma_kh)
    {
        $sql = "SELECT * FROM khachhang  where ma_kh=? order by ma_kh desc";
        $row = pdo_query($sql, $ma_kh);
        return $row;
    }


    function delete_khach_hang($ma_kh)
    {
        $sql = "DELETE FROM khachhang where ma_kh=?";
        $result = pdo_execute($sql, $ma_kh);

        if ($result) {
            return "Xóa người dùng " . $result;
        } else {
            return "Xóa người dùng " . $result;
        }
    }

    // tìm khách hàng
    public function search_ten_kh($search)
    {
        $limit = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $start = ($page - 1) * $limit;
        $sql = "SELECT * FROM khachhang where hoten LIKE '%$search%' order by ma_kh desc limit  $start, $limit";
        $row = pdo_query($sql);
        return $row;
    }


    // danh sách hàng hóa theo vai trò
    function list_khach_hang_theo_vai_tro($vai_tro)
    {
        $sql = "SELECT * FROM khachhang where vaitro=?";
        $row = pdo_query($sql, $vai_tro);
        return $row;
    }
}
