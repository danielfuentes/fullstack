<?php
/****************************************************************************
* Software: FPDF class extention                                            *
*           Creates Pdf Tables                                              *
* Version:  2.0                                                             *
* Date:     2005/07/20                                                      *
* Author:   Bintintan Andrei  -- klodoma@ar-sd.net                          *
*                                                                           *
* License:  Freeware                                                        *
*                                                                           *
* You may use and modify this software as you wish.                         *
****************************************************************************/

require_once('fpdf.php');

//extension class
class FPDF_TABLE extends FPDF
{

var $tb_columns; 		//number of columns of the table
var $tb_header_type; 	//array which contains the header characteristics and texts
var $tb_header_draw;	//TRUE or FALSE, the header is drawed or not
var $tb_border_draw;	//TRUE or FALSE, the table border is drawed or not
var $tb_data_type; 		//array which contains the data characteristics (only the characteristics)
var $tb_table_type; 	//array which contains the table charactersitics
var $table_startx, $table_starty;	//the X and Y position where the table starts

var $Draw_Header_Command;	//command which determines in the DrawData first the header draw
var $New_Page_Commit;	// = true/false if a new page has been comited
var $Data_On_Current_Page; // = true/false ... if on current page was some data written


//returns the width of the page in user units
function PageWidth(){
	return (int) $this->w-$this->rMargin-$this->lMargin;
}

//constructor(not a real one, but have to call it first)
//we initialize all the variables that we use
function Table_Init($col_no = 0, $header_draw = true, $border_draw = true){
	$this->tb_columns = $col_no;
	$this->tb_header_type = Array();
	$this->tb_header_draw = $header_draw;
	$this->tb_border_draw = $border_draw;
	$this->tb_data_type = Array();
	$this->tb_type = Array();
	$this->table_startx = $this->GetX();
	$this->table_starty = $this->GetY();

	$this->Draw_Header_Command = false; //by default we don't draw the header
	$this->New_Page_Commit = false;		//NO we do not consider first time a new page
	$this->Data_On_Current_Page = false;
}

//Sets the number of columns of the table
function Set_Table_Columns($nr){
	$this->tb_columns = $nr;
}

/*
Characteristics constants for Header Type:
EVERY CELL FROM THE TABLE IS A MULTICELL

	WIDTH - this is the cell width. This value must be sent only to the HEADER!!!!!!!!
	T_COLOR - text color = array(r,g,b);
	T_SIZE - text size
	T_FONT - text font - font type = "Arial", "Times"
	T_ALIGN - text align - "RLCJ"
	V_ALIGN - text vertical alignment - "TMB"
	T_TYPE - text type (Bold Italic etc)
	LN_SPACE - space between lines
	BG_COLOR - background color = array(r,g,b);
	BRD_COLOR - border color = array(r,g,b);
	BRD_SIZE - border size --
	BRD_TYPE - border size -- up down, with border without!!! etc
	BRD_TYPE_NEW_PAGE - border type on new page - this is user only if specified(<>'')
	TEXT - header text -- THIS ALSO BELONGS ONLY TO THE HEADER!!!!

	all these setting conform to the settings from the multicell functions!!!!
*/

/*
Function: Set_Header_Type($type_arr) -- sets the array for the header type

type array =
	 array(
		0=>array(
				"WIDTH" => 10,
				"T_COLOR" => array(120,120,120),
				"T_SIZE" => 5,
				...
				"TEXT" => "Header text 1"
			  ),
		1=>array(
				...
			  ),
	 );
where 0,1... are the column number
*/

function Set_Header_Type($type_arr){
	$this->tb_header_type = $type_arr;
}


/*
Characteristics constants for Data Type:
EVERY CELL FROM THE TABLE IS A MULTICELL
	T_COLOR - text color = array(r,g,b);
	T_SIZE - text size
	T_FONT - text font - font type = "Arial", "Times"
	T_ALIGN - text align - "RLCJ"
	V_ALIGN - text vertical alignment - "TMB"
	T_TYPE - text type (Bold Italic etc)
	LN_SPACE - space between lines
	BG_COLOR - background color = array(r,g,b);
	BRD_COLOR - border color = array(r,g,b);
	BRD_SIZE - border size --
	BRD_TYPE - border size -- up down, with border without!!! etc
	BRD_TYPE_NEW_PAGE - border type on new page - this is user only if specified(<>'')

	all these settings conform to the settings from the multicell functions!!!!
*/

/*
Function: Set_data_Type($type_arr) -- sets the array for the header type

type array =
	 array(
		0=>array(
				"T_COLOR" => array(120,120,120),
				"T_SIZE" => 5,
				...
				"BRD_TYPE" => 1
			  ),
		1=>array(
				...
			  ),
	 );
where 0,1... are the column number
*/

function Set_Data_Type($type_arr){
	$this->tb_data_type = $type_arr;
}



/*
Function Set_Table_Type

$type_arr = array(
				"BRD_COLOR"=> array (120,120,120), //border color
				"BRD_SIZE"=>5), //border line width
				"TB_COLUMNS"=>5), //the number of columns
				"TB_ALIGN"=>"L"), //the align of the table, possible values = L, R, C equivalent to Left, Right, Center
				'L_MARGIN' => 0// left margin... reference from this->lmargin values
				)
*/
function Set_Table_Type($type_arr){

	if (isset($type_arr['TB_COLUMNS'])) $this->tb_columns = $type_arr['TB_COLUMNS'];
	if (!isset($type_arr['L_MARGIN'])) $type_arr['L_MARGIN']=0;//default values

	$this->tb_table_type = $type_arr;

}

//this functiondraws the exterior table border!!!!
function Draw_Table_Border(){
/*				"BRD_COLOR"=> array (120,120,120), //border color
				"BRD_SIZE"=>5), //border line width
				"TB_COLUMNS"=>5), //the number of columns
				"TB_ALIGN"=>"L"), //the align of the table, possible values = L, R, C equivalent to Left, Right, Center
*/

	if ( ! $this->tb_border_draw ) return;

	if ( ! $this->Data_On_Current_Page) return; //there was no data on the current page

	//set the colors
	list($r, $g, $b) = $this->tb_table_type['BRD_COLOR'];
	$this->SetDrawColor($r, $g, $b);

	//set the line width
	$this->SetLineWidth($this->tb_table_type['BRD_SIZE']);

	//draw the border
	$this->Rect(
		$this->table_startx,
		$this->table_starty,
		$this->Get_Table_Width(),
		$this->GetY()-$this->table_starty);

}

function End_Page_Border(){
	if (isset($this->tb_table_type['BRD_TYPE_END_PAGE'])){

		if (strpos($this->tb_table_type['BRD_TYPE_END_PAGE'], 'B') >= 0){

			//set the colors
			list($r, $g, $b) = $this->tb_table_type['BRD_COLOR'];
			$this->SetDrawColor($r, $g, $b);

			//set the line width
			$this->SetLineWidth($this->tb_table_type['BRD_SIZE']);

			//draw the line
			$this->Line($this->table_startx, $this->GetY(), $this->table_startx + $this->Get_Table_Width(), $this->GetY());
		}
	}
}

//returns the table width in user units
function Get_Table_Width()
{
	//calculate the table width
	$tb_width = 0;
	for ($i=0; $i < $this->tb_columns; $i++){
		$tb_width += $this->tb_header_type[$i]['WIDTH'];
	}
	return $tb_width;
}

//alignes the table to C, L or R(default is L)
function Table_Align(){
	//check if the table is aligned
	if (isset($this->tb_table_type['TB_ALIGN'])) $tb_align = $this->tb_table_type['TB_ALIGN']; else $tb_align='';

	//set the table align
	switch($tb_align){
		case 'C':
			$this->SetX($this->lMargin + $this->tb_table_type['L_MARGIN'] + ($this->PageWidth() - $this->Get_Table_Width())/2);
			break;
		case 'R':
			$this->SetX($this->lMargin + $this->tb_table_type['L_MARGIN'] + ($this->PageWidth() - $this->Get_Table_Width()));
			break;
		default:
			$this->SetX($this->lMargin + $this->tb_table_type['L_MARGIN']);
			break;
	}//if (isset($this->tb_table_type['TB_ALIGN'])){
}

//Draws the Header
function Draw_Header(){
	$this->Draw_Header_Command = true;
}

//Draws the Header
function Draw_Header_( $next_line_height = 0 ){

	$this->Table_Align();

	$this->table_startx = $this->GetX();
	$this->table_starty = $this->GetY();

	//if the header will be showed
	if ( ! $this->tb_header_draw ) return;

	$h = 0;
	$xx = Array();

	//calculate the maximum height of the cells
	for($i=0;$i<$this->tb_columns;$i++)
	{

		$this->SetFont(	$this->tb_header_type[$i]['T_FONT'],
						$this->tb_header_type[$i]['T_TYPE'],
						$this->tb_header_type[$i]['T_SIZE']);

		$this->tb_header_type[$i]['CELL_WIDTH'] = $this->tb_header_type[$i]['WIDTH'];

		if (isset($this->tb_header_type[$i]['COLSPAN'])){

			$colspan = (int) $this->tb_header_type[$i]['COLSPAN'];//convert to integer

			for ($j = 1; $j < $colspan; $j++){
				//if there is a colspan, then calculate the number of lines also with the with of the next cell
				if (($i + $j) < $this->tb_columns)
					$this->tb_header_type[$i]['CELL_WIDTH'] += $this->tb_header_type[$i + $j]['WIDTH'];
			}
		}

		$this->tb_header_type[$i]['CELL_LINES'] =
			$this->NbLines($this->tb_header_type[$i]['CELL_WIDTH'],$this->tb_header_type[$i]['TEXT']);

		//this is the maximum cell height
		$h = max($h, $this->tb_header_type[$i]['LN_SIZE'] * $this->tb_header_type[$i]['CELL_LINES']);

		if (isset($data[$i]['COLSPAN'])){
			//just skip the other cells
			$i = $i + $colspan - 1;
		}

	}

	//Issue a page break first if needed
	//calculate the header hight and the next data line hight
	$this->CheckPageBreak($h + $next_line_height, false);

	//Draw the cells of the row
	for($i=0; $i<$this->tb_columns; $i++)
	{
		//border size BRD_SIZE
		$this->SetLineWidth($this->tb_header_type[$i]['BRD_SIZE']);

		//fill color = BG_COLOR
		list($r, $g, $b) = $this->tb_header_type[$i]['BG_COLOR'];
		$this->SetFillColor($r, $g, $b);

		//Draw Color = BRD_COLOR
		list($r, $g, $b) = $this->tb_header_type[$i]['BRD_COLOR'];
		$this->SetDrawColor($r, $g, $b);

		//Text Color = T_COLOR
		list($r, $g, $b) = $this->tb_header_type[$i]['T_COLOR'];
		$this->SetTextColor($r, $g, $b);

		//Set the font, font type and size
		$this->SetFont(	$this->tb_header_type[$i]['T_FONT'],
						$this->tb_header_type[$i]['T_TYPE'],
						$this->tb_header_type[$i]['T_SIZE']);

		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();

		if ($this->New_Page_Commit){
			if (isset($this->tb_header_type[$i]['BRD_TYPE_NEW_PAGE'])){
				$this->tb_header_type[$i]['BRD_TYPE'] .= $this->tb_header_type[$i]['BRD_TYPE_NEW_PAGE'];
			}
		}

		//Print the text
		$this->MultiCellTable(
				$this->tb_header_type[$i]['CELL_WIDTH'],
				$this->tb_header_type[$i]['LN_SIZE'],
				$this->tb_header_type[$i]['TEXT'],
				$this->tb_header_type[$i]['BRD_TYPE'],
				$this->tb_header_type[$i]['T_ALIGN'],
				$this->tb_header_type[$i]['V_ALIGN'],
				1,
				$h - $this->tb_header_type[$i]['LN_SIZE'] * $this->tb_header_type[$i]['CELL_LINES']
				);

		//Put the position to the right of the cell
		$this->SetXY($x+$this->tb_header_type[$i]['CELL_WIDTH'],$y);

		if (isset($this->tb_header_type[$i]['COLSPAN'])){
			$i = $i + (int)$this->tb_header_type[$i]['COLSPAN'] - 1;
		}


	}

	//Go to the next line
	$this->Ln($h);

	$this->Draw_Header_Command = false;
	$this->New_Page_Commit = false;
	$this->Data_On_Current_Page = true;
}

//this function Draws the data's from the table
//have to call this function after the table initialization, after the table, header and data types are set
//and after the header is drawed
/*
$header = true -> on new page draws the header
		= false - > the header is not drawed
*/

function Draw_Data($data, $header = true){

	$h = 0;
	$xx = Array();
	$tt = Array();

	//calculate the maximum height of the cells
	for($i=0; $i < $this->tb_columns; $i++)
	{

		if (!isset($data[$i]['T_FONT'])) $data[$i]['T_FONT'] = $this->tb_data_type[$i]['T_FONT'];
		if (!isset($data[$i]['T_TYPE'])) $data[$i]['T_TYPE'] = $this->tb_data_type[$i]['T_TYPE'];
		if (!isset($data[$i]['T_SIZE'])) $data[$i]['T_SIZE'] = $this->tb_data_type[$i]['T_SIZE'];
		if (!isset($data[$i]['T_COLOR'])) $data[$i]['T_COLOR'] = $this->tb_data_type[$i]['T_COLOR'];
		if (!isset($data[$i]['T_ALIGN'])) $data[$i]['T_ALIGN'] = $this->tb_data_type[$i]['T_ALIGN'];
		if (!isset($data[$i]['V_ALIGN'])) $data[$i]['V_ALIGN'] = $this->tb_data_type[$i]['V_ALIGN'];
		if (!isset($data[$i]['LN_SIZE'])) $data[$i]['LN_SIZE'] = $this->tb_data_type[$i]['LN_SIZE'];
		if (!isset($data[$i]['BRD_SIZE'])) $data[$i]['BRD_SIZE'] = $this->tb_data_type[$i]['BRD_SIZE'];
		if (!isset($data[$i]['BRD_COLOR'])) $data[$i]['BRD_COLOR'] = $this->tb_data_type[$i]['BRD_COLOR'];
		if (!isset($data[$i]['BRD_TYPE'])) $data[$i]['BRD_TYPE'] = $this->tb_data_type[$i]['BRD_TYPE'];
		if (!isset($data[$i]['BG_COLOR'])) $data[$i]['BG_COLOR'] = $this->tb_data_type[$i]['BG_COLOR'];

		$this->SetFont(	$data[$i]['T_FONT'],
						$data[$i]['T_TYPE'],
						$data[$i]['T_SIZE']);

		$data[$i]['CELL_WIDTH'] = $this->tb_header_type[$i]['WIDTH'];

		if (isset($data[$i]['COLSPAN'])){

			$colspan = (int) $data[$i]['COLSPAN'];//convert to integer

			for ($j = 1; $j < $colspan; $j++){
				//if there is a colspan, then calculate the number of lines also with the with of the next cell
				if (($i + $j) < $this->tb_columns)
					$data[$i]['CELL_WIDTH'] += $this->tb_header_type[$i + $j]['WIDTH'];
			}
		}

		$data[$i]['CELL_LINES'] = $this->NbLines($data[$i]['CELL_WIDTH'], $data[$i]['TEXT']);

		//this is the maximum cell height
		$h = max($h, $data[$i]['LN_SIZE'] * $data[$i]['CELL_LINES']);

		if (isset($data[$i]['COLSPAN'])){
			//just skip the other cells
			$i = $i + $colspan - 1;
		}

	}


	$this->CheckPageBreak($h, $header);

	if ($this->Draw_Header_Command){//draw the header
		$this->Draw_Header_($h);
	}

	$this->Table_Align();

	//Draw the cells of the row
	for($i=0;$i<$this->tb_columns;$i++)
	{

		//border size BRD_SIZE
		$this->SetLineWidth($data[$i]['BRD_SIZE']);

		//fill color = BG_COLOR
		list($r, $g, $b) = $data[$i]['BG_COLOR'];
		$this->SetFillColor($r, $g, $b);

		//Draw Color = BRD_COLOR
		list($r, $g, $b) = $data[$i]['BRD_COLOR'];
		$this->SetDrawColor($r, $g, $b);

		//Text Color = T_COLOR
		list($r, $g, $b) = $data[$i]['T_COLOR'];
		$this->SetTextColor($r, $g, $b);

		//Set the font, font type and size
		$this->SetFont(	$data[$i]['T_FONT'],
						$data[$i]['T_TYPE'],
						$data[$i]['T_SIZE']);

		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();

		//print the text
		$this->MultiCellTable(
				$data[$i]['CELL_WIDTH'],
				$data[$i]['LN_SIZE'],
				$data[$i]['TEXT'],
				$data[$i]['BRD_TYPE'],
				$data[$i]['T_ALIGN'],
				$data[$i]['V_ALIGN'],
				1,
				$h - $data[$i]['LN_SIZE'] * $data[$i]['CELL_LINES']
				);

		//Put the position to the right of the cell
		$this->SetXY($x + $data[$i]['CELL_WIDTH'],$y);

		//if we have colspan, just ignore the next cells
		if (isset($data[$i]['COLSPAN'])){
			$i = $i + (int)$data[$i]['COLSPAN'] - 1;
		}

	}

	$this->Data_On_Current_Page = true;

	//Go to the next line
	$this->Ln($h);
}

//if the table is bigger than a page then it jumps to next page and draws the header
/*
$h = is the height that if is overriden than the document jumps to a new page
$header = true/false = this specifies at a new page we write again the header or not. This variable
is used at the moment when the header draw makes the new page jump
*/

function CheckPageBreak($h, $header = true)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h > $this->PageBreakTrigger){

		$this->Draw_Table_Border();//draw the table border

		$this->End_Page_Border();//if there is a special handling for end page??? this is specific for me

		$this->AddPage($this->CurOrientation);//add a new page

		$this->Data_On_Current_Page = false;

		$this->New_Page_Commit = true;//new page commit

		$this->table_startx = $this->GetX();
		$this->table_starty = $this->GetY();
		if ($header) $this ->Draw_Header();//if we have to draw the header!!!
	}

	//align the table
	$this->Table_Align();
}

