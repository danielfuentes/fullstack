<?
if(!@$Link=mysql_connect("imataca.reacciun.ve","sislineauser","s3sl3ne@db")){
die("Error Al Tratar De Conectar");
}
if(!@mysql_select_db("sislinea")){
die ("Error Al Tratar De Conectar Con La Base De Datos");
}
?>