<?php 
include_once("../model/mNominas.php");
class cNominas{
	
	function generaNomina($inicio, $fin){
		$nom = new mNominas();
		return $nom->creaNomina($inicio, $fin);
	}
	
	function getJustificacionesEmp($inicio, $fin, $id){
		$nom = new mNominas();
		return $nom->getNumJustificaciones($inicio, $fin, $id);
	}
	
}
?>