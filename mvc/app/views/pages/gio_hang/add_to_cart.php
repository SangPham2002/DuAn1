<?php
    $id = isset($_GET['id_addtoCart']) ? (int)$_GET['id_addtoCart'] : '';

        $product = Product::add_to_cart($id);
        echo "<pre>";
    if (isset($_GET['quantity'])) {
        $sl = $_GET['quantity'];
        // var_dump($sl); 
    }
        // var_dump($product);
        // nếu mà tồn tại product thì check giỏ hàng
        if ($product) {
            if (isset($_SESSION['cart'])) {
                // var_dump("đã tồn tại giỏ hàng");
                if (isset($_SESSION['cart'][$id])) {

                    if (isset($_GET['quantity'])) {
                        $sl = $_GET['quantity'];
                        $_SESSION['cart'][$id]['qtity'] += $sl;
                    }else {
                        $_SESSION['cart'][$id]['qtity'] += 1;  // số lượng
                    }
                }else{
                    if (isset($_GET['quantity'])) {
                        $sl = $_GET['quantity'];
                        $_SESSION['cart'][$id]['qtity'] = $sl;
                    }else {
                        $_SESSION['cart'][$id]['qtity'] = 1;  // số lượng
                    }
                    
                } 
                $_SESSION['cart'][$id]['ten_sp'] = $product[0]['ten_sp']; //name
                $_SESSION['cart'][$id]['gia'] = $product[0]['gia']; //giá
                $_SESSION['cart'][$id]['giamgia'] = $product[0]['giamgia']; //giảm giá
                $_SESSION['cart'][$id]['hinh'] = $product[0]['hinh']; //ảnh
                $_SESSION['cart'][$id]['ngaynhap'] = $product[0]['ngaynhap']; //ngày nhập
                $_SESSION['cart'][$id]['mota'] = $product[0]['mota']; //mô tả
                $_SESSION['cart'][$id]['dacbiet'] = $product[0]['dacbiet']; //đặc biệt
                $_SESSION['cart'][$id]['luotxem'] = $product[0]['luotxem']; //số lượt xem
                $_SESSION['cart'][$id]['maloai'] = $product[0]['maloai']; //mã loại
    
          //      $_SESSION['cart'][$id]['status'] = $product[0]['productStatus'];  //trạng thái (còn hàng or hết hàng)
                $_SESSION['success'] = "Tồn tại giỏ hàng, cập nhật thành công !";
                $_SESSION['count_product'] =0;
                foreach ($_SESSION['cart'] as $key => $value) {
                    $_SESSION['count_product'] += $value['qtity'];
                }
                
                 
                // var_dump($_SESSION['cart'][$id]['image']);
                // header("location:./app/views/pages/gio_hang/cart.php");  
                
            } else {
                // var_dump("chưa tồn tại");
                
                $_SESSION['cart'][$id]['ten_sp'] = $product[0]['ten_sp']; //name
                $_SESSION['cart'][$id]['gia'] = $product[0]['gia']; //giá
                $_SESSION['cart'][$id]['giamgia'] = $product[0]['giamgia']; //giảm giá
                $_SESSION['cart'][$id]['hinh'] = $product[0]['hinh']; //ảnh
                $_SESSION['cart'][$id]['ngaynhap'] = $product[0]['ngaynhap']; //ngày nhập
                $_SESSION['cart'][$id]['mota'] = $product[0]['mota']; //mô tả
                $_SESSION['cart'][$id]['dacbiet'] = $product[0]['dacbiet']; //đặc biệt
                $_SESSION['cart'][$id]['luotxem'] = $product[0]['luotxem']; //số lượt xem
                $_SESSION['cart'][$id]['maloai'] = $product[0]['maloai']; //mã loại
    
                if (isset($_GET['quantity'])) {
                    $sl = $_GET['quantity'];
                    $_SESSION['cart'][$id]['qtity'] = $sl;
                }else {
                    $_SESSION['cart'][$id]['qtity'] = 1;  // số lượng
                }
    
                $_SESSION['count_product'] =0;
                foreach ($_SESSION['cart'] as $key => $value) {
                    $_SESSION['count_product'] += $value['qtity'];
                }
          //      $_SESSION['cart'][$id]['status'] = $product[0]['productStatus'];  //trạng thái (còn hàng or hết hàng)
                $_SESSION['success'] = "Tạo mới giỏ hàng thành công !";
                // header("location:./app/views/pages/gio_hang/cart.php");
                // echo   $_SESSION['success'] ;
              
            }
        }else{
            $_SESSION['success'] = "Không tồn tại sản phẩm !";
            // header("location:./app/views/pages/gio_hang/cart.php"); 
        }
      

?>

