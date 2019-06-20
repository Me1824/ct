<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>销售额统计</title>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/all.css">

    <link rel="stylesheet" href="../css/bootstrap.min1.css">
  <link rel="stylesheet" href="../css/sb-admin.css">
  <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min1.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/sb-admin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
</head>
<body>
<div class="box1">
	<div class="box2">
		<?php
			require_once "left.php";
		?>
	</div>
	<div class="box3">
		<div class="top">
			
			<?php
				require_once "top.php";
			?>
		</p>
		</div>
		<div class="mian">
			<div class="main_1">
                <?php
                require_once "../connection.php";
                mysql_query("set names utf8");
                $year = isset($_GET["y"])?date($_GET["y"]):date('Y');
                $yeararr = [];
                $month = [];
                for ($i=1; $i <=12 ; $i++) {
                    $yeararr[$i] = $year.'-'.$i;
                }

                foreach ($yeararr as $key => $value) {
                    $timestamp = strtotime( $value );
                    $start_time = date( 'Y-m-01 00:00:00', $timestamp );
                    $mdays = date( 't', $timestamp );
                    $end_time = date( 'Y-m-' . $mdays . ' 23:59:59', $timestamp );

//            $month[$key]['start_time'] = $start_time;
//            $month[$key]['end_time'] = $end_time;
                    date_format('2016-01-02', '%Y-%m-%d %H:%i:%s');
                    //$cmd="select sum(totalPrice) as total from orders where (status!='未付款' or status!='已同意') and date_format(orderDate,'%Y-%m-%d %H:%i:%s')>='$start_time' and date_format(orderDate,'%Y-%m-%d %H:%i:%s')<='$end_time'";
                    //echo $cmd;

                    $sql = mysql_query("select sum(price) as total from orders,video where orders.videoid=video.id and orderDate>='$start_time' and orderDate<='$end_time'");
                    $row = mysql_fetch_object($sql);
                    $sum[]=$row->total;


                }
              ?>
                <form action="" method="get">
                    <select name="y">
                        <?php
                        for($i=date('Y');$i>=2000;$i--)
                        {
                            ?>
                            <option value=<?php echo $i;?>><?php echo $i;?>年</option>
                        <?php }?>
                    </select>
                    <input type="submit" value="提交">
                </form>
                <canvas id="myChart" width="200px" height="100px"></canvas>
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
                            datasets: [{
                                label: <?php echo $year?>+'年销售额',
                                data: <?php echo json_encode($sum);?>,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>
				
			</div>
		</div>
		
	</div>
</div>
	
	
	


</body>
</html>
