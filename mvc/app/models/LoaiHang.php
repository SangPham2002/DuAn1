<?php
// require_once './app/models/BaseModel.php';

class LoaiHang {
    

    function list_loai_hang()
    {
       
        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        
        $start = ($page - 1) * $limit;

        $sql = "SELECT * FROM loaihang order by ma_loai desc limit $start, $limit";
        $row = pdo_query($sql);
        return $row;
    }

    function list_loai_hang_shop()
    {
       
        $sql = "SELECT * FROM loaihang order by ma_loai desc ";
        $row = pdo_query($sql);
        return $row;
    }

    function add_loai_hang($ten_loai)
    {
        $sql = "INSERT into loaihang(ten_loai) values(?)";
        $new_loai_hang = pdo_execute($sql, $ten_loai);

        if ($new_loai_hang) {
            return "Thêm loại hàng " . $new_loai_hang;
        } else {
            return "Thêm loại hàng " . $new_loai_hang;
        }
    }

    function update_loai_hang($ten_loai,$ma_loai, $status){
        $sql = "UPDATE loaihang set ten_loai=?, `status`=? where ma_loai=?";
        $result = pdo_execute($sql, $ten_loai, $status, $ma_loai);
        if ($result) {
            return "Update loại hàng " . $result;
        } else {
            return "Update loại hàng " . $result;
        }
    }

    function list_loai_hang_by_id($ma_loai)
    {
       
        $sql = "SELECT * FROM loaihang 
        where ma_loai = ?
        order by ma_loai desc";
        $row = pdo_query($sql,$ma_loai);
        return $row;
    }

    function list_loai_by_status()
    {

        $sql = "SELECT * FROM loaihang where `status` = 1 ";
        $row = pdo_query($sql);
        return $row;
    }
    function delete_loai_hang($ma_loai){
        $sql = "DELETE FROM loaihang where ma_loai='$ma_loai'";
        $result = pdo_execute($sql);

        if ($result) {
            return "Xóa loại hàng " . $result;
        } else {
            return "Xóa loại hàng " . $result;
        }
    }

    function list__count_loai_hang()
    {
        $sql = "SELECT count(ma_loai) as 'count_loai' FROM loaihang order by ma_loai desc";
        $value = pdo_query_value($sql);
        return $value;
    }

    // danh sách sản phẩm by loại hàng
    function list_hang_hoa_theo_loai_home()
    {

        $sql = "SELECT * FROM loaihang  where `status` = 1 ";
        $row = pdo_query($sql);
        return $row;
    }

     // tìm sản phẩm
     public function search_ten_loai($search)
     {
         $limit = 5;
         $page = isset($_GET['page']) ? $_GET['page'] : 1;
         
         $start = ($page - 1) * $limit;
         $sql = "SELECT * FROM loaihang where ten_loai LIKE '%$search%' order by ma_loai desc limit  $start, $limit";
         $row = pdo_query($sql);
         return $row;                                                                                                                            
     }



}

?>