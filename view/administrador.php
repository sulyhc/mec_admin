<?php

 ?>
<div class="row">
	<div class="col-md-2">
<ul class="nav nav-pills nav-stacked">
  <li role="presentation" class="active"><a href="#" onclick="loadEmpleados()">Empleados</a></li>
  <li role="presentation"><a href="#" onclick="loadPuestos()">Puestos</a></li>
  <li role="presentation"><a href="#" onclick="loadAsistencias()">Ver Asistencia</a></li>
  <li role="presentation"><a href="#" onclick="creaNomina()">Generar Nómina</a></li>
</ul>
</div>
<!--cuerpo del administrador-->
<div class="col-md-10">
<div id="bodyAdmin"></div>
</div>
</div>
<!--functions-->
<script>
	$(document).ready(function() {
		loadEmpleados();
	});	
</script>