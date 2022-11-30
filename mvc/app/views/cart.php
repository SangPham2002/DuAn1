<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.tiny.cloud/1/hqu7rkbua1f9yiw4o0umokh5blx2hry628dd0p6banxt3z84/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/css/all.min.css">
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/fileCss/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <style>
        .table1 {
            border: 1px solid #3F3F3F;
            border-collapse: collapse;
            width: 100%;
            text-align: center;


        }

        .th {
            border: 1px solid #3F3F3F;
            border-right: 1px solid #fff;
            background-color: #3F3F3F;
            color: white;
            padding: 5px 10px;
        }

        .table1 th {
            /* border: 1px solid #3F3F3F; */
            background-color: #3F3F3F;
            color: white;

        }

        .table1 td {
            /* border-collapse: collapse; */
            border: 1px solid #3F3F3F;
            padding: 15px;
            /* border-bottom: 1px solid #3F3F3F; */
        }

        .table2 {
            /* border-collapse: collapse; */
            width: 100%;
            text-align: left;
            /* padding: 10px; */
        }

        .dang_nhap_tt {
            color: red;
            font-size: 18px;
        }

        @media(max-width:1024px) {

            .dang_nhap_tt {

                font-size: 15px;
            }

            .tong_tien {
                font-size: 15px;
            }

        }

        .cart{
                display: block;
            }
        @media(max-width:768px) {
            .cart{
                display: none;
            }
        }
    </style>
</head>


