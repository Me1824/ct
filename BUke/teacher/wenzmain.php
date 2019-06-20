<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>文章管理</title>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/all.css">

    <link rel="stylesheet" href="../css/bootstrap.min1.css">
  <link rel="stylesheet" href="../css/sb-admin.css">
  <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min1.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/sb-admin.min.js"></script>
    <style>
        table{margin: 0 auto;}
    </style>
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
                

                <?php
                require_once "../connection.php";

                ?>
                <form name="form1" method="post" action="" align="center">

                    <p/>文章管理<p/>
                    查询关键字&nbsp;
                    <input name="txt_keyword" type="text" id="txt_keyword" size="40" value="<?php
                    if(isset($_POST["Submit"]))
                    {
                        echo @$_POST[txt_keyword];//如果是点提交后打开的，则显示上次在框中输入的关键字
                    }
                    else
                    {
                        echo @$_GET[keyword];//如果是通过点链接打开的，则显示url中的关键字
                    }
                    ?>"
                    >
                    <input type="submit" name="Submit" value="搜索" >
                    <br/>
                </form>
                <hr/>
                <table id="tab1">
                    <tr>
                        <td>编号</td>
                        <td>标题</td>
                        <td>封面</td>
                        <td>内容</td>
                        <td>浏览量</td>
                        <td>状态</td>
                        <td>操作</td>
                    </tr>
                    <?php
                    mysql_query("set names utf8");
                    session_start();
                    $id=$_SESSION[uid];
                    //$sql=mysql_query("select count(*) from tb_affiche order by id desc");
                    $page=@$_GET["page"];//获取页次
                    $keyword=@$_GET["keyword"];//获取url中查询关键字
                    if(isset($_POST["Submit"]))
                    {
                        $page=1;//点搜索则从第1页起显示
                        $keyword=@$_POST[txt_keyword]; 				//获取查询关键字内容
                    }
                    $sql=mysql_query("select count(*) from article where author=$id and  title like '%$keyword%'  order by id asc",$conn);
                    //print_r($conn);
                    //查询符合条件的记录总条数
                    $message_count=mysql_result($sql,0,0);	//要显示的总记录数
                    //echo "记录数为：".$message_count;
                    if ($page==""){
                        $page=1;
                    }
                    if (!is_numeric($page)){				//判断变量$page是否为数字，如果是则返回true
                        $page=1;
                    }
                    $page_size=4; //每页显示的记录数
                    $page_count=ceil($message_count/$page_size);	//总页数
                    $offset=($page-1)*$page_size;

                    $sql=mysql_query("select * from article where author=$id and  title like  '%$keyword%'  order by id asc limit $offset, $page_size");

                    $row=mysql_fetch_object($sql); 				//获取查询结果集
                    $i=$page_size*($page-1)+1;
                    if(!$row){								//如果未检索到信息资源，则弹出提示信息
                        echo "<font color='red'>您搜索的信息不存在，请使用类似的关键字进行检索!</font>";
                    }
                    while($row){
//应用while循环语句输出查询结果
                        ?>
                        <tr >
                            <td><?php echo $i++?></td>
                            <td><?php echo $row->title?></td>
                            <td><img width="100px" height="100px" src="<?php echo '../upload/'.$row->img;?>"></td>
                            <td width="200px"><?php echo substr($row->content, 0,74);?></td>
                            <td><?php echo $row->num;?></td>
                            <td><?php  if($row->status==0){?>审核中<?php }else{?>通过<?php }?></td>
                            <td>

                                <a href="wenzmain_delete.php?id=<?php echo $row->id?>">删除</a>
                            </td>
                        </tr>
                        <?php
                        $row=mysql_fetch_object($sql);
                    }; 		//while循环语句结束
                    mysql_free_result($sql);					//关闭记录集
                    mysql_close($conn);
                    ?>
                </table>
                <div>
                    <br/>
                    <table>
                        <tr>
                            <!--  翻页条 -->
                            <td width="50%" align="left">页次：<?php echo $page;?>/<?php echo $page_count;?>页&nbsp;总记录数：<?php echo $message_count;?> 条&nbsp; </td>
                            <td width="50%" align="right">
                                <?php
                                /*  如果当前页不是首页  */
                                if($page!=1){
                                    /*  显示“首页”超链接  */
                                    echo "<a href= videomain.php?page=1&keyword=".$keyword.">首页</a>&nbsp;";
                                    /*  显示“上一页”超链接  */
                                    echo "<a href=videomain.php?page=".($page-1)."&keyword=".$keyword.">上一页</a>&nbsp;";
                                }
                                else{
                                    echo "首页&nbsp;";

                                    echo "上一页&nbsp;";
                                }
                                /*  如果当前页不是尾页  */
                                if($page<$page_count){
                                    /*  显示“下一页”超链接  */
                                    echo "<a href=videomain.php?page=".($page+1)."&keyword=".$keyword.">下一页</a>&nbsp;";
                                    /*  显示“尾页”超链接  */
                                    echo  "<a href=videomain.php?page=".$page_count."&keyword=".$keyword.">尾页</a>";
                                }
                                else{
                                    echo "下一页&nbsp;";
                                    echo "尾页&nbsp;";
                                }
                                ?>
                            </td></tr></table></div>
            </div>
		</div>
		
	</div>
</div>
	
	
	


</body>
</html>
