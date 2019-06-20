<?php
require_once "connection.php";
session_start();
$uid=$_SESSION["uid"];
if (empty($uid)){
	echo "<script>alert('请先登录!');window.location.href= 'login.php';</script>";
	return;
}
$vid=$_POST[vid];

$sql=mysql_query("select price,author from video where id=$vid");
$price=mysql_result($sql,0,0);
$author=mysql_result($sql,0,1);
//查询视频价格与余额
$balance=mysql_query("select balance from user where id=$uid");
$balance=mysql_result($balance,0,0);
if($balance>=$price)
{
	$sql=mysql_query("update user set balance=balance-$price where id=$uid");
  $sql0=mysql_query("update user set balance=balance+$price*0.4 where id=$author");
	$sql1=mysql_query("insert into orders (userid,videoid) values($uid,$vid)");
	 if($sql&&$sql1){
           echo "<script>alert('购买成功!');window.location.href= 'detail.php?id=$vid';</script>";
    }
    else{
           echo "<script>alert('购买失败!');history.back();</script>";
    }
}else{
    echo "<script>alert('余额不足，请先充值!');window.location.href= 'single.php';</script>";
}
$sql=mysql_query("select ");