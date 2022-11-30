<style>
    .thong_b:hover {
        background-color: #F8F8F8;
        cursor: pointer;
    }

    .thong_bao2 {
        display: block;
    }

    @media(max-width:640px) {
        
    }
</style>
<p class="text-2xl " style="color: #F4A851;">Đơn hàng của bạn</p>
<p class="mb-4">Nhanh chóng cập nhật những thông báo mới nhất</p>
<hr>

<?php
if (!empty($list_don_hang)) {

    foreach ($list_don_hang as $u) :
        // var_dump($u['ma_don_hang']);

        if ($u['trang_thai'] == 0) {
            $trang_t = "đang sử lí";
        } elseif ($u['trang_thai'] == 1) {
            $trang_t = "đã được duyệt";
        } elseif ($u['trang_thai'] == 2) {
            $trang_t = "đang giao";
        } elseif ($u['trang_thai'] == 3) {
            $trang_t = "đã giao thành công";
        } elseif ($u['trang_thai'] == 4) {
            $trang_t = "đã hủy";
        }
?>

        <a href='login?act=chi_tiet_don_hang&ma_don_hang=<?= $u['ma_don_hang']?>'>
            <div class='flex justify-between thong_b'>
                <div class='flex gap-4 py-4 '>
                    <div>
                        <img src='../../../../../../Du_An_1/mvc/storage/image/don_hang.png' alt='' width='100'>
                    </div>
                    <div>
                        <p class='text-xl font-bold '>Đơn hàng có mã <?= $u['ma_don_hang'] ?> <?= $trang_t ?></p>
                        <!-- <p>Tên SP: <?= $u['ten_sp'] ?>, SL: <?= $u['so_luong_sp'] ?>,... -->
                        </p>
                        <p>Tổng đơn: $<?= $u['tong_tien'] ?></p>
                        <p>Ngày mua: <?= $u['ngay_mua'] ?></p>
                        <div class='thong_bao2 my-auto  mt-4 float-left'>
                            <?php
                            if ($u['trang_thai'] == 0) {
                                echo " <p class='border  px-4 py-1  float-right' style='background-color: #ADFF2F;'>Đang sử lí</p>";
                            } elseif ($u['trang_thai'] == 1) {
                                echo "<p class='border  px-4 py-1  float-right'  style='background-color: #FFC107;'>Đã duyệt</p>";
                            } elseif ($u['trang_thai'] == 2) {
                                echo "<p class='border  px-4 py-1  float-right' style='background-color: #17A2B8;color:#fff'>Đang giao</p>";
                            } elseif ($u['trang_thai'] == 3) {
                                echo "<p class='border  px-4 py-1  float-right' style='background-color: #28A544;color:#fff'>Đã giao</p>";
                            } elseif ($u['trang_thai'] == 4) {
                                echo "<p class='border  px-4 py-1  float-right' style='background-color: red;color:#fff'>Đã Hủy</p>";
                            }
                            ?>

                        </div>
                    </div>

                </div>

            </div>

        </a>
<?php
    endforeach;
}
?>