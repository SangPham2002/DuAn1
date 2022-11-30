<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#343A40 ; color: #fff; border-radius: 8px;"> QUẢN LÝ LOẠI HÀNG</h2>
<style>
    ul li {
        display: inline-block;
    }
</style>
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
                    <li class="inline-block" <?php echo $i == $page ? 'style="background-color: #343A40;color:#fff; border-radius: 8px;"' : '' ?>><a href="?page=<?php echo $i ?><?php echo isset($search) ? "&search=$search" : '' ?><?php echo isset($loai_hang) ? "&loai_hang=$loai_hang&submitCheckLoai=$submitCheckLoai" : '';   ?>" class='w3-button'><?php echo $i ?></a> </li>
                <?php } ?>

                <?php if ($page < $so_trang) {
                ?>
                 <li class="inline-block"><a href="?page=<?php echo $page + 1 ?><?php echo isset($search) ? "&search=$search" : '' ?>" class='w3-button'>&raquo;</a></li>
                <?php } ?>

            </ul>

        </div>

    </div>

</div>
<div class="float-right mb-2">

    <form action="" method="GET">
        <input class="w-52 h-8 p-3 font-bold border rounded-md" name="search" type="text" placeholder="Search" value="<?php if (isset($_GET['search'])) {
                                                                                                                            echo $_GET['search'];
                                                                                                                        } ?>">
        <input style="background: #343A40; color: #fff;" class="p-1 px-3 rounded-md" type="submit" value="Submit">
    </form>
    <!-- end search -->

</div>

<form action="" method="POST">

    <table>
        <thead>
            <tr>
                <th></th>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // kiểm tra search
            if (isset($_GET['search']) && !empty($_GET['search'])) {

                // $result = $pdo_loai_hang->search_ten_loai($_GET['search']);
                $categorys = LoaiHang::search_ten_loai($_GET['search']);
                // var_dump($result);
                if ($categorys) {
                   echo  "<h3 class='mt-2' style='color: green;font-weight: 600;'> Tìm thấy " . count($categorys) . " loại hàng </h3>";
                } else {
                    echo   "<h3 class='mt-2' style='color:red;font-weight: 600;'> Không tìm thấy loại hàng nào !</h3>";
                }
            } else {
                $categorys = LoaiHang::list_loai_hang();
            }
            if (!empty($categorys)) {
                foreach ($categorys as $u) : ?>
                    <tr>
                        <td><input type="checkbox" name="check_sp[]" value="<?php echo $u['ma_loai'] ?>" <?php if (isset($_POST['click_all'])) {
                                                                                                                echo "checked='checked'";
                                                                                                            } ?>></td>
                        <td><?= $u['ma_loai'] ?></td>
                        <td><?= $u['ten_loai'] ?></td>
                        <td><?= ($u['status'] == 1) ? "Đang sử dụng" : "Chưa sử dụng" ?></td>
                        <td>
                            <a href="?act=update&ma_loai=<?php echo $u['ma_loai'] ?>"><i class="material-icons " style="color: #FFC107;">&#xE254;</i></a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa loại hàng này không ?')" href="?act=delete&id_delete=<?php echo $u['ma_loai'] ?>"><i class="material-icons" style="color: #E34724;">&#xE872;</i></a>
                        </td>
                    </tr>
            <?php endforeach;
            } ?>
        </tbody>
    </table>

    <p style="color: red;">
        <?php
        if ($error != "") {
            echo $error;
        }
        ?>
    </p>
    <div class="row mt-4 gap-3" style="margin-top: 16px;">
        <button class=" py-1 px-4 " style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;" name="click_all" type="submit">Chọn tất cả</button>
        <button class=" py-1 px-4 " style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Bỏ chọn tất cả</button>

        <input onclick="return confirm('Bạn có chắc muốn xóa loại hàng này không ?')" type="submit" value="Xóa các mục chọn" name="del_click" class=" py-1 px-4 " style="border-radius: 4px; border: 1px solid #3f3f3f; background-color: #fff; padding: 4px 16px;">
   
        <a href="?act=add" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;text-decoration: none;">Nhập thêm</a>

    </div>
</form>

<div class="mt-4">
    <?php if (isset($_GET['search']) && !empty($_GET['search'])) { ?>
        <form action="" method="POST">
            <button type="submit" name="all_product" class="p-1 px-3 rounded-md" style="background: #3F3F3F; color: #fff;">Tất cả loại hàng</button>
        </form>
    <?php } ?>
</div>
<!--end all sản phẩm  -->