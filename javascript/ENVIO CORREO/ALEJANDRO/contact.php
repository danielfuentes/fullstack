<?php
function sendEmail(){
require_once('php-mailer/PHPMailerAutoload.php');
$mail = new PHPMailer();
$emailTO = $emailBCC =  $emailCC = array(); $formEmail = '';


$sitename = 'EnglishLink';


$emailTO[] = array( 'email' => 'english_link@outlookc.com', 'name' => 'English Link' );


$subject = "Info Form " . ' - ' . $sitename;


$formEmail = 'noreply@englishlink.com';




if( $_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST["email"]) && $_POST["email"] != '' && isset($_POST["name"]) && $_POST["name"] != '') {

		$cf_email = $_POST["email"];
		$cf_name = $_POST["name"];
		$cf_tel = isset($_POST["tel"]) ? $_POST["tel"] : '';
		$cf_lvl = isset($_POST["lvl"]) ? $_POST["lvl"] : '';
		$cf_message = isset($_POST["coment"]) ? $_POST["coment"] : '';

		$honeypot 	= isset($_POST["form-anti-honeypot"]) ? $_POST["form-anti-honeypot"] : 'bot';
		$bodymsg = '';

		if ($honeypot == '' && !(empty($emailTO))) {

			// $mail->isSMTP();
			// $mail->SMTPDebug = 0;
			// $mail->Host = 'smtp_host';
			// $mail->Port = 587;
			// $mail->SMTPAuth = true;
			// $mail->Username = 'smtp_username';
			// $mail->Password = 'smtp_password';


			$mail->IsHTML(true);
			$mail->CharSet = 'UTF-8';

			$mail->From = ($formEmail !='') ? $formEmail : $cf_email;
			$mail->FromName = $cf_name . ' - ' . $sitename;
			$mail->AddReplyTo($cf_email, $cf_name);
			$mail->Subject = $subject;

			foreach( $emailTO as $to ) {
				$mail->AddAddress( $to['email'] , $to['name'] );
			}


			if ($_FILES){
				$file = "uploads/work/" . time() . basename($_FILES['files']['name']);
				if($_FILES['files']['size'] <= 900000 && ($_FILES['files']['type'] == 'image/jpeg' || $_FILES['files']['type'] == 'image/png' || $_FILES['files']['type'] == 'image/jpg' || $_FILES['files']['type'] == 'application/pdf' || $_FILES['files']['type'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')){
					if(move_uploaded_file($_FILES['files']['tmp_name'], $file)){
						$mail->AddAttachment($file);
				}
			}else {
				return '<div class="alert alert-danger" role="alert">
					 Verifica el archivo adjunto.
					</div>';
			}
			}


			$bodymsg .= isset($cf_name) ? "Nombre: $cf_name<br><br>" : '';
			$bodymsg .= isset($cf_email) ? "Email: $cf_email<br><br>" : '';
	            $bodymsg .= ($cf_tel) ? "Tel: $cf_tel<br><br>" : '';
			$bodymsg .= ($cf_lvl) ? "Nivel: $cf_lvl<br><br>" : '';

			$bodymsg .= isset($cf_message) ? "Mensaje: $cf_message<br><br>" : '';
			$bodymsg .= $_SERVER['HTTP_REFERER'] ? '<br>---<br><br>Este mail fue enviado desde la web EnglishLink: ' . $_SERVER['HTTP_REFERER'] : '';


			$mail->MsgHTML( $bodymsg );
			$is_emailed = $mail->Send();

			if( $is_emailed === true ) {
				return '<div class="alert alert-success" role="alert">
						Mensaje Enviado Correctamente
						</div>';
			} else {
				return '<div class="alert alert-danger" role="alert">
					 Error al enviar, contactate con info@englishlink.com.ar
					</div>';
			}

		} else {
			return '<div class="alert alert-danger" role="alert">
				Error al enviar, contactate con info@englishlink.com.ar
				</div>';
		}
	} else {
		return '<div class="alert alert-danger" role="alert">
				Completa todos los campos
				</div>';
	}
}
}
