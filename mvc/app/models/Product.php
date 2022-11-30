<?php
// require_once './app/models/BaseModel.php';

class Product {
    

   
    function add_hang_hoa($ten_sp, $hinh, $so_luong, $gia, $giamgia, $ngaynhap, $mota, $dacbiet, $maloai)
    {
        $luot_xem = 0;
        $sql = "INSERT into sanpham(ten_sp, hinh, soluong, gia, giamgia, ngaynhap, mota, dacbiet, luotxem, maloai) values(?,?,?,?,?,?,?,?,?,?)";
        $new_loai_hang = pdo_execute($sql,$ten_sp, $hinh, $so_luong, $gia, $giamgia, $ngaynhap, $mota, $dacbiet,$luot_xem, $maloai);

        if ($new_loai_hang) {
            return "Thêm hàng hóa " . $new_loai_hang;
        } else {
            return "Thêm hàng hóa " . $new_loai_hang;
        }
    }

    function update_hang_hoa($ten_sp, $gia, $giamgia, $so_luong, $hinh,  $ngaynhap, $mota, $dacbiet, $maloai, $ma_sp)
    {
        $sql = "UPDATE sanpham SET ten_sp=?, gia=?, giamgia=?, soluong=?, hinh=?, ngaynhap=?, mota=?, dacbiet=?, maloai=? WHERE ma_sp=?";
        $new_loai_hang = pdo_execute($sql, $ten_sp, $gia, $giamgia, $so_luong, $hinh,  $ngaynhap, $mota, $dacbiet, $maloai, $ma_sp);

        if ($new_loai_hang) {
            return "Sửa hàng hóa " . $new_loai_hang;
        } else {
            return "Sửa hàng hóa " . $new_loai_hang;
        }
    }

    // tăng số lượt xem
    function tang_so_luot_Xem($ma_hh)
    {
        $sql = "UPDATE sanpham SET luotxem = luotxem + 1 where ma_sp=?";
        $row = pdo_execute($sql, $ma_hh);
        return $row;
    }

    function list__count_hang_hoa()
    {
        $sql = "SELECT count(ma_sp) as 'count_sp' FROM sanpham order by ma_sp desc";
        $value = pdo_query_value($sql);
        return $value;
    }

    function list_hang_hoa()
    {
        $limit = 3;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $start = ($page - 1) * $limit;
        // $so_trang = ceil();
        //    $row = 3; số lượng bản ghi trên 1 trang
        //    $from = ($pages - 1) * $row; vị trí bắt đầu lấy ra các bản ghi

        $sql = "SELECT * FROM sanpham order by ma_sp desc limit $start, $limit";
        $row = pdo_query($sql);
        return $row;
    }


    function list_all_hang_hoa()
    {
      
        $sql = "SELECT * FROM sanpham order by ma_sp desc ";
        $row = pdo_query($sql);
        return $row;
    }
    function list_hang_hoa_shop()
    {
        $limit = 15; 
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $start = ($page - 1) * $limit;

        $sql = "SELECT * FROM sanpham        order by ma_sp desc  limit $start, $limit ";
        $row = pdo_query($sql);
        return $row;
    }

    function so_binh_luan($ma_sp)
    {
      

        $sql = "SELECT b.so_sao FROM sanpham a
        join binhluan b on a.ma_sp = b.ma_sp
        where a.ma_sp = ?
         order by a.ma_sp desc  ";
        $row = pdo_query($sql,$ma_sp);
        return $row;
    }


    // danh sách hàng hóa theo loại
    function list_hang_hoa_theo_loai($ma_loai)
    {
       
        $sql = "SELECT * FROM sanpham where maloai=? order by ma_sp desc ";
        $row = pdo_query($sql, $ma_loai);
        return $row;
    }

    // danh sách hàng hóa theo id
    function list_hang_hoa_theo_id($ma_hh)
    {
        $sql = "SELECT a.*, b.ten_loai FROM sanpham a
        join loaihang b on a.maloai = b.ma_loai
        where ma_sp=? order by ma_sp desc";
        $row = pdo_query($sql, $ma_hh);
        return $row;
    }

    function list_loai_hang()
    {
        $sql = "SELECT * FROM loaihang ";
        $row = pdo_query($sql);
        return $row;
    }

    function ten_loai_hang($ma_loai)
    {

        $sql = "SELECT ten_loai FROM loaihang where ma_loai='$ma_loai'";

        $result = pdo_query_value($sql);
        return $result;
    }

    function delete_hang_hoa($ma_hh)
    {
        $sql = "DELETE FROM sanpham where ma_sp=?";
        $result = pdo_execute($sql, $ma_hh);

        if ($result) {
            return "Xóa sản phẩm " . $result;
        } else {
            return "Xóa sản phẩm " . $result;
        }
    }

    function select_hh_top_10()
    {
        $sql = "SELECT * FROM sanpham where luotxem >= 0
        order by luotxem desc limit 0,10";
        $row = pdo_query($sql);
        return $row;
    }





    // tìm sản phẩm
     function search_product($search)
    {
        $limit = 3;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $start = ($page - 1) * $limit;
        $sql = "SELECT * FROM sanpham where ten_sp LIKE '%$search%' order by ma_sp desc limit  $start, $limit";
        $row = pdo_query($sql);
        return $row;
    }

     function search_product_by_ten_loai($search)
    {
        $limit = 15;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $start = ($page - 1) * $limit;

        $sql = "SELECT * FROM sanpham a
        join loaihang b on a.maloai = b.ma_loai
        where b.ten_loai LIKE '%$search%' 
        order by a.ma_sp desc limit  $start, $limit";
        $row = pdo_query($sql);
        return $row;    
    }

     function list_product_by_ten_hh($search)
    {
        $limit = 15;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $start = ($page - 1) * $limit;

        $sql = "SELECT * FROM sanpham where ten_sp LIKE '%$search%' order by ma_sp desc limit  $start, $limit";
        $row = pdo_query($sql);
        return $row;
    }

    // thêm sản phẩm vào giỏ hàng
    function add_to_cart($id_product){
        $sql = "SELECT * FROM sanpham where ma_sp='$id_product'";
        $row = pdo_query($sql);
        return $row;
    }


}

?>