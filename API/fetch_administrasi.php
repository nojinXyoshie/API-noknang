<?php 
	include "koneksi.php";
/*
	$query0 = mysqli_query($con,"SELECT * FROM session WHERE id_session = '1' ");
	$json0 = array();
	while($row = mysqli_fetch_assoc($query0)){
		$json0[] = $row;
	}
	for ($i=0; $i < sizeof($json0); $i++){
		$id_session = $json0[$i]['id_session'];
		$query = mysqli_query($con, "SELECT * FROM session_assessment where id_session = '$id_session'") or die(mysqli_error($con));

	while($row = mysqli_fetch_assoc($query)){
		$json[$i]['session'] = $row;
	}
	
	}
*/
	/* =================================Batas===================================*/

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
		$query2 = mysqli_query($con,"SELECT value FROM judgement where id_session_assesment = '1' AND id_participants = '$id_participants'") or die(mysqli_error($con));
			
			while($row2 = mysqli_fetch_assoc($query2)){
				$json[$i]['administrasi'] = $row2;
		}
		
	}

	for ($i=0; $i < sizeof($json); $i++){
		$id_participants = $json[$i]['id_participants'];
		$query3 = mysqli_query($con,"SELECT * FROM session_note where id_session_assesment = '1' AND id_participants = '$id_participants'") or die(mysqli_error($con));
			
			while($row3 = mysqli_fetch_assoc($query3)){
				$json[$i]['catatan'] = $row3;
		}
		
	}
	
	echo json_encode($json);
	
	mysqli_close($connect);
	
?>