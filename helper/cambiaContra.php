<?php 
include_once("../controller/cEmpleados.php");
$emps = new cEmpleados();
$emps->cambiaPass($_POST['idEmp'], $_POST['nvaContra']);
echo "CONTRASEÑA CAMBIADA CON ÉXTITO";
?>