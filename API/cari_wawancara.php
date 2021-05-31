<?php 
	include "koneksi.php";

	$nama = $_POST['nama'];
	
	$query = mysqli_query($con,"SELECT * FROM participants WHERE full_name LIKE '%$nama%' AND status='1' ");
	
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
		//$query = mysqli_query($con, "SELECT * FROM judgement where id_participants = '$id_participants' AND id_session_assesment = '3'") or die(mysqli_error($con));
		$query = mysqli_query($con, "SELECT * FROM session_assesment where id_session_assesment = '3' ") or die(mysqli_error($con));
	
		while($row = mysqli_fetch_assoc($query)){
			$query2 = mysqli_query($con,"SELECT * FROM sub_assesment where id_sub_assesment = '1'") or die(mysqli_error($con));

			while($row2 = mysqli_fetch_assoc($query2)){
				//pariwisata
				$query3 = mysqli_query($con,"SELECT value FROM judgement where id_detail_assesment = '1' AND id_session_assesment = '3' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				$query4 = mysqli_query($con,"SELECT value FROM judgement where id_detail_assesment = '2' AND id_session_assesment = '3' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				$query5 = mysqli_query($con,"SELECT value FROM judgement where id_detail_assesment = '3' AND id_session_assesment = '3' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				
				//kesenian
				$query6 = mysqli_query($con,"SELECT value FROM judgement where id_detail_assesment = '4' AND id_session_assesment = '3' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				$query7 = mysqli_query($con,"SELECT value FROM judgement where id_detail_assesment = '5' AND id_session_assesment = '3' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				$query8 = mysqli_query($con,"SELECT value FROM judgement where id_detail_assesment = '6' AND id_session_assesment = '3' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				
				//pengetahuan umum
				$query9 = mysqli_query($con,"SELECT value FROM judgement where id_detail_assesment = '7' AND id_session_assesment = '3' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				$query10 = mysqli_query($con,"SELECT value FROM judgement where id_detail_assesment = '8' AND id_session_assesment = '3' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				$query11 = mysqli_query($con,"SELECT value FROM judgement where id_detail_assesment = '9' AND id_session_assesment = '3' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				
				//agama
				$query12 = mysqli_query($con,"SELECT value FROM judgement where id_detail_assesment = '10' AND id_session_assesment = '3' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				$query13 = mysqli_query($con,"SELECT value FROM judgement where id_detail_assesment = '11' AND id_session_assesment = '3' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				$query14 = mysqli_query($con,"SELECT value FROM judgement where id_detail_assesment = '12' AND id_session_assesment = '3' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				
				//basing
				$query15 = mysqli_query($con,"SELECT value FROM judgement where id_detail_assesment = '13' AND id_session_assesment = '3' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				$query16 = mysqli_query($con,"SELECT value FROM judgement where id_detail_assesment = '14' AND id_session_assesment = '3' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				$query17 = mysqli_query($con,"SELECT value FROM judgement where id_detail_assesment = '15' AND id_session_assesment = '3' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				
				//catatan
				$query18 = mysqli_query($con,"SELECT * FROM session_note where id_session_assesment = '3' AND id_sub_assesment = '1' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				while($row18 = mysqli_fetch_assoc($query18)){
					$row2['catatan_pariwisata'] = $row18;
				}
				$query19 = mysqli_query($con,"SELECT * FROM session_note where id_session_assesment = '3' AND id_sub_assesment = '2' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				while($row19 = mysqli_fetch_assoc($query19)){
					$row2['catatan_kesenian'] = $row19;
				}
				$query20 = mysqli_query($con,"SELECT * FROM session_note where id_session_assesment = '3' AND id_sub_assesment = '3' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				while($row20 = mysqli_fetch_assoc($query20)){
					$row2['catatan_pengumum'] = $row20;
				}
				$query21 = mysqli_query($con,"SELECT * FROM session_note where id_session_assesment = '3' AND id_sub_assesment = '4' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				while($row21 = mysqli_fetch_assoc($query21)){
					$row2['catatan_agama'] = $row21;
				}
				$query22 = mysqli_query($con,"SELECT * FROM session_note where id_session_assesment = '3' AND id_sub_assesment = '5' AND id_participants = '$id_participants'") or die(mysqli_error($con));
				while($row22 = mysqli_fetch_assoc($query22)){
					$row2['catatan_basing'] = $row22;
				}
				
				//pariwisata
				while($row3 = mysqli_fetch_assoc($query3)){
					$row2['interview_pariwisata'] = $row3;
				}
				while($row4 = mysqli_fetch_assoc($query4)){
					$row2['grooming_pariwisata'] = $row4;
				}
				while($row5 = mysqli_fetch_assoc($query5)){
					$row2['manner_pariwisata'] = $row5;
				}
				
				//kesenian
				while($row6 = mysqli_fetch_assoc($query6)){
					$row2['interview_kesenian'] = $row6;
				}
				while($row7 = mysqli_fetch_assoc($query7)){
					$row2['grooming_kesenian'] = $row7;
				}
				while($row8 = mysqli_fetch_assoc($query8)){
					$row2['manner_kesenian'] = $row8;
				}
				
				//pengetahuan umum
				while($row9 = mysqli_fetch_assoc($query9)){
					$row2['interview_pengetahuan'] = $row9;
				}
				while($row10 = mysqli_fetch_assoc($query10)){
					$row2['grooming_pengetahuan'] = $row10;
				}
				while($row11 = mysqli_fetch_assoc($query11)){
					$row2['manner_pengetahuan'] = $row11;
				}
				
				//agama
				while($row12 = mysqli_fetch_assoc($query12)){
					$row2['interview_agama'] = $row12;
				}
				while($row13 = mysqli_fetch_assoc($query13)){
					$row2['grooming_agama'] = $row13;
				}
				while($row14 = mysqli_fetch_assoc($query14)){
					$row2['manner_agama'] = $row14;
				}
				
				//basing
				while($row15 = mysqli_fetch_assoc($query15)){
					$row2['interview_basing'] = $row15;
				}
				while($row16 = mysqli_fetch_assoc($query16)){
					$row2['grooming_basing'] = $row16;
				}
				while($row17 = mysqli_fetch_assoc($query17)){
					$row2['manner_basing'] = $row17;
				}
				
				$row['pariwisata'] = $row2;
			}
			
			$json[$i]['wawancara'] = $row;
		}
	}
	
	echo json_encode($json);
	
	mysqli_close($connect);
	
?>