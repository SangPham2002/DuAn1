<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#343A40 ; color: #fff; border-radius: 8px;">THỐNG KÊ </h2>
<form action="index.php" method="POST">
    <div>
        <div>
            <p class="text-center py-2 font-bold">Hàng hóa theo loại</p>
        </div>
        <table class="mb-4">
            <thead>
                <tr>
                    <th>LOẠI HÀNG</th>
                    <th>SỐ LƯỢNG</th>
                    <th>GIÁ CAO NHẤT</th>
                    <th>GIÁ THẤP NHẤT</th>
                    <th style="border-right: 1px solid #343A40;">GIÁ TRUNG BÌNH</th>
                </tr>

            </thead>
            <tbody>
                <?php

                $result = ThongKe::list_thong_ke_so_luong_hang_hoa();
                if (!empty($result)) {

                    foreach ($result as $u) :
                        // var_dump($u['ten_loai']);
                ?>
                        <tr>
                            <td><?php echo $u['ten_loai'] ?></td>
                            <td><?php echo $u['so_luong'] ?></td>
                            <td><?php echo isset($u['gia_max']) ? $u["gia_max"] : 0 ?></td>
                            <td><?php echo isset($u['gia_min']) ? $u["gia_min"] : 0 ?></td>
                            <td><?php echo isset($u['gia_tb']) ? $u["gia_tb"] : 0 ?></td>
                        </tr>
                <?php endforeach;
                } ?>


            </tbody>
        </table>
    </div>
    <!-- end hàng hóa theo loại -->

    <div class="flex gap-16">
        <div>
            <div>
                <p class="text-center py-2 font-bold">Số đơn hàng đã bán trong tháng</p>
            </div>
            <table class="mb-4">
                <thead>
                    <tr>
                        <th>Số lượng</th>
                       
                    </tr>

                </thead>
                <tbody>
                    <?php

                    $result2 = ThongKe::list_thong_ke_so_luong_don_hang();
                    if (!empty($result2)) {

                        foreach ($result2 as $u2) :
                            // var_dump($u['ten_loai']);
                    ?>
                            <tr>
                               
                                <td><?php echo $u2['so_luong'] ?></td>

                            </tr>
                    <?php endforeach;
                    } ?>


                </tbody>
            </table>
        </div>
        <!-- end số lượng hàng hóa trong đơn hàng -->

        <div>
            <div>
                <p class="text-center py-2 font-bold">Người dùng theo vai trò</p>
            </div>
            <table class="mb-4">
                <thead>
                    <tr>
                        <th>Vai trò</th>
                        <th style="border-right: 1px solid #3f3f3f;">SỐ LƯỢNG</th>

                    </tr>

                </thead>
                <tbody>
                    <?php

                    $result2 = ThongKe::list_thong_ke_kh_by_vai_tro();
                    if (!empty($result2)) {

                        foreach ($result2 as $u2) :
                            // var_dump($u['ten_loai']);
                    ?>
                            <tr>
                                <td><?php echo $u2['vaitro'] == 1 ? "Admin" : "Khách hàng" ?></td>
                                <td><?php echo $u2['so_luong'] ?></td>

                            </tr>
                    <?php endforeach;
                    } ?>


                </tbody>
            </table>
        </div>
        <!-- end người dùng theo vai trò -->

        <div>
            <div>
                <p class="text-center py-2 font-bold">Số sản phẩm đã bán trong tháng này</p>
            </div>
            <table class="mb-4">
                <thead>
                    <tr>
                        <th>MÃ SẢN PHẨM</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th style="border-right: 1px solid #3f3f3f;">SỐ LƯỢNG</th>

                    </tr>

                </thead>
                <tbody>
                    <?php

                    $result4 = ThongKe::so_sp_ban_in_1_month();
                    if (!empty($result4)) {

                        foreach ($result4 as $u4) :
                            // var_dump($u['ten_loai']);
                    ?>
                            <tr>
                                <td><?php echo $u4['ma_sp'] ?></td>
                                <td><?php echo $u4['ten_sp'] ?></td>
                                <td><?php echo $u4['so_luong'] ?></td>

                            </tr>
                    <?php endforeach;
                    } ?>


                </tbody>
            </table>
        </div>
        <!-- end số sp đã bán trong tháng này -->

    </div>

    <div class="my-4">
        <a href="?act=bieu_do" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Xem biểu đồ</a>
    </div>

</form>