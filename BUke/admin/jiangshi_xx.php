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
				<form>
					<input name="name" class="user" type="text" placeholder="修改用户名"  />
          			<input name="password" class="pd" type="password" placeholder="修改密码"  />
          			<input class="button" type="submit" value="提交"  />
				</form>
			</div>
		</div>
		
	</div>
</div>
	
	
	


</body>
</html>
