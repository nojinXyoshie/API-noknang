<?php
	 include "koneksi.php";

	class emp{}
	
	$nol = 1;
	$id_agenda = $_POST['id_agenda'];
	$id_users = $_POST['id_users'];
	date_default_timezone_set('Asia/Jakarta');
	$date = date("Y-m-d h:i:sa");

	if ($id_agenda == '445' | $id_agenda == '348' | $id_agenda == '349' | $id_agenda == '738') {
	$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM attendance WHERE id_agenda = '".$id_agenda."' AND id_users = '$id_users'"));
	if (empty($num_rows)){
		$query = mysqli_query($con, "INSERT INTO attendance (id_users, id_agenda, date) VALUES ('$id_users','$id_agenda','$date')");
		if ($query){
	 	$response = new emp();
	 	$response->success = 1;
	 	$response->message = "Attendance Successfully";
	 	die(json_encode($response));	
		} 
		else { 
			$response = new emp();
			$response->success = 0;
			$response->message = "Data tidak ditemukan";
			die(json_encode($response));
		}
		
	} else if (!empty($num_rows)){
		$query = mysqli_query($con,"UPDATE attendance SET date='".$date."' WHERE id_users='".$id_users."'");
		if ($query){
	 	$response = new emp();
	 	$response->success = 1;
	 	$response->message = "Attendance Successfully";
	 	die(json_encode($response));	
		} 
		else { 
			$response = new emp();
			$response->success = 0;
			$response->message = "Data tidak ditemukan";
			die(json_encode($response));
		}
	}
	
} else if ($id_agenda == '703' | $id_agenda == '933') {
	$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM detail_consumption WHERE id_consumption = '".$id_agenda."' AND id_users = '$id_users'"));
	if (empty($num_rows)){
		$query = mysqli_query($con, "INSERT INTO detail_consumption (id_consumption, id_users, date) VALUES ('$id_agenda','$id_users','$date')");
		if ($query){
	 	$response = new emp();
	 	$response->success = 1;
	 	$response->message = "Scan Successfully";
	 	die(json_encode($response));	
		} 
		else { 
			$response = new emp();
			$response->success = 0;
			$response->message = "Data tidak ditemukan";
			die(json_encode($response));
		}
		
	} else if (!empty($num_rows)){
		$query = mysqli_query($con,"UPDATE detail_consumption SET date='".$date."' WHERE id_users='".$id_users."' AND id_consumption = '$id_agenda'");
		if ($query){
	 	$response = new emp();
	 	$response->success = 1;
	 	$response->message = "Scan Successfully";
	 	die(json_encode($response));	
		} 
		else { 
			$response = new emp();
			$response->success = 0;
			$response->message = "Data tidak ditemukan";
			die(json_encode($response));
		}
	}
}
else {
	$response = new emp();
			$response->success = 0;
			$response->message = "Data tidak ditemukan";
			die(json_encode($response));
}
	
	 mysqli_close($con);

?>