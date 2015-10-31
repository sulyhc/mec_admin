<?php 
include_once("../controller/cNominas.php");
include_once("../controller/cUtilerias.php");
$nomina = new cNominas();
$util = new cUtilerias();
?>
<input id="dia" type="hidden" value="<?php echo($_POST['dias']);?>" />
<input id="inicio" type="hidden" value="<?php echo($_POST['inicio']);?>" />
<input id="fin" type="hidden" value="<?php echo($_POST['fin']);?>" />
<!--tabla -->
<table class="table" style="text-transform: uppercase">
	<thead>
		<tr>
			<th>#</th>
			<th>Empleado</th>
			<th><center>hrs</center></th>
			<th>Sueldo</th>
			<th>Reporte</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$lista = $nomina->generaNomina($util->cambiaFFecha($_POST['inicio'],"Y-m-d"),
									 $util->cambiaFFecha($_POST['fin'],"Y-m-d"));
		$i = 1;
		while($l = $lista->fetch()){
			//calcula el sueldo en base a las hrs trabajadas
			$deis = $nomina->getJustificacionesEmp($util->cambiaFFecha($_POST['inicio'],"Y-m-d"), 
														$util->cambiaFFecha($_POST['inicio'],"Y-m-d"), $l['id']);
			$hs = $_POST['dias'] * $l['hrs_trabj'];
			if(($l['hrs'] + ($l['hrs_trabj'] * $deis['num'])) >= $hs){
				$sueldo = $l['salario'];
			}else{
				$sueldo = ($l['hrs'] * $l['salario']) / $hs;
			}
			
			$sueldo = round($sueldo,0);
			
			$inh = intval($l['hrs']);
			$min = 60 * ($l['hrs']-$inh);
			$min = round($min,0);
			if ($min<10){
				$min = "0".$min;
			}
			if($inh<10){
				$inh= "0".$inh;
			}
		?>
		<tr>
			<td><?php echo($i);?></td>
			<td><?php echo($l['a_pat'].' '.$l['a_mat'].' '.$l['nombres'])?></td>
			<td><center><?php echo $inh.":".$min?></center> </td>
			<td><?php echo '$'.number_format($sueldo,2);?></td>
			<td><button class="btn btn-danger" onclick="creaReporte(<?php echo($l['id'])?>)"><i class="fa fa-file-pdf-o"></i></button> </td>
		</tr>
		<?php 
		$i++;
		} ?>
	</tbody>
</table>
<!-- funcionalidad -->
<script>
	$('#exportPdfNomina').click(function(event) {
		
		event.preventDefault();
		var dia = $('#dia').val();
		var inicio = $('#inicio').val();
		var fin = $('#fin').val();
		window.open("helper/pdfNomina.php?dias="+dia+"&inicio="+inicio+"&fin="+fin);
		});
	
	function creaReporte(id){
		var inicio = $('#inicio').val();
		var fin = $('#fin').val();
		window.open("helper/reporteAsistenciaEmp.php?id="+id+"&inicio="+inicio+"&fin="+fin);
	}
</script>