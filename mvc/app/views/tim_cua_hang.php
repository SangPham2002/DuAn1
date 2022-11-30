<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bee Tea - Tìm cửa hàng</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.tiny.cloud/1/hqu7rkbua1f9yiw4o0umokh5blx2hry628dd0p6banxt3z84/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/css/all.min.css">
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/fileCss/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/fileCss/tim_cua_hang.css">
</head>

<body>
    <header>
        <?php require_once './app/views/blocks/header.php'; ?>
    </header>

    <div class="map" style="width: 125%;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1862.9539393580558!2d107.09720635818242!3d20.956214301302378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a5960dfdb93fb%3A0x8b3202b39ff9202a!2zWW90ZWEgSOG6oSBMb25n!5e0!3m2!1svi!2s!4v1636350355518!5m2!1svi!2s" style="border:0;" allowfullscreen="" loading="lazy" style="max-width: 100%; height: 500px;"></iframe>
    </div>
    <form action="" method="POST" class="w-10/12 m-auto">
        <div class="grid grid-cols-1 lg:grid lg:grid-cols-2 gap-8">
            <div class="infor col-span-1">
                <div class="title">
                    <p class="title_h1_2">Cửa hàng Bee Tea</p>
                    <span>
                        Cửa hàng chuyên bán các loại trà chanh và cà phê hàng đầu VN
                    </span>
                </div>
                <div class="address">
                    <p class="title_h1_2">Địa chỉ liên hệ</p>
                    <a href=""><span>beetea@gmail.com</span></a><br>
                    <a href=""><span>Yotea Hạ Long
                            189 Nguyễn Văn Cừ, Hồng Hải</span></a><br>
                    <a href=""><span>hotline: 0123456789 </span></a>
                </div>
                <div class="time_open">
                    <h2 class="title_h1_2">Thời gian mở cửa</h2>
                    <span>Thứ 2- Chủ Nhật: 9:00 - 23:00</span>
                </div>
            </div>

            <div class="mess col-span-1">
                <form action="tim_cua_hang" method="POST">
                    <p class="title_h1">Ý kiến khách hàng</p>
                    <div class="name_email">
                        <input type="text" name="name" placeholder="Tên khách hàng" style="border: 1px solid #4F4F4F;">
                    </div>
                    <div class="name_email">
                        <input type="text" name="email" placeholder="Địa chỉ Email" style="border: 1px solid #4F4F4F;">
                    </div>
                    <div class="cmt">
                        <textarea name="cmt" cols="40" rows="5" placeholder="Nội dung" style="border: 1px solid #4F4F4F;"></textarea>
                    </div>
                    <div>
                        <button type="submit" name="gui_ngay">Gửi Ngay</button>
                    </div>
                </form>
                <p style="color: red; margin-top: 10px;">
                    <?php
                    if ($error != "") {
                        echo $error;
                    }
                    ?>
                </p>
            </div>

        </div>
    </form>
    <footer class="mt-12">
        <?php require_once './app/views/blocks/footer.php'; ?>
    </footer>
    <script src="../../../../Du_An_1/mvc/storage/js/home.js"></script>
</body>


</html>