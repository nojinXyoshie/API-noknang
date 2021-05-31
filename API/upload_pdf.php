<?php
 
ServerConfig();

$PdfUploadFolder = 'cv_image/';
 
$ServerURL = 'http://noknangdermayu.com/API/cv_image/';

if($_SERVER['REQUEST_METHOD']=='POST'){
 
 if(isset($_POST['name']) and isset($_FILES['pdf']['name'])){

 $con = mysqli_connect(HostName,HostUser,HostPass,DatabaseName);
 
 $PdfName = $_POST['name'];
 $name = "".$PdfName."_cv.pdf";
 $id = $_POST['id'];
 
 $PdfFileExtension = $PdfInfo['extension'];
 
 $PdfFileURL = $ServerURL . $PdfName . '.' . $PdfFileExtension;
 
 $PdfFileFinalPath = $PdfUploadFolder . $name;
 
 try{
 
 move_uploaded_file($_FILES['pdf']['tmp_name'],$PdfFileFinalPath);
 
 $InsertTableSQLQuery = "UPDATE participants SET img_cv = '$name' WHERE id_participants = '$id'";

 mysqli_query($con,$InsertTableSQLQuery);

 }catch(Exception $e){} 
 mysqli_close($con);
 
 }
}

function ServerConfig(){
 
define('HostName','www.noknangdermayu.com');
define('HostUser','nok_nang123');
define('HostPass','cz1w30L#');
define('DatabaseName','nok_nang');
 
}

function GenerateFileNameUsingID(){
 
 $con2 = mysqli_connect(HostName,HostUser,HostPass,DatabaseName);
 
 $GenerateFileSQL = "SELECT max(id_participants) as id_participants FROM participants";
 
 $Holder = mysqli_fetch_array(mysqli_query($con2,$GenerateFileSQL));

 mysqli_close($con2);
 
 if($Holder['ID_ATTACHMENT']==null)
 {
    return 1;
 }
 else
 {
    return ++$Holder['full_name'];
 }
}

?>