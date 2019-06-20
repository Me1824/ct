<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理员首面</title>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/all.css">

    <link rel="stylesheet" href="../css/bootstrap.min1.css">
  <link rel="stylesheet" href="../css/sb-admin.css">
  <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min1.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/sb-admin.min.js"></script>
    <script language="javascript">
        $(function(){
            $("select#video").change(function(){
                var filename=$(this).val();
                $(".play").attr('src','../upload/'+filename);
            });
            $("select#pic").change(function(){
                var filename=$(this).val();
                $("#img1").attr('src','../upload/'+filename);
            });
        });
    </script>
</head>
<body>
<div class="box1">
	<div class="box2">
		<?php
			require_once "left.php";
		?>
	</div>
	<div class="box3">
		<div class="top">
			
			<?php
				require_once "top.php";
			?>
		</p>
		</div>
		<div class="mian">
			<div class="main_1">
                <form action="upload_ok.php" method="post" enctype="multipart/form-data">
                    <label for="file">图片文件名:</label>
                    <input type="file" name="file" id="file" />
                    <input  type="submit" name="submit" value="上传" />
                    
                </form>
                <form action="upload_ok.php" method="post" enctype="multipart/form-data">
                    <label for="file">视频文件名:</label>
                    <input type="file" name="file" id="file" />
              
                    <input type="submit" name="submit" value="上传" />
                </form>
				<form class="form1" action="vupload_ok.php" method="post">
                    <select name='video' id='video' class="in input3" required>
                        <option value="">请选择视频</option>
                        <?php
                        $dir=dirname(dirname(__FILE__))."/upload";
                        $file=scandir($dir);
                        for($i=0;$i<count($file);$i++)
                        {
                            $ext=substr($file[$i],strrpos($file[$i],'.')+1);
                            if($file[$i] != '.' && $file[$i] != '..'&&($ext=='mp4'||$ext=='avi'||$ext=='flv'||$ext=='rmvb'))
                            {
                                echo "<option  value='$file[$i]'>$file[$i]</option>";
                            }
                        }
                        ?>
                    </select>

					<input name="vname" class="in input1" type="text" placeholder="标题" />
<!--          			<input name="url" class="in input2" type="text" placeholder="封面" />-->
                   <img id='img1' name='img1' width='100px' height='100px' src='#' style="position: relative;top:100px;">
                    <select name='pic' id='pic' class="in input2" required>
                        <option value="">请选择图片</option>
                        <?php
                        $dir=dirname(dirname(__FILE__))."/upload";
                        $file=scandir($dir);
                        for($i=0;$i<count($file);$i++)
                        {
                            $ext=substr($file[$i],strrpos($file[$i],'.')+1);
                            if($file[$i] != '.' && $file[$i] != '..'&&($ext=='jpg'||$ext=='jpeg'||$ext=='png'||$ext=='gif'))
                            {
                                echo "<option value='$file[$i]'>$file[$i]</option>";
                            }
                        }
                        ?>
                    </select>
<!--          			<input name="v" class="in input3" type="text"  placeholder="视频地址" />-->
                    <video class="play" src="" controls="controls" class="in input4" style="position: relative;top:145px;width:100px;height: 100px">
                        您的浏览器不支持 video 标签。
                    </video>
          			<input name="price" class="in input6" type="text" placeholder="价格"  />
<!--          			<input name="num" class="in input6" type="text" placeholder="播放量" />-->

          			<input class="button2" type="submit" value="上传"  />
				</form>
			</div>
		</div>
		
	</div>
</div>
	
	
	


</body>
</html>
