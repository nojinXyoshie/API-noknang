<?php
	include "koneksi.php";
	
	class emp{}
	
	$id = $_POST['id'];
	$image = $_POST['image'];
	$namauser = $_POST['nama'];
	$information = $_POST['information'];
	date_default_timezone_set('Asia/Jakarta');
	$date = date("Y-m-d h:i:sa");
	
	if (empty($information)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Please dont empty Name.";
		die(json_encode($response));
	} else if(empty($image)){
		$response = new emp();
		$response->success = 0;
		$response->message = "Please dont empty Image.";
		die(json_encode($response));
	} else {
		//$random = random_word(20);
		$nama = "close_up1";
		$path = "upload_image/".$namauser."_closeup2.jpg";
		
		// sesuiakan ip address laptop/pc atau URL server
		$format = ".jpg";
		$actualpath = "".$namauser."_closeup2.jpg";
		
		$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM image_participants WHERE image_name = '".$actualpath."'"));

		if(empty($num_rows)){
			$query = mysqli_query($con, "INSERT INTO image_participants (id_participants,image_name,information,insert_date) VALUES ('$id','$actualpath','$information','$date')");
			if ($query){
				file_put_contents($path,base64_decode($image));
				
				$response = new emp();
				$response->success = 1;
				$response->message = "Successfully Uploaded";
				die(json_encode($response));
			} else{ 
				$response = new emp();
				$response->success = 0;
				$response->message = "Error Upload image";
				die(json_encode($response)); 
			}
		}else if(!empty($num_rows)){
			$query = mysqli_query($con,"UPDATE image_participants SET image_name='".$actualpath."', insert_date = '".$date."' WHERE image_name='".$actualpath."'");
			if ($query){
				file_put_contents($path,base64_decode($image));
				
				$response = new emp();
				$response->success = 1;
				$response->message = "Successfully Uploaded";
				die(json_encode($response));
			} else{ 
				$response = new emp();
				$response->success = 0;
				$response->message = "Error Upload image";
				die(json_encode($response)); 
			}
		}

	}	
	
	// fungsi random string pada gambar untuk menghindari nama file yang sama
	// function random_word($id = 20){
	// 	$pool = '1234567890abcdefghijkmnpqrstuvwxyz';
		
	// 	$word = '';
	// 	for ($i = 0; $i < $id; $i++){
	// 		$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
	// 	}
	// 	return $word; 
	// }

	mysqli_close($con);
	
?>	