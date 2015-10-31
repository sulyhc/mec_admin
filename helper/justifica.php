<?php 
include_once("../controller/cAsistencias.php");
include_once("../controller/cUtilerias.php");
$asis = new cAsistencias();
$util = new cUtilerias();
$asis->justificaD($util->cambiaFFecha($_POST['dia'],"Y-m-d"), $_POST['idemp']);
echo "SE HA JUSTIFICADO EL DIA ".$_POST['dia'];
?>