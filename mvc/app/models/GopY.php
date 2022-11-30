<?php
// require_once './app/models/BaseModel.php';

class GopY {
    

    function list_gop_y()
    {
       
        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        
        $start = ($page - 1) * $limit;

        $sql = "SELECT * FROM gopy order by ma_dg desc limit $start, $limit";
        $row = pdo_query($sql);
        return $row;
    }

    function add_gop_y($noidung, $ngay_nhap, $ten_kh, $email)
    {
        $sql = "INSERT into gopy(noidung, ngay_nhap, ten_kh, email) values(?,?,?,?)";
        $new_loai_hang = pdo_execute($sql, $noidung, $ngay_nhap, $ten_kh, $email);

        if ($new_loai_hang) {
            return "Thêm góp ý " . $new_loai_hang;
        } else {
            return "Thêm góp ý " . $new_loai_hang;
        }
    }

     // tìm sản phẩm
     public function search_noi_dung_dg($search)
     {
         $limit = 5;
         $page = isset($_GET['page']) ? $_GET['page'] : 1;
         
         $start = ($page - 1) * $limit;
         $sql = "SELECT * FROM gopy where noidung LIKE '%$search%' order by ma_dg desc limit  $start, $limit";
         $row = pdo_query($sql);
         return $row;                                                                                                                            
     }

     function delete_gop_y($ma_dg){
        $sql = "DELETE FROM gopy where ma_dg='$ma_dg'";
        $result = pdo_execute($sql);

        if ($result) {
            return "Xóa góp ý " . $result;
        } else {
            return "Xóa góp ý " . $result;
        }
    }

    function list__count_gop_y()
    {
        $sql = "SELECT count(ma_dg) as 'count_dg' FROM gopy order by ma_dg desc";
        $value = pdo_query_value($sql);
        return $value;
    }

}

?>