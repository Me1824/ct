<?php
error_reporting(0);
$servername="localhost";
$username="root";
$userpwd="";
$db="ct";
$conn=mysql_connect($servername,$username,$userpwd);
mysql_query("set names utf8");
if(!$conn)
{
	echo 'connection not ok<br/>';
}
if(!mysql_select_db($db,$conn))
{
	echo '数据库选择 not ok<br/>';
}

?>
