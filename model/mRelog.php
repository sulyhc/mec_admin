<?php 
include_once "Database.php";
/**
 * registra entradas y salidas de los trabajadores
 *
 * @package model
 * @author  Walter
 */
class mRelog {
	/**
	 * registra una entrada del empleado
	 *
	 * @return int
	 * @author  
	 */
	function __regEntrada($emp) {
		$con = conn();
		$query = "insert into asistencia(id_pers,h_ent,fecha,h_sal) values($emp,now(),CURDATE(),'0000-00-00 00:00:00')";
		$r = $con->exec($query);
		return $r;
	}
	
	/**
	 * registra una salida del empleado
	 *
	 * @return int
	 * @author  
	 */
	function __regSalida($emp) {
		$con = conn();
		$query = "update asistencia set h_sal = now() where id_pers = $emp and fecha = CURDATE() and h_sal = '0000-00-00 00:00:00'";
		$r = $con->exec($query);
		return $r;
	}
	
	/**
	 * registra un movimiento
	 *
	 * @return int
	 * @author  
	 */
	function regMov($emp) {
		$res = $this->__regSalida($emp);
		if($res == 0){
			$this->__regEntrada($emp);
		}
	}
	
	/**
	 * checa si la contraseña coincide con el empleado
	 *
	 * @return boolean
	 * @author  
	 */
	function checkPass($emp,$pass) {
		$con = conn();
		$query = "select contra from personal where id = $emp";
		$r = $con->query($query);
		$res = $r->fetch();
		if($res['contra']==$pass){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	/**
	 * checa sila clave de un empleado es la correcta
	 *
	 * @return int
	 * @author  
	 */
	function checkID($emp) {
		$con = conn();
		$query = "select id from personal where id = $emp and activo = 1";
		$r = $con->query($query);
		$res = $r->fetch();
		if(empty($res)){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
} // END
?>