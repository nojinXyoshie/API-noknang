<?php
	 include_once "koneksi.php";
	 class usr{}
	 $id_users = $_POST["id_users"];
	 $id_participants = $_POST["id_participants"];
	 $username = $_POST["username"];
	 $password = md5($_POST["password"]);
	 $level = "masyarakat";

		 	$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM polling WHERE id_users='".$id_users."' AND id_participants = '".$id_participants."' "));

		 	if ($num_rows == 0){
		 		$query = mysqli_query($con, "INSERT INTO polling (id_users, id_participants) VALUES('".$id_users."','".$id_participants."')");

		 		if ($query){
		 			$response = new usr();
		 			$response->success = 1;
		 			$response->message = "Polling berhasil.";
		 			die(json_encode($response));

		 		} else {
		 			$response = new usr();
					$response->success = 0;
		 			$response->message = "Polling gagal";
		 			die(json_encode($response));
		 		}
		 	} else {
		 		$response = new usr();
				$response->success = 0;
		 		$response->message = "Anda sudah melakukan polling pada peserta ini";
				die(json_encode($response));
		 	}

	 mysqli_close($con);

?>	