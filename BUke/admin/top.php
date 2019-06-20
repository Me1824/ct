		<p>
			<?php
				session_start();//使用到session要加这句
				if(empty($_SESSION['uname']))
					echo "<script>alert('你还没登录，请先登录!');window.location.href= 'login.php';</script>";
				else
					echo $_SESSION['uname'].'管理员 '.'<a href="logout.php" style="color:#000;">退出</a>';
			?>
		</p>