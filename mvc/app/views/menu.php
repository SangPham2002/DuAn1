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
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/fileCss/menu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/fileCss/tim_cua_hang.css">
    <style>
        .banner2 {
            max-width: 100%;
        }

        /* .img-banner {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)), url(../../../../../Du_An_1/mvc/storage/image/p2-img.jpg);
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
    <div class="banner3 w-full">
        <img src="../../../../../Du_An_1/mvc/storage/image/banner_menu.png" alt="" style="max-width: 100%;">
    </div>
    <div class="container w-10/12 m-auto mt-16">
        <div class="title">
            <p class="text-5xl">Bee Tea Hot.</p>
        </div>
        <div class="menu grid grid-cols-1    lg:grid lg:grid-cols-2 gap-8">
            <div class="menu1">
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Trà chanh truyền thống</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Chanh tươi</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Kim quất nha đam</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Quất tươi</p>

                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Quất lắc sữa</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Quất lắc sữa bạc hà</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
            </div>
            <div class="menu2">
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Trà chanh đào nhiệt đới</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Trà đào nhài</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Trà quất xí muội</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Trà trái cây nhiệt đới</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Trà vải hạt sen</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Trà chanh leo bưởi đào</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="background">
        <div class="background1">
            <div>
                <img src="../../../../../Du_An_1/mvc/storage/image/bg_menu.jpg" alt="" width="700">
            </div>
            <span>
                BIENDUM SODALES
            </span>
        </div>
    </div>
    <div class="container w-10/12 m-auto mt-16">
        <div class="title">
            <p class="text-5xl">Bee Tea "Love"</p>
        </div>
        <div class="menu grid grid-cols-1    lg:grid lg:grid-cols-2 gap-8">
            <div class="menu1">
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Sữa tươi chân châu đường đen</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Trà sữa kem xoài</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Hồng trà sữa chân châu đường đen</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Trà ô long nghệ nhân</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Sữa tươi xốt dâu tây</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Sữa dừa nhiệt đới</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
            </div>
            <div class="menu2">
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Sữa tươi hoa hồng</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Machiato Bee</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>

            </div>
        </div>
    </div>
    <!-- -------end---menu 2 -->

    <div class="container w-10/12 m-auto mt-16">

        <div class="menu grid grid-cols-1    lg:grid lg:grid-cols-2 gap-8">
            <div class="menu1">
                <div class="title">
                    <p class="text-5xl">Trà đào - Hoa quả</p>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Trà thạch đào sữa</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Trà đào cam xả</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Dưa hấu nha đam</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Sinh tố cam dừa</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Sinh tố chanh leo</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Chanh leo nha đam</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
            </div>
            <div class="menu2">
                <div class="title">
                    <p class="text-5xl">Sữa chua - Đá xay</p>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Chanh tuyết nha đam</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Sữa chua chanh leo</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>

                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Sữa chua dâu tây</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>

                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Sữa chua việt quất</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>

                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Sữa chua cà phê</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>

                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Matcha đá xay</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>

                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Việt quất đá xay</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>

                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Dâu tây đá xay</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>

            </div>
        </div>
    </div>
    <!-- end menu3------------ -->

    <div class="container w-10/12 m-auto mt-16">

        <div class="menu grid grid-cols-1    lg:grid lg:grid-cols-2 gap-8">
            <div class="menu1">
                <div class="title">
                    <p class="text-5xl">Coffee - Bee</p>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Coffee đen</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Coffee nâu</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Bạc xỉu</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Cốt dừa</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Cacao (Nóng/lạnh)</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
               
            </div>
            <div class="menu2">
                <div class="title">
                    <p class="text-5xl">Topping</p>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Trân châu trắng</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Trân châu đen</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>

                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Nha đam</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>

                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Thạch dừa</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>


            </div>
        </div>
    </div>
    <!-- --end menu 4------------- -->

    <div class="container w-10/12 m-auto mt-16">

        <div class="menu grid grid-cols-1    lg:grid lg:grid-cols-2 gap-8">
            <div class="menu1">
                <div class="title">
                    <p class="text-5xl">Ăn vặt</p>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Hướng dương</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Hướng dương ngọt</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Xúc xích chiên</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Nem chua rán</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Khoai lang kén</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>

                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Khoai tây chiên</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>

                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Khô gà lá chanh</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>

                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Heo cháy tỏi</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
                </div>
                <div class="name-pr">
                    <div class="inf-pr">
                        <div class="title-pr">
                            <p class="text-xl font-bold">Chả viên chiên</p>
                        </div>
                        <div class="line"></div>
                        <div class="price">$19.00</div>
                    </div>
                    <div><span>Lorem ipsum dolor sit amet.</span></div>
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