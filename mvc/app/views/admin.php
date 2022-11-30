<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocumAdminent</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.tiny.cloud/1/hqu7rkbua1f9yiw4o0umokh5blx2hry628dd0p6banxt3z84/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/css/all.min.css">
    <link rel="stylesheet" href="../../../../Du_An_1/mvc/storage/fileCss/admin.css">
    
    <style>
        table {
            border: 1px solid #3F3F3F;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            font-weight: 600;

        }

        th {
            border: 1px solid #3F3F3F;
            border-right: 1px solid #fff;
            background-color: #3F3F3F;
            color: white;
            padding: 5px 10px;
        }
    </style>
</head>

<body>

    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none; width: 20%; background-color: #fff;" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
        <a href="../../../../Du_An_1/mvc/" class="w3-bar-item w3-button">Home</a>
        <a href="../../../../Du_An_1/mvc/admin/san_pham" class="w3-bar-item w3-button">Sản phẩm</a>
        <a href="../../../../Du_An_1/mvc/admin" class="w3-bar-item w3-button">Loại hàng</a>
        <a href="../../../../Du_An_1/mvc/admin/khach_hang" class="w3-bar-item w3-button">Khách hàng</a>
        <a href="../../../../Du_An_1/mvc/admin/binh_luan" class="w3-bar-item w3-button">Bình luận</a>
        <a href="../../../../Du_An_1/mvc/admin/gop_y" class="w3-bar-item w3-button">Đánh giá (Góp í)</a>
        <a href="../../../../Du_An_1/mvc/admin/banner" class="w3-bar-item w3-button">Banner</a>
        <a href="../../../../Du_An_1/mvc/admin/thong_ke" class="w3-bar-item w3-button">Thống kê</a>
        <a href="../../../../Du_An_1/mvc/admin/don_hang" class="w3-bar-item w3-button">Đơn hàng</a>
        
    </div>

    <div id="main">

        <div class="" style="background-color: #3f3f3f;">
            <button id="openNav" class="w3-button  w3-xlarge text-white" onclick="w3_open()">&#9776;</button>
            <div class="w3-container">
                <!-- <h1 class="text-center text-white">My Admin</h1> -->
            </div>
        </div>

        <div style="background: #EBEDF5; padding: 30px;">
            <div style="border-radius: 8px;  width: 1200px; margin: auto; background: #fff; padding: 30px;">
                <?php require_once $VIEWPAGE; ?>
            </div>
        </div>

    </div>

    <script>
        function w3_open() {
            document.getElementById("main").style.marginLeft = "15%";
            document.getElementById("mySidebar").style.width = "15%";
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("openNav").style.display = 'none';
        }

        function w3_close() {
            document.getElementById("main").style.marginLeft = "0%";
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("openNav").style.display = "inline-block";
        }
    </script>

</body>
        
</html>