<?php
require ('../fpdf/fpdf.php');
include_once ("../controller/cUtilerias.php");
include_once ("../controller/cEmpleados.php");
include_once ("../controller/cAsistencias.php");
$asistencia = new cAsistencias();
$emp = new cEmpleados();
$util = new cUtilerias();
$emple = $emp -> devuelveEmpleado($_GET['id']);
$lista = $asistencia -> listaAsistenciasEmpleado($util -> cambiaFFecha($_GET['inicio'], "Y-m-d"), $util -> cambiaFFecha($_GET['fin'], "Y-m-d"), $_GET['id']);
class PDF extends FPDF {

	//header
	function Header() {
		$this -> Image('../img/logo.png', 37, 6, 130);
		$this -> Ln(20);
	}

	//footer
	function Footer() {
		$this -> SetY(-15);
		$this -> SetFont('Arial', 'I', 8);
		$this -> Cell(0, 10, 'Page ' . $this -> PageNo() . '/{nb}', 0, 0, 'C');
	}

}

$pdf = new PDF();
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> SetFont('Arial', 'B', 14);
//titulo del dictamen
$pdf -> Cell(0, 7, utf8_decode('REPORTE DE ASISTENCIA DE ' . $_GET['inicio'] . ' AL ' . $_GET['fin']), 0, 1, 'C');
$pdf -> Cell(0, 7, utf8_decode('TRABAJADOR: ' . $emple['nombres'] . ' ' . $emple['a_pat'] . ' ' . $emple['a_mat']), 0, 1, 'C');
//encabezados
$pdf -> SetFont('Arial', '', 9);
$pdf -> SetFillColor(160, 160, 160);
$pdf -> SetTextColor(255);
$pdf -> SetDrawColor(0, 0, 0);
$pdf -> SetLineWidth(.3);
$pdf -> SetFont('', 'B');
$pdf -> Cell(10, 7, '#', 1, 0, 'C', true);
$pdf -> Cell(35, 7, 'fecha', 1, 0, 'C', true);
$pdf -> Cell(45, 7, 'entrada', 1, 0, 'C', true);
$pdf -> Cell(45, 7, 'salida', 1, 0, 'C', true);
$pdf -> Cell(25, 7, 'hrs trabajadas', 1, 0, 'C', true);
$pdf -> Ln();
//cuerpo de la tabla
$pdf -> SetFillColor(224, 235, 255);
$pdf -> SetTextColor(0);
$pdf -> SetFont('');
$i = 1;
$fill = TRUE;
//ciclo
$totalnomina = 0;
$fs = '';
$horas = 0;
while ($l = $lista -> fetch()) {
	$horas += $l['hrs_trabj'];
	$inh = intval($l['hrs_trabj']);
			$min = 60 * ($l['hrs_trabj']-$inh);
			$min = round($min,0);
			if ($min<10){
				$min = "0".$min;
			}
			if($inh<10){
				$inh= "0".$inh;
			}
	$pdf -> Cell(10, 6, $i, 'LR', 0, 'C', $fill);
	$pdf -> Cell(35, 6, $util->cambiaFFecha($l['fecha'],"d-m-Y"), 'LR', 0, 'L', $fill);
	$pdf -> Cell(45, 6, $util->cambiaFFecha($l['h_ent'],"d-m-Y H:i:s"), 'LR', 0, 'C', $fill);
	$pdf -> Cell(45, 6, $util->cambiaFFecha($l['h_sal'],"d-m-Y H:i:s"), 'LR', 0, 'C', $fill);
	$pdf -> Cell(25, 6, ($inh.":".$min), 'LR', 0, 'C', $fill);
	if ($fs != $l['fecha']) {
		$fill = !$fill;
	}
	$pdf -> Ln();
	$fs = $l['fecha'];
	$i++;
}
	$pdf -> Ln();
$inh = intval($horas);
$min = 60 * ($horas-$inh);
$min = round($min,0);
$pdf -> SetFont('Arial', 'B', 10);
$pdf->Cell(135,6);
$pdf->Cell(30,6,"TOTAL -> ".$inh.":".$min);
// Closing line
$pdf -> Cell(array_sum(array(15, 80, 30, 25, 25)), 0, '', 'T');
$pdf -> Ln();
$nombre = "R".$_GET['id'].date("Ymd").".pdf";
$pdf -> Output($nombre,"D");
?>