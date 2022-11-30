<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#343A40 ; color: #fff; border-radius: 8px;"> QUẢN LÝ HÀNG HÓA</h2>
<div class="my-8 text-center">
    <?php
    


    // kiểm tra search
    if (isset($_POST['all_product'])) {
        unset($_GET['search']);
        unset($search);
        $result = Product::list_hang_hoa();
    }


    if (isset($_GET['search']) && !empty($_GET['search'])) {

        $result = Product::search_product($search);
        // var_dump($result);
        // var_dump($search);
        if ($result) {
            echo "<h3 class='mt-2' style='color: green;font-weight: 600;'> Tìm thấy " . count($result) . " sản phẩm </h3>";
        } else {
            echo "<h3 class='mt-2' style='color:red;font-weight: 600;'> Không tìm thấy sản phẩm nào !</h3>";
        }
    } else if (isset($_GET['submitCheckLoai'])) {
        $submitCheckLoai = $_GET['submitCheckLoai'];
        // select theo loại hàng
        $loai_hang = $_GET['loai_hang'];
        // var_dump($loai_hang);
        if ($loai_hang == 'all') {
            $result = Product::list_hang_hoa();
        } else {
            $result = Product::list_hang_hoa_theo_loai($loai_hang);
        }
    } else {
        $result = Product::list_hang_hoa();
    }


    ?>
    <div class="w3-container">
        <div class="w3-bar">
            <ul>
                <?php if ($page > 1) {
                ?>
                    <li class="inline-block"> <a href="?page=<?php echo $page - 1 ?><?php echo isset($search) ? "&search=$search" : '' ?>" class='w3-button'>&laquo;</a> </li>
                <?php } ?>

                <?php
                for ($i = 1; $i <= $so_trang; $i++) { ?>
                    <li class="inline-block" <?php echo $i == $page ? 'style="background-color: #343A40;color:#fff; border-radius: 8px;"' : '' ?>><a href="?page=<?php echo $i ?><?php echo isset($search) ? "&search=$search" : '' ?><?php echo isset($loai_hang) ? "&loai_hang=$loai_hang&submitCheckLoai=$submitCheckLoai" : '';   ?>" class='w3-button'><?php echo $i ?></a> </li>
                <?php }
                ?>

                <?php if ($page < $so_trang) {
                ?>
                    <li class="inline-block"><a href="?page=<?php echo $page + 1 ?><?php echo isset($search) ? "&search=$search" : '' ?>" class='w3-button'>&raquo;</a></li>
                <?php } ?>

            </ul>

        </div>

    </div>

</div>
<div class=" mb-2 flex justify-between">
    <div>
        <form action="" method="GET">
            <select name="loai_hang" id="" class="border border-black" style=" height: 30px;">
                <option value="all">Tất cả</option>
                <?php
              
                $result_list_l = Product::list_loai_hang();
                if (!empty($result_list_l)) {

                    foreach ($result_list_l as $u) :
                ?>

                        <option value="
                                            <?php
                                            echo $u['ma_loai'];
                                            ?>"><?php
                                                echo $u['ten_loai'];
                                                ?></option>
                <?php
                    endforeach;
                }
                ?>

            </select>
            <input style="background: #343A40; color: #fff;" class="p-1 px-3 rounded-md" type="submit" name="submitCheckLoai" value="Submit">
        </form>
    </div>
    <div>

        <form action="" method="GET" role="form">
            <input class="w-52 h-8 p-3 font-bold border rounded-md" name="search" type="text" placeholder="Search" value="<?php if (isset($_GET['search'])) {
                                                                                                                                echo $_GET['search'];
                                                                                                                            } ?>">
            <input style="background: #343A40; color: #fff;" class="p-1 px-3 rounded-md" type="submit" value="Submit">
        </form>
        <!-- end search -->

    </div>
</div>
<form action="" method="POST">
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Mã HH</th>
                <th>Tên HH</th>
                <th>Hình ảnh</th>
                <th>Đơn giá</th>
                <th>Giảm giá</th>
                <th>Số lượng</th>
                <th>Hàng đặc biệt</th>
                <th>Ngày nhập</th>
                <th>Loại hàng</th>
                <th>Số lượt xem</th>
                <th>Quản lí</th>
            </tr>

        </thead>
        <tbody>
            <?php

            if (!empty($result)) {
                foreach ($result as $u) :

            ?>
                    <tr>
                        <td><input type="checkbox" name="check_sp[]" value="<?php echo $u['ma_sp'] ?>" <?php if (isset($_POST['click_all'])) {
                                                                                                            echo "checked='checked'";
                                                                                                        } ?>></td>
                        <td><?php echo $u['ma_sp'] ?></td>
                        <td><?php echo $u['ten_sp'] ?></td>
                        <td> <img src="../../../../../../Du_An_1/mvc/storage/image/<?php echo $u['hinh']?>" alt="" width="120">    </td>
                       
                        <td><?php echo $u['gia'] ?></td>
                        <td><?php echo $u['giamgia'] ?></td>
                        <td><?php echo $u['soluong'] ?></td>
                        <td><?php echo $u['dacbiet'] == 1 ? 'Đặc biệt' : 'Bình thường' ?></td>
                        <td><?php echo $u['ngaynhap'] ?></td>
                        <td><?php
                            if ($u['maloai'] == null) {
                                echo "Không có trong loại hàng";
                            } else {
                                $ten_loai = Product::ten_loai_hang($u['maloai']);
                                echo $ten_loai;
                            }
                            ?> </td>
                        <td><?php echo $u['luotxem'] ?></td>
                        <td>
                            <a href="?act=update&ma_sp=<?php echo $u['ma_sp'] ?>"><i class="material-icons " style="color: #FFC107;">&#xE254;</i></a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không ?')" href="?act=delete&id_delete=<?php echo $u['ma_sp'] ?>"><i class="material-icons" style="color: #E34724;">&#xE872;</i></a>
                        </td>
                    </tr>
            <?php
                endforeach;
            }
            ?>
        </tbody>
    </table>
    <div class="row mt-4 gap-4">
        <button class=" py-1 px-4 " style="border-radius: 4px; border: 1px solid #3f3f3f" name="click_all">Chọn tất cả</button>
        <button class=" py-1 px-4 " style="border-radius: 4px; border: 1px solid #3f3f3f">Bỏ chọn tất cả</button>
        <input onclick="return confirm('Bạn có chắc muốn xóa loại hàng này không ?')" type="submit" value="Xóa các mục chọn" name="del_click" class=" py-1 px-4 " style="border-radius: 4px; border: 1px solid #3f3f3f; background-color: #fff; padding: 4px 16px;">

        <a href="?act=add" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;text-decoration: none;">Nhập thêm</a>
        

    </div>
    <div class="mt-4 ">
            <?php if (isset($_GET['search']) && !empty($_GET['search'])) { ?>
                <form action="" method="POST">
                    <button type="submit" name="all_product" class="p-1 px-3 rounded-md " style="background: #3F3F3F; color: #fff;">Tất cả sản phẩm</button>
                </form>
            <?php } ?>
        </div>
        <!--end all sản phẩm  -->

</form>

