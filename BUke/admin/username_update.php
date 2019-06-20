<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户信息修改</title>
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
                <?php
                require_once "../connection.php";
                mysql_query("set names utf8");
                $type=$_GET['type'];
                $uid=$_GET['id'];
                if(empty($type)||empty($uid))
                {die("参数错误");}
                $sql0=mysql_query("select * from user where id=$uid");
                $row0= mysql_fetch_object($sql0); 				//获取查询结果集
                if(!$row0){								//如果未检索到信息资源，则弹出提示信息
                    die("<font color='red'>记录不存在!</font>");
                }
                //var_dump($row0)	;
                ?>
                <form action="username_update_ok.php" method="post">
                    <input name="id" type="hidden" value="<?php echo $uid?>">
                    <input name="type" type="hidden" value="<?php echo $type?>">
					<input name="name" class="user" type="text" placeholder="修改用户名"  value="<?php echo $row0->uname; ?>" />
          			<input name="password" class="pd" type="password" placeholder="修改密码" value="<?php echo $row0->upwd; ?>" />
          			<input class="button" type="submit" value="提交"  />
				</form>
			</div>
		</div>
		
	</div>
</div>
	
	
	


</body>
</html>
