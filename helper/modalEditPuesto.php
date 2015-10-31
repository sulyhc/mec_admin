  <?php
  include_once("../controller/cPuestos.php");
  $pu = new cPuestos();
  $pus = $pu->getPuesto($_POST['id']);
   ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Puesto</h4>
      </div>
      <div class="modal-body">
      	<form id="formuEditPuesto">
        <div class="row">
        	<div class="col-md-6">
        		<div class="form-group">
        			<label>Puesto</label>
        			<input class="form-control" value="<?php echo $pus['nombre'] ?>" />
        		</div>
        	</div>
        	<div class="col-md-6">
        		<div class="form-group">
        			<label>Descripcion</label>
        			<textarea class="form-control"><?php echo $pus['descripcion'] ?></textarea>
        		</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-6">
        		<div class="form-group">
        			<label>Salario</label>
        			<input class="form-control" value="<?php echo $pus['salario'] ?>" />
        		</div>
        	</div>
        	<div class="col-md-6">
        		<div class="form-group">
        			<label>Hrs/Dia</label>
        			<input class="form-control" value="<?php echo $pus['hrs_trabj'] ?>" />
        		</div>
        	</div>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>