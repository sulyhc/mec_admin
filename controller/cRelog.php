<?php 
include_once("../model/mRelog.php");
/**
 *  clase controladora para los movimientos del checador
 *
 * @package controller
 * @author  Walter
 */
class cRelog {
	
	/**
	 * funcion que verifica si la clave de un empleado existe o está correcta
	 *
	 * @return int
	 * @author  
	 */
	function checaClaveEmp($emp) {
		$relog = new mRelog();
		return $relog->checkID($emp);
	}
	
	/**
	 * funcion que verifica si la contraseña de un empleado existe o está correcta
	 *
	 * @return int
	 * @author  
	 */
	function checaContraEmp($emp,$pass) {
		$relog = new mRelog();
		return $relog->checkPass($emp, $pass);
	}
	
	/**
	 * funcion que registra un movimiento
	 *
	 * @return int
	 * @author  
	 */
	function regMovEmpe($emp) {
		$relog = new mRelog();
		$relog->regMov($emp);
	}
	
} // END
?>