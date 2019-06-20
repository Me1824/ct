<!doctype html>
<?php error_reporting(0);?>
<html>
<head>
<meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="css/top.css">
<!--	<script src="js/jquery-1.7.min.js"></script>-->
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/headbar.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/layer/layer.js"></script>
    <script>
        $(function () {
            $("#money").click(function () {
                var html="<p class='jine'>选择打赏金额<p><br><button class='btn btn-primary btttn'>1元</button><button class='btn btn-primary btttn'>2元</button><button class='btn btn-primary btttn'>5元</button>";
                layer.open({
                    type: 2,
                    skin: 'layui-layer-rim', //加上边框
                    area: ['420px', '240px'], //宽高
                    content: "dashang.php?vid="+<?php echo $_GET[id]?>
                });
            });
        })
    </script>
</head>
<?php
require_once "connection.php";
require_once "common.php";
session_start();
//获取视频id
$vid=$_GET["id"];
//获取用户id
$uid=$_SESSION["uid"];
if(empty($uid))
{
    echo "<script>alert('您尚未登录');location.href='login.php';</script>";
    die();
}
//判断视频是否过审

//检查播放权限
$sql=mysql_query("select price,status from video where id=$vid");
$price=mysql_result($sql,0,0);
$status=mysql_result($sql,0,1);
if($status==0)
    echo "<script>alert('该视频尚未审核，无法访问');location.href='./'</script>";
if($price!=0)
{
    $sql=mysql_query("select * from orders where userid=$uid and videoid=$vid");
    $row=mysql_fetch_object($sql);
    if(!$row) {
        echo "<script>alert('您尚未购买此视频，自动跳转支付界面');location.href='buy_order.php?id=$vid'</script>";
        return;
    }
}
//增加播放数
$sql=mysql_query("update video set num=num+1 where id=$vid");
//获取播放数量，视频地址
$sql=mysql_query("select * from video where id=$vid");
$row=mysql_fetch_object($sql);
?>
<script type="text/javascript">
    $(function(){
        $('.reply').on('click',function() {
            $('#comment_id').val($(this).attr('comment_id'));
            $('#content').focus()
            $('#content').val('回复 '+$(this).attr('reply_user')+' ： ');
        })
        $('#content').on('input propertychange', function() {

            if($(this).val().length==0) { $('#comment_id').val("0");}
        });

    })
</script>
<!-- 处理评论功能 -->
<script type="text/javascript">
    $(function(){
        $('#submit').on('click',function(){
            //获取用户id，视频id，内容,回复id（隐藏yu）

            var vid = <?php echo $vid?>;
            var replyId=$('#comment_id').val();
            var content=$('#content').val();
            if(content.length>100)
            {
                alert('最多输入100个字符!');
                $('#content').focus();
                return;
            }

            //if (userId && artId){
            $.ajax(
                {
                    type: 'post',
                    url : "remark.php",
                    data: {
                        vid : vid,
                        content     :content,
                        reply_id   : replyId
                    },
                    dataType : 'json',
                    success  : function(data)
                    {
                        switch(data.status)
                        {
                            case 1:
                                alert(data.message)
                                window.location.reload()
                                break


                            case 0:
                                alert(data.message)
                                break



                        }
                    }
                }

            )
            // }




        })
    })
