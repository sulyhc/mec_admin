<?php 
include_once("../controller/cPuestos.php");
var_dump($_POST);
$pu = new cPuestos();
$pu->nvoPuesto($_POST['puesto'], $_POST['descripcion'], $_POST['salario'], $_POST['hrs']);

?>