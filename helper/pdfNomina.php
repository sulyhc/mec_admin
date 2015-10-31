<?php
require ('../fpdf/fpdf.php');
include ('../controller/cNominas.php');
include ('../controller/cUtilerias.php');
$util = new cUtilerias();
$nomina = new cNominas();
$lista = $nomina->generaNomina($util->cambiaFFecha($_GET['inicio'],"Y-m-d"),$util->cambiaFFecha($_GET['fin'],"Y-m-d"));
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
$pdf -> Cell(0, 7, utf8_decode('NOMINA DEL '.$_GET['inicio'].' AL '.$_GET['fin']), 0, 1, 'C');
//encabezados
$pdf -> SetFont('Arial', '', 8);
$pdf -> SetFillColor(160, 160, 160);
$pdf -> SetTextColor(255);
$pdf -> SetDrawColor(0, 0, 0);
$pdf -> SetLineWidth(.3);
$pdf -> SetFont('', 'B');
$pdf -> Cell(15, 7, 'clave', 1, 0, 'C', true);
$pdf -> Cell(75, 7, 'Empleado', 1, 0, 'C', true);
$pdf -> Cell(35, 7, 'Puesto', 1, 0, 'C', true);
$pdf -> Cell(25, 7, 'hrs', 1, 0, 'C', true);
$pdf -> Cell(25, 7, 'Pago', 1, 0, 'C', true);
$pdf -> Ln();
//cuerpo de la tabla
$pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
$i = 1;
$fill = TRUE;
//ciclo
$totalnomina = 0;
    while($l = $lista->fetch()){
    	//calcula el sueldo en base a las hrs trabajadas
			$deis = $nomina->getJustificacionesEmp($util->cambiaFFecha($_GET['inicio'],"Y-m-d"), 
														$util->cambiaFFecha($_GET['fin'],"Y-m-d"), $l['id']);
			$hs = $_GET['dias'] * $l['hrs_trabj'];
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
$pdf -> Cell(15, 6, $i, 'LR', 0, 'C', $fill);
$pdf -> Cell(75, 6, utf8_decode($l['a_pat'].' '.$l['a_mat'].' '.$l['nombres']), 'LR', 0, 'L', $fill);
$pdf -> Cell(35, 6, $l['puesto'], 'LR', 0, 'C', $fill);
$pdf -> Cell(25, 6, $inh.":".$min, 'LR', 0, 'C', $fill);
$pdf -> Cell(25, 6, "$".number_format($sueldo,2), 'LR', 0, 'C', $fill);
$pdf -> Ln();
$fill = !$fill;
$i++;
$totalnomina += round($sueldo);
}
// Closing line
$pdf->Cell(array_sum(array(15,80,30,25,25)),0,'','T');
$pdf -> Ln();
$pdf -> SetFont('Arial', 'B', 10);
$pdf->Cell(80);
$pdf -> Cell(39, 7, utf8_decode("TOTAL DE LA NÓMINA: $".number_format($totalnomina,2)), 0, 1, 'C');
$nombre = date("Ymd");
$pdf -> Output("Nom$nombre.pdf","D");
?>