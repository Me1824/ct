<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="css/top.css">
	<script src="js/jquery-1.7.min.js"></script>
	<script src="js/headbar.js"></script>
	<link rel="stylesheet" type="text/css" href="css/amazeui.min.css" />
<link rel="stylesheet" type="text/css" href="css/main.css" />
</head>
<?php
require_once "connection.php";

?>
<body>
	<div class="headbar">
			<div class="leftarea"><img src="images/logo.png" width="300px" height="60px"></div>
			<div class="mianarea">
				<ul class="nva" style="width:600px;">
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
	<script type="text/javascript">
		$(function(){


	var lis=document.getElementById("u1").getElementsByTagName('a');
    var divs=document.getElementById("zhu").getElementsByTagName('div');
    // alert(1);
    	for(var i=0;i<lis.length;i++)
    	{
    		lis[i].id=i;
    		lis[i].onclick=function(){
    			for(var j=0;j<lis.length;j++)
    				{
    					lis[j].className="sy";
    					divs[j].style.display="none";
    				}
    		this.className="syed sy";
    		divs[this.id].style.display="block";
    			}
    	}
	});
		</script>
	<div class="zhuti_3" style="background-color: rgb(248,248,248);">
		<div class="tou"></div>
		<div class="lie">
			<ul id="u1">
				
				<li><a class="sy syed" href="#">充值中心</a></li>
			</ul>
		</div>
		<div id="zhu" class="zhu">
			
			<div class="zhu_1" ><?php
require_once "connection.php";
mysql_query("set names utf8");
session_start();
$uname=$_SESSION['uname'];
$sql=mysql_query("select balance from user where uname='$uname'");
$row=mysql_fetch_object($sql);
?>
<div class="pay">
	<!--主内容开始编辑-->
	<div class="tr_recharge">
		<div class="tr_rechtext" style="background-color:rgb(30,30,30);">
			<p class="te_retit"><img src="images/coin.png" alt="" />充值中心</p>
			<p>1.请充值您想充值的金额。</p>
			<p>2.本充值系统最终解释权归商家所有。</p>
		</div>
		<form action="payOK.php" class="am-form" id="doc-vld-msg" method="post">
			<div class="tr_rechbox">
				<div class="tr_rechhead">
					
					<p>充值帐号：
						<a><?php echo $_SESSION["uname"]?></a>
					</p>
					<div class="tr_rechheadcion">
						<img src="images/coin.png" alt="" />
						<span>当前余额：<span>&yen;&nbsp;<?php echo $row->balance?></span></span>
					</div>
				</div>
				<div class="tr_rechli am-form-group">
					<ul class="ui-choose am-form-group" id="uc_01">
						<li>
							<label class="am-radio-inline">
									<input type="radio"  name="docVlGender" required data-validation-message="请选择一项充值额度" value="10"> 10￥
								</label>
						</li>
						<li>
							<label class="am-radio-inline">
									<input type="radio" name="docVlGender" data-validation-message="请选择一项充值额度" value="20"> 20￥
								</label>
						</li>

						<li>
							<label class="am-radio-inline">
									<input type="radio" name="docVlGender" data-validation-message="请选择一项充值额度" value="50"> 50￥
								</label>
						</li>
						<li>
							<label class="am-radio-inline">
									<input type="radio" name="docVlGender" data-validation-message="请选择一项充值额度" value="0"> 其他金额
								</label>
						</li>
					</ul>

				</div>
				<div class="tr_rechoth am-form-group">
					<span style="margin-left:300px;">其他金额：</span>
					<input name="omoney" type="number" name="" min="10" max="10000" value="10.00元" class="othbox" data-validation-message="充值金额范围：10-10000元" />
					<!--<p>充值金额范围：10-10000元</p>-->
				</div>
				<div class="tr_rechcho am-form-group">
					<span>充值方式：</span>
					<label class="am-radio">
							<input type="radio" name="radio1" value="" data-am-ucheck required data-validation-message="请选择一种充值方式"><img src="images/wechatpay.png">
						</label>
					<label class="am-radio" style="margin-right:30px;">
							<input type="radio" name="radio1" value="" data-am-ucheck data-validation-message="请选择一种充值方式"><img src="images/zfbpay.png">
						</label>
				</div>
				<div class="tr_rechnum">
					<span>应付金额：</span>
					<p class="rechnum">0.00元</p>
				</div>
			</div>
			<div class="tr_paybox">
				<input type="submit" value="确认支付" class="tr_pay am-btn" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" value="返回" class="tr_pay am-btn" onclick="javascript:location.href='myOrders.php'"/>
				<span>温馨提示：请确认充值金额。</span>
			</div>
		</form>
	</div>
</div>

<!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
<script type="text/javascript" src="js/amazeui.min.js"></script>
<script type="text/javascript" src="js/ui-choose.js"></script>
<script type="text/javascript">
	// 将所有.ui-choose实例化
	$('.ui-choose').ui_choose();
	// uc_01 ul 单选
	var uc_01 = $('#uc_01').data('ui-choose'); // 取回已实例化的对象
	uc_01.click = function(index, item) {
		console.log('click', index, item.text())
	}
	uc_01.change = function(index, item) {
		console.log('change', index, item.text())
	}
	$(function() {
		$('#uc_01 li:eq(3)').click(function() {
			$('.tr_rechoth').show();
			$('.tr_rechoth').find("input").attr('required', 'true')
			$('.rechnum').text('10.00元');
		})
		$('#uc_01 li:eq(0)').click(function() {
			$('.tr_rechoth').hide();
			$('.rechnum').text('10.00元');
			$('.othbox').val('');
		})
		$('#uc_01 li:eq(1)').click(function() {
			$('.tr_rechoth').hide();
			$('.rechnum').text('20.00元');
			$('.othbox').val('');
		})
		$('#uc_01 li:eq(2)').click(function() {
			$('.tr_rechoth').hide();
			$('.rechnum').text('50.00元');
			$('.othbox').val('');
		})
		$(document).ready(function() {
			$('.othbox').on('input propertychange', function() {
				var num = $(this).val();
				$('.rechnum').html(num + ".00元");
			});
		});
	})

	$(function() {
		$('#doc-vld-msg').validator({
			onValid: function(validity) {
				$(validity.field).closest('.am-form-group').find('.am-alert').hide();
			},
			onInValid: function(validity) {
				var $field = $(validity.field);
				var $group = $field.closest('.am-form-group');
				var $alert = $group.find('.am-alert');
				// 使用自定义的提示信息 或 插件内置的提示信息
				var msg = $field.data('validationMessage') || this.getValidationMessage(validity);

				if(!$alert.length) {
					$alert = $('<div class="am-alert am-alert-danger"></div>').hide().
					appendTo($group);
				}
				$alert.html(msg).show();
			}
		});
	});
</script>
</div>
		</div>
		<br style="clear: left"></br>
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