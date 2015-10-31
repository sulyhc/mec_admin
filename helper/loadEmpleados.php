<?php
include_once("../controller/cEmpleados.php");
$emp = new cEmpleados();
$lista = $emp->listaEmpleados(1);
 ?>
<!--botones de accion-->
<div class="row">
	<div class="col-md-3">
		<button class="btn btn-block btn-success" onclick="modalNuevoEmpleado()">Nuevo Empleado</button>
	</div>
</div>
<!--tabla con los empleados-->
<div class="row">
	<div class="col-md-12">
		<hr />
		<div class="table-responsive">
		<table class="table" id="tablaEmpleados">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Puesto</th>
					<th>Salario</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while($l = $lista->fetch()){
				 ?>
				<tr>
					<td><?php echo $l['id'] ?></td>
					<td><?php echo $l['empleado'] ?></td>
					<td><?php echo $l['puesto'] ?></td>
					<td>$<?php echo number_format($l['salario'],2) ?></td>
					<td style="width: 20%">
						<button class="btn btn-primary" onclick="modalEditEmpleado(<?php echo $l['id'] ?>)"><i class="fa fa-edit"></i></button>
						<button class="btn btn-warning" onclick="modalCambiaContraEmpleado(<?php echo $l['id'] ?>)"><i class="fa fa-key"></i></button>
				 		<button class="btn btn-success" onclick="modalJustificaEmpleado(<?php echo $l['id'] ?>)"><i class="fa fa-calendar-o"></i></button>
						<button class="btn btn-danger" onclick="modalDelteEmpleado(<?php echo $l['id'] ?>)"><i class="fa fa-remove"></i></button>
						</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
	</div>
</div>

<!-- Modal para editar  los datos de un  empleado -->
<div class="modal fade" id="modalEditEmpleado" role="dialog" aria-labelledby="myModalLabel"> 
</div>

<!-- Modal para confirmar la eliminacion de un  empleado -->
<div class="modal fade" id="modalDeleteEmpleado" role="dialog" aria-labelledby="myModalLabel"> 
</div>

<!-- Modal para cambiar la contraseña de un empleado -->
<div class="modal fade" id="modalCambiaContra" role="dialog" aria-labelledby="myModalLabel"> 
</div>

<!-- Modal para agregar una justificacion de un empleado -->
<div class="modal fade" id="modalJustificacionEmp" role="dialog" aria-labelledby="myModalLabel"> 
</div>

<!-- Modal para agregar una justificacion de un empleado -->
<div class="modal fade" id="modalCambiaContra" role="dialog" aria-labelledby="myModalLabel"> 
</div>

<script>
	$(document).ready(function(){
    $('#tablaEmpleados').DataTable({
					language : {
						processing : "Procesando...",
						search : "Buscar: ",
						lengthMenu : "Mostrando _MENU_ registros",
						info : "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
						infoEmpty : "Mostrando registros del 0 al 0 de un total de 0 registros",
						infoFiltered : "(filtrado de un total de _MAX_ registros)",
						infoPostFix : "",
						loadingRecords : "Cargando...",
						zeroRecords : "No se encontraron resultados",
						emptyTable : "Ningún dato disponible en esta tabla",
						paginate : {
							first : "Primero",
							previous : "Anterior",
							next : "Siguiente",
							last : "&Uacute;ltimo"
						},
						aria : {
							sortAscending : ": ordenar ascendentemente",
							sortDescending : ": ordenar descendentemente"
						}
					}
				} );
});
</script>