<?php
if(!function_exists('getUserName'))
{
    function getUserName($id)
    {
         require_once "connection.php";
         $sql=mysql_query("select uname from user where id=$id");
         return mysql_result($sql,0,0);
    }
}