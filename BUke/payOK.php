<?php
error_reporting(0);
require_once "connection.php";
?>
<?php
session_start();
mysql_query("set names utf8");
$money=$_POST["docVlGender"];
if($money==0)
	$money=$_POST["omoney"];
if(empty($_SESSION['uname']))
{
	echo "<script>alert('请先登录!');window.location.href= 'login.php';</script>";
	return;
}
//$money=$_POST["money"];
$uname=$_SESSION['uname'];
$sql=mysql_query("update user set balance=balance+round($money,2) where uname='$uname'",$conn);
if($sql){
    mysql_close($conn);
	echo "<script>alert('充值成功!');history.go(-1);location.reload();</script>";
}
else{
	mysql_close($conn);
	echo "<script>alert('充值失败!');history.go(-1);</script>";
}

?>
