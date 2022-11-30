<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.tiny.cloud/1/hqu7rkbua1f9yiw4o0umokh5blx2hry628dd0p6banxt3z84/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/css/all.min.css">
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/fileCss/home.css">
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/fileCss/thanh_toan.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

</head>


<body style="background-color: #FAF8F5; font-family:'Cormorant Garamond',sans-serif ;">
    <header>
        <?php require_once './app/views/blocks/header.php'; ?>
    </header>
    <main style="background-color: #EBEDF5;">

        <section class="py-12 w-10/12 m-auto">

            <form action="" method="POST">
                <div class="grid grid-cols-12 gap-8 ">
                    <div class="col-span-12 lg:col-span-6 ">
                        <form action="" method="POST">
                            <div class="mb-4">
                                <p class="text-3xl font-bold">Địa Chỉ Mới</p>
                                <p>Để đặt hàng, vui lòng thêm địa chỉ nhận hàng</p>
                            </div>
                            <div class="mb-4">

                                <input type="text" name="ho_ten" style="border:1px solid black; width: 80%;height: 30px; padding: 8px;" placeholder="Họ và tên">
                            </div>
                            <div class="mb-4">

                                <input type="text" name="phone" style="border:1px solid black; width: 80%;height: 30px; padding: 8px;" placeholder="Số điện thoại">
                            </div>
                            <div class="mb-4">

                                <input type="text" name="diachi" style="border:1px solid black; width: 80%;height: 30px; padding: 8px;" placeholder="Tỉnh/ Thành phố, Quận/Huyện, Phường/Xã">
                            </div>
                            <div class="mb-4">

                                <input type="text" name="diachi_cu_the" style="border:1px solid black; width: 80%;height: 30px; padding: 8px;" placeholder="Địa chỉ cụ thể">
                            </div>
                            <div class="mb-4">
                                <p>Loại địa chỉ: </p>
                                <div class="p-1" id="loai_dia_chi" style="width: 80%;">

                                    <input type="radio" name="loai_diachi" id="c1" value="Nhà riêng" checked="checked">
                                    <label for="c1">Nhà riêng</label>
                                    <input class="ml-4" type="radio" name="loai_diachi" id="c2" value="Văn phòng">
                                    <label for="c2">Văn phòng</label>

                                </div>
                            </div>

                            <div class="mb-4">
                                <p>Nơi nhận hàng: </p>
                                <select id="noi_nhan" name="noi_nhan" onchange="ktraNoiNhan()" style="height: 30px;">
                                    <option value=""></option>
                                    <option value="Nội thành">Nội thành</option>
                                    <option value="Ngoại thành">Ngoại thành</option>
                                </select>
                            </div>
                            <div>
                                <p style="color: red;"><?php if ($error != "") echo $error; ?></p>
                            </div>

                        </form>
                    </div>
                    <div class="col-span-12 lg:col-span-6 p-8 don_hang">
                        <p class="text-3xl font-bold">Đơn Hàng Của Bạn</p>
                        <div>
                            <div class="flex justify-between py-2">
                                <p>Sản phẩm </p>
                                <p>Giá tiền</p>

                            </div>

                            <?php
                            $tong = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $value) :

                                    // var_dump($key);
                                    $dem = (int)$value['qtity'] *  (int)$value['gia'];
                                    $tong += $dem;
                            ?>
                                    <div class="flex justify-between " style="border-bottom: 1px solid #ddd;">
                                        <div class="flex justify-between ">
                                            <img src="../../../../../../Du_An_1/mvc/storage/image/<?= $value['hinh'] ?>" alt="" width="50">
                                            <p class="my-auto ml-2"> <?= $value['ten_sp'] ?> x <span><?= $value['qtity'] ?></span></p>
                                        </div>
                                        <p>$<?= $value['gia'] ?>.00</p>

                                    </div>

                            <?php

                                endforeach;
                            } ?>

                            <div class="flex justify-between py-2" style="border-bottom: 1px solid #ddd;">
                                <p>Tạm tính</p>
                                <p>$<?= $tong ?>.00</p>

                            </div>

                            <div class="flex justify-between py-2" style="border-bottom: 1px solid #ddd;">
                                <p>Phí vận chuyển</p>
                                <p>$<span id="phi_vc"></span>.00</p>

                            </div>
                            <div class="flex justify-between py-2 font-bold" style="border-bottom: 1px solid #ddd;">
                                <p>Tổng</p>
                                <input id="tong2" type="text" value="<?= $tong ?>" style="display: none;">

                                <p>$<span id="tongDonHang"></span>.00</p>

                            </div>
                            <div class="flex justify-between py-2">
                                <p class="font-bold">Trả tiền mặt khi nhận hàng</p>


                            </div>
                            <div class=" py-2">
                                <button type="submit" class="btn_thanh_toan" name="thanh_toan">Thanh toán</button>


                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </section>
    </main>
    <footer>
        <?php require_once './app/views/blocks/footer.php'; ?>
    </footer>

    <script>
        function ktraNoiNhan() {
            var noi_nhan = document.getElementById("noi_nhan").value;
            var tong = document.getElementById("tong2").value;
            var phiVC = document.getElementById("phi_vc");
            var tongDonHang = document.getElementById("tongDonHang");
            if (noi_nhan == "Ngoại thành") {


                phiVC.innerHTML = 20;
                phiVC = 20;
                // tong22 =  
                tongDonHang.innerHTML = Number(tong) + phiVC;
                // alert(tong);

            } else if (noi_nhan == "Nội thành") {
                phiVC.innerHTML = 10;
                phiVC = 10;
                // tong22 =  
                tongDonHang.innerHTML = Number(tong) + phiVC;
            }

        }
    </script>
    <script src="../../../../Du_An_1/mvc/storage/js/home.js"></script>
</body>