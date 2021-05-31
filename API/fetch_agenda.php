<?php 
	include "koneksi.php";
	
	$query = mysqli_query($con,"SELECT * FROM agenda");
	
	$json = array();
	
	while($row = mysqli_fetch_assoc($query)){
		$json[] = $row;
	}

	for ($i=0; $i < sizeof($json); $i++){
		$id_agenda = $json[$i]['id_agenda'];
		$query = mysqli_query($con, "SELECT * FROM detail_agenda where id_agenda = '$id_agenda'") or die(mysqli_error($con));

	while($row = mysqli_fetch_assoc($query)){
		
		$json[$i]['detail_agenda'] = $row;
	}
	
	}
	
	echo json_encode($json);
	
	mysqli_close($connect);
	
?>