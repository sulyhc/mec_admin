<?php 
include_once("../model/mAdmin.php");
/**
 * clase para login del administrador
 *
 * @package controller
 * @author  
 */
class cAdmin {
	
	/**
	 * funcion que checa el id  y el pass del admin
	 *
	 * @return int
	 * @author  
	 */
	function loginAdmin($admin,$pass) {
		$admi = new mAdmin();
		return $admi->checkAdmin($admin, $pass);
	}
} // END
?>