/**   This method returns the number of lines that will a text ocupy on the specified width
      Call:
      @param
                        $w - width
                        $txt - text
      @return           number
*/
function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}


/**   This method allows printing text with line breaks.
      It works like a modified MultiCell
      Call:
      @param
                        $w - width
                        $h - line height
                        $txt - the outputed text
                        $border - border(LRTB 0 or 1)
                        $align - horizontal align 'JLR'
                        $fill - fill (1/0)
                        $vh - vertical adjustment - the Multicell Height will be with this VH Higher!!!!
                        $valign - Vertical Alignment - Top, Middle, Bottom
      @return           nothing
*/
function MultiCellTable($w, $h, $txt, $border=0, $align='J', $valign='T', $fill=0, $vh=0)
{

	$b1 = '';//border for top cell
	$b2 = '';//border for middle cell
	$b3 = '';//border for bottom cell

	if($border)
	{
		if($border==1)
		{
			$border = 'LTRB';
			$b1 = 'LRT';//without the bottom
			$b2 = 'LR';//without the top and bottom
			$b3 = 'LRB';//without the top
		}
		else
		{
			$b2='';
			if(is_int(strpos($border,'L')))
				$b2.='L';
			if(is_int(strpos($border,'R')))
				$b2.='R';
			$b1=is_int(strpos($border,'T')) ? $b2.'T' : $b2;
			$b3=is_int(strpos($border,'B')) ? $b2.'B' : $b2;

		}
	}

	switch ($valign){
		case 'T':
			$wh_T = 0;//Top width
			$wh_B = $vh - $wh_T;//Bottom width
			break;
		case 'M':
			$wh_T = $vh/2;
			$wh_B = $vh/2;
			break;
		case 'B':
			$wh_T = $vh;
			$wh_B = 0;
			break;
		default://default is TOP ALIGN
			$wh_T = 0;//Top width
			$wh_B = $vh - $wh_T;//Bottom width
	}

	//save the X position
	$x = $this->x;
	/*
		if $wh_T == 0 that means that we have no vertical adjustments so I will skip the cells that
		draws the top and bottom borders
	*/

	if ($wh_T != 0)//only when there is a difference
	{
		//draw the top borders!!!
		$this->Cell($w,$wh_T,'',$b1,2,$align,$fill);
	}

	$b2 = is_int(strpos($border,'T')) && ($wh_T == 0) ? $b2.'T' : $b2;
	$b2 = is_int(strpos($border,'B')) && ($wh_B == 0) ? $b2.'B' : $b2;

	$this->MultiCell($w,$h,$txt,$b2,$align,$fill);

	if ($wh_B != 0){//only when there is a difference

		//go to the saved X position
		//a multicell always runs to the begin of line
		$this->x = $x;

		$this->Cell($w, $wh_B, '', $b3, 2, $align,$fill);

		$this->x=$this->lMargin;
	}

}


}//end of pdf_table class

?>