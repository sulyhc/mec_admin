<?php 
include_once("../controller/cUtilerias.php");
include_once("../controller/cAsistencias.php");
$util = new cUtilerias();
$asit = new cAsistencias();
$asit->modificaAsistencia($util->cambiaFFecha($_POST['fecha'],"Y-m-d H:i"), $_POST['tipo'], $_POST['asiento']);
?>