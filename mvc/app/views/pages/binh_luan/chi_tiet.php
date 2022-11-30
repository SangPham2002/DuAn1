<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#343A40 ; color: #fff; border-radius: 8px;"> CHI TIẾT BÌNH LUẬN</h2>
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
                    <li class="inline-block" <?php echo $i == $page ? 'style="background-color: #343A40;color:#fff; border-radius: 8px;"' : '' ?>><a href="?act=chi_tiet&ma_sp=<?= $ma_hh?>&page=<?php echo $i ?><?php echo isset($search) ? "&search=$search" : '' ?>" class='w3-button'><?php echo $i ?></a> </li>
                <?php } ?>

                <?php if ($page < $so_trang) {
                ?>
                    <li class="inline-block"><a href="?page=<?php echo $page + 1 ?><?php echo isset($search) ? "&search=$search" : '' ?>" class='w3-button'>&raquo;</a></li>
                <?php } ?>

            </ul>

        </div>

    </div>

</div>
<h2 class="text-center p-3 mb-2 text-xl"> MÃ SẢN PHẨM:  <?php
                                                    // var_dump($_GET['ma_sp']);
                                                    if (isset($_GET['ma_sp'])) {
                                                        echo $_GET['ma_sp'];
                                                    }
                                                    ?></h2>
<form action="" method="POST">
    <table>
        <thead>
            <tr>
                <th></th>
                <th>MÃ BL</th>
                <th>NỘI DUNG BL</th>
                <th>NGÀY BÌNH LUẬN</th>
                <th>NGƯỜI BÌNH LUẬN</th>
                <th>MÃ KH</th>
                <th>QUẢN LÍ</th>
            </tr>

        </thead>
        <tbody>
            <?php


            if (!empty($result)) {
                foreach ($result as $u) :
            ?>
                    <tr>
                        <td><input type="checkbox" name="check_sp[]" value="<?php echo $u['ma_bl'] ?>" <?php if (isset($_POST['click_all'])) {
                                                                                                            echo "checked='checked'";
                                                                                                        } ?>></td>
                        <td><?php echo $u['ma_bl'] ?></td>
                        <td><?php echo $u['noidung'] ?></td>
                        <td><?php echo $u['ngay_bl'] ?></td>
                        <td><?php echo $u['hoten'] ?> </td>
                        <td><?php echo $u['ma_kh'] ?></td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc muốn xóa bình luận này không ?')" href="?act=delete&id_delete=<?php echo $u['ma_bl'] ?>"><i class="material-icons" style="color: #E34724;">&#xE872;</i></a>
                        </td>
                    </tr>
            <?php endforeach;
            } ?>


        </tbody>
    </table>
    <div class="row my-4">
        <button class="mr-3" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;" name="click_all" type="submit">Chọn tất cả</button>
        <button class="mr-3" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Bỏ chọn tất cả</button>
        <input onclick="return confirm('Bạn có chắc muốn xóa loại hàng này không ?')" type="submit" value="Xóa các mục chọn" name="del_click" class=" py-1 px-4 mr-3" style="border-radius: 4px; border: 1px solid #3f3f3f; background-color: #fff;">
        <a href="?act=list" class="mr-3" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Danh sách bình luận</a>
    </div>
</form>