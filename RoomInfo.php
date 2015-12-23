<?php
function readRoom($file,$table,$pos){
	require_once("conn.php");
	$sql="TRUNCATE TABLE $table";
	if($mysqliObj->query($sql)) echo "truncate success"."</br>";

	require_once ('Excel/reader.php');


	// ExcelFile($filename, $encoding);
	$data = new Spreadsheet_Excel_Reader();


	// Set output Encoding.
	// $data->setOutputEncoding('CP936');
	$data->setOutputEncoding('gbk');


	$data->read($file);


	error_reporting(E_ALL ^ E_NOTICE);
	//$data->sheets[0]['numRows']
	for ($i = $pos; $i <=$data->sheets[0]['numRows'] ; $i++) {
		$msg1=$data->sheets[0]['cells'][$i][1];
		$msg2=$data->sheets[0]['cells'][$i][2];
		$msg3=$data->sheets[0]['cells'][$i][3];
		 $sql="INSERT INTO  $table (`roomId` ,`type` ,`price` )
				VALUES ('$msg1',  '$msg2',  '$msg3')";
		 if(!is_null($data->sheets[0]['cells'][$i][1]))
		 {
		 	$mysqliObj->query($sql);
		 }
	}
	$mysqliObj->close();
}
function showAllRooms() {
	require_once("conn.php");
	$sql = "select * from roomInfo";
	$result = null;
	try {
		$result = $mysqliObj->query($sql);
	}catch (Exception $e) {
		echo "Failed to query the room information: " . $e->getMessage() . "\n";
  		exit();
	}
	return $result;
}
function showTypeInDetail($id) {
	$detail = "";
	if($id == 1) $detail = "单人间标间";
	if($id == 2) $detail = "双人间标间";
	if($id == 3) $detail = "三人间标间";
	if($id == 4) $detail = "单人间豪华间";
	if($id == 5) $detail = "双人间标豪华间";
	if($id == 6) $detail = "三人间豪华间";
	if($id == 7) $detail = "总统套房";
	return $detail;
}
function reservationRoom($clientName, $IDCard, $phone, $startTime, $endTime, $type) {
	
	for ($i = $startTime; $i < $endTime; $i++) { 
		$roomId = findEmptyRoom($type , $i);
		echo $roomId."<br>";
 		if($roomId != 0) continue;
 		else return 0;
	}
	$roomId = findEmptyRoom($type, $startTime);
	if($roomId) {
		require_once("conn.php");
		$sql = "insert into clientInfo (clientName, IDCard, phone) values ('$clientName', '$IDCard', '$phone');";
		try {
			$result = $mysqliObj->query($sql);
		}catch (Exception $e) {
			echo "Failed to insert the client information: " . $e->getMessage() . "\n";
	  		exit();
		}
		$sql = "insert into reservationInfo (clientId, roomId, startTime, endTime, type) values ('$IDCard', '$roomId', '$startTime', '$endTime', '$type')";
		try {
			$result = $mysqliObj->query($sql);
		}catch (Exception $e) {
			echo "Failed to insert the reservation information: " . $e->getMessage() . "\n";
	  		exit();
		}
		$mysqliObj->close();
		return 1;
	}else {
		return 0;
	}
	
	
	
	
}
function findEmptyRoom($type, $date) {
	$dbhost ="localhost";
  	$dbuser = "root";
  	$dbpwd = "";
  	$dbname = "test";
  	try{
  		$mysqliObj = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
  	}
  	catch(Exception $e){
  		echo "Failed to get DB handle: " . $e->getMessage() . "\n";
  		exit();
  	}
	$mysqliObj->query("set names utf8;"); 
	 $roomIdEmpty = 0;
	 $sql = "select roomId from roomInfo where type = '$type';";
	 try {
	 	$result = $mysqliObj->query($sql);
	 }catch (Exception $e) {
	 	echo "Failed to query the room information: " . $e->getMessage() . "\n";
   		exit();
	 }
	 $sql = "select roomId from reservationInfo where type = '$type' AND '$date' >= startTime AND '$date' < endTime;";
	try {
		$result2 = $mysqliObj->query($sql);
	}catch (Exception $e) {
		echo "Failed to query the clinet information: " . $e->getMessage() . "\n";
  		exit();
	}
	
	if($result->num_rows > $result2->num_rows) {
		$roomIdEmpty = getEmptyRoomId($result, $result2); 
	}
	$mysqliObj->close();
	return $roomIdEmpty;
}	
function getEmptyRoomId($result1, $result2) {
	$conflict = 0;
	while ($row1 = $result1->fetch_array()) {
		while ($row2 = $result2->fetch_array()) {
			if ($row1[0] == $row2[0]) {
				$conflict = 1;
				break;
			}else $conflict = 0;
		}
		if($conflict == 0)
		return $row1[0];
	}
}
?>
