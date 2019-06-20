<?php

require_once "connection.php";
session_start();



$uid=$_SESSION["uid"];
if (empty($uid)){
    echo json_encode(['status'=>0, 'message'=>'请登录后再评论']);
    return;
}

$reply_id=$_POST['reply_id'];
$content=$_POST['content'];
$vid=$_POST['vid'];
$sql=mysql_query("insert into comments (uid,vid,content,reply_id) values($uid,$vid,'$content',$reply_id)");
if($sql){
    echo json_encode(['status'=>1, 'message'=>'评论成功']);
}
else{
    echo json_encode(['status'=>0, 'message'=>'评论失败']);
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