</script>
<body>
	<div class="headbar">
            <div class="leftarea"><img src="images/logo.png" width="300px" height="60px"></div>
            <div class="mianarea">
                <ul class="nva">
                    <li><a class="ys" href="index.php">网站首页<span class="line"></span></a>
                        
                    </li>
                    <li style="width:100px"><a class="ys" style="width:100px;text-indent:-8px" href="#"><span class="jt"></span>设计教程
                        <span class="line"></span>
                    </a>
                    <div class="nva-son">
                            <ul class="son">
                                <li><a href="#">绘画插画<font size="1px" color="#999">(共xxxx门课)</font></a></li>
                                <li><a href="#">平面设计<font size="1px" color="#999">(共xxxx门课)</font></a></li>
                                <li><a href="#">室内设计<font size="1px" color="#999">(共xxxx门课)</font></a></li>
                                <li><a href="#">字体设计<font size="1px" color="#999">(共xxxx门课)</font></a></li>
                            </ul>
                            <ul class="sons">
                                <li><a href="#">海报设计<font size="1px" color="#999">(共xxxx门课)</font></a></li>
                                <li><a href="#">室内设计<font size="1px" color="#999">(共xxxx门课)</font></a></li>
                                <li><a href="#">产品精修<font size="1px" color="#999">(共xxxx门课)</font></a></li>
                                <li><a href="#">包装设计<font size="1px" color="#999">(共xxxx门课)</font></a></li>
                                
                            </ul>
                        
                    </div>
                        
                    </li>
                    <li><a class="ys" href="buy.php">视频购买<span class="line"></span></a></li>
                    <li><a class="ys" href="article_z.php"><span class="icon"></span>精选文章<span class="line"></span></a></li>
                    <li><a class="ys" href="single.php">个人中心<span class="line"></span></a></li>

                </ul>
            </div>
            <div class="rightarea">
            <form>
                
                <div class="search">
                    <span></span>
                    <input type="text" placeholder="搜索教程"  />
                    
                    <div class="search_j">
                        <ul>
                            <li id="tuijian"><span id="zero"></span>热门推荐</li>
                            <li><a href="#"><span id="one">1</span>AI</a></li>
                            <li><a href="#"><span id="one">2</span>海报</a></li>
                            <li><a href="#"><span id="one">3</span>UI</a></li>
                            <li><a href="#" id="zt"><span id="second">4</span>包装</a></li>
                            <li><a href="#" id="zt"><span id="second">5</span>特效</a></li>
                            <li><a href="#" id="zt"><span id="second">6</span>颜色</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="email">
                    <span id="email">
                    <div class="message">
                        <span>回复评论</span>
                        <span id="pinglun">目前没有消息...</span>
                        <a href="#">查看全部></a>
                    </div>
                    </span>
                </div>
                <div class="touxiang">
                <?php
                    session_start();//使用到session要加这句
    
                    if(empty($_SESSION['uname']))
                    echo '<a class="dl" href="login.php">登录</a>&nbsp;&nbsp;
                    <a class="zc" href="login.php?type=2">注册</a>';
                    else
                    echo $_SESSION['uname'].','.'<a class="tc" href="logout.php">退出</a>';
                    ?>
                    

                </div>
            </form>
            </div>
    </div>
	
	<div class="middle">	
		<div class="box2">
			<div class="box3">
				<p><?php echo $row->vname?></p>
				<div class="box4">
					<div class="box5">
						<div class="play">
                            <video class="play" src=<?php echo 'upload/'.$row->v?> controls="controls">
                                您的浏览器不支持 video 标签。
                            </video>
						</div>
						<span>视频播放量：<?php echo $row->num;?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">分享</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="#">帮助中心</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">举报</a><a id="money" href="#">打  赏</a></span>
					</div>
					
				</div>
			</div>
		</div>

		<div class="box6">
			<div class="zuobian">
                <?php $sql=mysql_query("select count(*) from comments where vid=$vid");
                $num=mysql_result($sql,0,0);?>
				<h2>学员评价<span>（<?php echo $num;?>条评论）</span></h2>
                <?php
                $sql=mysql_query("select * from comments where reply_id=0 and vid=$vid");
                $row=mysql_fetch_object($sql);
                ?>
              
                <input id="comment_id" type="hidden" value="0">
                <div class="col-md8">
                    <!--一级评论begin-->
                    <?php if(!$row) {echo "<h2>暂无评论!</h2>";}else{?>
                    <ul class="media-list">
                        <?php while($row){?>

                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img style="box-shadow: 3px 3px 3px #888;" class="media-object img-circle" width="45" src="images/base-icon1.png" alt="一级测试">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo getUserName($row->uid)?></h4>

                                <p><?php echo $row->content?></p>

                                <div class="ds-comment-footer">
                                    <span class="ds-time" title="<?php echo $row->create_time?>"><?php echo $row->create_time;?></span>&nbsp;
                                    <a class="reply" comment_id="<?php echo $row->id;?>" reply_user="<?php echo getUserName($row->uid)?>">
                                        <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 回复
                                    </a>
                                </div>
                                <hr/>
                                <!--二级评论begin-->
                                <ul class="media-list">
                                    <?php
                                    $sql1=mysql_query("select * from comments where reply_id=$row->id");
                                    $row1=mysql_fetch_object($sql1);
                                    while($row1){?>
                                    <li class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img style="box-shadow: 2.5px 2.5px 2.5px #888;" class="media-object img-circle" width="30" src="images/base-icon1.png" alt="二级测试">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><?php echo getUserName($row1->uid)?></h4>

                                            <p><?php echo $row1->content?></p>

                                            <div class="ds-comment-footer">
                                                <span class="ds-time" title="<?php echo $row1->create_time?>"><?php echo $row1->create_time?></span>&nbsp;
                                                <a class="reply" comment_id="<?php echo $row1->id;?>" reply_user="<?php echo getUserName($row1->uid)?>">
                                                    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 回复
                                                </a>
                                            </div>

                                            <hr/>
                                            <!--三级评论begin-->
                                            <ul class="media-list">
                                                <?php
                                                $sql2=mysql_query("select * from comments where reply_id=$row1->id");
                                                $row2=mysql_fetch_object($sql2);
                                                while($row2){?>
                                                <li class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img style="box-shadow: 2px 2px 2px #888;" class="media-object img-circle" width="30" src="images/base-icon1.png" alt="三级测试">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><?php echo getUserName($row2->uid)?></h4>

                                                        <p><?php echo $row2->content?></p>

                                                        <div class="ds-comment-footer">
                                                            <span class="ds-time" title="<?php echo $row2->create_time?>"><?php echo $row2->create_time?></span>&nbsp;
                                                            <!--<a class="reply" comment_id="{$grandson.id}" reply_user="{$grandson.user_id|getUserName}">-->
                                                            <!--<span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 回复-->
                                                            <!--</a>-->
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php $row2=mysql_fetch_object($sql2);}?>
                                            </ul>
                                            <!--三级评论end-->
                                        </div>
                                    </li>

                                        <?php $row1=mysql_fetch_object($sql1);}?>

                                </ul>
                                <!--二级评论end-->

                            </div>
                        </li>
                        <hr/>
                        <?php $row=mysql_fetch_object($sql);}?>

                    </ul>
                    <?php }?>
                    <!--一级评论end-->

                    <form id="remark">
                        <!--<div class="form-group">-->
                        <!--<label for="exampleFormControlInput1">Email address</label>-->
                        <!--<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">-->
                        <!--</div>-->
                        <!--<div class="form-group">-->
                        <!--<label for="exampleFormControlSelect1">Example select</label>-->
                        <!--<select class="form-control" id="exampleFormControlSelect1">-->
                        <!--<option>1</option>-->
                        <!--<option>2</option>-->
                        <!--<option>3</option>-->
                        <!--<option>4</option>-->
                        <!--<option>5</option>-->
                        <!--</select>-->
                        <!--</div>-->
                        <div class="form-group">
                            <label for="content">发表评论</label>
                            <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-0 col-sm-10">
                                <button type="button" class="btn btn-primary" id="submit">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
			
	</div>

	


	<div class="page">
				<ul class="n">
					<li><a href="#">下载app</a>
						<div class="n-s">
							<p >安装app随时随地学习</p>
						</div>
					</li>
					<li><a href="#">意见反馈</a></li>
					<li><a href="#">帮助中心</a></li>
					<li><a href="#">官方微信</a></li>

				</ul>
				<a href="#" id="top" style="display:none;">TOP</a>
	</div>
	
	<div class="bottom" style="top:150px;">
		<table>
			<tr>
				<td><a>关于我们</a></td>
				<td><a>版权声明</a></td>
				<td><a>侵权举报</a></td>
				<td><a>联系我们</a></td>
				<td><a>售后服务</a></td>
				<td><a>常见问题</a></td>
				<td><a>VIP特权</a></td>
				<td><a>学习小组</a></td>

			</tr>
			<tr><td colspan="8">
				© Copyright 陈通 版权所有
			</tr>
		</table>
		
	</div>

</body>

</html>