<body style=" font-family:'Cormorant Garamond',sans-serif ;">
    <header>
        <?php require_once './app/views/blocks/header.php'; ?>
    </header>
    <main style="background-color: #EBEDF5;">

        <section class="md:py-12">

            <div class="cart  w-10/12 m-auto " style="background-color: #fff; border-radius: 8px; padding: 40px; ">
                <p class="text-4xl" style=" font-weight: 800;line-height: 0px;">Giỏ hàng</p>
                <div class="">
                    <div class="flex justify-between">
                        <p class="my-auto" style="color: green; font-weight: 600; ">
                            <?php
                            if (isset($_SESSION['success_gio_hang'])) {
                                echo $_SESSION['success_gio_hang'];
                                unset($_SESSION['success_gio_hang']);
                            }
                            ?>
                        </p>
                        <!-- form tìm kiếm sản phẩm -->
                        <form action="" method="POST">
                            <input class="w-52 h-8 p-4 font-bold border rounded-md" name="search" type="text" placeholder="Search" value="<?php if (isset($_POST['search'])) {
                                                                                                                                                echo $_POST['search'];
                                                                                                                                            } ?>">
                            <input style="background: #3F3F3F; color: #fff;" class="p-1 px-3 rounded-md" type="submit" name="submitSearch" value="Submit">

                        </form>
                        <!-- end search -->
                    </div>

                    <form action="" method="POST">

                        <div>
                            <table class="table1" style="margin-top: 10px;">
                                <thead>
                                    <tr>

                                        <th class="th">Mã SP </th>
                                        <th class="th">Ảnh sản phẩm</th>
                                        <th class="th">Tên sản phẩm </th>
                                        <th class="th">Số lượng </th>
                                        <th class="th">Giá </th>
                                        <th class="th">Ngày nhập</th>
                                        <th class="th">Đặc biệt</th>
                                        <th class="">Xóa</th>

                                    </tr>
                                    <tr>


                                    </tr>
                                </thead>
                                <tbody style="font-weight: 600;">
                                    <?php
                                    // kiểm tra search
                                    if (isset($_POST['submitSearch']) && !empty($_POST['search'])) {

                                        $result = Product::search_product($_POST['search']);
                                        if ($result) {
                                            $thongBao =  "<h3 class=' m-1' style='color: green;font-weight: 600;'> Tìm thấy 1 sản phẩm </h3>";
                                            echo $thongBao;
                                        } else {
                                            $thongBao2 = "<h3 class=' m-1' style='color:red;font-weight: 600;'> Không tìm thấy sản phẩm nào !</h3>";
                                            echo $thongBao2;
                                        }
                                    }
                                    if (!isset($_SESSION['cart'])) {
                                        echo "Không có sản phẩm nào trong giỏ hàng";
                                    }
                                    ?>

                                    <?php

                                    if (isset($_SESSION['cart'])) {
                                        if (isset($thongBao)) {
                                            foreach ($_SESSION['cart'] as $key => $value) :
                                                if ($value['ten_sp'] == $_POST['search']) {  ?>
                                                    <tr>

                                                        <td><?php echo $key ?> </td>
                                                        <td><img class="mx-auto" src="../../../../../../Du_An_1/mvc/storage/image/<?= $value['hinh'] ?>" width="120"></td>
                                                        <td><?php echo $value['ten_sp'] ?></td>
                                                        <td><?php echo $value['qtity'] ?></td>
                                                        <td class="text-yellow-500 text-lg font-semibold">$<?php echo $value['gia'] ?>.00</td>
                                                        <td><?php echo $value['ngaynhap'] ?></td>
                                                        <td><?php echo $value['dacbiet'] == 1 ? "Hàng đặc biệt" : "Bình thường" ?></td>
                                                        <td>
                                                            <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không ?')" href="cart?act=cart&id_del=<?php echo $key ?>"> <i class="fas fa-trash-alt" style="color: #E34724;"></i></a>
                                                        </td>

                                                    </tr>

                                            <?php }
                                            endforeach; ?>
                                            <?php
                                        } else  if (isset($thongBao2)) {
                                        } else {
                                            foreach ($_SESSION['cart'] as $key => $value) : ?>
                                                <tr>
                                                    <td><?php echo $key ?> </td>
                                                    <td><img class="mx-auto" src="../../../../../../Du_An_1/mvc/storage/image/<?= $value['hinh'] ?>" width="120"></td>
                                                    <td><?php echo $value['ten_sp'] ?></td>
                                                    <td><?php echo $value['qtity'] ?></td>
                                                    <td class="text-yellow-500 text-lg font-semibold">$<?php echo $value['gia'] ?>.00</td>
                                                    <td><?php echo $value['ngaynhap'] ?></td>
                                                    <td><?php echo $value['dacbiet'] == 1 ? "Hàng đặc biệt" : "Bình thường" ?></td>
                                                    <td>
                                                        <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không ?')" href="cart?act=cart&id_del=<?php echo $key ?>"> <i class="fas fa-trash-alt" style="color: #E34724;"></i></a>
                                                    </td>

                                                </tr>
                                    <?php
                                            endforeach;
                                        }
                                    }  ?>

                                </tbody>
                                <tfoot style=" color:red;font-weight: 700;font-size: 20px;">
                                    <?php
                                    $tong = 0;
                                    $dem = 0;
                                    $_SESSION['count_product'] = 0;
                                    if (isset($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $key => $value) :
                                            $dem = (int)$value['qtity'] *  (int)$value['gia'];
                                            $tong += $dem;
                                            $_SESSION['count_product'] += (int)$value['qtity'];
                                        endforeach;
                                    }
                                    ?>

                                    <tr class="tong_tien">
                                        <td colspan="4">Tổng tiền: </td>
                                        <td colspan="1"> $<?php echo $tong ?>.00 </td>
                                        <td colspan="4">

                                            <!-- <a href="cart?act=thanh_toan">thanhtoan</a> -->
                                            <?php if (isset($_SESSION['ma_kh'])) {
                                                echo " <a href='cart?act=thanh_toan' style='background: #3F3F3F; color: #fff; ' class='p-1 px-3 rounded-md my-4'>Thanh toán</a>";
                                            } else {
                                                echo "<p class='dang_nhap_tt'>Đăng nhập để thanh toán</p>";
                                            } ?>
                                        </td>
                                    </tr>

                                </tfoot>
                            </table>


                        </div>
                    </form>
                    <!-- end danh sách sản phẩm -->
                    <div class="mt-4">
                        <?php if (isset($_POST['submitSearch']) && !empty($_POST['search'])) { ?>
                            <form action="" method="POST">
                                <button type="submit" name="all_product" class="p-1 px-3 rounded-md" style="background: #3F3F3F; color: #fff;">All Product</button>
                            </form>
                        <?php } ?>
                    </div>
                    <!--end all sản phẩm  -->
                </div>

            </div>
            <!--end giỏ hàng pc -->
            <div class="block md:hidden" style="background-color: #fff;">

                <form action="" method="POST" class="w-10/12 m-auto mt-8 py-8">
                    <p class="text-2xl md:text-4xl pb-2" style=" font-weight: 800;line-height: 0px;">Giỏ hàng</p>
                    <div>


                        <?php

                        if (isset($_SESSION['cart'])) {

                            foreach ($_SESSION['cart'] as $key => $value) : ?>

                                <div class="grid  grid-cols-12 gap-4 mt-4 ">
                                    <div class="col-span-5">
                                        <img class="" src="../../../../../../Du_An_1/mvc/storage/image/<?= $value['hinh'] ?>" width="100%" style="width: 100%; height: 100%;">
                                    </div>
                                    <div class="col-span-6 font-bold">
                                        <p><?php echo $value['ten_sp'] ?></p>
                                        <p><?php echo $value['qtity'] ?></p>
                                        <p class="flex"><span style="text-decoration: line-through;">$<?= $value['gia'] ?></span><span class="ml-2 " style="color: red;">$<?php echo $value['gia'] - ($value['gia'] * $value['giamgia'] / 100) ?></span></p>
                                    </div>
                                    <div class="col-span-1 my-auto">
                                        <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không ?')" href="cart?act=cart&id_del=<?php echo $key ?>"> <i class="fas fa-trash-alt" style="color: #E34724;"></i></a>

                                    </div>
                                </div>
                                <hr>




                        <?php
                            endforeach;
                        }
                        ?>
                        <div class="mt-4">
                            <?php
                            if (isset($_SESSION['ma_kh'])) {
                                echo " <a href='cart?act=thanh_toan' style='background: #3F3F3F; color: #fff; ' class='p-1 px-3 rounded-md my-4'>Thanh toán</a>";
                            } else {
                                echo "<p class='dang_nhap_tt'>Đăng nhập để thanh toán</p>";
                            }
                            ?>
                        </div>
                    </div>
                </form>
            </div>

        </section>
    </main>
    <footer>
        <?php require_once './app/views/blocks/footer.php'; ?>
    </footer>
    <script src="../../../../Du_An_1/mvc/storage/js/home.js"></script>
</body>