<?php
include_once("../model/mEmpleados.php");
/**
 * clase controladora del mEmpleados
 * presenta funciones necesarias para la gestion de los trabajadores registrados en el sistema
 */
class cEmpleados{
	
	
	/**
	 * funcion de la clase controladora
	 * lista todos los empleados del sistema (recibe un int para ver empleados activos o inactivos)
	 *
	 * @return pdo_result_list
	 * @author  Walter
	 */
	function listaEmpleados($activo){
		$emp = new mEmpleados();
		return $emp->listEmpleados($activo);
		
	}
	
	/**
	 * devuelve los datos de un empleado (pidiendo como parametro el id del empleado)
	 *
	 * @return pdo_objetc_result
	 * @author  Walter
	 */
	function devuelveEmpleado($clave) {
		$emp = new mEmpleados();
		return $emp->getEmpleado($clave);
	}
}
 ?>