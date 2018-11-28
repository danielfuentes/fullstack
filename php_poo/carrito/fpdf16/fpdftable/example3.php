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
Voán ñaàu tö tröïc tieáp nöôùc ngoaøi (FDI) tính ñeán cuoái thaùng ñaït 2,86 tyû USD, taêng 900 trieäu USD so vôùi thaùng tröôùc vaø vöôït cuøng kyø naêm ngoaùi gaàn 1 tyû USD. Ñoù laø chöa keå 38 döï aùn khaùc ñang trong giai ñoaïn xuùc tieán vôùi toång voán döï kieán gaàn 35 tyû USD.
 </tr>
 <tr>
   <td border=1 valign=middle width=75 family=vni_times size=10 style=bold,italic>
    Caùc nhaø thieân vaên vöøa phaùt hieän haønh tinh gioáng traùi ñaát nhaát cho tôùi nay, naèm ngoaøi heä maët trôøi cuûa chuùng ta, nôi nöôùc coù theå chaûy treân beà maët.
    </td>
   <td border=0 align=right valign=bottom width=75 height=100 family=vni_times size=15 style=underline>
   Ñôït khôùp leänh ñaàu tieân saøn TP HCM vaãn ñi xuoáng song tín hieäu hoài phuïc raát maïnh meõ, ñeán ñôït thöù hai thò tröôøng hoaøn toaøn ñaûo chieàu vôùi haøng loaït blue-chip taêng giaù. Baûng ñieän töû saøn Haø Noäi ngay ñaàu giôø môû cöûa ñaõ xanh rì.
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