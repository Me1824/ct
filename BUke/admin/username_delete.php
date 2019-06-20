<?php
require_once "../connection.php";
mysql_query("set names utf8");
$id=$_GET[id];
$type=$_POST["type"];
$type=$type==2?"jiangshi.php":"username.php";
$sql=mysql_query("delete from user where id=$id");
if($sql){
    echo "<script>alert('删除成功！');window.location.href='$type';</script>";
}else{
    echo "<script>alert('删除失败！');window.location.href='$type';</script>";
}
mysql_close($conn);
?>