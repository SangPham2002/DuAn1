<p class="text-2xl" style="color: #F4A851;">Hồ sơ của tôi</p>
<p class="mb-3">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
<hr>


<form action="" method="POST" class="grid grid-cols-12" enctype="multipart/form-data">
    <div class="mt-8 col-span-12 md:col-span-8 px-8 pt-8 " style="border-right: 1px solid #ddd;">

        <table class="w-full">
            <tr>
                <td>Tên đăng nhập: </td>
                <td class="py-2"> <input class="border w-full  p-1" type="text" name="username" value="<?php if (isset($username)) echo $username; ?>" readonly></td>
            </tr>

            <tr>
                <td>Họ và tên: </td>
                <td class="py-2"><input class="border w-full p-1" type="text" name="hoten" value="<?php if (isset($hoten)) echo $hoten; ?>"></td>
            </tr>

            <tr>
                <td>Email: </td>
                <td class="py-2"> <input class="border   w-full p-1" name="email" type="email" value="<?php if (isset($email)) echo $email; ?>"></td>
            </tr>

            <tr>
                <td>Số điện thoại: </td>
                <td class="py-2"> <input class="border  w-full  p-1" name="phone" type="text" value="<?php if (isset($phone)) echo $phone; ?>"></td>
            </tr>

            <tr>
                <td>Địa chỉ: </td>
                <td class="py-2"> <input class="border p-1 w-full" type="text" name="diachi" value="<?php if (isset($diachi)) echo $diachi; ?>"></td>
            </tr>

            <tr>
                <td>Giới tính</td>
                <td class="py-2">

                    <div>
                        <input type="radio" name="gioi_tinh" id="" value="Nam" <?php
                                                                                if (isset($gioi_tinh)) {
                                                                                    if ($gioi_tinh == 1) {
                                                                                        echo "checked='checked'";
                                                                                    }
                                                                                }
                                                                                ?>>
                        <label for="Nam">Nam</label>
                        <input class="ml-4" type="radio" name="gioi_tinh" id="" value="Nữ" <?php
                                                                                            if (isset($gioi_tinh)) {
                                                                                                if ($gioi_tinh == 0) {
                                                                                                    echo "checked='checked'";
                                                                                                }
                                                                                            }
                                                                                            ?>>
                        <label for="Nữ">Nữ</label>
                </td>
            </tr>

        </table>
    </div>


    <div class=" col-span-12 md:col-span-4   p-8 lg:p-16 w-full">
        <img class="mb-4" src="../../../Du_An_1/mvc/storage/image/<?= $hinh ?>" alt="" width="130">
        <input type="file" name="hinh_anh" id="">
    </div>

    <div class=" col-span-12    px-8 w-full">
        <p><button type="submit" name="btn_update_user" class="py-1 px-4 " style="background-color: #F4A851;">Lưu</button></p>
        <div style="color: red; width: 100%;"><?php if ($error != "") echo $error; ?></div>
    </div>
</form>