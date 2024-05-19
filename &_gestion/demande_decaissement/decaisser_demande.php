<?php
session_start();
include('../../connex.php');


$date=gmdate("Y-m-d H:i:s");

$_SESSION['id_accepte']=$_GET['id_decaisse'];

$req=$con->prepare("UPDATE demande_decaissement SET etat_demande=3, secur_decaisse_demande_decaissement=:A, date_decaisse_demande_decaissement=:B WHERE id_demande_decaissement=:C ");
$req->execute(array('A'=>$_SESSION['secur_site'], 'B'=>$date,'C'=>$_SESSION['id_accepte']));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Decaissement de la demande N° <b>".$_SESSION['id_accepte']."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


//Infos demande
$dem=$con->prepare('SELECT * FROM demande_decaissement LEFT JOIN utilisateur ON utilisateur.secur=demande_decaissement.secur_ajout_demande_decaissement WHERE id_demande_decaissement=:A');
$dem->execute(array('A'=>$_SESSION['id_accepte']));
$idem=$dem->fetch();
$montant=$idem['montant_demande_decaissement'];
$motif=$idem['motif_demande_decaissement'];
$demandeur=$idem['nom_utilisateur'];

$sedc=$con->prepare('SELECT * FROM utilisateur WHERE secur=:A');
$sedc->execute(array('A'=>$_SESSION['secur_site']));
$iedc=$sedc->fetch();
$util_decaisse=$iedc['nom_utilisateur'];


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

//$mail->AddCC("amani_ulrich@outlook.fr", "Ulrich AMANI");
$mail->AddAddress("ramahoreb06@gmail.com", "Ramatou ADIATOU");
//$mail->AddCC("wouyatinkadjo@gmail.com", "Serge KADJO");
$mail->AddCC("serge.kadjo@outlook.fr", "Serge KADJO");
$mail->AddCC("nadege_adja@stt.ci", "Nadège ADJA");
$mail->AddBCC("amani_ulrich@outlook.fr", "Ulrich AMANI");

$mail->isHTML(true);

$mail->Subject = "DECAISSEMENT EFFECTUE";
$mail->Body = "
    Demande de decaissement du montant de <b>".$montant."</b> pour <b>".$motif."</b> emise par <b>".$demandeur."</b> accordee et decaissee effectivement par <b>".$util_decaisse."</b>.
   
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

/*
//DG
//Envoi sms NOTIF 

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://panel.smsing.app/smsAPI?sendsms=null&apikey=IbILNr1bs1sCV1RNuvaB7amMDS9cUGG3&apitoken=bOdV1680020257&type=sms&from=STTCI&to=2250757290429&text=URGENT%20!!!%20Demande%20de%20d%C3%A9caissement%20d%27un%20montant%20de%20'.$montant_demande_decaissement.'%20%C3%A9mise%20par%20STT-CI%20%20veuillez%20cliquer%20sur%20https%3A%2F%2Fapp.stt.ci%2F%20pour%20la%20consulter.%20Merci',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

//Fin sms NOTIF 

//RH
//Envoi sms NOTIF 

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://panel.smsing.app/smsAPI?sendsms=null&apikey=IbILNr1bs1sCV1RNuvaB7amMDS9cUGG3&apitoken=bOdV1680020257&type=sms&from=STTCI&to=2250507240169&text=URGENT%20!!!%20Demande%20de%20d%C3%A9caissement%20d%27un%20montant%20de%20'.$montant_demande_decaissement.'%20%C3%A9mise%20par%20STT-CI%20%20veuillez%20cliquer%20sur%20https%3A%2F%2Fapp.stt.ci%2F%20pour%20la%20consulter.%20Merci',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

//Fin sms NOTIF 

*/



header('Location: demande_decaissement.php');

unset($_SESSION['id_accepte']);
unset($con);

?>