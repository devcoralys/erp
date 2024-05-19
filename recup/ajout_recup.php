 
<?php
session_start();

include('../connex.php');


$adres=$_POST['mail'];

$_SESSION['identifiant']=$adres;

$rel=$con->prepare("SELECT * FROM utilisateur WHERE email_utilisateur=:A"); 
$rel->execute(array('A' => $adres));
$count = $rel->rowCount();
$ut=$rel->fetch();
$_SESSION['id_secur']=$ut['secur'];
if($count>0)
{			  

//Envoi du mail 
// on génère une frontière
$destinataire=$adres;
$sujet= "REINITIALISATION COMPTE | Lynays Entreprises";
$headers="From: support@lynaysentreprises.com \n";
$boundary = '-----=' . md5( uniqid ( rand() ) );
// on génère un identifiant aléatoire pour le fichier
$file_id  = md5( uniqid ( rand() ) ) . $_SERVER['SERVER_NAME'];

// on va maintenant lire le fichier et l'encoder
$path = 'image/qrcode.png'; // chemin vers le fichier
//$path = $link_qr;
$fp = fopen($path, 'rb');
$content = fread($fp, filesize($path));
fclose($fp);
$content_encode = chunk_split(base64_encode($content));


$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-Type: multipart/related; boundary=\"$boundary\"";

$message  = "Ceci est un message au format MIME 1.0 multipart/mixed.\n\n";
$message .= "--" . $boundary . "\n";
$message .= "Content-Type: text/html; charset=\"iso-8859-2\"\n";
$message .= "Content-Transfer-Encoding: 8bit\n\n";
$message .= "<html>
                  <body>
                <b></b>, <br><br>";
$message .= " Vous avez demand&eacute; la r&eacute;initialisation de votre mot de passe Lynays Entreprises.. Veuillez <p>Cliquez sur <a style='color:green;' href='https://www.lynaysentreprises.com/logi/recup/modifier_passe.php?eghkk=".$ut['secur']."'>>> ce lien <<</a> pour vous continuer l\'op&eacute;ration. </p><br/><br/>";
//$message .= "<img src=\"cid:$file_id\" alt='Votre Badge Num&eacute;rique'><br>";
$message .= "<br><br><br> <hr> <br><p><a href='https://www.lynaysentreprises.com/'>Lynays Entreprises</a>, vous remercie.</p> ";
$message .= "\n\n";
$message .= "--" . $boundary . "\n";
$message .= "Content-Type: image/jpg; name=\"$path\"\n";
$message .= "Content-Transfer-Encoding: base64\n";
$message .= "Content-ID: <$file_id>\n\n";
$message .= $content_encode . "\n";
$message .= "\n\n";
$message .= "--" . $boundary . "--\n";

mail($destinataire, $sujet, $message, $headers);
//Fin Email

echo '0';

}
else
{

echo '1';

}

unset($con);

?>
 
 