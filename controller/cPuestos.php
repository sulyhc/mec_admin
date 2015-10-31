<?php 
include_once("../model/mPuestos.php");
/**
 * clase controladora para gestionar puestos
 *
 * @package controller
 * @author  Walter
 */
class cPuestos {
	
	/**
	 * lista los puestos que hay en el sistema
	 *
	 * @return pdo_fetch
	 * @author  
	 */
	function listaPuesto() {
		$pu = new mPuestos();
		return $pu->fetchPuestos();
	}
	
	function getPuesto($id){
		$pu = new mPuestos();
		return $pu->retPuesto($id);
	}
	
	function nvoPuesto($nombre, $descripcion, $salario, $hrs){
		$pu = new mPuestos();
		$pu->regPuesto($nombre, $descripcion, $salario, $hrs);
	}
	
} // END
?>