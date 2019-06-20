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
session_start();
$uid=$_SESSION["uid"];
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
		<?php
		$t=isset($_GET[t])?$_GET[t]:0;
		$sql=mysql_query("select count(*) from video");
		$cnt=mysql_result($sql, 0,0);
		?>

			<ul>
				<li>筛选：</li>
				<li onclick="location.href='buy.php'" class="select"  <?php if($t==0){?>id="selected"<?php }?>>免费</li>
				<li onclick="location.href='buy.php?t=1'" class="select"  <?php if($t==1){?>id="selected"<?php }?>>付费</li>
				<li id="tongji">共有<span><?php echo $cnt;?>个</span>教程</li>	
			</ul>
		</div>
		<p style="height:35px;"></p>
		<script>
			$(function(){

				$(".video1").mouseover(function(){

					$(this).addClass("vis");
					//alert("1");
				})

				$(".video1").mouseout(function(){

					$(this).removeClass("vis");
					//alert("1");
				})
			})
			</script>
		<div class="video" style="left:50%;margin-left: -440px;">
				<ul>
				<?php
				if($t==0){
					$sql1=mysql_query("select * from video where price=0 and url is not null order by id ");
				}
				else{
					$sql1=mysql_query("select * from video where price!=0 and url is not null order by id ");
				}

					$row=mysql_fetch_object($sql1); 				//获取查询结果集
					while($row)
					{		
						//应用while循环语句输出查询结果
				?>
				
					<li><a href="detail.php?id=<?php echo $row->id; ?>"><div style="background:url('upload/<?php echo $row->url; ?>') center center" class="video1"></div></a>
						<p><a href="detail.php?id=<?php echo $row->id; ?>"><?php echo $row->vname; ?></p>
						<?php
						//查询是否购买过该视频
						$sql0=mysql_query("select * from orders where userid=$uid and videoid=$row->id");
    $row0=mysql_fetch_object($sql0);
    $flag=0;
    if($row0) $flag=1;
						?>
						<?php if($t==0){?><span id="buy">观看</span>
						<?php }else{
							if($flag==0){?>
						<span id="buy">购买</span>
						<?php }else{?>
						<span id="buy">观看</span>
						<?php }}?></a>
					</li>
				<?php
	   					$row=mysql_fetch_object($sql1); 
					}
				?>
				</ul>



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
	
	<div class="bottom" style="top:100px;">
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