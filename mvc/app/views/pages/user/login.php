<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400&display=swap" rel="stylesheet">
</head>
<style>
    .container {
        width: 700px;
        margin: auto;
        margin-top: 150px;

    }

    body {
        font-family: "Cormorant Garamond", sans-serif;
        width: 100%;
        max-width: 100%;
        background: url(../../../../Du_An_1/mvc/storage/image/background_logo.jpg) no-repeat center;



    }

    .quen_mk:hover {
        color: #F59E0B;
        text-decoration: underline;
    }

    .dangNhap:hover {
        color: #fff;

    }

    .dangKy:hover {
        background-color: #F59E0B;
        color: #fff;
    }

    @media(max-width:1024px) {

        .container {
            width: 600px;
            margin: auto;
            margin-top: 150px;
            padding-bottom: 100px;
        }

    }

    @media(max-width:640px) {

        .container {
            width: 300px;
            margin: auto;
            margin-top: 150px;
            padding-bottom: 100px;
        }

    }
</style>

<body>
    <div class="container my-auto">
        <form action="?act=btn_login" method="POST">
            <div class="row grid grid-cols-6 md:grid md:grid-cols-11">
                <div class="col border p-8 col-span-6 bg-white">
                    <h1 class="text-3xl font-bold  my-2">Đăng nhập</h1>
                    <p class=" my-2">Nhập thông tin tài khoản</p>

                    <input class="border my-2 p-1 px-2 w-full" type="text" name="username" placeholder="Tên đăng nhập" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username'];?>">
                    <input class="border my-2 p-1 px-2 w-full" type="password" name="pass" id="" placeholder="Password" value="<?php if(isset($_COOKIE['pass'])) echo $_COOKIE['pass'];?>">
                    <div>
                    <input type="checkbox" name="check" id="" >
                    <label for="check">Ghi nhớ đăng nhập</label>
                    </div>
                    <div class="flex justify-between my-4">

                        <button class="py-1 px-4 bg-yellow-500 dangNhap" name="btn_login" type="submit">Đăng nhập</button>
                        <a href="login?act=forgetPassword" class="quen_mk">Quên mật khẩu</a>
                    </div>
                    <p style="color: red;"><?php if ($error != "") echo $error; ?></p>

                </div>
                <div class="col   my-auto text-center col-span-6 py-8 px-8 md:px-4 md:py-16 md:col-span-5 text-white bg-yellow-400">
                    <h1 class="text-3xl font-bold  my-6 ">Đăng kí</h1>
                    <p class=" my-2 mb-8 md:mb-14">Đăng kí để làm thành viên của trang web bán hàng. Bạn sẽ được 1 số quyền lợi nhất định khi làm thành viên của chúng tôi.</p>

                    <a href="login?act=register" class="py-1 px-4   bg-white text-yellow-500 dangKy">Đăng kí</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>