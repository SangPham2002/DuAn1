<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#343A40 ; color: #fff; border-radius: 8px;">SỬA HÀNG HÓA</h2>

<form action="?act=btn_update" method="POST" enctype="multipart/form-data">
    <div >
        <div >
            <div class="mb-4">
                <p>MÃ HÀNG HÓA</p>
                <input type="text" name="ma_sp" style="background-color: #D1D1D1; border:1px solid black; width: 100%;height: 30px; padding: 8px;" placeholder="Auto Number" readonly value="<?php if (isset($ma_sp)) {
                                                                                                                                                                                                    echo $ma_sp;
                                                                                                                                                                                                } ?>">
            </div>

            <div class="mb-4">
                <p>TÊN HÀNG HÓA</p>
                <input type="text" name="ten_sp" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;" value="<?php if (isset($ten_sp)) {
                                                                                                                                    echo $ten_sp;
                                                                                                                                } ?>">
            </div>

            <div class="mb-4">
                <p>ĐƠN GIÁ</p>
                <input type="number" name="dongia" style="border:1px solid black; width: 100%;height: 30px;" value="<?php if (isset($gia)) {
                                                                                                                        echo $gia;
                                                                                                                    } ?>">
            </div>

            <div class="mb-4">
                <p>GIẢM GIÁ</p>
                <input type="number" name="giamgia" min="1" max="100" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;" value="<?php if (isset($giamgia)) {
                                                                                                                                                            echo $giamgia;
                                                                                                                                                        } ?>">
            </div>

            <div class="mb-4">
                <p>SỐ LƯỢNG</p>
                <input type="number" name="soluong" min="1"  style="border:1px solid black; width: 100%;height: 30px; padding: 4px;" value="<?php if (isset($soluong)) {
                                                                                                                                                            echo $soluong;
                                                                                                                                                        } ?>">
            </div>
            <div class="mb-4">
                <p>HÀNG ĐẶC BIỆT</p>
                <div class="p-1 border text-left border-black">
                    <input type="radio" name="hangDacBiet" id="" value="Đặc biệt" <?php
                                                                                    if (isset($dacbiet)) {
                                                                                        if ($dacbiet == 1) {
                                                                                            echo "checked='checked'";
                                                                                        }
                                                                                    }
                                                                                    ?>>
                    <label for="Đặc biệt">Đặc biệt</label>
                    <input class="ml-4" type="radio" name="hangDacBiet" id="" value="Bình thường" <?php
                                                                                                    if (isset($dacbiet)) {
                                                                                                        if ($dacbiet == 0) {
                                                                                                            echo "checked='checked'";
                                                                                                        }
                                                                                                    }
                                                                                                    ?>>
                    <label for="Bình thường">Bình thường</label>
                </div>
            </div>
        </div>
        <!-- end cột 1 -->
        <div >
          

            <div class="mb-4">
                <p>HÌNH ẢNH</p>
                <input type="file" name="productImage" id="input" style="border:1px solid black; width: 100%;height: 32px;" placeholder="Product Image">
            </div>

            <div class="mb-4">
                <p>NGÀY NHẬP</p>
                <input type="date" name="ngaynhap" style="border:1px solid black; width: 100%;height: 30px;" value="<?php if (isset($ngaynhap)) {
                                                                                                                        echo $ngaynhap;
                                                                                                                    } ?>">
            </div>
        </div>
        <!-- end cột 2 -->
        <div >
         
           
            <div class="mb-4">
                <p>LOẠI HÀNG</p>

                <select name="loaihang" id="" class="border border-black" style=" width: 100%;height: 30px;">
                    <option value="<?php if (isset($maloai)) echo $maloai; ?>"><?php if (isset($ten_loai)) echo $ten_loai; ?></option>
                    <?php
                    $result2 = Product::list_loai_hang();
                    if (!empty($result2)) {
                        foreach ($result2 as $u2) :

                    ?>
                            <option value="<?php echo $u2['ma_loai'] == $ma_loai ? $ma_loai : $u2['ma_loai'] ?>"><?php echo $u2['ten_loai'] ?></option>
                    <?php
                        endforeach;
                    }
                    ?>
                </select>
            </div>
            <div class="mb-4">
                <p>SỐ LƯỢT XEM</p>
                <input type="text" name="luotxem" style="background-color: #D1D1D1;padding: 4px; border:1px solid black; width: 100%;height: 30px;" placeholder="0" readonly value="<?php if (isset($luotxem)) {
                                                                                                                                                                                        echo $luotxem;
                                                                                                                                                                                    } ?>">
            </div>
        </div>
        <!-- end cột 3 -->
    </div>

    <div>
        <p>MÔ TẢ</p>
        <!-- <textarea  id="" cols="30" rows="5" style="width: 100%; border:1px solid #3f3f3f ;padding: 5px;"></textarea> -->
        <textarea name="mota" class="w-full border p-2" rows="6"> <?php if (isset($mota)) {
                                                                        echo $mota;
                                                                    } ?> </textarea>

    </div>
    <div class="my-4">
        <p style="color: red;">
            <?php

            if (isset($error)) {
                echo $error;
            }
            ?>
        </p>
        <button name="btn_update" class="px-4 py-1  mr-3" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Update</button>
        <button name="btn_rs" class="px-4 py-1  mr-3" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Nhập lại</button>

        <a href="?act=list" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Danh sách</a>

    </div>
</form>