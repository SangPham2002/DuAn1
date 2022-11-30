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
        width: 400px;
        margin: auto;
        margin-top: 100px;

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

    @media(max-width:640px) {

        .container {
            width: 300px;
            margin: auto;
            margin-top: 100px;

        }

    }
</style>

<body>
    <div class="container my-auto">
        <form action="" method="POST">

            <div class="col border p-8 col-span-6 bg-white">
                <h1 class="text-3xl font-bold  my-2">Quên mật khẩu</h1>
                <p class=" my-2">Nhập thông tin tài khoản</p>

                <input class="border my-2 p-1 w-full" type="text" name="username" placeholder="Tên đăng nhập" value="<?php if (isset($username_kh)) echo $username_kh ?>">
                <input class="border my-2 p-1 w-full" type="email" name="email" placeholder="Email" value="<?php if (isset($email_kh)) echo $email_kh ?>">
                <input class="border my-2 p-1 w-full" type="password" name="pass" placeholder="Mật khẩu mới">
                <input class="border my-2 p-1 w-full" type="password" name="pass2" placeholder="Nhập lại mật khẩu">
                <div class="flex justify-between my-4">
                    <input class="py-1 px-6 bg-yellow-500 dangNhap" type="submit" name="btn_forgot_password" value="Lưu">

                    <a href="login?act=login" class="quen_mk">Đăng nhập</a>
                </div>

                <p style="color: red;"><?php if ($error != "") echo $error; ?></p>
            </div>


        </form>

    </div>
</body>

</html>