<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title" id="myModalLabel">Nuevo Puesto</h4>
		</div>
		<div class="modal-body">
			<form id="formNvoPuesto">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Puesto</label>
							<input class="form-control" name="puesto" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Descripcion</label>
							<textarea class="form-control" name="descripcion"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Salario</label>
							<input class="form-control" name="salario" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Hrs/Dia</label>
							<input class="form-control" name="hrs" />
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				Cerrar
			</button>
			<button type="button" class="btn btn-primary" onclick="regNvoPuesto()">
				Guardar
			</button>
		</div>
	</div>
</div>