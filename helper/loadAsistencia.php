<?php
include_once("../controller/cAsistencias.php");
include_once("../controller/cUtilerias.php");
$asist = new cAsistencias();
$util = new cUtilerias();
if(!isset($_POST['inicio']) && !isset($_POST['fin'])){
	$now = date("Y-m-d");
	$ini = date('Y-m-d', strtotime($now. ' - 14 days'));
	$fin = date('Y-m-d', strtotime($now. ' + 16 days'));
	$lista = $asist->listaAsistenciasIntervalo($ini, $fin);
}else{
	$now = date("Y-m-d");
	$ini = date('Y-m-d', strtotime($_POST[inicio]. ' - 1 days'));
	$fin = date('Y-m-d', strtotime($_POST['fin']. ' + 1 days'));
	$lista = $asist->listaAsistenciasIntervalo($ini, $fin);
}
 ?>
<!--tabla con las asistencias-->
<div class="row">
	<div class="col-md-12">
		<hr />
		<div class="table-responsive">
		<table class="table" id="tablaAsistencias" data-length="50">
			<thead>
				<tr>
					<th>#</th>
					<th>Empleado</th>
					<th>Puesto</th>
					<th>Entrada</th>
					<th>Salida</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody style="text-transform: uppercase">
				<?php
				$i = 1;
					while($l = $lista->fetch()){
				$act = "";
				if($l['h_sal']!= '0000-00-00 00:00:00'){
					$act = "color:white;background-color:green;font-weight:bold";
				}
				 ?>
				 <tr style="<?php echo $act; ?>">
				 	<td><?php echo $i++ ?></td>
				 	<td><?php echo $l['empleado'] ?></td>
				 	<td><?php echo $l['puesto'] ?></td>
				 	<td><?php echo $util->cambiaFFecha($l['h_ent'], "d-m-Y H:s") ?></td>
				 	<td><?php echo $util->cambiaFFecha($l['h_sal'], "d-m-Y H:s") ?></td>
				 	<td style="width: 10%">
				 		<button class="btn btn-primary" onclick="modalChangeAsistencia(<?php echo $l['id'] ?>,1)"><i class="fa fa-clock-o"></i></button>
				 		<button class="btn btn-warning" onclick="modalChangeAsistencia(<?php echo $l['id'] ?>,2)"><i class="fa fa-clock-o"></i></button>
				 		<!--button class="btn btn-danger"><i class="fa fa-remove"></i></button-->
				 		
				 	</td>
				 </tr>
				 <?php } ?>
			</tbody>
		</table>
		</div>
	</div>
</div>

<!-- Modal para cambiar las fechas de asistencia-->
<div class="modal fade" id="modalChangeAsistencia"  role="dialog" aria-labelledby="myModalLabel">
</div>
<script>
	$(document).ready(function(){
    $('#tablaAsistencias').DataTable({
    	iDisplayLength: 50,
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