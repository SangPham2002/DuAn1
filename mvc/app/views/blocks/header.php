<header>
    <div class="  mx-auto bg-white ">
        <div class="header md:w-10/12 md:m-auto flex items-center justify-between text-center gap-4 my-2   bg-white px-8  md:px-0 ">
            <div class="menu_header ">
                <div id="menu-btn" class="fas fa-bars text-xl "></div>
            </div>
            <div class="logo  my-auto py-2">
                <a href="../../../../Du_An_1/mvc/"> <img src="../../../../../Du_An_1/mvc/storage/image/logo.png" alt="" width="70"></a>
            </div>

            <nav class="navbar my-auto text-center md:block">
                <ul>
                    <li class="hoverVang inline-block px-8 md:px-2 lg:px-4 "><a href="../../../../Du_An_1/mvc/" class=" text-lg lg:text-xl ">Trang chủ</a></li>
                    <li class="hoverVang inline-block px-8 md:px-2 lg:px-4 "><a href="../../../../Du_An_1/mvc/shop" class="text-lg lg:text-xl">Cửa hàng</a></li>
                    <li class="hoverVang inline-block px-8 md:px-2 lg:px-4"><a href="../../../../Du_An_1/mvc/gioi_thieu" class="text-lg lg:text-xl">Giới thiệu</a></li>
                    <li class="hoverVang inline-block px-8 md:px-2 lg:px-4 "><a href="../../../../Du_An_1/mvc/tim_cua_hang" class="text-lg lg:text-xl">Liên hệ</a></li>
                    <li class="hoverVang inline-block px-8 md:px-2 lg:px-4 "><a href="../../../../Du_An_1/mvc/menu" class="text-lg lg:text-xl">Menu</a></li>
                    <?php if (isset($_SESSION['admin'])) {
                    ?>
                        <li class="hoverVang inline-block px-8 md:px-2 lg:px-4"><a href="../../../../Du_An_1/mvc/admin" class="text-lg lg:text-xl">Admin</a></li>
                    <?php
                    } ?>


                </ul>
            </nav>

            <div class=" my-auto text-left lg:text-right ">
                <nav style="margin: 0;padding: 0;">
                    <div class="icon1  inline-block" id="icon1">
                        
                        <div id="icon_search" class="fas fa-search text-lg aaa12 hoverVang"></div>

                        <div class="search_form">
                            <div id="close_search" ><label for="check_close" class="fas fa-times"></label></div>
                            <form action="shop" method="GET">
                                <input type="search" id="search" name="search" placeholder="Search here...">
                                <button type="submit" name="submitSearch"><label for="name_product"><i class="fas fa-search  hoverVang"></i></label></button>
                            </form>
                        </div>
                    </div>
                    <a href="cart?act=cart">
                        <li class="hoverVang inline-block p-7 px-1 lg:px-4"><i class="fas fa-cart-plus text-lg"></i><span><?php if (isset($_SESSION['count_product'])) {
                                                                                                                                echo $_SESSION['count_product'];
                                                                                                                            } ?></span></li>
                    </a>
                    <?php
                    if (isset($_SESSION['name'])) {
                    ?>
                        <div class="userHover inline-block"><span><i class="far fa-user mr-2"></i></span>
                            <div class="menuUser">
                                <ul>
                                    <a href="login?act=myAccount">
                                        <li class="px-3 py-1 float-left hoverVang">Tài khoản của tôi</li>
                                    </a>
                                    <a href="login?act=logout">
                                        <li class="px-3 py-1 float-left  hoverVang">Đăng xuất</li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <a href="login?act=login" class="hoverVang">
                            Đăng nhập
                        </a>
                        <span> / </span>
                        <a href="login?act=register" class="hoverVang">
                            Đăng kí
                        </a>
                    <?php }
                    ?>


                </nav>

            </div>
        </div>

    </div>

</header>

