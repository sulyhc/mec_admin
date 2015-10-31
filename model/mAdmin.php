<?php 
include_once("Database.php");
/**
 * clase que permite el login del administrador y su gestion
 *
 * @package model
 * @author  
 */
class mAdmin {
	
	/**
	 * Funcion que verifica el login de un administrador
	 *
	 * @return boolean
	 * @author  Walter
	 */
	function checkAdmin($id,$pass) {
		$con = conn();
		$queyr = "SELECT ad.contra FROM administrador as ad where ad.clave = '$id'";
		$r = $con->query($queyr);
		$res = $r->fetch();
		if ($res['contra'] == $pass && $res != null){
			return 1;
		}else{
			return 0;
		}
	}
	
} // END
?>