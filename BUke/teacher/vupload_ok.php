<?php
require_once "../connection.php";
session_start();
mysql_query("set names utf8");
$vname=$_POST[vname];
$url=$_POST[pic];
$v=$_POST[video];
$price=$_POST[price];
$author=$_SESSION["uid"];
//$cmd="insert into video (vname,url,v,price,author) values('$vname','$url','$v','$price',$author)";
//echo $cmd;
$sql=mysql_query("insert into video (vname,url,v,price,author) values('$vname','$url','$v','$price',$author)");
if($sql){
    echo "<script>alert('上传成功，等待管理员审核！');window.location.href='vupload.php';</script>";
}else{
    echo "<script>alert('上传失败！');history.back();</script>";
}
mysql_close($conn);
?>