<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#343A40 ; color: #fff; border-radius: 8px; padding: 8px;"> SỬA LOẠI HÀNG</h2>
<form action="?act=btn_update" method="POST">
    <div class="mb-4">
        <p>Mã Loại</p>
        <input type="text" name="ma_loai" style="background-color: #D1D1D1; border:1px solid black; width: 100%;height: 30px; padding: 8px;" value="<?php if (isset($ma_loai)) {
                                                                                                                                                        echo $ma_loai;
                                                                                                                                                    } ?>" placeholder="Auto Number" readonly>
    </div>
    <div class="mb-4">
        <p>Tên Loại</p>
        <input type="text" name="ten_loai" style="border:1px solid black; width: 100%;height: 30px; padding: 0 10px;" value="<?php if (isset($ten_loai)) {
                                                                                                                echo $ten_loai;
                                                                                                            } ?>">
    </div>
    <div class="mb-4">
        <p>Status</p>

        <div class="p-1  text-left  my-auto" style="border: 1px solid #3f3f3f;">
            <input type="radio" name="status" id="su_dung" value="Sử dụng" <?php
                                                                    if (isset($status)) {
                                                                        if ($status == 1) {
                                                                            echo "checked='checked'";
                                                                        }
                                                                    }
                                                                    ?>>
            <label for="su_dung">Sử dụng</label>
            <input class="ml-4" type="radio" name="status" id="k_du_dung" value="Không sử dụng" <?php
                                                                                        if (isset($status)) {
                                                                                            if ($status == 0) {
                                                                                                echo "checked='checked'";
                                                                                            }
                                                                                        }
                                                                                        ?>>
            <label for="k_du_dung">Không sử dụng</label>
        </div>
    </div>
    <p style="color: red;">
        <?php
        if ($error != "") {
            echo $error;
        }
        ?>
    </p>
    <div class="mb-4">
        <button name="btn_update" class=" mr-3" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;" type="submit">Cập nhật</button>
        <button name="btn_rs" class=" mr-3" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Nhập lại</button>
        <a href="?act=list" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;" >Danh sách</a>
    </div>
</form>