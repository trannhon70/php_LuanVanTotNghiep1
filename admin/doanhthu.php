
<?php 
    $conn = new mysqli("localhost","root","","website_mvc");
    if(!$conn){
      echo "lỗi truy cập data";
    }
 ?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Thống kê doanh thu theo ngày', 'Số lượng', 'giá'],
          <?php 
         
            $query = "SELECT* FROM tbl_order ";
            $res = mysqli_query($conn,$query);
            $i =0;
            $tong = 0;
            while($data = mysqli_fetch_array($res)){
              $i++;
              $id = $data['id'];              
              $soluong = $data['quantity'];
              $price = $data['price'];
              $ngay = date('M j Y', strtotime($data['ngay']));
              $tong += $price 

          ?>
            ['<?php echo $ngay; ?>',<?php echo $soluong; ?>,<?php echo $tong; ?> ],
          <?php }  ?>
        ]);

        var options = {
          // chart: {
          //   title: 'Company Performance',
          //   subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          // },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
  <div>Thống kê doanh thu <a href="index.php">Quay lại</a></div>
    <div id="barchart_material" style="width: 100%; height: 500px;"></div>
    
  </body>
</html>
