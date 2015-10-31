<?php 
include_once 'Database.php';
/**
 * clase que gestiona los puestos de los trabajadores
 *
 * @package default
 * @author  
 */
class mPuestos {
	/**
	 *funcion que lista los puestos registrados en la base de datos
	 *  
	 * @return pdo_list
	 * @author  Walter
	 */
	function fetchPuestos() {
		$con = conn();
		$query = "select * from puesto order by nombre";
		return $con->query($query);
	}
	
	function retPuesto($puesto){
		$con = conn();
		$query = "select * from puesto where clave = $puesto";
		$l = $con->query($query);
		return $l->fetch();
	}
	
	function regPuesto($nombre,$descripcion,$salario,$hrs){
		$con = conn();
		$query = "insert into puesto(nombre,descripcion,salario,hrs_trabj) values('$nombre','$descripcion',$salario,$hrs )";
		$con->exec($query);		
	}
	
} // END
?>