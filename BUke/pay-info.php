﻿<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>充值中心</title>

<link rel="stylesheet" type="text/css" href="css/amazeui.min.css" />
<link rel="stylesheet" type="text/css" href="css/main.css" />

</head>
<body>
<?php
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
		<div class="tr_rechtext">
			<p class="te_retit"><img src="images/coin.png" alt="" />充值中心</p>
			<p>1.请充值您想充值的金额。</p>
			<p>2.本充值系统最终解释权归商家所有。</p>
		</div>
		<form action="payOK.php" class="am-form" id="doc-vld-msg" method="post">
			<div class="tr_rechbox">
				<div class="tr_rechhead">
					<img src="images/ys_head2.jpg" />
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
				<div class="tr_rechoth am-form-group" >
					<span>其他金额：</span>
					<input name="omoney" type="number" name="" min="10" max="10000" value="10.00元" class="othbox" data-validation-message="充值金额范围：10-10000元" />
					<!--<p>充值金额范围：10-10000元</p>-->
				</div>
				<div class="tr_rechcho am-form-group">
					<span>充值方式：</span>
					<label class="am-radio">
							<input type="radio" name="radio1" value="" data-am-ucheck required data-validation-message="请选择一种充值方式"><img src="images/wechatpay.png">
						</label>
					<label class="am-radio" style="margin-right:30px;">
							<input type="radio" name="radio1" style="outline:none;border:none;background:none;" value="" data-am-ucheck data-validation-message="请选择一种充值方式"><img src="images/zfbpay.png">
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

<script type="text/javascript" src="js/jquery.min.js"></script>
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

</body>
</html>