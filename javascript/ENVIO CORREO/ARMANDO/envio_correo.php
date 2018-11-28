//*********************funcion donde pasas los parametros para enviar corrreo****************

function AccionEnviarCorreo(){

		   $Sql="select * from correo";
		   $Resultado=$this->ConsultaBD($Sql);
		   $Lista=$this->ObtenerResultados($Resultado);

		   $correoelectronico=$_POST['correo_electronico'];

		   $Sql="select * from tipo_pago";
		   $Resultado=$this->ConsultaBD($Sql);
		   $Lista1=$this->ObtenerResultados($Resultado);

		   $Sql="select * from entidad_bancaria";
		   $Resultado=$this->ConsultaBD($Sql);
		   $Lista2=$this->ObtenerResultados($Resultado);
		   
		   $Body = "La presente tiene como finalidad informarle que su pago fue registrado exitosamente.<br/><br/>
		   
		   Datos del pago realizado: <br/><br/>
		   
		   RIF/C&eacute;dula:".$_POST['nacionalidad']."-".$_POST['rif_cedula']."<br/><br/>
		   
		   Correo Electr&oacute;nico:".$_POST['correo_electronico']."<br/><br/>

		   Nro de Factura:".$_POST['numero_factura']."<br/><br/>

		   Tipo de Pago:".$Lista1['tipo_pago']."<br/><br/>

		   Fecha del Pago:".$_POST['fecha_pago']."<br/><br/>

		   Entidad Bancaria:".$Lista2['entidad_bancaria']."<br/><br/>

		   Referencia/Dep&oacute;sito:".$_POST['referencia_deposito']."<br/><br/>

		   Banco(Transferencia):".$_POST['banco']."<br/><br/>

		   Monto(Bs.):".$_POST['monto']."<br/><br/>
		   
		   Saludos Cordiales.<br/><br/>
		   CIMA24<br/>";
		   
		   $AltBody = "La presente tiene como finalidad informarle que su pago fue registrado exitosamente.

		   Datos del pago realizado:
		   
		   RIF/Cédula:".$_POST['nacionalidad']."-".$_POST['rif_cedula']."

		   Correo Electrónico:".$_POST['correo_electronico']."

		   Nro de Factura:".$_POST['numero_factura']."

		   Tipo de Pago:".$_POST['id_tipo_pago']."

		   Fecha del Pago:".$_POST['fecha_pago']."

		   Entidad Bancaria:".$_POST['id_entidad_bancaria']."

		   Referencia/Depósito:".$_POST['referencia_deposito']."

		   Banco(Transferencia):".$_POST['banco']."

		   Monto(Bs.):".$_POST['monto']."
		   
		   Saludos Cordiales.
		   CIMA24
		   ";
		   
                    //por aqui pasas los parametros a la funcion enviar correo
		   EnviarCorreo($_POST['correo_electronico'],$Body,$AltBody,0,$Lista);
		   EnviarCorreo($Lista["From"],$Body,$AltBody,1,$Lista);


}	




//****************funcion que realiza el envio de correo, necesitas la libreria phpmailer*******




function EnviarCorreo($correo,$Body,$AltBody,$contador,$Row){
	
  // primero hay que incluir la clase phpmailer para poder instanciar
  //un objeto de la misma
  if($contador==0){
  require "phpmailer/class.phpmailer.php";
  }
  //instanciamos un objeto de la clase phpmailer al que llamamos 
  //por ejemplo mail
  $mail = new phpmailer();

  //Definimos las propiedades y llamamos a los metodos 
  //correspondientes del objeto mail

  //Con PluginDir le indicamos a la clase phpmailer donde se 
  //encuentra la clase smtp que como he comentado al principio de 
  //este ejemplo va a estar en el subdirectorio includes
  $mail->PluginDir = "phpmailer/";

  //Con la propiedad Mailer le indicamos que vamos a usar un 
  //servidor smtp
  $tipo_correo=$Row['tipo_correo'];
  //$mail->Mailer = "smtp";
  $mail->Mailer = "$tipo_correo";

  //Asignamos a Host el nombre de nuestro servidor smtp
  //$mail->Host = "email.sencamer.gob.ve";

  $mail->Host = $Row["host"];
  //$mail->Host = $datosemail1[0]->nombreservidor;

  //Le indicamos que el servidor smtp requiere autenticacion
  if($Row["autenticacion "]=='si'){
	$SMTPAuth=true;
  }else if($Row["autenticacion "]=='no'){
	$SMTPAuth=false;
  }
  $mail->SMTPAuth = $SMTPAuth;
  $mail->Port =$Row["puerto"];
  //$mail->Port =25;

  //Le decimos cual es nuestro nombre de usuario y password
  if($Row["autenticacion "]=='si'){
	$mail->Username = $Row["usuario"];
	$mail->Password = $Row["clave"];
  }
  //$mail->Username = "armoreno";
  //$mail->Password = "15337857";
  //$mail->Username = $datosemail1[0]->username;
  // $mail->Password = Desencriptar($datosemail1[0]->passworduser);

  //Indicamos cual es nuestra direccion de correo y el nombre que 
  $mail->AddAddress("$correo");

  //queremos que vea el usuario que lee nuestro correo
  $mail->From = $Row["From"];
  $mail->FromName = $Row["FromName"];
  // $mail->From = $datosemail1[0]->direccionemail;
  //$mail->FromName = $datosemail1[0]->nombrequienenvia;

  //el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
  //una cuenta gratuita, por tanto lo pongo a 30  
  $mail->Timeout=30;

  //Indicamos cual es la direccion de destino del correo

    //Asignamos asunto y cuerpo del mensaje
  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
  //que se vea en negrita
 // $mail->Subject = $datosemail1[0]->asuntoemail;
 $mail->Subject = $Row["encabezado"];
 // $mail->Body = "La solicitud Nro. ". $_REQUEST['id_ticket'] . " Fue Conformada con Exito"; 
 $mail->Body = $Body;
  		
  
  //Definimos AltBody por si el destinatario del correo no admite email con formato html 
  $mail->AltBody = $AltBody;

  //se envia el mensaje, si no ha habido problemas 

  //la variable $exito tendra el valor true

  $exito = $mail->Send();

  //Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
  //para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
  //del anterior, para ello se usa la funcion sleep	
  $intentos=1; 
  while ((!$exito) && ($intentos < 4)) {
	sleep(5);
     	echo $mail->ErrorInfo;
     	$exito = $mail->Send();
     	$intentos=$intentos+1;	
   }
	
  return $exito;


}

