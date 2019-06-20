<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理员首面</title>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/all.css">

    <link rel="stylesheet" href="../css/bootstrap.min1.css">
  <link rel="stylesheet" href="../css/sb-admin.css">
  <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min1.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/sb-admin.min.js"></script>

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
				<form class="form1">
					<input name="title" class="in input1" type="text" placeholder="标题" />
          			<input name="fm" class="in input2" type="text" placeholder="封面" />
          			<input name="url" class="in input3" type="text"  placeholder="视频地址" />
          			<input name="author" class="in input4" type="text" placeholder="作者" />
          			<input name="price" class="in input5" type="text" placeholder="价格"  />
          			<input name="num" class="in input6" type="text" placeholder="播放量" />
          			<input class="button2" type="submit" value="提交"  />
				</form>
			</div>
		</div>
		
	</div>
</div>
	
	
	


</body>
</html>
