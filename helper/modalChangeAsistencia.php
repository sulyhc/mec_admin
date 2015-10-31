<?php ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cambiar Fecha y Hora de Asistencia</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-6 col-md-offset-3">
        		<label>Seleccione</label>
        		<input id="datetimepicker1" class="form-control"  />
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="actionAsistencia()">Guardar Cambios</button>
      </div>
    </div>
  </div>
  <script>
  	jQuery('#datetimepicker1').datetimepicker({
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
 format:'d-m-Y H:i'
});

function actionAsistencia(){
	var fecha = $("#datetimepicker1").val();
	var asiento = <?php echo $_POST['asiento'] ?>;
	var tipo = <?php echo $_POST['tipo'] ?>;
	updAsistencia(fecha,asiento,tipo);
}

  </script>