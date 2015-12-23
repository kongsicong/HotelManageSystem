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
				<a href="roomManage.php?cmd=import">导入房间信息</a>
				<a href="roomManage.php?cmd=add">增加房间</a>
				<a href="roomManage.php?cmd=delete">删除房间</a>
				<a href="roomManage.php?cmd=modify"></a>
				<a href="#"></a>
			</div>
			<div class="content-main">
				<h3>导入房间信息</h3>
				<div class="content-main-sub">
					<?php 
						if(isset($_GET["cmd"]) && !strcmp($_GET["cmd"],"import")) {
							echo '<form method="post" action="roomManage.php" enctype="multipart/form-data" class="form" >
									<span class="label">上传房间信息文件</span><input type="file" id="fileUpLoad"><br>
									<input type="submit" class="submit" value="导入信息" name="submitFile"><br>
							  	</form>';
						}
					?>
				</div>
				<div class="content-main-sub">
					<?php
						if(isset($_GET["cmd"]) && !strcmp($_GET["cmd"],"add")) {
							echo '<form method="post" action="roomManage.php" class="form">
									<span class="label">房间号</span><input type="number" class="account-info" name="roomId"><br>
									<span class="label">房间类型</span><select class="account-info" name="reservationType">
																<option value="1">单人房标间</option>
																<option value="2">双人房标间</option>
																<option value="3">三人房标间</option>
																<option value="4">单人房豪华间</option>
																<option value="5">双人房豪华间</option>
																<option value="6">三人房豪华间</option>
																<option value="7">总统套房</option>
																</select><span></span><br>
									<span class="label">价格</span><input type="number" class="account-info" name="price"><br>
									<input type="submit" class="submit" value="添加房间" name="submitAdd"><br>
							</form>';
						}
					?>
				</div>
				<div class="content-main-sub">
					<?php
						if(isset($_GET["cmd"]) && !strcmp($_GET["cmd"],"delete")) {
							require_once("RoomInfo.php");
							$res = showAllRooms();
							while ($row = $res->fetch_assoc()) {
								echo "<div><span>房间号</span>:".$row["roomId"]."  <span>房间类型</span>：".showTypeInDetail($row["type"])."  <span>价格</span>：".$row["price"].'<a href="deleteRoom">删除</a></div>';
							}
						}
					?>
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