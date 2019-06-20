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


	<div class="pic">
		<div class="pic_1">
			<ul>
				<span class="leftdemo"><a></a></span>
				<span class="rightdemo"><a></a></span>
				<li><a href="#" class="pic_2 banner_1"></a></li>
				<li><a href="#" class="pic_2 banner_2"></a></li>
				<li><a href="#" class="pic_2 banner_3"></a></li>
			</ul>
		</div>
	</div>
	
	<div class="zhuti">
		<div class="aa">
            <?php
            $today=date("Y-m-d 00:00:00",time());
           // $tomorrow=date("Y-m-d 00:00:00",strtotime("+1 day"));
            $sql=mysql_query("select count(*) from video where status=1 and datetime>'$today'");
            $vinum=mysql_result($sql,0,0);
            ?>
			<span class="a1">最新视频</span><span class="a2">今日更新</span><span class="a3"><?php echo $vinum;?></span>
			<span class="a4">节课</span><a href="#" class="a5">更多课程>></a>
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
        </div>
        <div class="video">
				<ul>
				<?php
					$sql1=mysql_query("select * from video where status=1
					order by id limit 6");

					$row=mysql_fetch_object($sql1); 				//获取查询结果集
					while($row)
					{		
						//应用while循环语句输出查询结果
				?>
				
					<li><a href="detail.php?id=<?php echo $row->id; ?>"><div style="background:url('upload/<?php echo $row->url; ?>') center center" class="video1"></div></a>
						<p><a href="detail.php?id=<?php echo $row->id; ?>"><?php echo $row->vname; ?></p>
						<?php if($row->price==0){?><span style="background-color:#1daf4a">免费<?php }else{?><span>付费<?php }?></span></a>
					</li>
				<?php
	   					$row=mysql_fetch_object($sql1); 
					}
				?>
				</ul>



		</div>
	</div>
		<div class="box">
            <?php
            $sql=mysql_query("select count(*) from article where status=1");
            $wznum=mysql_result($sql,0,0);
            ?>
			<div style="position:relative;left:50%;margin-left: -450px;top: 20px;width: 900px;"><span class="a6">文章</span><span class="a2">共</span><span class="a3"><?php echo $wznum;?></span><span class="a2">篇</span>
			<a href="#" class="a7">更多文章>></a></div>
			<ul>
			<?php
					$sql2=mysql_query("select * from  article where status=1
					order by id limit 2");

					$row=mysql_fetch_object($sql2); 				//获取查询结果集
					while($row)
					{		
						//应用while循环语句输出查询结果
				?>

				<li><div class="box1">
						<a href="article.php?id=<?php echo $row->id; ?>">
						<div style="background:url('upload/<?php echo $row->img; ?>') center center" class="wenz_1"></div>
						</a>
						<div class="wenz_n"><p><a href="article.php?id=<?php echo $row->id; ?>"><?php echo substr($row->title,0,18); ?>...</a></p>
						<a id="wena" href="article.php?id=<?php echo $row->id; ?>"><?php echo substr($row->content, 0,74); ?>...</a>
						<span><?php echo $row->num; ?>人已阅读</span>

						</div>
					</div>
					
				</li>
				<?php
	   					$row=mysql_fetch_object($sql2); 
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