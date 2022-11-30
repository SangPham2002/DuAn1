<p class="text-2xl" style="color: #F4A851;">Đổi mật khẩu</p>
<p class="mb-3">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
<hr>


<form action="" method="POST" class="grid grid-cols-12">
    <div class="mt-8 col-span-12 md:col-span-7 p-8 " style="border-right: 1px solid #ddd;">
        <table class="w-full">
            <tr >
                <td>Mật khẩu cũ: </td>
                <td><input class="border mb-4 w-full  p-1" type="password" name="pass"></td>
            </tr>
            <tr>
                <td>Mật khẩu mới: </td>
                <td> <input class="border mb-4  w-full  p-1" type="password" name="pass_new" >
                </td>
            </tr>

            <tr>
                <td>Nhập lại mật khẩu:  </td>
                <td> <input class="border mb-4   w-full  p-1" type="password" name="pass_new2" >
                </td>
            </tr>
            <tr>
            <td></td>
                <td> <input type="submit" value="Lưu" class="py-1 px-4 " style="background-color: #F4A851;" name="btn_update_pass"></td>
            </tr>
        </table>
        <p style="color: red;"><?php if ($error != "") echo $error; ?></p>

      
    </div>


    <!-- <div class="col-span-12 md:col-span-5 p-16">
        
    </div> -->
</form>