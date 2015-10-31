<?php
/**
 * clase que gestiona las asistencias de los empleados
 *
 * @package model
 * @author  Walter
 */
include_once ("Database.php");
class mAsistencias {

	/**
	 * lista todas las asistencias de un solo dia determinado
	 *
	 * @return pdo_array
	 * @author  Walter
	 */
	function fetchAsistenciasDia($dia) {
		$con = conn();
		$query = "select concat(per.nombres,' ',per.a_pat,' ',per.a_mat) as empleado,
					asi.h_ent, asi.h_sal,pu.nombre as puesto
					from asistencia as asi, personal as per, puesto as pu 
					where asi.id_pers = per.id and per.puesto = pu.clave and date(asi.h_ent) = '$dia'
					order by asi.h_ent desc";
		$r = $con -> query($query);
		return $r;
	}

	/**
	 * lista todas las asistencias a partir de un intervalo (inicio, fin)
	 *
	 * @return pdo_array
	 * @author  Walter
	 */
	function fetchAsistencias($inicio, $fin) {
		$db = conn();
		$query = "select asi.asiento as id, concat(per.nombres,' ',per.a_pat,' ',per.a_mat) as empleado,
					asi.h_ent, asi.h_sal,pu.nombre as puesto
					from asistencia as asi, personal as per, puesto as pu 
					where asi.id_pers = per.id and per.puesto = pu.clave and (asi.fecha between '$inicio'
					and '$fin')
					order by asi.h_ent desc";
		return $db -> query($query);
	}
	
	/**
	 * modifica una asistencia (de acuerdo al criterio en el parametro)
	 *
	 * @return pdo_array
	 * @author  Walter
	 */
	function changeAsistencia($fecha, $tipo,$asiento) {
		$db = conn();
		if($tipo == 1 || $tipo == "1"){
			$tip = "h_ent";
		}else{
			$tip = "h_sal";
		}
		$query = "update asistencia set $tip = '$fecha' where asiento = $asiento";
		echo $query;
		$db->exec($query);
	}
	
	/**
	 * justifica un dia de asistencia de un empleado
	 *
	 * @return void
	 * @author  Walter
	 */
	function justificaDia($emp,$dia){
		$con = conn();
		$query = "insert into justificaciones (id_pers,fecha) values($emp, '$dia')";
		$con->exec($query);
	}
	
	/**
	 * lista las asistencias de un empleado
	 *
	 * @return pdo_array
	 * @author  Walter
	 */
	function listaAsistenciaEmpleado($inicio, $fin, $id){	
		$con = conn();	
		$query = "select  a.fecha, a.h_ent, a.h_sal,(time_to_sec(timediff(h_sal,h_ent )) / 3600) as hrs_trabj from personal as p, asistencia as a where p.id = $id and p.id = a.id_pers ".
		"and a.fecha between '$inicio' and '$fin' and p.activo = TRUE union (select j.fecha, 'JUSTIFICADA','JUSTIFICADA','J' from personal as p,justificaciones as j ".
		"where p.id = $id and p.id= j.id_pers and (j.fecha between '$inicio' and '$fin') and p.activo = true) order by fecha ASC";
		$r = $con->query($query);
		return $r;
	}

}
?>