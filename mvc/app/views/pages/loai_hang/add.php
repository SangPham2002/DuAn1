<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#343A40 ; color: #fff; border-radius: 8px; padding: 8px;"> THÊM MỚI LOẠI HÀNG</h2>
<form action="?act=btn_add" method="POST">
    <div class="mb-4">
        <p>Mã Loại</p>
        <input type="text" name="ma_loai" style="background-color: #D1D1D1; border:1px solid black; width: 100%;height: 30px; padding: 8px;" placeholder="Auto Number" readonly>
    </div>
    <div class="mb-4">
        <p>Tên Loại</p>
        <input type="text" name="ten_loai" style="border:1px solid black; width: 100%;height: 30px;">
    </div>
    <p style="color: red;">
            <?php
            if ($error != "") {
                echo $error;
            }
            ?>
        </p>
    <div class="mb-4">
        <button name="btn_add" class="px-4 py-1  mr-3" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Thêm mới</button>
        <button name="btn_rs" class="px-4 py-1 mr-3" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Nhập lại</button>
        <a href="?act=list" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;" class=" py-1 px-4 ">Danh sách</a>
    </div>
</form>