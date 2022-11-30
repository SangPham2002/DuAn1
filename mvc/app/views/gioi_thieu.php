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
    <style>
        .banner2 {
            max-width: 100%;
        }

        /* .img-banner {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)), url(../../../../../Du_An_1/mvc/storage/image/banner_about_us.png);
            max-width: 100%;
            color: #fff;
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
        } */

        .intro {
            max-width: 980px;
            margin: 150px auto;
            font-size: 20px;
            line-height: 30px;

        }









        .supplier {
            display: flex;
            justify-content: center;
            margin: 100px 0;
        }

        .supplier a img {
            max-width: 100%;
        }

        .supplier a {
            margin: 0 70px;
        }



        .text-footer {
            margin: 0 0 0 40px;
        }

        .text-footer span {
            font-size: 18px;
        }

        .text-footer h1 {
            font-size: 43px;
        }
    </style>
</head>

<body>
    <header>
        <?php require_once './app/views/blocks/header.php'; ?>
    </header>

    <section>
        <div class="img-banner">

          <img src="../../../../../Du_An_1/mvc/storage/image/banner_about_us.png" alt="">

        </div>
    </section>

    <section class="w-10/12 m-auto my-16">
        <div class="w-10/12 m-auto py-16">
            <p class="heading"> giới thiệu <span>lí do chọn chúng tôi</span> </p>
        </div>

        <div class="text-intro my-8 text-center">
            <p class="text-4xl mb-4">CÂU CHUYỆN CỦA CHÚNG TÔI</p>
            <p>Nằm tại Thị Trấn Phú Minh quán trà chanh Bee Tea nổi tiếng với những loại nước uống giải khát với mục tiêu giải trí trải nghiệm và thư giãn quán trà chanh luôn kĩ càng trong các loại đồ uống và dịch vụ khách hàng có thể tới trải nghiệm với chỗ ngoài thoáng mát thoải mái không gian rộng rãi nhân viên thân thiện.
            </p>
            <p> Các sản phẩm đồ uống hoàn toàn bảo đảm an toàn cho sức khỏe với tiêu chí vui lòng khách đến vừa lòng khách đi trà chanh Bee Tea hứa hẹn sẽ giúp cho khách hàng những loại đồ uống ngon nhất và một không gian giải trí tự nhiên thoải mái nhất</p>
        </div>
        <div class="about-img text-center">
            <img class="mx-auto" src="../../../../../Du_An_1/mvc/storage/image/about-img-1.jpg" alt="">
            <h3>LEO EGET BIBENDUM SODALES</h3>
        </div>
        </div>
    </section>



    <section class="standard w-10/12 m-auto grid grid-cols-1 md:grid md:grid-cols-2 gap-4">
        <div class="stand1 col-span-1">
            <div class="stand-info mt-4">
                <h1>100% Hữu cơ</h1>
                <span>Theme natoque penatibus et magnis dis parturient montes, augue velit cursus. Nullam quis
                    ante...</span>
            </div>
            <div class="stand-info mt-4">
                <h1>Chất lượng cao</h1>
                <span>Theme natoque penatibus et magnis dis parturient montes, augue velit cursus. Nullam quis
                    ante...</span>
            </div>
        </div>
        <div class="stand2 col-span-1">
            <div class="stand-info mt-4">
                <h1>Luôn tươi</h1>
                <span>Theme natoque penatibus et magnis dis parturient montes, augue velit cursus. Nullam quis
                    ante...</span>
            </div>
            <div class="stand-info mt-4">
                <h1>Công ty của chúng tôi</h1>
                <span>Theme natoque penatibus et magnis dis parturient montes, augue velit cursus. Nullam quis
                    ante...</span>
            </div>
        </div>
    </section>

    <div class="supplier">

        <a href="#">
            <img src="../../../../../Du_An_1/mvc/storage/image/clients-hover-img1.png" alt="">
        </a>

        <a href="#">
            <img src="../../../../../Du_An_1/mvc/storage/image/clients-hover-img2.png" alt="">
        </a>

        <a href="#">
            <img src="../../../../../Du_An_1/mvc/storage/image/clients-hover-img3.png" alt="">
        </a>

        <a href="#">
            <img src="../../../../../Du_An_1/mvc/storage/image/clients-hover-img4.png" alt="">
        </a>

        <a href="#">
            <img src="../../../../../Du_An_1/mvc/storage/image/clients-hover-img5.png" alt="">
        </a>
    </div>
    </div>
    <div class="img-footer grid grid-cols-1 xl:grid xl:grid-cols-2">
        <div class="banner-footer">
            <img src="../../../../../Du_An_1/mvc/storage/image/home-2-img-1.jpg" alt="">
        </div>
        <div class="text-footer pr-16">
            <div class="mt-8">
                <span>NHÀ CỦA TRÀ</span>
                <p class="text-4xl md:text-6xl">Khám phá sự kỳ diệu của trà, Đồ uống sức khỏe</p>
                <span>Theme natoque penatibus et magnis dis parturient lo ntes, aug uevelit cursus. Nullam quis ante.
                    Sed fringi lla mauris sit amet nibhdonec sodales sagittis mlga. Tellus eget, sem quam semper libero,
                    sit amet.</span>
            </div>
        </div>
    </div>
    </div>
    <footer class="mt-16">
        <?php require_once './app/views/blocks/footer.php'; ?>
    </footer>
    <script src="../../../../Du_An_1/mvc/storage/js/home.js"></script>
</body>




</html>