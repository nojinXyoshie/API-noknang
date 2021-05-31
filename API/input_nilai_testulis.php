<?php
include_once "koneksi.php";
class usr{}

	 $id_users = $_POST["id_users"];
	 $id_participants = $_POST["id_participants"];
	 $nilai = $_POST["nilai"];
		 		
	 $query = mysqli_query($con, "INSERT INTO judgement (id_event, id_session_assesment, id_users, id_participants, value) VALUES ('2','2','".$id_users."','".$id_participants."','".$nilai."')");

		 		if ($query){
		 			$response = new usr();
		 			$response->success = 1;
		 			$response->message = "Input Nilai Sukses!";
		 			die(json_encode($response));

		 		} else {
		 			$response = new usr();
					$response->success = 0;
		 			$response->message = "Input Nilai Gagal!";
		 			die(json_encode($response));
		 		}

	 mysqli_close($con);
?>