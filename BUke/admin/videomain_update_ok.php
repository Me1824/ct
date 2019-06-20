<?php
require_once "../connection.php";
error_reporting(0);
?>
<?php
mysql_query("set names utf8");
//$name=$_SESSION["uname"];
$id=$_POST["id"];
$vname=$_POST["vname"];
$url=$_POST["url"];
$v=$_POST["v"];
$author=$_POST["author"];
$price=$_POST["price"];
$num=$_POST["num"];
$sql=mysql_query("update video set vname='$vname',url='$url',v='$v',author=$author,price=$price,num=$num  where id='$id'",$conn);
if($sql){

    mysql_close($conn);
    echo "<script>alert('操作成功!');window.location.href= 'videomain.php';</script>";
}
else{
    mysql_close($conn);
    echo "<script>alert('操作失败!');window.location.href= 'videomain.php';</script>";
}z

?>
