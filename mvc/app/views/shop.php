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
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/fileCss/chi_tiet_sp.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet prefetch" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">


</head>

<body >
    <header>
        <?php require_once './app/views/blocks/header.php'; ?>
    </header>
    <section class="mb-14" style="background-color: #F4F5F5;">
        <div class=" text-center ">
        <img src="../../../../../Du_An_1/mvc/storage/image/banner_shop.png" alt="" style="max-width: 100%;">
        </div>
    </section>
    <div>
        <section class="w-10/12 m-auto">
            <div id="fullProduct" class="xl:grid xl:grid-cols-7 gap-16 pt-5">

                <div id="right" class="col-span-7 xl:col-span-2">
                    <div class="mb-8">
                        <p class="text-3xl mb-2">Tìm kiếm</p>
                        <form action="" method="GET" class="w-5/12 xl:w-full border flex justify-between">
                            <input class="w-10/12 p-1 outline-none " type="text" placeholder="Tìm kiếm" name="search">
                            <button class="w-2/12  mx-auto btn_search" type="submit" name="submitSearch"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <ul>
                        <li class="border text-white pl-4 text-xl py-2" style="background-color: #F4A851;color: #000;">LOẠI HÀNG</li>

                        <div style="height: 250px; overflow: scroll;">
                            <?php


                            // $result = $pdo_loai_hang->list_loai_hang();
                            if (!empty($list_loai_hang)) {
                                foreach ($list_loai_hang as $u) :
                            ?>
                                    <li class="xam border px-4  py-2"><a href="?name_category=<?php echo $u['ten_loai'] ?>"><?php echo $u['ten_loai'] ?></a></li>
                            <?php endforeach;
                            } ?>

                        </div>
                        <li class="border px-4  py-2" style="background-color: #F4A851;color: #000;">
                            <form action="" method="GET">
                                <input class="w-full p-1 outline-none" type="text" name="search_loai" placeholder="Từ khóa tìm kiếm">
                            </form>
                        </li>
                    </ul>
                    <ul>
                        <li class="border text-white pl-4 text-xl py-2 mt-8" style="background-color: #F4A851;color: #000;">SẢN PHẨM ĐƯỢC YÊU THÍCH</li>
                        <?php



                        // $result = $pdo_top10->select_hh_top_10();
                        if (!empty($sp_top_10)) {
                            foreach ($sp_top_10 as $u) :
                        ?>
                                <li class="border px-4  py-2 flex gap-4">
                                    <a href="detail?act=chi_tiet_sp&ma_sp=<?php echo $u['ma_sp'] ?>"><img src="../../../../Du_An_1/mvc/storage/image/<?php echo $u['hinh'] ?>" alt="" width="120"></a>

                                    <div>
                                        <a class="text-xl" href="detail?act=chi_tiet_sp&ma_sp=<?php echo $u['ma_sp'] ?>"><?php echo $u['ten_sp'] ?></a>
                                        <p class="text-gray-400 text-xl font-semibold line-through">$<?php echo $u['gia'] ?>.00</p>
                                        <p class="text-yellow-500 text-xl font-semibold">$<?php echo $u['gia'] - ($u['gia'] * $u['giamgia'] / 100) ?>.00</p>
                                    </div>
                                </li>
                        <?php endforeach;
                        } ?>

                        <li class="border px-4  py-2" style="background-color: #F4A851;">
                            <p class="p-3"></p>
                        </li>
                    </ul>
                </div>

                <div id="BGproduct" class="col-span-7 xl:col-span-5">
                    <H4 class="italic text-3xl text-center text-red-200">Sản Phẩm Của Chúng Tôi</H4>
                    <p><?php if(isset($so_sp)) echo $so_sp?></p>
                    <div id="product" class="sm:grid sm:grid-cols-1 sm:grid sm:grid-cols-2 lg:grid lg:grid-cols-3 gap-8 mt-8 ">
                        <?php
                        if (!empty($products)) {
                            foreach ($products as $u) :

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
                                <div>
                                    <div class="tong_product mt-8">
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
                                                    <span class="text-2xl " style="color: #F4A851; font-weight: 600;">$<?php echo $u['gia'] - ($u['gia'] * $u['giamgia'] / 100) ?> </span>
                                                    <span class="text-2xl ml-2" style="color: gray; text-decoration: line-through; ">$<?= $u['gia'] ?></span>
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
                    <div class="mt-4">
                        <?php if (isset($_GET['submitSearch']) && !empty($_GET['search'])) { ?>
                            <form action="" method="POST">
                                <button type="submit" name="all_product" class="p-1 px-3 rounded-md" style="background: #3F3F3F; color: #fff;">Tất cả sản phẩm</button>
                            </form>
                        <?php } ?>
                    </div>
                    <!--end all sản phẩm  -->
                    <!-- end danh sách sản phẩm -->
                    <div class="my-8 text-center">

                        <div class="w3-container">
                            <div class="w3-bar">
                                <ul>
                                    <?php if ($page > 1) {
                                    ?>
                                        <li class="inline-block"> <a href="?page=<?php echo $page - 1 ?>" class='w3-button'>&laquo;</a> </li>
                                    <?php } ?>

                                    <?php
                                    for ($i = 1; $i <= $so_trang; $i++) { ?>
                                        <li class="inline-block" <?php echo $i == $page ? 'style="background-color: #3F3F3F;color:#fff; border-radius: 8px;"' : '' ?>><a href="?page=<?php echo $i ?><?php echo isset($search)  ? "&search=$search&submitSearch=Submit" : '' ?><?php echo isset($search_loai) ? "&search_loai=$search_loai" : '' ?><?php echo isset($name_category) ? "&name_category=$name_category" : '' ?><?php echo isset($name_product) ? "&name_product=$name_product" : '' ?>" class='w3-button'><?php echo $i ?></a> </li>
                                    <?php } ?>

                                    <?php if ($page < $so_trang) {
                                    ?>
                                        <li class="inline-block"><a href="?page=<?php echo $page + 1 ?>" class='w3-button'>&raquo;</a></li>
                                    <?php } ?>

                                </ul>

                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </section>
    </div>
</body>
<footer class="mt-16">
    <?php require_once './app/views/blocks/footer.php'; ?>
</footer>
<script src="../../../../Du_An_1/mvc/storage/js/home.js"></script>

</html>