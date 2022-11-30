<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#343A40 ; color: #fff; border-radius: 8px;"> QUẢN LÝ KHÁCH HÀNG</h2>
<div class="my-8 text-center">

    <div class="w3-container">
        <div class="w3-bar">
            <ul>
                <?php if ($page > 1) {
                ?>
                    <li class="inline-block"> <a href="?page=<?php echo $page - 1 ?><?php echo isset($search) ? "&search=$search" : '' ?>" class='w3-button'>&laquo;</a> </li>
                <?php } ?>

                <?php
                for ($i = 1; $i <= $so_trang; $i++) { ?>
                    <li class="inline-block" <?php echo $i == $page ? 'style="background-color: #343A40;color:#fff; border-radius: 8px;"' : '' ?>><a href="?page=<?php echo $i ?><?php echo isset($search) ? "&search=$search" : '' ?>" class='w3-button'><?php echo $i ?></a> </li>
                <?php } ?>

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
        <form action="" method="POST">
            <select name="vai_tro" id="" class="border border-black" style=" height: 30px;">
                <option value="all">Tất cả</option>
                <option value="1">Admin</option>
                <option value="0">Khách hàng</option>


            </select>
            <input style="background: #343A40; color: #fff;" class="p-1 px-3 rounded-md" type="submit" name="submitCheckVaiTro" value="Submit">
        </form>
    </div>
    <div>
        <?php

        // kiểm tra search
      
        if (isset($_POST['all_product'])) {
            unset($_GET['search']);
        }
        ?>
        <form action="" method="GET">
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
                <th>Mã KH</th>
                <th>HỌ VÀ TÊN</th>
                <th>HÌNH ẢNH</th>
                <th>ĐỊA CHỈ EMAIL</th>
                <th>TÀI KHOẢN</th>
                <th>MẬT KHẨU</th>
                <th>KÍCH HOẠT</th>
                <th>VAI TRÒ</th>
                <th>ĐỊA CHỈ</th>
                <TH>SỐ ĐT</TH>
                <th>QUẢN LÍ</th>
            </tr>

        </thead>
        <tbody>
            <?php
            // kiểm tra search
            if (isset($_GET['search']) && !empty($_GET['search'])) {

                $result = KhachHang::search_ten_kh($_GET['search']);
                // var_dump($result);
                if ($result) {
                    echo "<h3 class='mt-2' style='color: green;font-weight: 600;'> Tìm thấy " . count($result) . " sản phẩm </h3>";
                } else {
                    echo "<h3 class='mt-2' style='color:red;font-weight: 600;'> Không tìm thấy sản phẩm nào !</h3>";
                }
            } else if (isset($_POST['submitCheckVaiTro'])) {
                // select theo vai trò
                $vai_tro = $_POST['vai_tro'];
                if ($vai_tro == 'all') {
                    $result = KhachHang::list_khach_hang();
                } else {
                    $result = KhachHang::list_khach_hang_theo_vai_tro($vai_tro);
                }
            } else {
                $result = KhachHang::list_khach_hang();
            }
            if (!empty($result)) {
                foreach ($result as $u) :
            ?>
                    <tr>
                        <td><input type="checkbox" name="check_sp[]" value="<?php echo $u['ma_kh'] ?>" <?php if (isset($_POST['click_all'])) {
                                                                                                            echo "checked='checked'";
                                                                                                        } ?>></td>
                        <td><?php echo $u['ma_kh'] ?></td>
                        <td><?php echo $u['hoten'] ?></td>
                        <td><img src="../../../../../../Du_An_1/mvc/storage/image/<?php echo $u['hinh'] ?>" alt="" width="120"></td>
                        <td><?php echo $u['email'] ?></td>
                        <td><?php echo $u['username'] ?></td>
                        <td>
                            <div style="width: 110px; overflow: hidden;"><?php echo $u['pass'] ?></div>
                        </td>
                        <td><?php echo $u['kichhoat'] == 1 ? 'Đã kích hoạt' : 'Chưa kích hoạt' ?></td>
                        <td><?php echo $u['vaitro'] == 1 ? 'Admin' : 'Khách hàng' ?></td>
                        <td><?php echo $u['diachi'] ?></td>
                        <td><?php echo $u['phone'] ?></td>
                        <td>
                            <a href="?act=update&ma_kh=<?php echo $u['ma_kh'] ?>"><i class="material-icons " style="color: #FFC107;">&#xE254;</i></a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa người dùng này không ?')" href="?act=delete&id_delete=<?php echo $u['ma_kh'] ?>"><i class="material-icons" style="color: #E34724;">&#xE872;</i></a>
                        </td>
                    </tr>
            <?php endforeach;
            } ?>

        </tbody>
    </table>
    <p style="color: red;margin-top: 15px;">
        <?php
        if ($error != "") {
            echo $error;
        }
        ?>
    </p>
    <div class="row mt-4">
        <button class="mr-3"  style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;" name="click_all">Chọn tất cả</button>
        <button class="mr-3" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Bỏ chọn tất cả</button>
        <input class="mr-3" onclick="return confirm('Bạn có chắc muốn xóa loại hàng này không ?')" type="submit" value="Xóa các mục chọn" name="del_click" class=" py-1 px-4 " style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">
        <a href="?act=add" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Nhập thêm</a>
        <div class="mt-4">
            <?php if (isset($_GET['search']) && !empty($_GET['search'])) { ?>
                <form action="" method="POST">
                    <button type="submit" name="all_product" class="p-1 px-3 rounded-md" style="background: #3F3F3F; color: #fff;">Tất cả sản phẩm</button>
                </form>
            <?php } ?>
        </div>
        <!--end all sản phẩm  -->
    </div>
</form>