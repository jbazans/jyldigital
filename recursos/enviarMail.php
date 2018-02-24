<?php

include('PHPMailer.php');
include('Exception.php');
include('SMTP.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

	$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'jyldigital.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'jyl_master@jyldigital.com';                 // SMTP username
    $mail->Password = 'jylpublimprenta';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;  
   	$mail->SMTPDebug='DEBUG_OFF';
$mail->setFrom('jyl_master@jyldigital.com', 'WebMaster');
$mail->addAddress('jylimprenta@gmail.com', 'Administrador');
$mail->Subject  = $_GET['asunto'];
$mail->Body     = ''.
'<h1>Cliente: '.$_GET['nombre'].'</h1>'.
'<h3>E-mail: '.$_GET['email'].'</h3>'.
'<h3>Celular: '.$_GET['celular'].'</h3>'.
'<h3>Asunto: '.$_GET['asunto'].'</h3>'.
'<h3>Consulta:</h3>'.
'<p>'.$_GET['consulta'].'</p>'
;
$mail->IsHTML(true);

if(!$mail->send()) {
  echo 'fallo';
  echo 'Mailer error: ' . $mail->ErrorInfo;
}else{
  echo 'exito';
}

?>