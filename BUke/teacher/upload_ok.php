<meta charset="UTF-8">
<?php
$rootPath=$_SERVER['DOCUMENT_ROOT']; //网站根目录
//echo '<br/>';
//echo dirname(__FILE__);//当前目录
//echo '<br/>';
$parentPath=dirname(dirname(__FILE__)); //当前文件所在目录的上一级目录
if (($_FILES["file"]["type"] == "image/jpg" || $_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/png" || $_FILES["file"]["type"] == "image/gif")
    && ($_FILES["file"]["size"] < 20000000))
//注意：php默认只能上传小文件，如果文件过大需要个性php配置文件和服务器的配置文件，修改方法请自行百度
{
    if (@$_FILES["file"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
    else
    {
        echo "Upload: " . @$_FILES["file"]["name"] . "<br />";
        echo "Type: " . @$_FILES["file"]["type"] . "<br />";
        echo "Size: " . (@$_FILES["file"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . @$_FILES["file"]["tmp_name"] . "<br />";

        if (file_exists($parentPath."\\upload\\" . @$_FILES["file"]["name"]))
        {
            echo @$_FILES["file"]["name"] . " already exists. ";
        }
        else
        {
            $ext=pathinfo(@$_FILES["file"]["name"], PATHINFO_EXTENSION);//取文件扩展名
            list($msec, $sec) = explode(' ', microtime());
            $msectime =  (string)sprintf('%.0f', floatval($msec) * 1000);//取毫秒数
            $newFileName=date("Y-m-d-H-i-s-") . $msectime.".".$ext;//新文件名
            echo '新文件名：'.$newFileName;
            //$newFileName=date("Y-m-d-H-i-s-") . @$_FILES["file"]["name"];
            move_uploaded_file(@$_FILES["file"]["tmp_name"],$parentPath."\\upload\\" . $newFileName);
            //echo "Stored in: " . "uploads/" . $newFileName;
            echo "<br/>上传成功\n;<script>history.go(-1);location.reload();</script>";

        }
    }
}
else
{
    echo "上传失败";
    /*echo "Upload: " . $_FILES["file"]["name"] . "<br />";
      echo "Type: " . $_FILES["file"]["type"] . "<br />";
      echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
      echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";*/
}
?>
