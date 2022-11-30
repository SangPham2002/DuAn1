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
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/fileCss/thanh_toan.css">
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/fileCss/myAccount.css">
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/fileCss/shop.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet prefetch" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">

</head>
<style>
    .sidebar_account {
        display: block;
    }

    @media(max-width:1280px) {
        .sidebar_account {
            display: none;
        }
    }

    
</style>

<body>
    <header>
        <?php require_once './app/views/blocks/header.php'; ?>
    </header>
    <div class="" style="background-color: #EBEDF5;">
        <section class="md:w-10/12 m-auto py-12 ">
            <div class="row grid grid-cols-12">
                <div class="sidebar_account col   col-span-12 xl:col-span-2 ">
                    <div class="flex">
                        <?php if (isset($hinh)) {
                        ?>
                            <img src="../../../Du_An_1/mvc/storage/image/<?= $hinh ?>" alt='' width='30' style="border-radius: 100%;">
                        <?php
                        } else { ?>
                            <span class="my-auto"><i class="far fa-user-circle text-5xl font-thin"></i></span>
                        <?php } ?>


                        <p class="ml-4"><?= $hoten ?></p>
                    </div>
                    <div class="flex mt-8">
                        <span><i class="far fa-user" style="color: #467EC3;"></i></span>
                        <div class="ml-2">
                            <ul>
                                <li class="hoverVang"><a href="login?act=myAccount">Tài khoản của tôi</a></li>
                                <li class="hoverVang"><a href="">Hồ sơ</a></li>
                                <li class="hoverVang"><a href="">Địa chỉ</a></li>
                                <li class="hoverVang"><a href="login?act=changePassword">Đổi mật khẩu</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-3 flex">

                        <div>
                            <ul>
                                <li class="hoverVang"><span><i class="far fa-calendar-minus" style="color: #467EC3;"></i></span><a class="ml-2" href="login?act=don_mua">Đơn mua</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-3 flex">

                        <div>
                            <ul>
                                <li class="hoverVang"><i class="far fa-bell" style="color: #F4A851;"></i><span style="color:#F4A851 ;font-weight: 600;"><?= $so_thong_bao ?></span><a class="ml-2" href="login?act=thong_bao">Thông báo</a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="menuAccount col col-span-12 xl:col-span-10 p-6" style="background-color: #fff; border: 1px solid #ddd;">
                    <div class="float-right block xl:hidden">
                        <div id="menu-btn2" class="fas fa-bars text-xl "></div>
                    </div>
                    <nav class="navbar2 sm:flex my-auto gap-16 p-4 ">
                        <div class="flex py-3 sm:py-0">
                            <?php if (isset($hinh)) {
                            ?>
                                <img src="../../../Du_An_1/mvc/storage/image/<?= $hinh ?>" alt='' width='80' style="border-radius: 100%;">
                            <?php
                            } else { ?>
                                <span class="my-auto"><i class="far fa-user-circle text-5xl font-thin"></i></span>
                            <?php } ?>


                            <p class="ml-2"><?php if (isset($_SESSION['ho_ten'])) echo $_SESSION['ho_ten']; ?></p>
                        </div>
                        <div class="flex py-3 sm:py-0">
                            <span><i class="far fa-user" style="color: #467EC3;"></i></span>
                            <div class="ml-2">
                                <ul>
                                    <li class="hoverVang "><a href="login?act=myAccount">Tài khoản của tôi</a></li>
                                    <li class="hoverVang"><a href="">Hồ sơ</a></li>
                                    <li class="hoverVang"><a href="">Địa chỉ</a></li>
                                    <li class="hoverVang"><a href="login?act=changePassword">Đổi mật khẩu</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=" flex py-3 sm:py-0">

                            <div>
                                <ul>
                                    <li class="hoverVang"><span><i class="far fa-calendar-minus" style="color: #467EC3;"></i></span><a class="ml-2" href="">Đơn mua</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=" flex py-3 sm:py-0">

                            <div>
                                <ul>
                                    <li class="hoverVang"><i class="far fa-bell" style="color: #F4A851;"></i><span style="color:#F4A851 ;font-weight: 600;"><?= $so_thong_bao ?></span><a class="ml-2" href="login?act=thong_bao">Thông báo</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <?php require_once $myPage ?>

                </div>

            </div>

        </section>
    </div>
    <footer>
        <?php require_once './app/views/blocks/footer.php'; ?>
    </footer>
    <script src="../../../../../../Du_An_1/mvc/storage/js/home.js"></script>
    <script>
        // --------menu myAccount---------------------
        // --------menu myAccount---------------------
        let menu2 = document.querySelector('#menu-btn2');
        let navbar2 = document.querySelector('.navbar2');

        menu2.onclick = () => {
            menu2.classList.toggle('fa-times');
            navbar2.classList.toggle('active2');
        }

        menu2.onscroll = () => {
            menu2.classList.remove('fa-times');
            navbar2.classList.remove('active2');
        };
    </script>



</body>

</html>