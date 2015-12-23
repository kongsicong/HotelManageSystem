<?php
	$isSuccess = $_GET["isSuccess"];
	if($isSuccess == 1) {
		echo "reservation success";
	} else {
		echo "reservarion success";
	}
	header("Refresh:3;url=reservarionManage.php");
?>