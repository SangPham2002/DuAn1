<?php
// require_once './app/models/BaseModel.php';

class Banner {
    

    function list_banner()
    {
       
        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        
        $start = ($page - 1) * $limit;

        $sql = "SELECT * FROM banner order by ma_banner desc limit $start, $limit";
        $row = pdo_query($sql);
        return $row;
    }

    function list_banner_by_status()
    {

        $sql = "SELECT * FROM banner where `status` = 1 ";
        $row = pdo_query($sql);
        return $row;
    }

    function add_banner($hinh)
    {
        $sql = "INSERT into banner(hinh) values(?)";
        $new_loai_hang = pdo_execute($sql, $hinh);

        if ($new_loai_hang) {
            return "Thêm banner " . $new_loai_hang;
        } else {
            return "Thêm banner " . $new_loai_hang;
        }
    }

    function update_banner($hinh, $status1 ,$ma_banner){
        $sql = "UPDATE banner set hinh=?, `status`=? where ma_banner=?";
        $result = pdo_execute($sql, $hinh, $status1, $ma_banner);
        if ($result) {
            return "Update banner " . $result;
        } else {
            return "Update banner " . $result;
        }
    }


    function delete_banner($ma_banner){
        $sql = "DELETE FROM banner where ma_banner='$ma_banner'";
        $result = pdo_execute($sql);

        if ($result) {
            return "Xóa banner " . $result;
        } else {
            return "Xóa banner " . $result;
        }
    }

    function list__count_banner()
    {
        $sql = "SELECT count(ma_banner) as 'count_banner' FROM banner order by ma_banner desc";
        $value = pdo_query_value($sql);
        return $value;
    }


    function list_banner_by_id($ma_banner)
    {
       
        $sql = "SELECT * FROM banner 
        where ma_banner = ?
        order by ma_banner desc";
        $row = pdo_query($sql,$ma_banner);
        return $row;
    }

     // tìm sản phẩm
     public function search_banner($search)
     {
         $limit = 5;
         $page = isset($_GET['page']) ? $_GET['page'] : 1;
         
         $start = ($page - 1) * $limit;
         $sql = "SELECT * FROM banner where ma_banner LIKE '%$search%' order by ma_banner desc limit  $start, $limit";
         $row = pdo_query($sql);
         return $row;                                                                                                                            
     }



}

?>