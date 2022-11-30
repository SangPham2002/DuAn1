<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#343A40 ; color: #fff; border-radius: 8px;">BIỂU ĐỒ THỐNG KÊ</h2>
<div class="flex">
    <div>
        <div id="piechart" ></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Loại', 'Số lượng'],
                    <?php

                    $result = ThongKe::list_thong_ke_so_luong_hang_hoa();
                    if (!empty($result)) {

                        foreach ($result as $u) {
                            echo "['$u[ten_loai]',  $u[so_luong]],";
                        }
                    }
                    ?>
                ]);

                // Optional; add a title and set the width and height of the chart
                var options = {
                    'title': 'Thống kê số lượng hàng hóa theo loại',
                    'width': 550,
                    'height': 400
                };

                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>

    </div>
    <!-- end biểu đồ sản phẩm -->

    <div>
        <div id="piechart2" ></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Số lượng', 'Số lượng'],
                    <?php

                    $result2 = ThongKe::list_thong_ke_so_luong_don_hang();
                    if (!empty($result2)) {

                        foreach ($result2 as $u2) {
                            echo "['$u2[so_luong]',  $u2[so_luong]],";
                        }
                    }
                    ?>
                ]);

                // Optional; add a title and set the width and height of the chart
                var options = {
                    'title': 'Thống kê số lượng đơn hàng đã bán trong tháng',
                    'width': 550,
                    'height': 400
                };

                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                chart.draw(data, options);
            }
        </script>

    </div>
</div>

<div class="flex ">
    <div>
        <div id="piechart3" ></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Vai trò', 'Số lượng'],
                    <?php

                    $result3 = ThongKe::list_thong_ke_kh_by_vai_tro();
                    if (!empty($result3)) {

                        foreach ($result3 as $u3) {
                            $vaitro = $u3['vaitro'] == 1 ? "Admin" : "Khách hàng";
                            echo "['$vaitro',  $u3[so_luong]],";
                        }
                    }
                    ?>
                ]);

                // Optional; add a title and set the width and height of the chart
                var options = {
                    'title': 'Thống kê người dùng theo vai trò',
                    'width': 550,
                    'height': 400
                };

                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
                chart.draw(data, options);
            }
        </script>

    </div>
    <!-- end biểu đồ sản phẩm -->

    <div>
        <div id="piechart4" ></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Vai trò', 'Số lượng'],
                    <?php

                    $result4 = ThongKe::so_sp_ban_in_1_month();
                    if (!empty($result4)) {

                        foreach ($result4 as $u4) {
                            echo "['$u4[ten_sp]',  $u4[so_luong]],";
                        }
                    }
                    ?>
                ]);

                // Optional; add a title and set the width and height of the chart
                var options = {
                    'title': 'Số sản phẩm đã bán trong tháng này',
                    'width': 550,
                    'height': 400
                };

                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
                chart.draw(data, options);
            }
        </script>

    </div>

</div>
<div class="my-4">
    <a href="?act=list" style="border-radius: 4px; border: 1px solid #3f3f3f; padding: 4px 16px;background-color: #fff;">Danh sách</a>
</div>