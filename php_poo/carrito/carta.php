<?php
define('FPDF_FONTPATH','reportes/fpdf/font/');
require('reportes/fpdf/fpdf.php'); 
include('reportes/Data.php');
class PDF extends FPDF {//para colocar encabezado y pie de pagina
//**********************Cabecera*********************************
		function Header(){	
			}
		
		function PtTable(){
			session_start();
			include "../function/buscar.php";
			include "../function/registrar.php";
			include "../function/conexion.php";
			buscarDetalle();
            buscarMensaje();
	   		registrarConstancia();
			buscarcapital();
			buscarUbicF_cest();

			
	   // TITULO
	        
	        $this->Ln(6);
		    $this->SetFont('Arial','B',9);
			$this->SetFillColor(219,219,219);
			$this->Image('encabezado2.jpg',23,10,170,10);
			$this->Image('logo_agua2.jpg',100,80,10,120);
			$this->SetFont('Symbol','I',15);
			$this->SetTextColor(128);
			$this->SetXY(100,5);
			$this->Ln(-7);
			$this->Cell(10,5,($_POST['CEDULA'].$_POST['NOMBRES']),50,0,100,5);
			$this->SetFont('Arial','B',9);
			$this->SetTextColor(0);
			$this->SetXY(100,5);
			/*$this->Ln(15);
			$this->Cell(38,5,'Coordinación de Desarrollo',0,0,'C');
			$this->Ln(4);
            $this->Cell(54,5,'Departamento de Archivo de Personal',0,0,'C');
			$this->Ln(4);
			$this->Cell(17,5,'ORH-310500-',0,0,'C');*/
			$this->Ln(20);
			//$this->Cell(330,5,($_POST['id_const']),0,0,'C');
			$this->Ln(30);
			$this->SetFont('Arial','B',16);
			$this->Cell(170,5,'CONSTANCIA DE TRABAJO',0,0,'C');
			$this->Ln(30);
			$this->SetFont('Arial','',12);
			$d=date("d");               
	        $m=date("m");
	        $y=date("Y");
						
			        $sql="SELECT `descripcion` FROM `mes` WHERE `id_mes`='$m'";				
        	        $consulta=mysql_query($sql, $conexion);
        	        list ($mes)=mysql_fetch_array($consulta);
			
		
/*	    	$this->MultiCell(165,8,'Quien suscribe, Director (a) '.$_POST['DIRECTOR'].' (E) de la Oficina de Recursos Humanos, del INSTITUTO DE PREVISION Y ASISTENCIA  SOCIAL  PARA  EL  MINISTERIO DE  EDUCACIÓN (IPASME), hace constar que el (la) ciudadano(a): '.$_POST['NOMBRES'].', titular  de  la  Cédula de  Identidad Nº '.$_POST['NAC'].'-'.$_POST['CEDULA'].', actualmente se desempeña como  '.$_POST['DENOM_CARGO'].' desde  el '.$_POST['FEC_ING'].' adscrito(a) '.$_POST['DESCRIPCIONF'].'',0,'J');	*/
			
			$this->MultiCell(165,8,'Quien suscribe, Director (a) '.$_POST['DIRECTOR'].', por medio de la presente se hace constar que el (la) ciudadano(a): '.$_POST['NOMBRES'].', titular  de  la  Cédula de  Identidad Nº '.$_POST['NAC'].'-'.$_POST['CEDULA'].', presta sus servicios en el INSTITUTO DE PREVISION Y ASISTENCIA  SOCIAL  PARA  EL  MINISTERIO DE  EDUCACIÓN (IPASME), actualmente se desempeña como  '.$_POST['DENOM_CARGO'].' ('.$_POST['T_NOM'].') desde el '.$_POST['FEC_ING'].', adscrito(a) a '.$_POST['DESCRIPCIONF'].'.',0,'J');			
																																																																													
			
			$this->Ln(25);
	        $this->MultiCell(165,5,'Constancia que se expide a petición de la parte interesada, en '.$_POST['c.capital'].', '.$d.' de '.$mes.' del '.$y.' .',0,'J');
			
            $this->Ln(20);
		    $this->Cell(155,5,'Atentamente,',0,0,'C',0);
		    $this->Ln(20);
		    $this->Cell(155,5,'__________________________________',0,0,'C',0);
		    $this->SetFont('Arial','B',9);
		    $this->Ln(4);
		    $this->Cell(155,5,(' '.$_POST['RESPONSABLE']),0,0,'C',0);
		    $this->Ln(4);
		    $this->Cell(155,5,utf8_decode($_POST['CARGO']),0,0,'C',0);		
		    $this->Ln(4);
		    $this->Cell(155,5,'Según Providencia Administrativa,',0,0,'C',0);	
		    $this->Ln(4);
		    $this->Cell(155,5,utf8_decode(''.$_POST['gaceta'].''),0,0,'C',0);
			//$this->Ln(4);
		    //$this->Cell(155,5,utf8_decode('Fecha de Vencimiento: '.$_POST['VENCIMIENTO'].''),0,0,'C',0);
		    //$this->SetFont('Arial','B',7);
//		    $this->Ln(20);
		    //$this->Cell(24,5,utf8_decode(''.$_SESSION['usuario'].''),0,0,'C',0);
			//$this->Cell(75,5,utf8_decode('VIGENTE HASTA '.$_POST['VENCIMIENTO'].'' ),0,0,'L',0);
		    $this->SetFont('Arial','B',7);
		$this->Ln(20);
		//$this->Cell(24,5,utf8_decode(''.$_SESSION['usuario'].''),0,0,'C',0);	
		$this->Cell(75,5,utf8_decode('VALIDO POR SEIS (6) MESES, ESTA CONSTANCIA CADUCA '.$_POST['VENCIMIENTO'].''),0,0,'L',0);
			}
 			
		    function Footer(){//Pie de pÃ¡gina
		    $fecha_actual=date("d-m-Y");
		    //PosiciÃ³n a 1,5 cm del final
		    $this->SetY(-30);
		    //Arial itÃ¡lica 8
		    $this->SetRightMargin(5);
		    $this->SetFont('Arial','I',10);
		    //Color del texto en gris
		    $this->SetTextColor(128);
		    $this->SetFillColor(255,255,255);
		    //$this->Ln(7);//baja 6 milimetros
		    $this->Ln(4);//baja 4 milimetros
		    $this->Image('piepagina2.jpg',15,260,175,15);
			$this->Ln(4);//baja 4 milimetros
			$this->Cell(50,5,'ORH/GD/KM/IR',0,0,'C',0);
			$this->Ln(6);//baja 4 milimetros
		    //$this->Cell(50,5,'Fecha Emisión '.$fecha_actual,0,0,'L',0); 
			//$this->Cell(100,5,'Constancia Valida hasta '.$_POST['VENCIMIENTO'],0,0,'L',0); 
		    //$this->Cell(0,5,'Página '.$this->PageNo().' de {nb}',0,1,'R');
		    $this->Ln(14);//baja 4 milimetros
		    $this->SetFont('Symbol','I',15);
		    $this->Cell(0,5,($_POST['CEDULA'].$_POST['NOMBRES']),50,0,100,5);
		    }//fin del footer
										
}
$pdfs='.pdf'; $xx="'";
$fecha_actual=date("d-m-Y");
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->SetLeftMargin(25);
$pdf->AddPage('P');
$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(219,219,219);
$pdf->SetTextColor(0);
$pdf->PtTable();
$pdf->SetAutoPageBreak(true,5);
$pdf->Cell(80);
$rand = rand(0,900000);
$pdf->Output(' '.$rand.$pdfs,'I');
?>