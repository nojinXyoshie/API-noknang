<?php 
	include "koneksi.php";
	
	$id_users = $_POST['id_users'];
	$query = mysqli_query($con,"SELECT * FROM participants WHERE status ='1' AND status = '1' ");
	
	$json = array();
	
	while($row = mysqli_fetch_assoc($query)){
		$json[] = $row;
	}

	for ($i=0; $i < sizeof($json); $i++){
		$id_participants = $json[$i]['id_participants'];
		$query = mysqli_query($con, "SELECT * FROM image_participants where id_participants = '$id_participants' AND information = 'Close Up 1'") or die(mysqli_error($con));
	
		while($row = mysqli_fetch_assoc($query)){
			$json[$i]['image'] = $row;
		}
	}

	for ($i=0; $i < sizeof($json); $i++){
		$id_participants = $json[$i]['id_participants'];
		$query2 = mysqli_query($con,"SELECT value FROM judgement where id_session_assesment = '6' AND id_participants = '$id_participants' AND id_users = '$id_users' ") or die(mysqli_error($con));
			
			while($row2 = mysqli_fetch_assoc($query2)){
				$json[$i]['presentasi'] = $row2;
		}
		
	}

	for ($i=0; $i < sizeof($json); $i++){
		$id_participants = $json[$i]['id_participants'];
		$query3 = mysqli_query($con,"SELECT * FROM session_note where id_session_assesment = '6' AND id_participants = '$id_participants' AND id_users = '$id_users'") or die(mysqli_error($con));
			
			while($row3 = mysqli_fetch_assoc($query3)){
				$json[$i]['catatan'] = $row3;
		}
		
	}
	
	echo json_encode($json);
	
	mysqli_close($connect);
	
?>