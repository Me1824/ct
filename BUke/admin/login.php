<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理员登录</title>
<link rel="stylesheet" type="text/css" href="../css/login.css">
<link rel="stylesheet" type="text/css" href="../css/all.css">
<script src="../js/jquery-1.7.min.js"></script>
<script src="../js/denglu.js"></script>
</head>
<body>
<?php
$url=@$_GET["url"];
?>

  <div class="div1" id="tab">
    <ul id="u1">
      <li class="selected">登录</li>
    </ul>
      <form id="login" name="login" method="post" action="loginOK.php?url=<?php echo $url; ?>" >
      <div class="dl">
          <input name="name" class="user" type="text" placeholder="输入管理员用户名"  />
          <input name="password" class="pd" type="password" placeholder="请输入密码"  />
          <a href="#">忘记密码？</a>
          <input class="button" type="submit" value="登录"  />
        </div></form>
      

  </div>

   <div class="bottom">
    <table>
      <tr>
        <td><a>关于我们</a></td>
        <td><a>版权声明</a></td>
        <td><a>侵权举报</a></td>
        <td><a>联系我们</a></td>
        <td><a>常见问题</a></td>
     </tr>
      <tr><td colspan="8">
        © Copyright 陈通 版权所有
      </tr>
    </table>
    
  </div>

</body>
</html>