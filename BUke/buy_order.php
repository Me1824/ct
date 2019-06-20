<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="css/top.css">
	<script src="js/jquery-1.7.min.js"></script>
	<script src="js/headbar.js"></script>
	
</head>
<?php
require_once "connection.php";

?>
<body>
	<div class="headbar">
			<div class="leftarea"><img src="images/logo.png" width="300px" height="60px"></div>
			<div class="mianarea">
				<ul class="nva">
					<li><a class="ys" href="index.php">网站首页<span class="line"></span></a>
						
					</li>
					<li style="width:100px"><a class="ys" style="width:100px;text-indent:-8px" href="#"><span class="jt"></span>设计教程
						<span class="line"></span>
					</a>
					<div class="nva-son">
							<ul class="son">
								<li><a href="#">绘画插画<font size="1px" color="#999">(共xxxx门课)</font></a></li>
								<li><a href="#">平面设计<font size="1px" color="#999">(共xxxx门课)</font></a></li>
								<li><a href="#">室内设计<font size="1px" color="#999">(共xxxx门课)</font></a></li>
								<li><a href="#">字体设计<font size="1px" color="#999">(共xxxx门课)</font></a></li>
							</ul>
							<ul class="sons">
								<li><a href="#">海报设计<font size="1px" color="#999">(共xxxx门课)</font></a></li>
								<li><a href="#">室内设计<font size="1px" color="#999">(共xxxx门课)</font></a></li>
								<li><a href="#">产品精修<font size="1px" color="#999">(共xxxx门课)</font></a></li>
								<li><a href="#">包装设计<font size="1px" color="#999">(共xxxx门课)</font></a></li>
								
							</ul>
						
					</div>
						
					</li>
					<li><a class="ys" href="buy.php">视频购买<span class="line"></span></a></li>
					<li><a class="ys" href="article_z.php"><span class="icon"></span>精选文章<span class="line"></span></a></li>
					<li><a class="ys" href="single.php">个人中心<span class="line"></span></a></li>

				</ul>
			</div>
			<div class="rightarea">
			<form>
				
				<div class="search">
					<span></span>
					<input type="text" placeholder="搜索教程"  />
					
					<div class="search_j">
						<ul>
							<li id="tuijian"><span id="zero"></span>热门推荐</li>
							<li><a href="#"><span id="one">1</span>AI</a></li>
							<li><a href="#"><span id="one">2</span>海报</a></li>
							<li><a href="#"><span id="one">3</span>UI</a></li>
							<li><a href="#" id="zt"><span id="second">4</span>包装</a></li>
							<li><a href="#" id="zt"><span id="second">5</span>特效</a></li>
							<li><a href="#" id="zt"><span id="second">6</span>颜色</a></li>
							
						</ul>
					</div>
				</div>
				<div class="email">
					<span id="email">
					<div class="message">
						<span>回复评论</span>
						<span id="pinglun">目前没有消息...</span>
						<a href="#">查看全部></a>
					</div>
					</span>
				</div>
				<div class="touxiang">
				<?php
					session_start();//使用到session要加这句
	
					if(empty($_SESSION['uname']))
					echo '<a class="dl" href="login.php">登录</a>&nbsp;&nbsp;
					<a class="zc" href="login.php?type=2">注册</a>';
					else
					echo $_SESSION['uname'].','.'<a class="tc" href="logout.php">退出</a>';
					?>
					

				</div>
			</form>
			</div>
	</div>

	<div class="zhuti_1">
		<p style="height:35px;"></p>
		<div class="zhuti_2">
			<ul>
				<li>订单：</li>
				<li class="select" id="selected">视频</li>
				
			</ul>
		</div>
		<div class="video" style="left:50%;margin-left: -440px;">
		<form method="post" action="buy_ok.php">
		<input name="vid" type="hidden" value="<?php echo $_GET[id]?>">
			<table class="tab1">
				<?php
					$sql1=mysql_query("select * from video where id=$_GET[id] ");

					$row=mysql_fetch_object($sql1);
						//应用while循环语句输出查询结果
				?>
				<tr>
					<td rowspan="2"><div style="background:url('upload/<?php echo $row->url; ?>') center center" class="video2"></div></td>
					<td valign="middle"><?php echo $row->vname; ?></td>
				</tr>
				<tr>
					<td><input class="button" type="submit" value="支付"  /></td>
				</tr>
			</table>
			</form>
		</div>
		
	</div>
	

	

	<div class="page">
				<ul class="n">
					<li><a href="#">下载app</a>
						<div class="n-s">
							<p >安装app随时随地学习</p>
						</div>
					</li>
					<li><a href="#">意见反馈</a></li>
					<li><a href="#">帮助中心</a></li>
					<li><a href="#">官方微信</a></li>

				</ul>
				<a href="#" id="top" style="display:none;">TOP</a>
	</div>
	
	<div class="bottom">
		<table>
			<tr>
				<td><a>关于我们</a></td>
				<td><a>版权声明</a></td>
				<td><a>侵权举报</a></td>
				<td><a>联系我们</a></td>
				<td><a>售后服务</a></td>
				<td><a>常见问题</a></td>
				<td><a>VIP特权</a></td>
				<td><a>学习小组</a></td>

			</tr>
			<tr><td colspan="8">
				© Copyright 陈通 版权所有
			</tr>
		</table>
		
	</div>

</body>

</html>