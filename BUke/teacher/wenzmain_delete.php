<?php
require_once "../connection.php";
mysql_query("set names utf8");
$id=$_GET[id];

$sql=mysql_query("delete from article where id=$id");
if($sql){
    echo "<script>alert('删除成功！');window.location.href='wenzmain.php';</script>";
}else{
    echo "<script>alert('删除失败！');window.location.href='wenzmain.php';</script>";
}
mysql_close($conn);
?>