<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <link rel="stylesheet" type="text/css" href="css/top.css">
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script>
        $(function () {
            $(".btn").click(function () {
                var money=$(this).attr("data");
                //alert(money);
                var vid=<?php echo $_GET["vid"]?>;
                $.ajax(
                    {
                        type: 'post',
                        url : "gratuity.php",
                        data: {
                            vid : vid,
                            money     :money
                        },
                        dataType : 'json',
                        success  : function(data)
                        {
                            switch(data.status)
                            {
                                case 1:
                                    alert(data.message)
                                    var index = parent.layer.getFrameIndex(window.name);
                                    parent.layer.close(index);

                                    break
                                case 2:
                                    alert(data.message)
                                    var index = parent.layer.getFrameIndex(window.name);
                                    parent.layer.close(index);
                                    break
                                case -1:
                                    alert(data.message)
                                    var index = parent.layer.getFrameIndex(window.name);
                                    parent.layer.close(index);
                                    break
                                case 0:
                                    alert(data.message);
                                    parent.location.href='login.php'
                                    break



                            }
                        }
                    }

                )
            });
        })
    </script>
</head>
<body>
<!--选择打赏金额<br><button class='btn btn-primary g' data="1">1元</button><button class='btn btn-primary g' data="2">2元</button><button data="5" class='g btn btn-primary'>5元</button>-->
<p class='jine'>选择打赏金额<p><br><button data="1" class='btn btn-primary btttn'>1元</button><button data="2" class='btn btn-primary btttn'>2元</button><button data="5" class='btn btn-primary btttn'>5元</button>
</body>

</html>