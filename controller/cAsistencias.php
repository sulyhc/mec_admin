<?php 
include_once("../model/mAsistencia.php");
/**
 * clase controladora para gestionar las asistencias
 *
 * @package controller
 * @author  Walter
 */
class cAsistencias {
	
	/**
	 * funcion que lista las asistencias de un dia determinado
	 *
	 * @return pdo_fetch
	 * @author  
	 */
	function listaAsistenciasDia($fecha) {
		$asis = new mAsistencias();
		return $asis->fetchAsistenciasDia($fecha);
	}
	
	/**
	 * funcion que lista las asistencias de un intervalo
	 *
	 * @return pdo_fetch
	 * @author  
	 */
	function listaAsistenciasIntervalo($inicio,$fin) {
		$asis = new mAsistencias();
		return $asis->fetchAsistencias($inicio, $fin);
	}
	
	/**
	 * funcion que modifica las asistencias de un empleado
	 *
	 * @return void
	 * @author  
	 */
	function modificaAsistencia($fecha, $tipo, $asiento) {
		$asis = new mAsistencias();
		$asis->changeAsistencia($fecha, $tipo, $asiento);
	}
	
	function listaAsistenciasEmpleado($inicio, $fin, $id){
		$asi = new mAsistencias();
		return $asi->listaAsistenciaEmpleado($inicio, $fin, $id);
	}
	
	//justifica un dia
	function justificaD($fecha,$emp){
		$asi = new mAsistencias();
		$asi->justificaDia($emp, $fecha);
	}
	
} // END
?>