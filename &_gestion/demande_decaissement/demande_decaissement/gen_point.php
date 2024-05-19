<?php

//Send mail

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/phpmailer/src/Exception.php';
require_once __DIR__ . '/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host = 'mail.stt.ci';
$mail->SMTPAuth = true;
$mail->Username = "support@stt.ci";
$mail->Password = "@Succes2019";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;

$mail->From = "support@stt.ci";
$mail->FromName = "SUPPORT STT";


$mail->AddCC("amani_ulrich@outlook.fr", "Ulrich AMANI");
//$mail->AddCC("amani_ulrich@outlook.fr", "Ulrich AMANI");


$mail->isHTML(true);

$mail->Subject = "DEMANDE DE DECAISSEMENT";
$mail->Body = "

";
$mail->AltBody = "DETAILS";

//Creation PDF

//End Creation PDF

// Add Static Attachment
/*
$attachment = $pdffilename;
$mail->AddAttachment($attachment , $pdffilename);
*/

try {
    $mail->send();
    echo "Message envoyé avec succes";
} catch (Exception $e) {
    echo "Erreur d'envoi du mail: " . $mail->ErrorInfo;
}
//End mail

?>