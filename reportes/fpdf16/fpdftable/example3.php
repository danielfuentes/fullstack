<?
$content="
<!-- 1.table -->
<table border=1 align=right>
  <tr> 
    <td rowspan=2 valign=middle border=2.5>rowspan=2, valign=middle, border=2.5</td>
    <td valign=middle size=10 style=italic,bold>variable</td>
    <td>Normal</td>
    <td>Normal</td>
    <td colspan=2 rowspan=2 valign=bottom bgcolor=#FF00FF color=#00FF00>
        colspan=2<br>rowspan=2<br>valign=bottom
        <br>dfpidpfidpisd
    </td>
  </tr>  
  <tr> 
    <td align=right valign=bottom height=15>
            height=15<br>vali=bottom??
            </td>
    <td rowspan=2 align=right bgcolor=#aaaaaa>rowspan=2</td>
    <td border=0>border=0</td>
  </tr>  
  <tr> 
    <td>20</td>
    <td>Normal</td>
    <td>Normal</td>
    <td rowspan=3 valign=top bgcolor=#CC3366>rowspan=3</td>
    <td>Normal</td>
  </tr>  
  <tr bgcolor=#cccccc> 
    <td>Normal</td>
    <td colspan=3 align=center border=5>align center, colspan=3,border=3</td>
    <td>Normal</td>
  </tr>  
  <tr> 
    <td align=right valign=bottom size=10 style=italic>
         align=right<br>valign=bottom
         
     </td>
    <td size=15 style=italic,bold>Normal && font</td>
    <td>&nbsp;</td>
    <td>Normal</td>
    <td height=20 border=3 valign=bottom align=center style=bold>height=20<br>border=3</td>
   </tr> 
</table>
<!-- 2.table ... blank line -->
<table border=0 align=center><tr><td>&nbsp;</td></tr></table>
<!-- End blank line -->
<!-- 3.table -->
<table border=1 align=center width=150>
 <tr><td border=3  width=150 colspan=2 valign=bottom color=#FF0000 family=vni_times size=15 style=italic>
Vo�n �a�u t� tr��c tie�p n���c ngoa�i (FDI) t�nh �e�n cuo�i tha�ng �a�t 2,86 ty� USD, ta�ng 900 trie�u USD so v��i tha�ng tr���c va� v���t cu�ng ky� na�m ngoa�i ga�n 1 ty� USD. �o� la� ch�a ke� 38 d�� a�n kha�c �ang trong giai �oa�n xu�c tie�n v��i to�ng vo�n d�� kie�n ga�n 35 ty� USD.
 </tr>
 <tr>
   <td border=1 valign=middle width=75 family=vni_times size=10 style=bold,italic>
    Ca�c nha� thie�n va�n v��a pha�t hie�n ha�nh tinh gio�ng tra�i �a�t nha�t cho t��i nay, na�m ngoa�i he� ma�t tr��i cu�a chu�ng ta, n�i n���c co� the� cha�y tre�n be� ma�t.
    </td>
   <td border=0 align=right valign=bottom width=75 height=100 family=vni_times size=15 style=underline>
   ���t kh��p le�nh �a�u tie�n sa�n TP HCM va�n �i xuo�ng song t�n hie�u ho�i phu�c ra�t ma�nh me�, �e�n ���t th�� hai th� tr���ng hoa�n toa�n �a�o chie�u v��i ha�ng loa�t blue-chip ta�ng gia�. Ba�ng �ie�n t�� sa�n Ha� No�i ngay �a�u gi�� m�� c��a �a� xanh r�.
    </td>
 </tr>
</table>
";

define('FPDF_FONTPATH','font/');
require('lib/pdftable.inc.php');
$p = new PDFTable();
// I set margins out of class
$p->AddFont('vni_times');
$p->AddFont('vni_times', 'B');
$p->AddFont('vni_times', 'I');
$p->AddFont('vni_times', 'BI');

$p->SetMargins(20,20,20);
$p->AddPage();
$p->defaultFontFamily = 'times';
$p->defaultFontStyle  = '';
$p->defaultFontSize   = 12;

$p->SetFont($p->defaultFontFamily, $p->defaultFontStyle, $p->defaultFontSize);

$p->htmltable($content);
$p->output('example3.pdf','F');
?>