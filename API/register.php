<?php
	 include_once "koneksi.php";
	 class usr{}
	 $id = md5($_POST["username"]);
	 $email = $_POST["email"];
	 $username = $_POST["username"];
	 $password = md5($_POST["password"]);
	 $level = "masyarakat";

		 	$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE username='".$username."'"));

		 	if ($num_rows == 0){
		 		$query = mysqli_query($con, "INSERT INTO users (id_users, email, username, password, level) VALUES('".$id."','".$email."','".$username."','".$password."','".$level."')");

		 		if ($query){
		 			$response = new usr();
		 			$response->success = 1;
		 			$response->message = "Register berhasil, silahkan login.";
		 			die(json_encode($response));

		 		} else {
		 			$response = new usr();
					$response->success = 0;
		 			$response->message = "Register gagal";
		 			die(json_encode($response));
		 		}
		 	} else {
		 		$response = new usr();
				$response->success = 0;
		 		$response->message = "Username sudah ada";
				die(json_encode($response));
		 	}

	 mysqli_close($con);

?>	