<?php 
	if(!isset($_SESSION['userId'])){
		if(!isset($_COOKIE['userId'])){
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=login.php'>";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html, charset=UTF-8" />
		<title>首页-酒店管理系统</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css\common.css">
		<link rel="stylesheet" type="text/css" href="css\accountManage.css">
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
				<a href="#" class="sub-view-link">添加账户</a>
				<a href="#" class="sub-view-link">删除账户</a>
				<a href="#" class="sub-view-link">修改账户</a>
				<a href="#" class="sub-view-link">导出账户</a>
				<a href="#" class="sub-view-link">导入账户</a>
			</div>
			<div class="content-main">
				<h3>添加账户</h3>
				<div class="content-main-sub">
					<form action="addAccount.php?" method="post" class="form-add">
						<span class="label">用户名</span><input type="text" class="account-info" id="account" name="username"><span></span><br>
						<span class="label">密码</span><input type="password" class="account-info" id="password" name="password"><span></span><br>
						<span class="label">确认密码</span><input type="password" class="account-info" id="repassword" name="repassword"><span></span><br>
						<span class="label">邮箱</span><input type="text" class="account-info" id="email" name="email"><span></span><br>
						<span class="label">手机号</span><input type="number" class="account-info" id="phone" name="phone"><span></span><br>
						<input type="submit" value="确认" class="submit"><input type="reset" value="重置" class="reset">
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
		<script type="text/javascript" src="js\jquery-2.1.4.js"></script>
		<script type="text/javascript" src="js\myLib.js"></script>
		<script type="text/javascript" src="js\common.js"></script>
	</body>
</html>