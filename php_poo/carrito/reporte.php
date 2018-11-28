<?php 
//Programa que imprime los usuarios registrados en la tabla productos
//Desarrollado por: MSc. Angel Daniel Fuentes 

// Aquí ejecutamos la conexion a la base de datos en PDO
require_once ('modelo/class.conexion.php');

//--------------------------libreria pdf----------------

require_once("fpdf16/fpdf.php");

//-------------------------------consultas---------------------------
//Aquí armo mi consulta, de acuerdo a lo explicado en PDO por Rodo
$row = null;
$modelo= new Conexion();
$conexion=$modelo->getConexion();
//Aquí ejecuto mi consulta, tal como se los explique en Mysql
$sql="SELECT p.id, p.nombre, c.nombre as 'categoria', p.precio  from productos as p, categorias as c where p.id_categoria = c.id";
$preparar= $conexion->prepare($sql);
$preparar->execute();
while ($resultado = $preparar->fetch())
{
   $row[]= $resultado;
}


//Aquí creo la clase PDF extendiendo de la clase FPDF de la libreria
class PDF extends FPDF{
//Page header

		function Header() /*Cabecera para colocar logo y Nombre del Sistema*/
		{
			$this->Image('img/cintillo.jpg',15,6,185);
			$this->SetFont('Arial','I',16); //Tipo y tamano de letra
			$this->Ln(10); // Salto de línea
			$this->Cell(0,10,'::. Listado de Productos .::',0,0,'C'); // Título del Sistema
			$this->Ln(10); 
			$this->SetFont('Arial','I',12); 
			$this->Cell(0,1,'Registrados',0,1,'C');
			$this->SetX(165);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,0,"Fecha:".date("d/m/Y"),0,'R',0,0);
			$this->Ln(5); 
		}


		function Footer() /*Para colocar pie de pagina del reporte*/
		{
			$this->SetY(-15); // Posición: a 1,5 cm del final
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,'Desarrollado por: MSc. Ángel Daniel Fuentes   Pag.'.$this->PageNo().'/{nb}',0,0,'C'); // Númeracion  pag.
		}
}

//Instrucciones inherentes a la clase
$pdf=new PDF();
$pdf-> FPDF('P','mm','Letter');
$pdf->SetAutoPageBreak(true, 15);
$pdf->SetLeftMargin(9);
$pdf->SetRightMargin(9);
$pdf->SetTopMargin(5);

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->SetFillColor(32,232,232); // Para darle el color de fondo de la celda
$pdf->SetFont('Arial','B',9);
$pdf->Cell(50,6,'ID',1,0,'C',1);
$pdf->Cell(50,6,'PRODUCTO',1,0,'C',1);
$pdf->Cell(50,6,'CATEGORIA',1,0,'C',1);
$pdf->Cell(50,6,'PRECIO',1,0,'C',1);		
	
$pdf->Ln();

$i=0;

foreach ($row as $value) {
	//Esto lo pongo aquí sólo para controlar la cantidda de líneas imprimir por página
	if($key==40){ $salto=0; }else{ $salto=1; }
	$pdf->Cell(50,4,$value['id'],1,0,'C');
	$pdf->Cell(50,4,$value['nombre'],1,0,'C');
	$pdf->Cell(50,4,$value['categoria'],1,0,'C');
	$pdf->Cell(50,4,$value['precio'],1,$salto,'C');
}

//leyenda de la funcion Cell(ancho, alto, texto, borde, salto de linea, alineacion, ?link?)
$pdf->Output();
?>

