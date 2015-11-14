<?php
include_once("../controller/cPuestos.php");
include_once("../controller/cEmpleados.php");
include_once("../controller/cUtilerias.php");
$util = new cUtilerias();
$puestos = new cPuestos();
$lpuest = $puestos->listaPuesto();
$emple = new cEmpleados();
$em = $emple->devuelveEmpleado($_POST['id']);

 ?>
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title" id="myModalLabel">Editando Datos de: <?php echo $em['nombres']." ".$em['a_mat']." ".$em['a_pat'] ?></h4>
		</div>
		<div class="modal-body">
			<form id="formEditEmp">
				<input type="hidden" name="idEmple" value="<?php echo $_POST['id'] ?>" />
				<div class="row">
					<div class="form-group">
						<div class="col-md-4">
							<label>Apellido Paterno</label>
							<input class="form-control" name="a_pat" value="<?php echo $em['a_pat'] ?>"  />
						</div>
						<div class="col-md-4">
							<label>Apellido Paterno</label>
							<input class="form-control" name="a_mat" value="<?php echo $em['a_mat'] ?>" />
						</div>
						<div class="col-md-4">
							<label>Nombre</label>
							<input class="form-control" name="nombre" value="<?php echo $em['nombres'] ?>" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-4">
							<label>Fecha de Nacimiento</label>
							<input id="fechaNac" name="fechaNac" class="form-control datepicker" value="<?php echo $util->cambiaFFecha($em['fecha_nacto'],"d-m-Y") ?>" />
						</div>
						<div class="col-md-4">
							<label>Sexo</label>
							<br />
							<label class="radio-inline">
								<input type="radio" <?php if($em['sexo']==1){echo "checked";} ?> name="sexo" id="inlineRadio1" value="1">
								Masculino </label>
							<label class="radio-inline">
								<input type="radio" <?php if($em['sexo']!=1){echo "checked";} ?> name="sexo" id="inlineRadio2" value="0">
								Femenino </label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-4">
							<label>Telefono Fijo</label>
							<input class="form-control" name="telefono" value="<?php echo $em['telefono'] ?>" />
						</div>
						<div class="col-md-4">
							<label>Celular</label>
							<input class="form-control" name="celular" value="<?php echo $em['celular'] ?>" />
						</div>
						<div class="col-md-4">
							<label>Email</label>
							<input class="form-control" name="email" value="<?php echo $em['email'] ?>" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-6">
							<label>Direccion</label>
							<textarea class="form-control" name="direccion" ><?php echo $em['direccion'] ?></textarea>
						</div>
						<div class="col-md-5">
							<label>Seleccionar Puesto</label>
							<select id="comboPuestos" style="width: 100%">
								<?php
								while($l = $lpuest->fetch()){
								 ?>
								<option value="<?php echo $l['clave'] ?>" <?php if($em['puesto'] == $l['clave']){echo "selected"; } ?> ><?php echo $l['nombre'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				Cerrar
			</button>
			<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="editaEm()">
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


</script>