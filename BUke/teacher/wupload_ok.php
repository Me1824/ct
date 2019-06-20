<?php
require_once "../connection.php";
session_start();
mysql_query("set names utf8");
$title=$_POST[title];
$content=$_POST[content];
$img=$_POST[pic];
$author=$_SESSION["uid"];

$sql=mysql_query("insert into article (title,content,img,author) values('$title','$content','$img',$author)");
if($sql){
    echo "<script>alert('上传成功，等待管理员审核！');window.location.href='wupload.php';</script>";
}else{
    echo "<script>alert('上传失败！');history.back();</script>";
}
mysql_close($conn);
?>