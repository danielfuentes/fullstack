<?php
//MSc. Ángel Daniel Fuentes -
//Ejemplo de como hacer una carta en .pdf generada usando la libreria (FPDF)
require_once("fpdf16/fpdf.php");
//para colocar encabezado y pie de pagina
class PDF extends FPDF {
//**********************Cabecera*************************
// INFORMACIÓN DE LA CARTA
	function Header(){
		$this->Ln(6);
		$this->SetFont('Arial','B',9);
		$this->SetFillColor(219,219,219);
		$this->Image('img/logo.png');


	}	  


	function mostrarInformacion(){
			
		
			
		$this->SetFont('Symbol','I',15);
		$this->SetTextColor(128);
		$this->SetXY(100,5);
		$this->Ln(-7);
				
		$this->SetFont('Arial','B',9);
		$this->SetTextColor(0);
		$this->SetXY(100,5);
				
		$this->Ln(30);
		$this->SetFont('Arial','B',16);
		$this->Cell(170,5,'CONSTANCIA DE REGISTRO',0,0,'C');
		$this->Ln(30);
		$this->SetFont('Arial','',12);
		$d=date("d");               
		$m=date("m");
		$y=date("Y");
				
				
		$this->MultiCell(165,8,'Estimado (a) '.$_POST['nombre'].' '.$_POST['apellido'].', portador(a) del Documento Nacional de Identidad Nro.'. $_POST['dni'].' por medio de la presente,le damos las gracias por registrarse en nuestra plataforma, debe presentarse en las instalaciones de Digital House - Moroe 860, en quince (15) dias habiles, contados a partir de la fecha de registro'.'.',0,'J');			
		$this->Ln(25);
		$this->MultiCell(165,5,'Constancia de registro en fecha '. $d.' / '.$m.' / '.$y.' .',0,'J');
				
		$this->Ln(20);
		$this->Cell(155,5,'Atentamente,',0,0,'C',0);
		$this->Ln(20);
		$this->Cell(155,5,'__________________________________',0,0,'C',0);
		$this->SetFont('Arial','B',9);
		$this->Ln(4);
				
		$this->SetFont('Arial','B',7);
		$this->Ln(20);
			
		$this->Cell(75,5,utf8_decode('LE ESPERAMOS EN NUESTRAS INSTALACIONES'),0,0,'L',0);
		
	}
 			
	function Footer(){//Pie de página
		$fecha_actual=date("d-m-Y");
		//Posición a 1,5 cm del final
		$this->SetY(-30);
		//Arial itálica 8
		$this->SetRightMargin(5);
		$this->SetFont('Arial','I',10);
		//Color del texto en gris
		$this->SetTextColor(128);
		$this->SetFillColor(255,255,255);
		//$this->Ln(7);//baja 6 milimetros
		$this->Ln(4);//baja 4 milimetros
		//imagen: mar iz, top, largo , ancho
		$this->Image('img/cintillo.jpg',15,260,180,11);
		$this->Ln(1);//baja 4 milimetros
		$this->Cell(50,5,'MSc. Angel Daniel Fuentes',0,0,'C',0);
	}//fin del footer
										
}
$pdfs='.pdf';
$fecha_actual=date("d-m-Y");
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->SetLeftMargin(25);
$pdf->AddPage('P');
$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(219,219,219);
$pdf->SetTextColor(0);
$pdf->mostrarInformacion();
$pdf->SetAutoPageBreak(true,5);
$pdf->Cell(80);
//esto lo uso para generar un número aleatorio a la carta
//$rand = rand(0,900000);
//También puedo usar la función uniqid() de php
$rand = uniqid();
$pdf->Output('registro'.$rand.$pdfs,'I');
?>