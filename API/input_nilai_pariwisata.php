<?php
include_once "koneksi.php";
class usr{}

	 $id_users = $_POST["id_users"];
	 $id_participants = $_POST["id_participants"];
	 $interview = $_POST["interview"];
	 $grooming = $_POST["grooming"];
	 $manner = $_POST["manner"];
		 		
	 $query = mysqli_query($con, "INSERT INTO judgement (id_event,id_detail_assesment, id_session_assesment, id_users, id_participants, value) VALUES ('2','1','3','".$id_users."','".$id_participants."','".$interview."')");
	 $query2 = mysqli_query($con, "INSERT INTO judgement (id_event,id_detail_assesment, id_session_assesment, id_users, id_participants, value) VALUES ('2','2','3','".$id_users."','".$id_participants."','".$grooming."')");
	 $query3 = mysqli_query($con, "INSERT INTO judgement (id_event,id_detail_assesment, id_session_assesment, id_users, id_participants, value) VALUES ('2','3','3','".$id_users."','".$id_participants."','".$manner."')");

		 		if ($query && $query2 && $query3){
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