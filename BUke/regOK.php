<?php
require_once "connection.php";
?>

<?php
session_start();//使用到session要加这句
mysql_query("set names utf8");
$name=$_POST["name"];
$password=$_POST["password"];
$url=$_GET["url"];//是否带有url参数，有则登录成功后转到该url页面
$sf=$_POST["sf"];
$sql1=mysql_query("select * from user where uname='$name'",$conn);
$row1=mysql_fetch_object($sql1);
if($row1){
	echo "<script>alert('用户名已存在!');window.history.back();</script>";
	return;
}
$sql=mysql_query("insert into user (uname,upwd,rid)values('$name','$password',$sf)",$conn);

if($sql)
{
	$sql1=mysql_query("select * from user where uname='$name'",$conn);
	$row1=mysql_fetch_object($sql1);
		$_SESSION['uname']=$name;
        $_SESSION['upwd']=$password;
		$_SESSION['uid']=$row1->id;
		$_SESSION['uqx']=$sf;
        mysql_close($conn);
	echo "<script>alert('注册成功!');window.location.href= 'index.php';</script>";
}
else
{
	mysql_close($conn);	
	echo "<script>alert('注册失败!');window.history.back();</script>";
}

?>
