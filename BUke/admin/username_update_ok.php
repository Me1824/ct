<?php
require_once "../connection.php";
error_reporting(0);
?>
<?php
mysql_query("set names utf8");
//$name=$_SESSION["uname"];
$id=$_POST["id"];
$type=$_POST["type"];
$uname=$_POST["name"];
$upwd=$_POST["password"];
$sql=mysql_query("update user set uname='$uname',upwd='$upwd'  where id='$id'",$conn);
$type=$type==2?"jiangshi.php":"username.php";
if($sql){

    mysql_close($conn);
    echo "<script>alert('操作成功!');window.location.href= '$type';</script>";
}
else{
    mysql_close($conn);
    echo "<script>alert('操作失败!');window.location.href= '$type';</script>";
}z

?>
