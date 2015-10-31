<?php 

class cUtilerias{
	//cambia el formato de fecha a un formato arbitrario
	function cambiaFFecha($fecha,$formato){
		if($fecha == "0000-00-00" || $fecha == "0000-00-00 00:00:00"){
			return $fecha;
		}else{
		return date($formato,strtotime($fecha));} 
	}
	
	
}
?>