<?php

	/**
	 * devuelve un objeto con la conexion hacia la base de datos
	 *
	 * @return pdo_conn
	 * @author  Walter
	 */
function conn(){		
		$con = new PDO("mysql:host=localhost;dbname=reloj", "root", "compu31011991");
		return $con;
	}
 ?>