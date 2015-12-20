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
function showEmptyRoom() {
	require_once("conn.php");
	$sql = "select roomId,type,price from roomInfo where status = 0 ;";
	try {
		$result = $mysqliObj->query($sql);
	}catch (Exception $e) {
		echo "Failed to get the empty romm information: " . $e->getMessage() . "\n";
  		exit();
	}

	$mysqliObj->close();
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
	require_once("conn.php");
	$roomId = 101;
	$sql = "insert into clientInfo (clientName, IDCard, phone, startTime, endTime, roomId) values ('$clientName', '$IDCard', '$phone', '$startTime', '$endTime', '$roomId');";
	try {
		$result = $mysqliObj->query($sql);
	}catch (Exception $e) {
		echo "Failed to insert the client information: " . $e->getMessage() . "\n";
  		exit();
	}

	$mysqliObj->close();
	
}
function isAllThisTypeRoomReserved($type ,$data) {

}
?>
