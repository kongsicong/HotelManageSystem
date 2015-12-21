<?php 
	require_once("RoomInfo.php");
	if(!isset($_SESSION['userId'])){
		if(!isset($_COOKIE['userId'])){
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=login.php'>";
		}
	}
	if(isset($_POST['submit'])) {
		$clientName = $_POST["clientName"];
		$IDCardNumber = $_POST["IDCardNumber"];
		$phone = $_POST["phone"];
		$startTime = $_POST["startTime"];
		$endTime = $_POST["endTime"];
		$type = $_POST["reservationType"];
		$res = reservationRoom($clientName, $IDCardNumber, $phone, $startTime, $endTime, $type);
		if($res) echo "reservation success";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html, charset=UTF-8" />
		<title>首页-酒店管理系统</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css\common.css">
		<link rel="stylesheet" type="text/css" href="css\reservationManage.css">
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
				
			</div>
			<div class="content-main">
				<h3>房间预订</h3>
				<div class="content-main-sub">
					<form action="reservationManage.php?" method="post" class="form-reservation">
						<span class="label">客户名</span><input type="text"  class="account-info" name="clientName"><span></span><br>
						<span class="label">身份证号</span><input type="number" class="account-info"  name="IDCardNumber"><span></span><br>
						<span class="label">手机号</span><input type="phone" class="account-info"  name="phone"><span></span><br>
						<span class="label">预订开始时间</span><input type="date" class="account-info"  name="startTime"><span></span><br>
						<span class="label">预订结束时间</span><input type="date" class="account-info"  name="endTime"><span></span><br>
						<span class="label">预订房间类型</span><select class="account-info" name="reservationType">
																<option value="1">单人房标间</option>
																<option value="2">双人房标间</option>
																<option value="3">三人房标间</option>
																<option value="4">单人房豪华间</option>
																<option value="5">双人房豪华间</option>
																<option value="6">三人房豪华间</option>
																<option value="7">总统套房</option>
																</select><span></span><br>
						<input type="submit" value="确认" class="submit" name="submit"><input type="reset" value="重置" class="reset">
					</form>
				</div>
				<div class="content-main-sub">
					
				</div>
				<div class="content-main-sub">
					
				</div>
				<div class="content-main-sub">
					
				</div>
				<div class="content-main-sub">
					
				</div>
			</div>
		</div>
			
		<div class="footer">
		</div>
		
	</body>
</html>