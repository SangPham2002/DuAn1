<style>
    .thong_b:hover {
        background-color: #F8F8F8;
        cursor: pointer;
    }

    .thong_bao2 {
        display: block;
    }

    @media(max-width:640px) {
        .thong_bao2 {
            display: none;
        }
    }

</style>
<p class="text-2xl " style="color: #F4A851;">Thông báo</p>
<p class="mb-4">Nhanh chóng cập nhật những thông báo mới nhất</p>
<hr>

<?php
if (!empty($list_don_hang_thong_bao)) {

    foreach ($list_don_hang_thong_bao as $u) {
        extract($u);

        if ($trang_thai == 1) {
            $trangthai22 = "Đã xem" ;
        }else{
            $trangthai22 = "Chưa xem";
        }

        echo " <a href='login?act=chi_tiet_don_hang&ma_don_hang=$ma_don_hang&ma_thong_bao=$ma_thong_bao'>
            <div class='flex justify-between thong_b'>
            <div class='flex gap-4 py-4 '>
                <div>
                    <img src='../../../../../../Du_An_1/mvc/storage/image/$hinh_sp' alt='' width='100'>
                </div>
                <div>
                    <p class='text-xl font-bold '>$noi_dung</p>
                    <p>Tên SP: $ten_sp, SL: $so_luong_sp, Giá: $$gia_tien_sp,...
                    </p>
                    <p>$thoi_gian</p>
                </div>
            </div>
            <div class='thong_bao2 my-auto mr-4 '>
                <p class='border  px-4 py-1  float-right'>$trangthai22</p>
            </div>
        </div>
          
           </a>";
    }
}
?>