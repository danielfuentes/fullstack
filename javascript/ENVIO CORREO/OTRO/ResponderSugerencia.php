<? include("Conex2.php");

$Sql="update TSugerencia set Respuesta='".$_POST["Respuesta"]."',Status='R' where IdSugerencia='".$_POST["IdSugerencia"]."'";
//echo($Sql);
if(!@ $Resultado=mysql_query($Sql,$Link)){
echo("<SCRIPT>window.alert('ERROR AL MODIFICAR EL REGISTRO')</SCRIPT>");
echo("<SCRIPT>window.history.back()</SCRIPT>");
die("");
}




function ValidarDatos($campo){
    //Array con las posibles cabeceras a utilizar por un spammer
    $badHeads = array("Content-Type:",
                                 "MIME-Version:",
                                 "Content-Transfer-Encoding:",
                                 "Return-path:",
                                 "Subject:",
                                 "From:",
                                 "Envelope-to:",
                                 "To:",
                                 "bcc:",
                                 "cc:");
    //Comprobamos que entre los datos no se encuentre alguna de
    //las cadenas del array. Si se encuentra alguna cadena se
    //dirige a una página de Forbidden
    foreach($badHeads as $valor){ 
      if(strpos(strtolower($campo), strtolower($valor)) !== false){ 
        header("HTTP/1.0 403 Forbidden"); 
        exit; 
      }
    } 
  }

?>

<html>
<head>
<title>SISTEMA EN LINEA CONTIGO!!</title>
</head>
<body background="imagenes/fondo.jpg">

<?


  //Ejemplo de llamadas a la funcion
ValidarDatos($_POST["CorreoSugerencia"]);


$Mensaje="Estimado(a) ".$_POST["NombreSugerencia"].":".$_POST["Respuesta"];


mail($_POST["CorreoSugerencia"], "Respuesta de su Sugerencia al Portal Mision Ciencia",$Mensaje );
?>



<br>
<br>
<br>
<table align="center" width="300">
<tr>
	<td>
    <p style="font-family:Georgia, 'Times New Roman', Times, serif" align="justify">
Respuesta enviada exitosamente.
    </p>
</td>

</tr>
</table>

<table align="center" width="300">
<tr>
	<td align="center">
    


		<input type="button" onClick="window.location='Comentarios.php'" value="Regresar">
    </td>

</tr>
</table>
 </body>
</html>