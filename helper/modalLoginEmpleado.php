<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title" id="myModalLabel">Bienvenid@</h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<label>Ingrese su Contraseña</label>
					<input id="passEmpleado" class="form-control" type="password" />
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				Cerrar
			</button>
			<button onclick="login()" type="button" class="btn btn-primary">
				Continuar
			</button>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		document.getElementById("passEmpleado").focus();
	});

	//eventos al cerrar el modal
	$('#modalLoginEmpleado').on('hidden.bs.modal', function() {
		$("#clveEmpleado").val('');
		document.getElementById("clveEmpleado").focus();
	});

	function login() {
		var user = $("#clveEmpleado").val();
		var pas = $("#passEmpleado").val();
		regMovEmpleado(user, pas);
	}


	$("#passEmpleado").keyup(function(e) {
		e.preventDefault();
		if (e.keyCode == 13) {
			login();
		}
	});

</script>