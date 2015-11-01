<?php
include_once ("../controller/cEmpleados.php");
$empl = new cEmpleados();
$e = $empl -> devuelveEmpleado($_POST['id']);
?>
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title" id="myModalLabel">Cambiando Contraseña de: <?php echo $e['nombres']." ".$e['a_pat']." ".$e['a_mat'] ?></h4>
		</div>
		<div class="modal-body">
			<form id="fCambiaPass">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Nueva Contraseña</label>
						<input name="nvaContra" class="form-control" id="nvaContra" type="password" />
					</div>
				</div>
				<input type="hidden" name="idEmp" value="<?php echo $_POST['id'] ?>" />
				<div class="col-md-6">
					<div class="form-group">
						<label>Confirme Contraseña</label>
						<input class="form-control" id="repNvaContra" type="password" />
					</div>
				</div>
			</div>
		</div>
		</form>
		<div class="modal-footer">
			<button id="btnUpdContra" disabled="disabled" type="button" class="btn btn-primary" onclick="cambiaPass('fCambiaPass')">Cambiar</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">
				Cerrar
			</button>
		</div>
	</div>
</div>

<script>
	$("#nvaContra, #repNvaContra").keyup(function() {
		var con = $("#nvaContra").val();
		var rep = $("#repNvaContra").val();
		if (con != rep || con == '') {
			$("#btnUpdContra").attr("disabled","disabled")
		} else {
			$("#btnUpdContra").removeAttr("disabled")
		}
	});

</script>