<?php 
include_once("../controller/cAdmin.php");
$admin = new cAdmin();
$r = $admin->loginAdmin($_POST['id'], $_POST['pass']);
if($r == 1){
	@session_start();
	$_SESSION['init'] = 1;
	include_once("../view/administrador.php");
}else{
	echo "0";
}
?>