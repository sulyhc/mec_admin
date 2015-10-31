<!--cabecera de acciones-->
<div class="row">
	<div class="form-inline">
		<div class="form-group">
			<label>Inicio:</label>
			<input class="form-control" id="finicio" placeholder="inicio" />
		</div>
		<div class="form-group">
			<label>Fin:</label>
			<input class="form-control" id="ffin" placeholder="fin" />
		</div>
		<div class="form-group">
			<label>Dias:</label>
			<input class="form-control" id="ddias" type="number" min="1" value="10" />
		</div>
		<button class="btn btn-success" id="btnGeneraNomina">
			Generar
		</button>
		<button class="btn btn-warning" id="exportPdfNomina">
			Exportar
		</button>
	</div>
</div>
<!--tabla con la nomina generada-->
<div class="row">
	<div class="col-md-10" id="tablaNominas">
	</div>
</div>
<script>
jQuery('#finicio,#ffin').datetimepicker({
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

//accion del boton generar
$("#btnGeneraNomina").click(function() {
		var inicio = $("#finicio").val();
		var fin = $("#ffin").val();
		var dias = $("#ddias").val();
		generaNomina(inicio,fin,dias);
});
</script>