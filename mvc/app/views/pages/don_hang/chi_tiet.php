<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#343A40 ; color: #fff; border-radius: 8px;"> CHI TIẾT ĐƠN HÀNG</h2>
<div class="my-8 text-center"></div>
<h2 class="text-center p-3 mb-2 text-xl">Đơn hàng: <?php
                                                    // var_dump($result);
                                                    if (isset($ma_don_hang)) {
                                                        echo $ma_don_hang;
                                                    }
                                                    ?></h2>
<form action="" method="POST">
    <div class="grid grid-cols-12 gap-8 ">
        <div class="col-span-7 p-8 don_hang">
            <p class="text-3xl font-bold">Thông tin giao hàng</p>
            <div>




                <div class="flex justify-between py-2 mt-4" style="border-bottom: 1px solid #ddd;">
                    <p>Họ tên người mua hàng: </p>
                    <p><?= $ho_ten ?></p>

                </div>

                <div class="flex justify-between py-2" style="border-bottom: 1px solid #ddd;">
                    <p>Số điện thoại: </p>
                    <p><?= $phone ?></p>


                </div>

                <div class="flex justify-between py-2" style="border-bottom: 1px solid #ddd;">
                    <p>Địa chỉ: </p>
                    <p><?= $diachi ?></p>
                </div>

                <div class="flex justify-between py-2" style="border-bottom: 1px solid #ddd;">
                    <p>Địa chỉ cụ thể: </p>
                    <p><?= $diachi_cu_the ?></p>
                </div>

                <div class="flex justify-between py-2" style="border-bottom: 1px solid #ddd;">
                    <p>Loại địa chỉ: </p>
                    <p><?= $loai_dia_chi == 1 ? "Nhà riêng" : "Văn phòng" ?></p>
                </div>

                <div class="flex justify-between py-2" style="border-bottom: 1px solid #ddd;">
                    <p>Nơi nhận: </p>
                    <p><?= $noi_nhan == 1 ? "Nội thành" : "Ngoại thành" ?></p>
                </div>

                <div class="flex justify-between py-2" style="border-bottom: 1px solid #ddd;">
                    <p>Ngày mua: </p>
                    <p><?= $ngay_mua ?></p>
                </div>

                <div>
                    <div class="float-right py-4 ">
                        <select name="trang_thai" id="" class="mr-4 h-9 my-auto" style="border: 1px solid #000;">
                            <option value="1">Duyệt</option>
                            <option value="2">Giao hàng</option>
                            <option value="3">Giao hàng thành công</option>
                            <option value="4">Hủy đơn</option>
                        </select>
                        <button type="submit" class="btn_thanh_toan" name="cap_nhat">Cập nhật</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-span-5 p-8 don_hang">
            <p class="text-3xl font-bold">Đơn Hàng</p>
            <div>
                <div class="flex justify-between py-2 mt-4">
                    <p>Sản phẩm </p>
                    <p>Giá tiền</p>

                </div>




                <?php foreach ($result as $tt_sp) : ?>
                    <div class="flex justify-between " style="border-bottom: 1px solid #ddd;">
                        <div class="flex justify-between ">
                            <img src="../../../../../../Du_An_1/mvc/storage/image/<?= $tt_sp['hinh_sp'] ?>" alt="" width="50">
                            <p class="my-auto ml-2"> <?= $tt_sp['ten_sp'] ?> x <span><?= $tt_sp['so_luong_sp'] ?></span></p>
                        </div>
                        <p class="my-auto">$<?= $tt_sp['gia_tien_sp'] ?>.00</p>
                    </div>
                <?php endforeach; ?>

                <div class="flex justify-between py-2" style="border-bottom: 1px solid #ddd;">
                    <p>Mã sản phẩm</p>
                    <p><?php foreach ($result as $key2) {
                            echo $key2['ma_sp'] . "  ";
                        } ?></p>

                </div>


                <div class="flex justify-between py-2" style="border-bottom: 1px solid #ddd;">
                    <p>Phí vận chuyển</p>
                    <p>$<?= $phi_vc ?>.00</p>

                </div>
                <div class="flex justify-between py-2 font-bold" style="border-bottom: 1px solid #ddd;">
                    <p>Tổng</p>
                    <p>$<?= $tong_tien  ?>.00</p>

                </div>
                <div class="flex justify-between py-2">
                    <p class="font-bold">Trả tiền mặt khi nhận hàng</p>


                </div>

            </div>

        </div>
    </div>
</form>