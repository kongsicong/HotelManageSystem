<?php
	//获取用户注册信息
	$username = $_POST['username'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

	//数据处理及验证



	//插入数据库
	require_once("conn.php");
	$sql = "insert into user (username, password, email, phone) values ('$username', '$password', '$email', '$phone');";
	try {
		$result = $mysqliObj->query($sql);
	}catch (Exception $e) {
		echo "Failed to insert info: " . $e->getMessage() . "\n";
		exit();
	}
	$mysqliObj->close();
	echo "insert success, back to index page after 3 seconds\n";
	header("Refresh:3;url=index.php");
	
?>