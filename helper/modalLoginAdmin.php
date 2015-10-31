  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Identifíquese</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-6">
        		<div class="form-group">
        			<label>Usuario</label>
        			<input id="idAdmin" class="form-control" />
        		</div>
        	</div>
        	<div class="col-md-6">
        		<div class="form-group">
        			<label>Contraseña</label>
        			<input id="contraAdmin" class="form-control" type="password" />
        		</div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="checkContraAdmin()" >Continuar</button>
      </div>
    </div>
  </div>