<?php
include_once "koneksi.php";
class usr{}

	 $id_users = $_POST["id_users"];
	 $id_participants = $_POST["id_participants"];
	 $note = $_POST["note"];
	 $kategori = $_POST["kategori"];
		 		
	 $query = mysqli_query($con, "INSERT INTO session_note (id_event, id_session_assesment, id_sub_assesment, id_users, id_participants, status, note) VALUES ('2','3','5','".$id_users."','".$id_participants."','".$kategori."','".$note."')");

		 		if ($query){
		 			$response = new usr();
		 			$response->success = 1;
		 			$response->message = "Input Note Sukses!";
		 			die(json_encode($response));

		 		} else {
		 			$response = new usr();
					$response->success = 0;
		 			$response->message = "Input Note Gagal!";
		 			die(json_encode($response));
		 		}

	 mysqli_close($con);
?>