<?php

require_once "connection.php";
session_start();



$uid=$_SESSION["uid"];
if (empty($uid)){
    echo json_encode(['status'=>0, 'message'=>'请登录后再打赏']);
    return;
}

//获取打赏者id session[uid]，被打赏者id g_id 从video表中获取，打赏金额 money
$gid=$_SESSION['uid'];
$money=$_POST['money'];
$vid=$_POST['vid'];
$sql=mysql_query("select author from video where id=$vid");
$author=mysql_result($sql,0,0);
//添加打赏记录，扣除打赏者余额，增加被打赏者余额
$gb=mysql_query("select balance from user where id=$gid");
$gb=mysql_result($gb,0,0);
if($gb>=$money)
{
    $sql=mysql_query("update user set balance=balance-$money where id=$gid");
    $sql1=mysql_query("update user set balance=balance+$money where id=$author");
    $sql2=mysql_query("insert into gratuity (gid,aid,money) values($gid,$author,$money)");
    if($sql&&$sql1&&$sql2){
        echo json_encode(['status'=>1, 'message'=>'打赏成功']);
    }
    else{
        echo json_encode(['status'=>2, 'message'=>'打赏失败']);
    }
//if($
}
else{
    echo json_encode(['status'=>-1, 'message'=>'余额不足']);
}
//if($reply_id=="")
//    $reply_id="0";
//$res=Comment::create([
//    'user_id'=>$data['user_id'],
//    'article_id'=>$data['article_id'],
//    'reply_id'=>$reply_id,
//    'content'=>$data['content']
//]);
//
//if($res){
//    return ['status'=>1, 'message'=>'评论成功'];
//
//}else {
//    //Db::table('zh_user_fav')->where($map)->delete();
//    return ['status'=>0, 'message'=>'评论失败'];
//}