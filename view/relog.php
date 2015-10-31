<?php
include_once ("../controller/cAsistencias.php");
include_once ("../controller/cUtilerias.php");
$asisten = new cAsistencias();
$util = new cUtilerias();
$now = date("Y-m-d");
 ?>
<!-- head-->
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
		<input id="clveEmpleado" class="form-control" placeholder="CLAVE DEL EMPLEADO"  />
		</div>
	</div>
	<div id="dibBtnEmp" class="col-md-1">		
		<button class="btn-success btn-block" onclick="checkClave()">OK</button>
	</div>
</div>
<!--body-->
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<!--tabla-->
		<table class="table">
			<thead>
				<tr>
					<th style="width: 10%">#</th>
					<th style="width: 30%">Empleado</th>
					<th style="width: 20%">Puesto</th>
					<th style="width: 20%">Entrada</th>
					<th style="width: 20%">Salida</th>
				</tr>
			</thead>
		<tbody>
			<?php
			$lasis = $asisten->listaAsistenciasDia($now);
			$i = 1;
			while($l = $lasis->fetch()){
				$act = "";
				if($l['h_sal']!= '0000-00-00 00:00:00'){
					$act = "color:white;background-color:green;font-weight:bold";
				}
			 ?>
			 <tr style="<?php echo $act; ?>">
			 	<td><?php echo $i++; ?></td>
			 	<td><?php echo $l['empleado'] ?></td>
			 	<td><?php echo $l['puesto'] ?></td>
			 	<td><?php echo $util->cambiaFFecha($l['h_ent'], "d-m-Y H:i") ?></td>
			 	<td><?php echo $util->cambiaFFecha($l['h_sal'], "d-m-Y H:i")  ?></td>
			 </tr>
			 <?php } ?>
		</tbody>
		</table>
		</div>
	</div>
</div>
<!--modal para login del empleado-->
<!-- Modal -->
<div class="modal fade" id="modalLoginEmpleado" tabindex="-1" role="static" aria-labelledby="myModalLabel">
</div>
<script>
	$(document).ready(function() {
		document.getElementById("clveEmpleado").focus();
	});

	$('#modalLoginEmpleado').on('shown.bs.modal', function() {
		$('#passEmpleado').focus();
	});

	$("#clveEmpleado").keyup(function(e) {
		e.preventDefault();
		if (e.keyCode == 13) {
			checkClave();
		}
	});
</script>