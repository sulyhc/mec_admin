  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cambiando Contraseña de:</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-6">
        		<div class="form-group">
        			<label>Nueva Contraseña</label>
        			<input class="form-control" id="nvaContra" type="password" />
        		</div>
        	</div>
        	<div class="col-md-6">
        		<div class="form-group">
        			<label>Confirme Contraseña</label>
        			<input class="form-control" id="repNvaContra" type="password" />
        		</div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	<span id="btncontras">
        </span>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
  
<script>
	$("#nvaContra, #repNvaContra").keyup(function() {
		var con = $("#nvaContra").val();
		var rep = $("#repNvaContra").val();
		if (con == rep && con != ''){
			$("#btncontras").html('<button type="button" class="btn btn-primary" onclick="cambiaContra()">Cambiar</button>');
		}else{
			$("#btncontras").html('');
		}
		});
		
		function cambiaContra(){
			alert("chale ese estamos cambiando la contra");
		}
</script>