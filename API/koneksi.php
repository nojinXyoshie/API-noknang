<?php
	$server		= "localhost"; //sesuaikan dengan nama server
	$user		= "id15929246_nojinx2"; //sesuaikan username
	$password	= "K03nt701933!"; //sesuaikan password
	$database	= "id15929246_nok_nang"; //sesuaikan target databese
	
	//$connect = mysql_connect($server, $user, $password) or die ("Koneksi gagal!");
	//mysql_select_db($database) or die ("Database belum siap!");

	 $con = mysqli_connect($server, $user, $password, $database);
	 if (mysqli_connect_errno()) {
	 	echo "Gagal terhubung MySQL: " . mysqli_connect_error();
	 }

?>