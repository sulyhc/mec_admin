<?php
/**
 * clase modelo para gestionar los empeados
 *
 * @package model
 * @author  Walter
 */
include_once ("Database.php");
class mEmpleados {

	/**
	 * lista todos los empleados del sistema (recibe un int para ver empleados activos o inactivos)
	 *
	 * @return pdo objetc result
	 * @author  Walter
	 */
	function listEmpleados($activo) {
		$con = conn();
		$l = $con -> query("select per.id, upper(concat(per.nombres,' ',per.a_pat,' ',per.a_pat)) as empleado,upper(p.nombre) as puesto,
							p.salario,p.hrs_trabj from personal as per, puesto as p where
							per.puesto = p.clave and per.activo = $activo");
		return $l;
	}

	/**
	 * devuelve los datos de un empleado determinado
	 *
	 * @return pdo_objetc
	 * @author  Walter
	 */
	function getEmpleado($clave) {
		$con = conn();
		$l = $con -> query("select * from personal where id = $clave");
		$r = $l -> fetch();
		return $r;
	}

	/**
	 * elimina un empleado del sistema
	 *
	 * @return pdo_objetc
	 * @author  Walter
	 */
	function bajaEmpleado($db, $emp){
		$con = conn();
		$query = "update personal set activo = false where id = $emp";
		$con->exec($query);
	}
	
	//agrega un nuevo empleado
	function addEmpleado($datos){
		$query = "insert into personal(a_pat, a_mat, nombres,direccion,telefono,email,fecha_nacto,sexo,puesto,contra,fecha_ingr)".
		" values('".$datos['a_pat']."','".$datos['a_mat']."','".$datos['nombres']."','".$datos['direccion']."','".$datos['telefono']."','".$datos['email']."',
		'".$datos['nacto']."',".$datos['sexo'].",".$datos['puesto'].",'".$datos['contra']."',now())";
		$con = conn();
		$con->exec($query);
	}
	
	//justifica una falta
	function justificaDia($emp,$dia){
		$query = "insert into justificaciones (id_pers,fecha) values($emp, '$dia')";
		$con = conn();
		$con->exec($query);
	}
	
	//cambia la contraseña del empleado
	function cambiaPass($emp,$pass){
		$query = "update personal set contra = '$pass' where id = $emp";
		$con = conn();
		$con->exec($query);
	}
	
	function editEmpleado($id,$nombre,$a_pat,$a_mat,$fnac,$sexo,$tel,$email,$cel,$puesto){
		$query = "update personal set nombres = '$nombre',";
	}
	

}
?>