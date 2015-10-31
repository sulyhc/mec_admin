
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ATENCION</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-md-3 col-xs-3">
      			<img src="img/warning.png" class="img-responsive" />
      		</div>
      		<div class="col-md-9 col-xs-9">
      			<h3 style="color:red;font-weight: bold">
      				<?php echo $_POST['msj'] ?>
      			</h3>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
  <script>
  	$('#modalError').on('hidden.bs.modal', function() {
		document.getElementById("<?php echo $_POST['focus'] ?>").focus();
	})
  </script>