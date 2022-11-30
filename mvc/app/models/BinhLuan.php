<?php
// require '../../PDO/pdo.php';
class BinhLuan
{

    function add_binh_luan($ma_kh, $ma_sp, $noidung, $ngay_bl, $so_sao)
    {
        $sql = "INSERT into binhluan(ma_kh, ma_sp, noidung, ngay_bl, so_sao) values(?,?,?,?,?)";
        $new_binh_luan = pdo_execute($sql, $ma_kh, $ma_sp, $noidung, $ngay_bl, $so_sao);

        if ($new_binh_luan) {
            return "Thêm bình luận " . $new_binh_luan;
        } else {
            return "Thêm bình luận " . $new_binh_luan;
        }
    }

    function update_binh_luan($ma_kh, $ma_sp, $noidung, $ngay_bl, $ma_bl)
    {
        $sql = "UPDATE binhluan SET ma_kh=?, ma_sp=?, noidung=?, ngay_bl=? WHERE ma_bl=?";
        $new_binh_luan = pdo_execute($ma_kh, $ma_sp, $noidung, $ngay_bl, $ma_bl);

        if ($new_binh_luan) {
            return "Thêm hàng hóa " . $new_binh_luan;
        } else {
            return "Thêm hàng hóa " . $new_binh_luan;
        }
    }

    function list_binh_luan()
    {
        $limit = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        $sql = "SELECT b.ten_sp, count(a.ma_sp) as 'so_bl', a.ma_bl, a.ngay_bl, a.ma_sp, MAX(a.ngay_bl) as 'bl_moi_nhat', MIN(a.ngay_bl) as 'bl_cu_nhat'
             FROM binhluan a
            join sanpham b on a.ma_sp = b.ma_sp
            group by b.ma_sp
            order by so_bl desc limit $start, $limit";
        $row = pdo_query($sql);
        return $row;
    }
 

    function list__count_hh()
    {
        $sql = "SELECT count(ma_sp) as 'count_bl' FROM binhluan order by ma_sp desc";
        $value = pdo_query_value($sql);
        return $value;
    }

    function list_count_binh_luan_by_id_masp( $ma_sp)
    {
        $sql = "SELECT count(ma_bl) as 'count_bl' FROM binhluan
        where  ma_sp=?
        order by ma_bl desc";
        $value = pdo_query_value($sql, $ma_sp);
        return $value;
    }

    // danh sách người bình luận theo id khách hàng
    function list_people_bl_by_id($ma_kh)
    {
        $sql = "SELECT b.ho_ten FROM binhluan a
            join khachhang b on a.ma_kh = b.ma_kh
        where a.ma_kh=?
        order by ma_bl desc";
        $row = pdo_query($sql, $ma_kh);
        return $row;
    }

    // danh sách tên sản phẩm theo id hàng hóa
    function list_product_by_id($ma_sp)
    {
        $sql = "SELECT ten_sp FROM sanpham a
            join binhluan b on a.ma_sp = b.ma_sp
            where b.ma_sp = ?
            group by ten_sp
            " ;

        $row = pdo_query($sql, $ma_sp);
        return $row;
    }

    // danh sách những bình luận theo id hàng hóa
    function list_bl_by_ma_sp($ma_sp){
        $sql = "SELECT *, c.ho_ten FROM binhluan a
            join sanpham b on a.ma_sp = b.ma_sp
            join khachhang c on a.ma_kh = c.ma_kh
        where a.ma_sp=?
        order by ma_bl desc";
        $row = pdo_query($sql, $ma_sp);
        return $row;
    }
    // select bình luận theo id
    // tìm sản phẩm
    public function name_hh_by_id($ma_sp)
    {
        $sql = "SELECT b.ten_sp FROM binhluan a
            join sanpham b on a.ma_sp = b.ma_sp
        where a.ma_sp=?
        order by ma_bl desc";
        $row = pdo_query_value($sql, $ma_sp);
        return $row;
    }

    function delete_binh_luan($ma_bl)
    {
        $sql = "DELETE FROM binhluan where ma_bl=?";
        $result = pdo_execute($sql, $ma_bl);

        if ($result) {
            return "Xóa bình luận " . $result;
        } else {
            return "Xóa bình luận " . $result;
        }
    }

    function list_bl_by_ma_hh($ma_sp){
        $limit = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        $sql = "SELECT *, c.hoten, c.hinh FROM binhluan a
            join sanpham b on a.ma_sp = b.ma_sp
            join khachhang c on a.ma_kh = c.ma_kh
        where a.ma_sp=?
        order by ma_bl desc limit $start, $limit";
        $row = pdo_query($sql, $ma_sp);
        return $row;
    }

    // tìm sản phẩm
    public function search_product($search)
    {
        $limit = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        $sql = "SELECT b.ten_sp, count(a.ma_sp) as 'so_bl', a.ma_bl, a.ngay_bl, a.ma_sp, MAX(a.ngay_bl) as 'bl_moi_nhat', MIN(a.ngay_bl) as 'bl_cu_nhat'  FROM binhluan a
            join sanpham b on a.ma_sp = b.ma_sp
            where ten_sp LIKE '%$search%'
            group by b.ten_sp
            order by ma_bl desc limit  $start, $limit";
        $row = pdo_query($sql);
        return $row;

    }
   
}
