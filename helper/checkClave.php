<?php 
include("../controller/cRelog.php");
if(isset($_POST)){
$relog = new cRelog();
echo $relog->checaClaveEmp($_POST['id']);}
else{
	echo "NI MAGRES";
}
?>