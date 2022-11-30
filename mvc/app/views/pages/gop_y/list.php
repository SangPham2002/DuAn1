<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#343A40 ; color: #fff; border-radius: 8px;"> QUẢN LÝ GÓP Ý NGƯỜI DÙNG</h2>

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
                <th>Mã đánh giá</th>
                <th>Nội dung</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Ngày nhập</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // kiểm tra search
            if (isset($_GET['search']) && !empty($_GET['search'])) {

                // $result = $pdo_loai_hang->search_ten_loai($_GET['search']);
                $categorys = GopY::search_noi_dung_dg($_GET['search']);
                // var_dump($result);
                if ($categorys) {
                   echo  "<h3 class='mt-2' style='color: green;font-weight: 600;'> Tìm thấy " . count($categorys) . " đánh giá </h3>";
                } else {
                    echo   "<h3 class='mt-2' style='color:red;font-weight: 600;'> Không tìm thấy loại đánh giá nào !</h3>";
                }
            } else {
                $categorys = GopY::list_gop_y();
            }
            if (!empty($categorys)) {
                foreach ($categorys as $u) : ?>
                    <tr>
                        <td><input type="checkbox" name="check_sp[]" value="<?php echo $u['ma_dg'] ?>" <?php if (isset($_POST['click_all'])) {
                                                                                                                echo "checked='checked'";
                                                                                                            } ?>></td>
                        <td><?= $u['ma_dg'] ?></td>
                        <td><?= $u['noidung'] ?></td>
                        <td><?= $u['ten_kh'] ?></td>
                        <td><?= $u['email'] ?></td>
                        <td><?= $u['ngay_nhap'] ?></td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc muốn xóa loại hàng này không ?')" href="?act=delete&id_delete=<?php echo $u['ma_dg'] ?>"><i class="material-icons" style="color: #E34724;">&#xE872;</i></a>
                        </td>
                    </tr>
            <?php endforeach;
            } ?>
        </tbody>
    </table>

    <div class="row mt-4" style="margin-top: 16px;">
        <button class=" py-1 px-4 mr-3 " style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;" name="click_all" type="submit">Chọn tất cả</button>
        <button class=" py-1 px-4 mr-3 " style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Bỏ chọn tất cả</button>

        <input onclick="return confirm('Bạn có chắc muốn xóa loại hàng này không ?')" type="submit" value="Xóa các mục chọn" name="del_click" class=" py-1 px-4 " style="border-radius: 4px; border: 1px solid #3f3f3f; background-color: #fff; padding: 4px 16px;">
   
  

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