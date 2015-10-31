<?php 
include_once ("Database.php");
class mNominas{
	
	//crea las nominas
	function creaNomina($inicio, $fin){	
		$con = conn();
		$query = "select id, sum(time_to_sec(timediff(h_sal,h_ent )) / 3600) as hrs,salario,nombres,a_pat, a_mat, hrs_trabj, puesto.nombre as puesto from ".
		         "asistencia,personal,puesto where (fecha BETWEEN '$inicio' and '$fin') and ".
		         "h_sal <> '0000-00-00 00:00:00' and id = id_pers and clave = puesto and activo = TRUE group by id_pers order by a_pat";
		$r = $con->query($query);
		return $r;
	}
	
	//lista empleados que tengan salidas pendientes
	function empSaliPend($inicio, $fin){
		$con = conn();
		$query = "select id from personal, asistencias where activo = TRUE and id = id_pers and fecha between '$inicio' and '$fin' and h_sal = '0000-00-00 00:00:00s'";
		$r = $con->query($query);
		return $r;
	}
	
	//get number of justified days
	function getNumJustificaciones($inicio,$fin,$id){
		$con = conn();
		$query = " select count(asiento) as num from justificaciones where fecha between '$inicio' and '$fin' and id_pers = $id";
		$r = $con->query($query);
		return $r->fetch();
	}
}
?>