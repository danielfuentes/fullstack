<?php

require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$correo = $_POST['email'];
$mensaje = $_POST['message'];
$nombre = $_POST['name'];

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.hostname.cl';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'cuenta-de-correo@sudominio.cl';                 // SMTP username
$mail->Password = 'sucontraseñadecorreo';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS (Puerto 587)encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('cuenta-de-correo@sudominio.cl', 'Mailer');
$mail->addAddress($correo, $nombre);     

$mail->Subject = 'Aqui va el Asunto';
$mail->Body    = $mensaje;

if(!$mail->send()) {
    echo 'Error, mensaje no enviado';
    echo 'Error del mensaje: ' . $mail->ErrorInfo;
} else {
    echo 'El mensaje se ha enviado correctamente';
    
}