<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>会员登录</title>
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="css/all.css">
<script src="js/jquery-1.7.min.js"></script>
<script src="js/denglu.js"></script>

</head><body>
<?php
$url=@$_GET["url"];
$type=isset($_GET["type"])?$_GET["type"]:1;
?>

  <div class="div1" id="tab">
    <ul id="u1">
      <li <?php if($type==1){?>class="selected"<?php }?> data="li-dl">登录</li>
      <li <?php if($type==2){?>class="selected"<?php }?> data="li-zc">注册</li>
    </ul>
      <form id="login" name="login" method="post" action="loginOK.php?url=<?php echo $url; ?>" >
      <div class="dl">
          <input name="name" class="user" type="text" placeholder="输入登录用户名"  />
          <input name="password" class="pd" type="password" placeholder="请输入密码"  />
          <a href="#">忘记密码？</a>
          <input class="button" type="submit" value="登录"  />
        </div></form>
      <form id="reg" name="reg" method="post" action="regOK.php" >
      <div class="zc" style="display:none;">
          <input name="name" class="user" type="text" placeholder="输入注册用户名"  />
          <input name="password" class="pd" type="password" placeholder="请输入密码"  />
          <span><input id="xx" type="radio" name="sf" checked="checked" value="1" />学习者
          <input id="js" type="radio" name="sf" value="2"/>讲师
          </span>
          <input class="button" type="submit" value="注册"  />
      </div>
          </form>

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
