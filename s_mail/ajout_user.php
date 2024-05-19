<?php
session_start();
   
    $se =  '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$pass   = ''; 
	
	for($j=0;$j < 7;$j++)
	{ 
      $pass.= substr($se,rand()%(strlen($se)),1);	
	}
	
$pwd= hash("sha512", $pass);

include("../../s_mail/class.phpmailer.php");
include("../../s_mail/class.smtp.php");
 
$mail             = new PHPMailer();

$titre = "Votre compte utilisateur T-CARE a été crée. Veuillez trouver ci-dessous vos paramètres de connexion.";
$bom = utf8_decode($titre);

$body           = $bom."<br/><br/>";

$body          .= "Parametres de connexion <br/><br/>";
$body          .= "Identifiant : ".$email." <br/>";
$body          .= "Mot de passe : ".$pass." <br/>";
$body          .= "Cliquez sur ce lien pour vous connecter : www.arobaseprotech.com/t-care<br/><br/>";

$mail->IsSMTP();
$mail->SMTPAuth   = true;
$mail->Host       = "www.arobaseprotech.com";  
$mail->Port       = 25;             
 
$mail->Username   = "support@arobaseprotech.com";
$mail->Password   = "arbmail123@@";        
$mail->From       = "support@arobaseprotech.com"; //adresse d’envoi correspondant au login entrée précédement
$mail->FromName   = "T-CARE"; // nom qui sera affiché

$tit = "Création de compte utilisateur T-CARE";
$bomo = utf8_decode($tit);

$mail->Subject    = $bomo; // sujet

$mail->AltBody    = "corps du message au format texte"; //Body au format texte

$mail->WordWrap   = 50; // nombre de caractere pour le retour a la ligne automatique
$mail->MsgHTML($body);
 
$mail->AddReplyTo("support@arobaseprotech.com","T-CARE");

$mail->AddAddress($email);
$mail->IsHTML(true); // envoyer au format html, passer a false si en mode texte
 
$mail->Send();
  
?>