﻿<?php
include './base.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>健康促進網</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>

<style>
	.alerr{
		background:rgba(51,51,51,0.8);
		color:#FFF;
		min-height:100px;
		width:300px;
		/* position:fixed; */
		display:none;
		z-index:9999;
		overflow:auto;
	}
</style>
</head>

<body>

	<!-- 彈出視窗 -->
	<div class="alerr">
		<pre class="ssaa"></pre>
	</div>

	<!-- iframe刪除改用AJAX -->
	<!-- <iframe name="back" style="display:none;"></iframe> -->

	<div id="all">
		<div id="title">
			<!--改日期 date()函式 m:數字表示的月份,含0 / d:月分中的第幾天,含0 / l:完整星期幾英文 -->
			<!-- 00 月 00 號 Tuesday  -->
			<?= date("m 月 d 號 l"); ?> | 今日瀏覽: <?= $Total->find(['date' => date("Y-m-d")])['total']; ?> | 累積瀏覽: <?= $Total->sum('total'); ?>
			<a href="index.php" style="float: right;">回首頁</a>
		</div>
		<div id="title2">
			<!-- 加入標題圖片和替代文字和回首頁連結 -->
			<a href="index.php">
				<img src="./icon/02B01.jpg" alt="" title="健康促進網-回首頁">
			</a>
		</div>
		<div id="mm">
			<div class="hal" id="lef">
				<a class="blo" href="?do=acc">帳號管理</a>
				<a class="blo" href="?do=po">分類網誌</a>
				<a class="blo" href="?do=news">最新文章管理</a>
				<a class="blo" href="?do=know">講座管理</a>
				<a class="blo" href="?do=que">問卷管理</a>
			</div>
			<div class="hal" id="main">
				<div>

					<span style="width:80%; display:inline-block;">
						<marquee>請民眾踴躍投稿電子報，讓電子報成為大家相互交流、分享的園地!詳見最新文章</marquee>
					</span>
					<span style="width:18%; display:inline-block;">

					<!-- 判斷登入狀態 -->
					<?php
						if(isset($_SESSION['login'])){	
								
								if($_SESSION['login']=='admin'){
					?>	
								歡迎，<?= $_SESSION['login']; ?><br>
								<a href="backend.php">管理</a>|<a href="frontend/logout.php">登出</a>	
							<?php
								}else{
							?>
								歡迎，<?= $_SESSION['login']; ?>
								<a href="frontend/logout.php">登出</a>	
							<?php
								}
							?>

					<?php
						}else{
					?>
						<a href="?do=login">會員登入</a>
					<?php
						}
					?>



					</span>
					<!-- 內容區 ------------------------------------------------------>
					<div class="content">
						<?php
							$do = (isset($_GET['do']) ? $_GET['do'] : 'home' );
							$file = 'backend/' . $do . '.php';
							if(file_exists($file)){
								include $file;
							}else{
								include 'backend/home.php';
							}
						
						
						?>

					</div>
					</div>
				</div>
			</div>
		</div>
		<div id="bottom">
			本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2021健康促進網社群平台 All Right Reserved
			<br>
			服務信箱：health@test.labor.gov.tw<img src="./icon/02B02.jpg" width="45">
		</div>
	</div>

</body>

</html>