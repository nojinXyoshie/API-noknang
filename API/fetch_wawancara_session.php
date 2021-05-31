<?php 
	include "koneksi.php";
	
//	$id = $_POST['id'];
$id = 1;

	$query = mysqli_query($con,"SELECT * FROM judgement WHERE id_users ='$id' ");
	
	$json = array();
	
	while($row = mysqli_fetch_assoc($query)){
		$json[] = $row;
	}

	for ($i=0; $i < sizeof($json); $i++){
		$id_session_assesment = $json[$i]['id_session_assesment'];
		$query = mysqli_query($con, "SELECT * FROM session_assesment WHERE id_session_assesment = '$id_session_assesment' ") or die(mysqli_error($con));

		while($row = mysqli_fetch_assoc($query)){
			
			$json[$i]['session'] = $row;
		}
	
	}
	
	echo json_encode($json);
	
	mysqli_close($connect);
	
?>