<?php 
include_once("../controller/cRelog.php");
$reg = new cRelog();
$r = $reg->checaContraEmp($_POST['id'], $_POST['pass']);
if($r){
	$reg->regMovEmpe($_POST['id']);
}
echo $r;
?>