<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#343A40 ; color: #fff; border-radius: 8px;"> UPDATE KHÁCH HÀNG</h2>
<form action="?act=btn_update" method="post" enctype="multipart/form-data">
    <div >
        <div class="col-span-1">
            <div class="mb-4">
                <p>MÃ TÀI KHOẢN</p>
                <input type="text" name="ma_kh" style=" border:1px solid black; width: 100%;height: 30px; padding: 8px; background-color:#D1D1D1 ;" placeholder="Username" value="<?php if (isset($ma_kh)) echo $ma_kh; ?>" readonly>
            </div>
            <div class="mb-4">
                <p>TÊN TÀI KHOẢN</p>
                <input type="text" name="username" style=" border:1px solid black; width: 100%;height: 30px; padding: 8px;" placeholder="Username" value="<?php if (isset($username)) echo $username; ?>">
            </div>
            <div class="mb-4">
                <p>MẬT KHẨU</p>
                <input type="password" name="mat_khau" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;" value="<?php if (isset($pass)) echo $pass; ?>">
            </div>

            <div class="mb-4">
                <p>XÁC NHẬN MẬT KHẨU</p>
                <input type="password" name="xac_nhan_mat_khau" style="border:1px solid black; width: 100%;height: 32px;" value="<?php if (isset($pass)) echo $pass; ?>">
            </div>

            <div class="mb-4"> 
                <p>HỌ VÀ TÊN</p>
                <input type="text" name="ho_va_ten" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;" value="<?php if (isset($hoten)) echo $hoten; ?>">
            </div>

            <div class="mb-4">
                <p>Địa chỉ</p>
                <input type="text" name="diachi" style="border:1px solid black; width: 100%;height: 32px;" value="<?php if (isset($diachi)) echo $diachi; ?>">
            </div>
            <div class="mb-4">
                <p>ĐỊA CHỈ EMAIL</p>
                <input type="email" name="email" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;" value="<?php if (isset($email)) echo $email; ?>">
            </div>


            <div class="mb-4">
                <p>HÌNH ẢNH</p>
                <input type="file" name="hinh_anh" style="border:1px solid black; width: 100%;height: 30px;">
            </div>
            
            <div class="mb-4">
                <p>KÍCH HOẠT</p>
                <div class="p-1 border text-left border-black">
                    <input type="radio" name="kick_hoat" id="" value="Chưa kích hoạt" <?php
                                                                                        if (isset($kichhoat)) {
                                                                                            if ($kichhoat == 0) {
                                                                                                echo "checked='checked'";
                                                                                            }
                                                                                        }
                                                                                        ?>>
                    <label for="Chưa kích hoạt">Chưa kích hoạt</label>
                    <input class="ml-4" type="radio" name="kick_hoat" id="" value="Kích hoạt" <?php
                                                                                                if (isset($kichhoat)) {
                                                                                                    if ($kichhoat == 1) {
                                                                                                        echo "checked='checked'";
                                                                                                    }
                                                                                                }
                                                                                                ?>>
                    <label for="Kích hoạt">Kích hoạt</label>
                </div>
            </div>

        </div> 
        <!-- end cột 1 --> 
        <div class="col-span-1"> 
          

            <div class="mb-4">
                <p>VAI TRÒ</p>
                <div class="p-1 border text-left border-black">
                    <input type="radio" name="vai_tro" id="" value="Khách hàng" <?php
                                                                                if (isset($vaitro)) {
                                                                                    if ($vaitro == 0) {
                                                                                        echo "checked='checked'";
                                                                                    }
                                                                                }
                                                                                ?>>
                    <label for="Khách hàng">Khách hàng</label>
                    <input class="ml-4" type="radio" name="vai_tro" id="" value="Nhân viên" <?php
                                                                                            if (isset($vaitro)) {
                                                                                                if ($vaitro == 1) {
                                                                                                    echo "checked='checked'";
                                                                                                }
                                                                                            }
                                                                                            ?>>
                    <label for="Nhân viên">Nhân viên</label>
                </div>
            </div>

            

            <div class="mb-4">
                <p>Số điện thoại</p>
                <input type="text" name="phone" style="border:1px solid black; width: 100%;height: 32px;" value="<?php if (isset($phone)) echo $phone; ?>">
            </div>
        </div>
        <!-- end cột 2 -->
    </div>

    <div class="mb-4">
        <p style="color: red;">
            <?php
            if ($error != "") {
                echo $error;
            }
            ?>
        </p>
        <button name="btn_update" type="submit" class="mr-3" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Update</button>
        <button name="btn_rs"  class="mr-3" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Nhập lại</button>
        <a href="?act=list" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Danh sách</a>
    </div>
</form>