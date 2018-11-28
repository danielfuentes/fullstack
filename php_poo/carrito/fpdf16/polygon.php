<?php
require('fpdf.php');

class PDF_Polygon extends FPDF
{

function Polygon($points, $style='D')
{
	//Draw a polygon
	if($style=='F')
		$op='f';
	elseif($style=='FD' or $style=='DF')
		$op='b';
	else
		$op='s';

	$h = $this->h;
	$k = $this->k;

	$points_string = '';
	for($i=0; $i<count($points); $i+=2){
		$points_string .= sprintf('%.2f %.2f', $points[$i]*$k, ($h-$points[$i+1])*$k);
		if($i==0)
			$points_string .= ' m ';
		else
			$points_string .= ' l ';
	}
	$this->_out($points_string . $op);
}

}
?>
