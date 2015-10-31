  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Justificar Dia</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-4 col-md-offset-4">
        		<div class="form-group">
        			<label>Seleccione Dia</label>
        			<input class="form-control datepicker" id="diajusti" />
        			<input type="hidden" id="idEmp" value="<?php echo($_POST['id']) ?>" />
        		</div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <span id="spanbto"></span>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
  <script>
  	jQuery('#diajusti').datetimepicker({
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

$("#diajusti").change(function(e) {
	var vlo = $("#diajusti").val();
	if (vlo != ''){
	$("#spanbto").html('<button  type="button" class="btn btn-primary" onclick="justificaDia()">Justificar</button>');}
	else{
		$("#spanbto").html('');
	}
	});
  </script>