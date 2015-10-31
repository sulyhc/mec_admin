<?php
include_once("../controller/cPuestos.php");
$puestos = new cPuestos();
$lpuest = $puestos->listaPuesto();
 ?>
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title" id="myModalLabel">Editando Datos de:</h4>
		</div>
		<div class="modal-body">
			<form id="FormNvoEmp">
				<div class="row">
					<div class="form-group">
						<div class="col-md-4">
							<label>Apellido Paterno</label>
							<input class="form-control" name="a_pat" />
						</div>
						<div class="col-md-4">
							<label>Apellido Paterno</label>
							<input class="form-control" name="a_mat" />
						</div>
						<div class="col-md-4">
							<label>Nombre</label>
							<input class="form-control" name="nombres" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-4">
							<label>Fecha de Nacimiento</label>
							<input id="fechaNac" class="form-control datepicker" name="nacto" />
						</div>
						<div class="col-md-4">
							<label>Sexo</label>
							<br />
							<label class="radio-inline">
								<input type="radio" name="sexo" id="sexo" value="1" checked="">
								Masculino </label>
							<label class="radio-inline">
								<input type="radio" name="sexo" id="sexo" value="0">
								Femenino </label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-4">
							<label>Telefono Fijo</label>
							<input class="form-control" name="telefono" />
						</div>
						<div class="col-md-4">
							<label>Celular</label>
							<input class="form-control" name="celular" />
						</div>
						<div class="col-md-4">
							<label>Email</label>
							<input class="form-control" name="email" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-6">
							<label>Direccion</label>
							<textarea class="form-control" name="direccion" ></textarea>
						</div>
						<div class="col-md-5">
							<label>Seleccionar Puesto</label>
							<select id="comboPuestos" style="width: 100%" name="puesto" >
								<?php
								while($l = $lpuest->fetch()){
								 ?>
								<option value="<?php echo $l['clave'] ?>"><?php echo $l['nombre'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-6">
							<label>Contraseña</label>
							<input class="form-control" name="contra" />
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				Cerrar
			</button>
			<button type="button" class="btn btn-primary" onclick="guardaEmp()">
				Guardar Cambios
			</button>
		</div>
	</div>
</div>
  <script>
  
		$('#comboPuestos').select2();
  	jQuery('#fechaNac').datetimepicker({
 lang:'es',
 i18n:{
  es:{
   months:[
    'Enero','Febrero','Marzo','Abril',
    'Mayo','Junio','Julio','Agosto',
    'Septiembre','Octubre','Noviembre','Diciembre',
   ],
   dayOfWeek:[
    "Lun.", "Mar", "Mier", "Ju", 
    "Vier", "Sab", "Dom.",
   ]
  }
 },
 timepicker:false,
 format:'d-m-Y'
});

function guardaEmp(){
	alert($("#FormNvoEmp").serialize());
}
</script>