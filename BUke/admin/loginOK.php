<?php
require_once "../connection.php";
?>
<?php
session_start();//使用到session要加这句
mysql_query("set names utf8");
$name=$_POST["name"];
$password=$_POST["password"];
$url=$_GET["url"];//是否带有url参数，有则登录成功后转到该url页面
$sql=mysql_query("select * from admin where uname='$name'",$conn);
$row=mysql_fetch_object($sql);
if($row)
{   
	if($row->upwd==$password)
	{
		$_SESSION['uname']=$name;
        $_SESSION['upwd']=$password;
		$_SESSION['uid']=$row->id;
		
        mysql_close($conn);
		if(empty($url)){
		    echo "<script>alert('登录成功!');window.location.href= 'index.php';</script>";
		}
		else{
			echo "<script>alert('登录成功!');window.location.href= '$url';</script>";//转到先前的页面
		}
	}
	else
	{
		mysql_close($conn);	
		echo "<script>alert('密码错误!');window.location.href= 'login.php';</script>";
	}	
}
else
{
	mysql_close($conn);	
	echo "<script>alert('管理员不存在!');window.location.href= 'login.php';</script>";
}

?>
