<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#343A40 ; color: #fff; border-radius: 8px;"> QUẢN LÝ ĐƠN HÀNG</h2>
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
<div style="float:right; margin-bottom: 8px;">
    <?php
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
<form action="" method="POST">
    <table>
        <thead>
            <tr>
                <th></th>
                <th>MÃ ĐH</th>   
                <th>MÃ KH</th>
                <th>Ngày mua</th>
                <th>Trạng thái</th>
                <th>QUẢN LÍ</th>
            </tr>

        </thead>
        <tbody>
            <?php

            // kiểm tra search
            if (isset($_GET['search']) && !empty($_GET['search'])) {

                $result = DonHang::search_product($_GET['search']);
                // var_dump($result);
                if ($result) {
                    echo "<h3 class='mt-2' style='color: green;font-weight: 600;'> Tìm thấy " . count($result) . " sản phẩm </h3>";
                } else {
                    echo "<h3 class='mt-2' style='color:red;font-weight: 600;'> Không tìm thấy sản phẩm nào !</h3>";
                }
            } else {

                $result = DonHang::list_don_hang();
            }

            if (!empty($result)) {
                foreach ($result as $u) :
            ?>
                    <tr>
                    <td><input type="checkbox" name="check_sp[]" value="<?php echo $u['ma_don_hang'] ?>" <?php if (isset($_POST['click_all'])) {
                                                                                                            echo "checked='checked'";
                                                                                                        } ?>></td>
                        <td><?= $u['ma_don_hang'] ?></td>
                        <td><?= $u['ma_kh'] ?></td>
                        <td><?= $u['ngay_mua'] ?></td>
                        <td class="text-center"><?php
                                if ($u['trang_thai'] == 0) {
                                    echo '<span style="background-color: greenyellow;padding: 5px 15px;border: 1px solid #3f3f3f; color:#000 ;border-radius: 8px;font-weight: 400;">Chưa duyệt</span>';
                                }elseif ($u['trang_thai'] == 1) {
                                    echo '<span style="background-color: #FFC107;padding: 5px 15px;border: 1px solid #3f3f3f; color:#000 ;border-radius: 8px; font-weight: 400;">Đã duyệt</span>';
                                }elseif ($u['trang_thai'] == 2) {
                                    echo '<span style="background-color: #17A2B8;padding: 5px 15px;border: 1px solid #3f3f3f; color:#fff ;border-radius: 8px; font-weight: 400;">Đang giao</span>';
                                }elseif ($u['trang_thai'] == 3) {
                                    echo '<span style="background-color: #28A544;padding: 5px 15px;border: 1px solid #3f3f3f; color:#fff ;border-radius: 8px; font-weight: 400;">Đã giao</span>';
                                }elseif ($u['trang_thai'] == 4) {
                                    echo '<span style="background-color: red;padding: 5px 15px;border: 1px solid #3f3f3f; color:#fff ;border-radius: 8px; font-weight: 400;">Đã hủy đơn</span>';
                                }
                            ?></td>
                        
                        <td >
                            <a href="?act=chi_tiet&ma_don_hang=<?php echo $u['ma_don_hang'] ?>"><i class="fas fa-address-book" ></i></a>
                        </td>
                    </tr>
            <?php endforeach;
            } ?>

        </tbody>

    </table>

    <div class="row mt-4">
        <button class=" py-1 px-4 mr-3 " style="border-radius: 4px; border: 1px solid #3f3f3f" name="click_all">Chọn tất cả</button>
        <button class=" py-1 px-4 mr-3" style="border-radius: 4px; border: 1px solid #3f3f3f">Bỏ chọn tất cả</button>
        <input onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này không ?')" type="submit" value="Xóa các mục chọn" name="del_click" class=" py-1 px-4 mr-3 " style="border-radius: 4px; border: 1px solid #3f3f3f; background-color: #fff;">
  
      
    </div>

    <div class="mt-4">
            <?php if (isset($_GET['search']) && !empty($_GET['search'])) { ?>
                <form action="" method="POST">
                    <button type="submit" name="all_product" class="p-1 px-3 rounded-md" style="background: #3F3F3F; color: #fff;">Tất cả sản phẩm</button>
                </form>
            <?php } ?>
        </div>
        <!--end all sản phẩm  -->
</form>
