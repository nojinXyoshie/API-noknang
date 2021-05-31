<?php 
	include "koneksi.php";
	
	$id = $_POST['id_participants'];
	
	$query = mysqli_query($con,"SELECT * FROM achievement where id_participants = '$id'");
	
	$json = array();
	
	while($row = mysqli_fetch_assoc($query)){
		$json[] = $row;
	}

/*	for ($i=0; $i < sizeof($json); $i++){
		$query = mysqli_query($con, "SELECT * FROM achievement where id_participants = '$id'") or die(mysqli_error($con));

	while($row = mysqli_fetch_assoc($query)){
		
		$json[$i]['penghargaan'] = $row;
	}
	
	} */
	
	echo json_encode($json);
	
	mysqli_close($connect);
	
?>