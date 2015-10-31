<?php
include_once("../controller/cPuestos.php");
$puestos = new cPuestos();
 ?>
<!--botones de accion-->
<div class="row">
	<div class="col-md-3">
		<button class="btn btn-block btn-success" onclick="modalNvoPuesto()">Nuevo Puesto</button>
	</div>
</div>
<!--tabla con los puestos-->
<div class="row">
	<div class="col-md-8">
		<hr />
		<div class="table-responsive">
		<table class="table" id="tablaPuestos" style="text-transform: uppercase">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Salario</th>
					<th>Hrs/Dia</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$listaP = $puestos->listaPuesto();
				$i = 1;
				while($l = $listaP->fetch()){
				 ?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $l['nombre'] ?></td>
					<td>$<?php echo number_format($l['salario'],2) ?></td>
					<td><?php echo $l['hrs_trabj'] ?></td>
					<td>
						<button class="btn btn-primary" onclick="modalEditPuestos(<?php echo $l['clave'] ?>)"><i class="fa fa-edit"></i></button>
						<button class="btn btn-danger"><i class="fa fa-remove"></i></button>
						</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
	</div>
</div>
<div class="modal fade" id="modalEditPuestos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	</div>
<script>
	$(document).ready(function(){
    $('#tablaPuestos').DataTable({
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