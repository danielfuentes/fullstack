<?
include('pdftable.html');
$f = @fopen('view.txt','r');
if (!$f) return;
$count = @fread($f,1024);
@fclose($f);
if ($count){
	$count = intval($count)+1;
	$f = @fopen('view.txt','w');
	if (!$f) return;
	@fwrite($f,$count);
	@fclose($f);
}
echo "<hr><center>Viewed: $count</center>";
?>