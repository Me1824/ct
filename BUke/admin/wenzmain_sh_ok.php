<?php
require_once "../connection.php";
mysql_query("set names utf8");
$id=$_GET[id];

$sql=mysql_query("update article set status=1 where id=$id");
if($sql){
    echo "<script>alert('审核成功！');window.location.href='wenzmain.php';</script>";
}else{
    echo "<script>alert('审核失败！');window.location.href='wenzmain.php';</script>";
}
mysql_close($conn);
?>