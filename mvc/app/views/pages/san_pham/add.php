<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#343A40 ; color: #fff; border-radius: 8px;">THÊM MỚI HÀNG HÓA</h2>

<form action="?act=btn_add" method="POST" enctype="multipart/form-data">
    <div >
        <div class="col-span-1">
            <div class="mb-4">
                <p>MÃ HÀNG HÓA</p>
                <input type="text" name="ma_sp" style="background-color: #D1D1D1; border:1px solid black; width: 100%;height: 30px; padding: 8px;" placeholder="Auto Number" readonly>
            </div>

            <div class="mb-4">
                <p>TÊN HÀNG HÓA</p>
                <input type="text" name="ten_sp" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;">
            </div>

            <div class="mb-4">
                <p>ĐƠN GIÁ</p>
                <input type="number" name="dongia" style="border:1px solid black; width: 100%;height: 30px;">
            </div>
            <div class="mb-4">
                <p>GIẢM GIÁ</p>
                <input type="number" name="giamgia" min="1" max="100" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;">
            </div>

            <div class="mb-4">
                <p>SỐ LƯỢNG</p>
                <input type="number" name="soluong" min="1"  style="border:1px solid black; width: 100%;height: 30px; padding: 4px;">
            </div>
            <div>
                <p>HÀNG ĐẶC BIỆT</p>
                <div class="p-1 border text-left border-black">

                    <input type="radio" name="hangDacBiet" id="" value="Đặc biệt" >
                    <label for="Đặc biệt">Đặc biệt</label>
                    <input class="ml-4" type="radio" name="hangDacBiet" id="" value="Bình thường" checked='checked'>
                    <label for="Bình thường">Bình thường</label>
                </div>
            </div>
        </div>
        <!-- end cột 1 -->
        <div class="col-span-1">
            

            <div class="mb-4">
                <p>HÌNH ẢNH</p>
                <input type="file" name="productImage" id="input" style="border:1px solid black; width: 100%;height: 32px;" placeholder="Product Image">
            </div>

            <div class="mb-4">
                <p>NGÀY NHẬP</p>
                <input type="date" name="ngaynhap" style="border:1px solid black; width: 100%;height: 30px;">
            </div>
        </div>
        <!-- end cột 2 -->
        <div class="col-span-1">
           
            
            <div class="mb-4">
                <p>LOẠI HÀNG</p>
                <select name="loaihang" id="" class="border border-black" style=" width: 100%;height: 30px;">
                
                    <?php
                    $result2 = Product::list_loai_hang();
                    if (!empty($result2)) {
                        foreach ($result2 as $u) :
                    ?>
                   
                            <option value="<?php echo $u['ma_loai'] ?>"><?php echo $u['ten_loai'] ?></option>
                    <?php
                        endforeach;
                    }
                    ?>
                </select>
            </div>
           
        </div>
        <!-- end cột 3 -->
    </div>

    <div>
        <p>MÔ TẢ</p>
       
        <textarea name="mota" class="w-full border p-2" rows="6"> You are welcome ! </textarea>
                   
    </div>
    <div class="mb-4">
        <p style="color: red;">
            <?php
          
            if (isset($error)) {
                echo $error;
            }
            ?>
        </p>
        <button name="btn_add" class="mr-3" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Thêm mới</button>
        <button name="btn_rs" class="mr-3" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Nhập lại</button>

        <a href="?act=list" style="border-radius: 4px; border: 1px solid #3f3f3f" class=" py-1 px-4 ">Danh sách</a>

    </div>
</form>