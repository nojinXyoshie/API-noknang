<?php 
	include "koneksi.php";
	
	$query = mysqli_query($con,"SELECT * FROM participants WHERE status ='1' ");
	
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
		$query = mysqli_query($con, "SELECT count(id_polling) FROM polling WHERE id_participants = '$id_participants' ") or die(mysqli_error($con));
	
		while($row = mysqli_fetch_assoc($query)){
			$json[$i]['jumlah'] = $row;
		}
	}
	
	for ($i=0; $i < sizeof($json); $i++){
		$query = mysqli_query($con, "SELECT count(id_polling) FROM polling ") 
		or die(mysqli_error($con));
	
		while($row = mysqli_fetch_assoc($query)){
			$json[$i]['polling'] = $row;
		}
	}
	
	echo json_encode($json);
	
	mysqli_close($con);
	
?>