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
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/fileCss/chi_tiet_sp.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet prefetch" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
</head>

<body style=" font-family:'Cormorant Garamond',sans-serif ;">
    <header>
        <?php require_once './app/views/blocks/header.php'; ?>
    </header>

    <section id="home">
        <div class="banner py-32">
            <div class="row w-10/12 m-auto ">

                <div class="content">
                    <p class="text-5xl sm:text-6xl md:text-6xl    xl:text-7xl xl:leading-tight font-bold uppercase text-yellow-500">trà tươi vào buổi sáng</p>
                    <a href="../../../../Du_An_1/mvc/shop" class="btn">Đặt ngay</a>
                </div>

                <div class="image">
                    <img src="../../../../Du_An_1/mvc/storage/image/home-img-5.png" class="main-home-image" alt="">
                </div>

            </div>

            <div class="image-slider">
                <?php
                if (!empty($banner)) {

                    foreach ($banner as $u) :
                ?>
                        <img src="../../../../Du_An_1/mvc/storage/image/<?= $u['hinh'] ?>" alt="">
                <?php
                    endforeach;
                }
                ?>

            </div>
        </div>

    </section>

    <body>
        <section class="w-10/12 m-auto mb-8">
            <p class="heading"> Giới thiệu <span>Lí do chọn chúng tôi</span> </p>
        </section>
        <section class=" w-10/12 mx-auto mt-16 about " id="about">
            <div class="row">

                <div class="image">
                    <img src="../../../../Du_An_1/mvc/storage/image/Layer 1.png" alt="">
                </div>

                <div class="content">
                    <h3 class="title">Điều gì làm cho trà xanh của chúng tôi trở nên đặc biệt!</h3>
                    <p>Uống trà xanh vào buổi sáng sẽ giúp bạn tỉnh táo, làm việc hiệu quả, nâng cao sức đề kháng của cơ thể, tăng cường sinh lực và phòng chống bệnh tật. Sau khi ăn nhiều dầu mỡ, nên uống trà sẽ giúp tiêu hóa tốt hơn.</p>
                    <a href=".../../../../Du_An_1/mvc/gioi_thieu" class="btn">Đọc thêm</a>
                    <div class="icons-container">
                        <div class="icons">
                            <img src="../../../../Du_An_1/mvc/storage/image/about-icon-1.png" alt="">
                            <p >Trà chất lượng</p>
                        </div>
                        <div class="icons">
                            <img src="../../../../Du_An_1/mvc/storage/image/about-icon-2.png" alt="">
                            <p >Chi nhánh</p>
                        </div>
                        <div class="icons">
                            <img src="../../../../Du_An_1/mvc/storage/image/about-icon-3.png" alt="">
                            <p >Giao hàng miễn phí</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section class=" w-10/12 mx-auto mt-16">
            <div class="text-center mb-20 mt-8">
                <div>
                    <p class="heading"> SẢN PHẨM <span>Sản phẩm HOT</span> </p>
                </div>
            </div>
            <!-- end title  -->

            <div class="slider grid grid-cols-4 gap-8 ">
                <?php
                if (!empty($result)) {
                    foreach ($result as $u) :
                        $list_so_sao = Product::so_binh_luan($u['ma_sp']);
                        $tong_so_sao = 0;
                        foreach ($list_so_sao as $value) {
                            $tong_so_sao += $value['so_sao'];
                        }
                        $so_luong = count($list_so_sao);
                        // var_dump($tong_so_sao);
                        if ($so_luong > 0) {
                            $tb_so_sao = ceil($tong_so_sao / $so_luong);
                            // var_dump($tb_so_sao);
                        }
                ?>
                        <div style="padding: 10px; ">

                            <div class="tong_product">
                                <div id="img_product">
                                    <img class="anh1" src="../../../../Du_An_1/mvc/storage/image/<?= $u['hinh'] ?>" alt="" style="max-width: 100%;height: 250px; width: 100%; ">
                                    <div class="text-center icon_product">
                                        <ul>
                                            <li class="inline-block p-3 bg-white hover_icon_sp"><a href="cart?act=add_to_cart_shop&id_addtoCart=<?php echo $u['ma_sp'] ?>"><i class="fas fa-shopping-cart text-mb"></i></a></li>

                                            <li class="inline-block p-3 bg-white hover_icon_sp"><a href=""><i class="fas fa-heart text-mb"></i></a></li>
                                            <li class="inline-block p-3 bg-white hover_icon_sp"><a href="detail?act=chi_tiet_sp&ma_sp=<?php echo $u['ma_sp'] ?>"><i class="fas fa-eye text-mb"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="text-center mt-2">
                                    <div>
                                        <a href="detail?act=chi_tiet_sp&ma_sp=<?php echo $u['ma_sp'] ?>">
                                            <p class="text-2xl "><?= $u['ten_sp'] ?></p>
                                        </a>
                                        <div>
                                            <span class="text-2xl " style="color: #F4A851; font-weight: 600;">$<?= $u['gia'] ?></span>
                                            <span class="text-2xl ml-2" style="color: gray; text-decoration: line-through; ">$<?= $u['giamgia'] ?></span>
                                        </div>
                                    </div>
                                    <div class="stars">
                                        <form action="">
                                            <div id="rating">



                                                <input type="radio" id="star5" name="rating" value="5" <?php if (isset($tb_so_sao) && $tb_so_sao >= 5) {
                                                                                                            echo "checked='checked'";
                                                                                                        } ?> />
                                                <label class="full" for="star5" title="Pretty good - 4 stars"></label>
                                                <input type="radio" id="star4" name="rating" value="4" <?php if (isset($tb_so_sao) && $tb_so_sao == 4) {
                                                                                                            echo "checked='checked'";
                                                                                                        } ?> />
                                                <label class="full" for="star4" title="Pretty good - 4 stars"></label>

                                                <input type="radio" id="star3" name="rating" value="3" <?php if (isset($tb_so_sao) && $tb_so_sao == 3) {
                                                                                                            echo "checked='checked'";
                                                                                                        } ?> />
                                                <label class="full" for="star3" title="Meh - 3 stars"></label>

                                                <input type="radio" id="star2" name="rating" value="2" <?php if (isset($tb_so_sao) && $tb_so_sao == 2) {
                                                                                                            echo "checked='checked'";
                                                                                                        } ?> />
                                                <label class="full" for="star2" title="Kinda bad - 2 stars"></label>

                                                <input type="radio" id="star1" name="rating" value="1" <?php if (isset($tb_so_sao) && $tb_so_sao == 1) {
                                                                                                            echo "checked='checked'";
                                                                                                        } ?> />
                                                <label class="full" for="star1" title="Sucks big time - 1 star"></label>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>


                        </div>
                <?php unset($tb_so_sao);
                    endforeach;
                } ?>

            </div>
            <div class="text-center mt-16">
                <a href=".../../../../Du_An_1/mvc/shop" class="btn my-16 ">Xem thêm</a>
            </div>
        </section>
        <!-- end product -->

        <section class="bg_menu my-8">

            <div class="menu w-10/12 m-auto mb-8 pt-8 pb-24" id="menu">
                <p class="heading my-16 mb-28"> our menu <span> menu phổ biến</span> </p>

                <div class="box-container">

                    <a href="#" class="box">
                        <img src="../../../../Du_An_1/mvc/storage/image/sp_3.png" alt="">
                        <div class="content">
                            <h3>Our Special Tea</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, id.</p>
                            <span>$8.99</span>
                        </div>
                    </a>

                    <a href="#" class="box">
                        <img src="../../../../Du_An_1/mvc/storage/image/sp_4.png" alt="">
                        <div class="content">
                            <h3>Our Special Tea</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, id.</p>
                            <span>$8.99</span>
                        </div>
                    </a>

                    <a href="#" class="box">
                        <img src="../../../../Du_An_1/mvc/storage/image/sp_5.png" alt="">
                        <div class="content">
                            <h3>Our Special Tea</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, id.</p>
                            <span>$8.99</span>
                        </div>
                    </a>

                    <a href="#" class="box">
                        <img src="../../../../Du_An_1/mvc/storage/image/sp_7.png" alt="" >
                        <div class="content">
                            <h3>Our Special Tea</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, id.</p>
                            <span>$8.99</span>
                        </div>
                    </a>

                    <a href="#" class="box">
                        <img src="../../../../Du_An_1/mvc/storage/image/sp_10.png" alt="">
                        <div class="content">
                            <h3>Our Special Tea</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, id.</p>
                            <span>$8.99</span>
                        </div>
                    </a>

                    <a href="#" class="box">
                        <img src="../../../../Du_An_1/mvc/storage/image/sp_9.png" alt="">
                        <div class="content">
                            <h3>Our Special Tea</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, id.</p>
                            <span>$8.99</span>
                        </div>
                    </a>

                </div>
            </div>

        </section>

        <!-- menu section ends -->
        <!-- end title 2 -->
        <section class="w-10/12 m-auto my-28 mb-16">
            <p class="heading"> LOẠI HÀNG <span>Sản phẩm theo loại </span> </p>
        </section>

        <section class=" w-10/12 mx-auto my-16 ">
            <!-- <?php
                    foreach ($hh_by_loai as $u) {
                        var_dump($u['ma_loai']);
                    }
                    var_dump($hh_by_loai[0]['ten_loai']);
                    ?> -->

            <div class="sm:w-7/12 m-auto lg:grid lg:grid-cols-12 lg:gap-8 lg:w-full ">
                <div class="col-span-4 gap-8 item mt-8">
                    <a href="shop?name_category=<?php if (isset($hh_by_loai[0]['ten_loai'])) {
                                                    echo $hh_by_loai[0]['ten_loai'];
                                                } ?>">
                        <img src="../../../../Du_An_1/mvc/storage/image/ef5514e8fc792258233cc4ffcddd1a2c.jpg" alt="" style="height: 530px;">
                        <div class="item-content">
                            <div class="line" style="position: relative;">
                                <p class="text-4xl font-bold" style="color: #fff; position: absolute; top: 50%; left: 40%;"><?php if (isset($hh_by_loai[0]['ten_loai'])) {
                                                                                                                                echo $hh_by_loai[0]['ten_loai'];
                                                                                                                            } ?></p>
                            </div> <!-- border -->
                        </div>
                    </a>
                </div>
                <!--End ảnh cột 1 -->
                <div class="col-span-4 gap-8 ">
                    <div class="div    ">
                        <div class="mt-8 item ">
                            <a href="shop?name_category=<?php if (isset($hh_by_loai[1]['ten_loai'])) {
                                                            echo $hh_by_loai[1]['ten_loai'];
                                                        } ?>">
                                <img src="../../../../Du_An_1/mvc/storage/image/d3f64b56124da7b179ff88fda39c1f51.jpg" alt="" style="width: 100%;height: 250px;">
                                <div class="item-content">
                                    <div class="line">
                                        <p class="text-4xl font-bold" style="color: #fff; position: absolute; top: 40%; left: 35%;"><?php if (isset($hh_by_loai[1]['ten_loai'])) {
                                                                                                                                        echo $hh_by_loai[1]['ten_loai'];
                                                                                                                                    } ?></p>
                                    </div> <!-- border -->
                                </div>
                            </a>
                        </div>
                        <div class="mt-8 item">
                            <a href="shop?name_category=<?php if (isset($hh_by_loai[2]['ten_loai'])) {
                                                            echo $hh_by_loai[2]['ten_loai'];
                                                        } ?>">
                                <img src="../../../../Du_An_1/mvc/storage/image/645fb9c8a6690085b9e8cb30e9e836d1.jpg" alt="" style="width: 100%;height: 250px;">
                                <div class="item-content">
                                    <div class="line">
                                        <p class="text-4xl font-bold" style="color: #fff; position: absolute; top: 40%; left: 35%;"><?php if (isset($hh_by_loai[2]['ten_loai'])) {
                                                                                                                                        echo $hh_by_loai[2]['ten_loai'];
                                                                                                                                    } ?></p>
                                    </div> <!-- border -->
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!--End ảnh cột 2 -->
                <div class="mt-8 col-span-4 gap-8 item">
                    <a href="shop?name_category=<?php if (isset($hh_by_loai[3]['ten_loai'])) {
                                                    echo $hh_by_loai[3]['ten_loai'];
                                                } ?>">
                        <img src="../../../../Du_An_1/mvc/storage/image/ec54db152cf3978c64fe33a346188d19.jpg" alt="" style="height: 530px;">
                        <div class="item-content">
                            <div class="line">
                                <p class="text-4xl font-bold" style="color: #fff; position: absolute; top: 50%; left: 40%;"><?php if (isset($hh_by_loai[3]['ten_loai'])) {
                                                                                                                                echo $hh_by_loai[3]['ten_loai'];
                                                                                                                            } ?></p>
                            </div><!-- border -->
                        </div>
                    </a>
                </div>
                <!-- End ảnh cột 3 -->
            </div>
        </section>
        <!-- End-maketing -->

        <section class="w-10/12 mx-auto">
            <div class="text-center ">
                <video autobuffer autoplay loop muted style="object-fit: cover; background-size: cover; opacity: 1; margin: auto;  width: 100%;  display: block;" loop="" preload="auto">
                    <source src="https://chaai.qodeinteractive.com/wp-content/uploads/2021/08/video.mp4" type="video/mp4">

                </video>
            </div>
        </section>


    </body>

    <footer class="mt-16">
        <?php require_once './app/views/blocks/footer.php'; ?>
    </footer>




    <!--slick slider -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="../../../../Du_An_1/mvc/storage/js/home.js"></script>
</body>

</html>