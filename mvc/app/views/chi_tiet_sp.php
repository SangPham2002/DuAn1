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
<style>
    table {
        border: 1px solid #E8E8E8;
        border-collapse: collapse;
        width: 100%;
        text-align: left;
        font-weight: 900;
        padding: 10px;
    }

    th {
        border: 1px solid #E8E8E8;
        background-color: #E8E8E8;
        padding: 5px 10px;
    }
</style>

<body style=" font-family:'Cormorant Garamond',sans-serif ;">
    <header>
        <?php require_once './app/views/blocks/header.php'; ?>
    </header>

    <body>

        <form action="" method="POST">
            <section class=" w-10/12 mx-auto mt-16">

                <div class="product">
                    <div class="image">
                        <div class="imgbig">

                            <img class="imgtotal" src="../../../../Du_An_1/mvc/storage/image/<?= $hinh ?>" alt="">
                        </div>
                        <div class="imgsmall">
                            <div style="margin-bottom: 5px;">
                                <img class="imgcon" src="../../../../Du_An_1/mvc/storage/image/<?= $hinh ?>" alt="">
                            </div>
                            <div style="margin-bottom: 5px;">
                                <img class="imgcon" src="../../../../Du_An_1/mvc/storage/image/<?= $hinh ?>" alt="">
                            </div>

                        </div>
                    </div>
                    <div class="infor">
                        <div class="title">
                            <p class="text-4xl" style="color: #F4A851;"><?= $ten_sp ?></p>
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
                        <div class="price">
                            <span style="font-size: 24px;margin: 0 10px 0 0;color: #F4A851;">$<?php echo $gia - ($gia * $giamgia / 100) ?></span>

                            <strike style="font-size: 24px;">$<?= $gia ?></strike>
                        </div>
                        <div class="infor_pr"><?= $mota ?> </div>
                        <div class="quantity">
                            <div class="buttons_added">
                                <form action="" method="POST">
                                    <Label>Số Lượng: </Label>
                                    <input class="w-8 text-center" style="background: #F4A851;" onclick="var result = document.getElementById('quantity'); var qty = result.value; if( !isNaN(qty) &  qty > 1 ) result.value--;return false;" type='button' value='-' />
                                    <input class="w-10 text-center" id='quantity' min='1' name='quantity' type='text' value='1' />
                                    <input class="w-8 text-center" style="background: #F4A851;" onclick="var result = document.getElementById('quantity'); var qty = result.value; if( !isNaN(qty)) result.value++;return false;" type='button' value='+' />
                                    <!-- <a href="detail?act=add_to_cart&id_addtoCart=<?php echo $u['ma_sp'] ?>" class="py-1 px-4 ml-4 " style="width: 130px;border: 1px solid #3f3f3f;"></a> -->
                                    <button type="submit" name="add_to_cart">Thêm giỏ hàng</button>
                                </form>
                            </div>
                        </div>
                        <div class="tags">
                            <span>Mã hàng: <?= $ma_sp ?></span><br>
                            <span>Loại: <?= $ten_loai ?></span><br>
                            <span>Tags: ...</span>
                        </div>
                        <div class="share">

                            <label>Chia sẻ: </label>
                            <a href="http://"><i class="fab fa-facebook-square"></i></a>
                            <a href="http://"><i class="fab fa-twitter"></i></a>
                            <a href="http://"><i class="fab fa-pinterest"></i></a>
                            <a href="http://"><i class="fab fa-instagram"></i></a>

                        </div>
                    </div>
                </div>
                <div class="story">
                    <div class="title-str">
                        <a href=""><strike>
                                <h2>Mô Tả</h2>
                            </strike></a>
                        <a href="">
                            <h2>Thông Tin Sản Phẩm</h2>
                        </a>
                        <a href="">
                            <h2>Nhận Xét</h2>
                        </a>
                    </div>
                    <div class="text-str">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium reprehenderit, quaerat fuga facere
                        dolor molestiae laborum quis eligendi doloremque repudiandae! Velit atque dolorum ab excepturi nisi
                        ullam ut
                        necessitatibus placeat, quas eaque quo ipsa maxime quaerat inventore exercitationem, nihil nostrum
                        temporibus optio cum saepe quibusdam iusto impedit ea mollitia! Accusamus nisi sint eum temporibus natus
                        dolorum delectus laudantium accusantium sapiente, officia ex doloremque, voluptatem placeat quas. Quo
                        eligendi enim error, neque aliquam quia facere atque laudantium amet officia cupiditate quidem a earum
                        at
                        deserunt odit nam ut molestias nihil! Repudiandae numquam quidem quod magnam suscipit assumenda soluta
                        ratione fuga provident.
                    </div>
                </div>
                <!-- end -->
                <div class="mt-8">
                    <table>
                        <thead>
                            <tr>
                                <th>BÌNH LUẬN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <ul style=" padding: 10px 30px;">
                                        <?php
                                        if (!empty($result_bl)) {
                                            foreach ($result_bl as $u) :

                                        ?>
                                                <li style="border-bottom: 1px solid #ddd; padding: 15px 0;">
                                                    <div style="display: grid; grid-template-columns: 40px 1fr;">
                                                        <div>
                                                            <img style="border-radius: 100%;" src="../../../../Du_An_1/mvc/storage/image/<?= $u['hinh'] ?>" alt="" width="30">
                                                        </div>
                                                        <div>
                                                            <p><?= $u['hoten'] ?></p>

                                                            <div class="flex">
                                                                <div class="stars">
                                                                    <form action="">
                                                                        <div id="rating2">



                                                                            <input type="radio" id="star5" name="rating" value="5" <?php if (isset($u['so_sao']) && $u['so_sao'] >= 5) {
                                                                                                                                        echo "checked='checked'";
                                                                                                                                    } ?> />
                                                                            <label class="full" for="star5" title="Pretty good - 4 stars"></label>
                                                                            <input type="radio" id="star4" name="rating" value="4" <?php if (isset($u['so_sao']) && $u['so_sao'] == 4) {
                                                                                                                                        echo "checked='checked'";
                                                                                                                                    } ?> />
                                                                            <label class="full" for="star4" title="Pretty good - 4 stars"></label>

                                                                            <input type="radio" id="star3" name="rating" value="3" <?php if (isset($u['so_sao']) && $u['so_sao'] == 3) {
                                                                                                                                        echo "checked='checked'";
                                                                                                                                    } ?> />
                                                                            <label class="full" for="star3" title="Meh - 3 stars"></label>

                                                                            <input type="radio" id="star2" name="rating" value="2" <?php if (isset($u['so_sao']) && $u['so_sao'] == 2) {
                                                                                                                                        echo "checked='checked'";
                                                                                                                                    } ?> />
                                                                            <label class="full" for="star2" title="Kinda bad - 2 stars"></label>

                                                                            <input type="radio" id="star1" name="rating" value="1" <?php if (isset($u['so_sao']) && $u['so_sao'] == 1) {
                                                                                                                                        echo "checked='checked'";
                                                                                                                                    } ?> />
                                                                            <label class="full" for="star1" title="Sucks big time - 1 star"></label>

                                                                        </div>
                                                                    </form>

                                                                </div>
                                                                <span class="ml-3 font-normal my-auto "> <b>- </b> <?= $u['ngay_bl'] ?></span>
                                                            </div>
                                                            <p><?= $u['noidung'] ?></p>
                                                        </div>
                                                    </div>

                                                </li>
                                        <?php endforeach;
                                        } ?>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>

                            <th>
                                <?php
                                if (isset($_SESSION['ma_kh'])) {

                                ?>

                                    <input type="text" name="binhluan" class="w-full p-1 outline-none">
                                    <!-- <button type="submit" name="binhluan">Bình luận</button> -->

                                <?php
                                } else {
                                    echo " <p style='color: red;'>Đăng nhập để bình luận về sản phẩm này</p>";
                                }
                                ?>
                            </th>

                        </tfoot>
                    </table>


                </div>
                <!-- end bình luận -->
                <div class="relate">
                    <p class="text-4xl">Sản phẩm cùng loại</p>
                    <div class="slider_detail grid grid-cols-4 gap-8 ">
                        <?php

                        if (!empty($result_list_hh)) {
                            foreach ($result_list_hh as $u) :
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
                                            <img class="anh1" src="../../../../Du_An_1/mvc/storage/image/<?= $u['hinh'] ?>" alt="" style="max-width: 100%;height: 200px; width: 100%; ">
                                            <div class="text-center icon_product">
                                                <ul>
                                                    <li class="inline-block p-3 bg-white"><a href="cart?act=add_to_cart_shop&id_addtoCart=<?php echo $u['ma_sp'] ?>" class="add_cart "><i class="fas fa-shopping-cart text-mb"></i></a></li>

                                                    <li class="inline-block p-3 bg-white"><i class="fas fa-heart text-mb"></i></li>
                                                    <li class="inline-block p-3 bg-white"><a href="detail?act=chi_tiet_sp&ma_sp=<?php echo $u['ma_sp'] ?>"><i class="fas fa-eye text-mb"></i></a></li>
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
                        <?php
                                unset($tb_so_sao);
                            endforeach;
                        } ?>

                    </div>
                </div>

            </section>
        </form>



    </body>

    <footer>
        <?php require_once './app/views/blocks/footer.php'; ?>
    </footer>





    <!--slick slider -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.slider_detail').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            lazyLoad: 'ondemand',
            autoplaySpeed: 2000,
            prevArrow: '<button type="button" class="slick-prev"><span class="text-2xl">&#10094;</span></button>',
            nextArrow: '<button type="button" class="slick-next"><span class="text-2xl">&#10095;</span></button>',
            responsive: [{

                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 1300,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 660,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        $('.slider_banner').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: '<button type="button" class="slick-prev" style="left: 3%; top: 50%;"> <span class="prev">&#10094;</span>  </button>',
            nextArrow: '<button type="button" class="slick-next"style=" right: 5%; top: 50%;" ><span class="prev">&#10095;</span> </button>',

        });
    </script>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
</body>

</html>