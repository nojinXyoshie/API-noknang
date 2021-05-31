<?php

include "koneksi.php";

class usr{}

$id = $_POST["id"];
$pw1 = md5($_POST["pw1"]);
$pw2 = md5($_POST["pw2"]);
$pw3 = md5($_POST["pw3"]);

	//if ($pw2 == $pw3){
	
	 	$query = mysqli_query($con, "UPDATE users SET password = '$pw3' WHERE id_users='$id'");
		 
		if ($query)){
	 	$response = new usr();
	 	$response->success = 1;
	 	$response->message = "Change password success";
	 	die(json_encode($response));
		
	 	} else { 
			$response = new usr();
			$response->success = 0;
			$response->message = "Change password failed";
			die(json_encode($response));
	 	}
	/*} else {
		$response = new usr();
			$response->success = 0;
			$response->message = "Change password failed";
			die(json_encode($response));
	} */
	 
	
	 mysqli_close($con);
?>