<?php 
	require_once("roomInfo.php");
	if(!isset($_SESSION['userId'])){
		if(!isset($_COOKIE['userId'])){
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=login.php'>";
		}
	}
	if(isset($_POST['submitFile'])) {
		readRoom("roomInfo.xls", "roomInfo", 2);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html, charset=UTF-8" />
		<title>房间管理</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css\common.css">
		<link rel="stylesheet" type="text/css" href="css\roomManage.css">
	</head>
	<body>
		<div class="header">
			<div class="title">
				<span>Admain Hotel System</span>
			</div
			><div class="nav">
				<a href="reservationManage.php">订房管理</a>
				<a href="balanceManage.php">结算管理</a>
				<a href="roomManage.php">客房管理</a>
				<a href="accountManage.php">账户管理</a>
			</div
			><div class="shortcut-icon">
				<button class="icon-search"></button
				><button class="icon-notice"></button
				><button class="icon-settings"></button
				><button class="icon-warning"></button>
			</div
			><div class="user-status">
				<img src="img/user.jpg" class="user-photo">
				<span class="user-name">kongsicong</span>
			</div>
		</div>
		<div class="content">
			<div class="content-nav">
				<a href="roomManage.php?show=import">导入房间信息</a>
				<a href="#">全部房间显示</a>
				<a href="roomManage.php?show=empty" class="sub-view-link">空房显示</a>
				<a href="#"></a>
				<a href="#"></a>
			</div>
			<div class="content-main">
				<h3>导入房间信息</h3>
				<div class="content-main-sub">
					<?php 
						if(isset($_GET["show"]) && !strcmp($_GET["show"],"import")) {
							echo '<form method="post" action="roomManage.php" enctype="multipart/form-data" class="form-add" >
									<span class="label">上传房间信息文件</span><input type="file" id="fileUpLoad"><br>
									<input type="submit" class="submit" value="导入信息" name="submitFile"><br>
							  	</form>';
						}
					?>
				</div>
				<div class="content-main-sub">
				</div>
				<div class="content-main-sub">
					<div class="show-empty-room">
						<?php
							if(isset($_GET["show"]) && !strcmp($_GET["show"],"empty")) {
								$emptyRoom = showEmptyRoom();
								if($emptyRoom) {
									while ($row = $emptyRoom->fetch_assoc()) {
										echo "<span>"."房间号：".$row["roomId"]."房间类型：".showTypeInDetail($row["type"])."</span><br>";
									}
								}else {
									echo "<span>select fail</span>";
								}
							}
							
						?>
					</div>
				</div>
				<div class="content-main-sub">
				</div>
				<div class="content-main-sub">
				</div>
			</div>
		</div>
			
		<div class="footer">
		</div>
		<!--
		<script type="text/javascript" src="js\jquery-2.1.4.js"></script>
		<script type="text/javascript" src="js\myLib.js"></script>
		<script type="text/javascript" src="js\common.js"></script>
		-->
	</body>
</html>