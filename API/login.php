<?php

include "koneksi.php";
require_once "validate.php";

class usr{}

if (isset($_POST["username"]) && isset($_POST["password"]))
{
  $username = validate($_POST["username"]);
  $password = validate($_POST["password"]);
  
	 $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='".md5($password)."'");
	
	 $row = mysqli_fetch_array($query);
	 $id_users = $row['id_users'];
	 $email = $row['email'];

	 if($row['level']=="peserta"){
	 	$query3 = mysqli_query($con, "SELECT * FROM participants WHERE id_users='$id_users'");
	 	$row3 = mysqli_fetch_array($query3);
	 	$id_participants = $row3['id_participants'];
	 	$full_name = $row3['full_name'];
	 	$status = $row3['status'];
	 	$bank_name = $row3['bank_name'];
		$alamat = $row3['address'];
		$visi = $row3['vision_mission'];
		$kontak = $row3['whatsapp_num'];
		 
		if (!empty($row)){
	 	$response = new usr();
	 	$response->success = 1;
	 	$response->message = "Selamat datang ".$full_name;
	 	$response->id = $id_participants;
		$response->id_users = $id_users;
	 	$response->level = $row['level'];
		$response->nama = $full_name;
		$response->status = $status;
		$response->bank_name = $bank_name;
		$response->email = $email;
		$response->alamat = $alamat;
		$response->visi = $visi;
		$response->kontak = $kontak;
	 	die(json_encode($response));
		
	 	} else { 
			$response = new usr();
			$response->success = 0;
			$response->message = "Username atau password salah";
			die(json_encode($response));
	 	}

	 }else if($row['level']=="panitia"){
	 	$query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND password='$password'");
	 	$row = mysqli_fetch_array($query);

	 	$id = $row['id_users'];
	 	$email = $row['email'];
		$username = $row['username'];
		$level = $row['level'];
		$status = $row['status'];
		 
		if (!empty($row)){
	 	$response = new usr();
	 	$response->success = 1;
	 	$response->message = "Selamat datang ".$username;
	 	$response->id = $id;
	 	$response->level = $level;
		$response->nama = $username;
		$response->status = $status;
		$response->email = $email;
	 	die(json_encode($response));
		
	 	} else { 
			$response = new usr();
			$response->success = 0;
			$response->message = "Username atau password salah";
			die(json_encode($response));
	 	}
	 }else if($row['level']=="masyarakat"){
	 	$query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND password='$password'");
	 	$row = mysqli_fetch_array($query);

	 	$id = $row['id_users'];
	 	$email = $row['email'];
		$username = $row['username'];
		$level = $row['level'];
		$status = $row['status'];
		 
		if (!empty($row)){
	 	$response = new usr();
	 	$response->success = 1;
	 	$response->message = "Selamat datang ".$username;
	 	$response->id = $id;
	 	$response->level = $level;
		$response->nama = $username;
		$response->status = $status;
		$response->email = $email;
	 	die(json_encode($response));
		
	 	} else { 
			$response = new usr();
			$response->success = 0;
			$response->message = "Username atau password salah";
			die(json_encode($response));
	 	}
	 } else if($row['level']=="juri"){
	 	$query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND password='$password'");
		$query2 = mysqli_query($con, "SELECT * FROM judges WHERE id_users = '$id_users' ");
	 	$row = mysqli_fetch_array($query);
		$row2 = mysqli_fetch_array($query2);
		 
	 	$id = $row['id_users'];
	 	$email = $row['email'];
		$username = $row['username'];
		$level = $row['level'];
		$status = $row['status'];
		$id_agenda = $row2['id_agenda'];
		 
		if (!empty($row)){
	 	$response = new usr();
	 	$response->success = 1;
	 	$response->message = "Selamat datang ".$username;
	 	$response->id = $id;
	 	$response->level = $level;
		$response->nama = $username;
		$response->status = $status;
		$response->email = $email;
		$response->id_agenda = $id_agenda;
	 	die(json_encode($response));
		
	 	} else { 
			$response = new usr();
			$response->success = 0;
			$response->message = "Username atau password salah";
			die(json_encode($response));
	 	}
	 }
    } else {
        $response = new usr();
	 	$response->success = 0;
	 	$response->message = "salah";
	 	die(json_encode($response));
    }
	 if (empty($row)){
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Data tidak ada";
	 	die(json_encode($response));
	 }
	
	 
	
	 mysqli_close($con);
?>