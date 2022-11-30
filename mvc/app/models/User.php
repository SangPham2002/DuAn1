<?php

class User
{

    function login($username)
    {
        $sql = "SELECT * FROM khachhang where username=?";
        $result = pdo_query($sql, $username);
       
        return $result;
    }

    function thong_tin_kh(){
        $sql = "SELECT * from khachhang ";
        $result = pdo_query($sql);
        return $result;
    } 


    function thong_tin_tk_by_username($username){
        $sql = "SELECT * from khachhang where username=?";
        $result = pdo_query($sql, $username);
        return $result;
    }
    function thong_tin_tk_by_id($ma_kh){
        $sql = "SELECT * from khachhang where ma_kh=?";
        $result = pdo_query($sql, $ma_kh);
        return $result;
    }
    function add_khach_hang_user($hoten, $username, $pass, $email , $diachi)
    {
        $sql = "INSERT into khachhang(hoten, username, pass , email, diachi, vaitro, kichhoat) values(?,?,?,?,?,?,?)";

        $kickhoat = 0;
        $vaitro = 0;
        $new_khach_hang = pdo_execute($sql, $hoten, $username,  $pass, $email, $diachi, $vaitro ,$kickhoat);

        if ($new_khach_hang) {
            return "Thêm thành viên " . $new_khach_hang;
        } else {
            return "Thêm thành viên " . $new_khach_hang;
        }
    }


    function update_khach_hang($ma_kh, $hoten, $hinh, $email, $phone, $diachi, $gioi_tinh )
    {
        $sql = "UPDATE khachhang SET  hoten=?, hinh=?, email=?, phone=?, diachi=?, gioi_tinh=? WHERE ma_kh=?";
        $new_khach_hang = pdo_execute($sql, $hoten, $hinh,  $email, $phone, $diachi, $gioi_tinh, $ma_kh);

        if ($new_khach_hang) {
            return "Update thành viên " . $new_khach_hang;
        } else {
            return "Update thành viên " . $new_khach_hang;
        }
    }

    function update_mk($ma_kh, $matkhau){
        $sql = "UPDATE khachhang SET  pass=? WHERE ma_kh=?";
        $new_mk = pdo_execute($sql, $matkhau , $ma_kh);

        if ($new_mk) {
            return "Update thành viên " . $new_mk;
        } else {
            return "Update thành viên " . $new_mk;
        }
    }

    function check_mk($ma_kh){
        $sql = "SELECT pass from khachhang where ma_kh=?";
        $result = pdo_query_value($sql, $ma_kh);
        return $result;
    }
    
}
