<?php
session_start();
include('../../../connex.php');

$date_demande_decaissement=$_POST['date_demande_decaissement'];
$montant_demande_decaissement=addslashes($_POST['montant_demande_decaissement']);
$motif_demande_decaissement=addslashes($_POST['motif_demande_decaissement']);
$mode_reglement=addslashes($_POST['mode_reglement']);
$affectation=addslashes($_POST['affectation']);

$num_dossier_import=$_POST['num_dossier_import'];
$num_dossier_export=$_POST['num_dossier_export'];
$num_groupage=$_POST['num_groupage'];
$num_autre_envoi=$_POST['num_autre_envoi'];
$code_fournisseur=$_POST['code_fournisseur'];

$num_affectation = '';

if($num_dossier_import!=''){ $num_affectation = $num_dossier_import; }
if($num_dossier_export!=''){ $num_affectation = $num_dossier_export; }
if($num_groupage!=''){ $num_affectation = $num_groupage; }
if($num_autre_envoi!=''){ $num_affectation = $num_autre_envoi; }
if($code_fournisseur!=''){ $num_affectation = $code_fournisseur; }

$date=gmdate("Y-m-d H:i:s");


    $n=$con->query('SELECT * FROM demande_decaissement');
    $n->execute();
    $nb=$n->rowcount();
    
    $nb++;
    
    $num_demande_decaissement='CA/DEM00'.$nb;

$req=$con->prepare("INSERT INTO demande_decaissement(date_demande_decaissement, montant_demande_decaissement, motif_demande_decaissement, date_creat_demande_decaissement, secur_ajout_demande_decaissement, num_demande_decaissement, mode_reglement_demande_decaissement, affectation, num_affectation) VALUES (:A, :E, :F, :G, :H, :I, :J, :K, :L)");
$req->execute(array('A'=>$date_demande_decaissement, 'E'=>$montant_demande_decaissement, 'F'=>$motif_demande_decaissement, 'G'=>$date, 'H'=>$_SESSION['secur_site'], 'I'=>$num_demande_decaissement, 'J'=>$mode_reglement, 'K'=>$affectation, 'L'=>$num_affectation));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Demande dun montant de <b>".number_format($montant_demande_decaissement,0,',',' ')." FCFA</b> effectuée pour <b>".$motif_demande_decaissement."</b> paye par <b>".$mode_reglement."</b> Affectation <b>".$affectation."</b> N° <b>".$num_affectation."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


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

$mail->Subject = "DEMANDE DE DECAISSEMENT";
$mail->Body = "
    Demande dun montant de <b>".number_format($montant_demande_decaissement,0,',',' ')." FCFA</b> 
    pour <b>".$motif_demande_decaissement."</b> a payer par 
    <b>".$mode_reglement."</b>  
    Veuillez cliquer sur <a href='https://app.stt.ci'><button class='btn btn-success'>CE LIEN</button></a> 
    Pour laccepter ou la refuser.
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


//DG
//Envoi sms NOTIF 

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://panel.smsing.app/smsAPI?sendsms=null&apikey=IbILNr1bs1sCV1RNuvaB7amMDS9cUGG3&apitoken=bOdV1680020257&type=sms&from=STTCI&to=2250757290429&text=URGENT%20!!!%20Demande%20de%20d%C3%A9caissement%20d%27un%20montant%20de%20'.$montant_demande_decaissement.'%20%C3%A9mise%20par%20STT-CI%20%20veuillez%20cliquer%20sur%20https%3A%2F%2Fapp.stt.ci%2F%20pour%20la%20consulter.%20Merci',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'GET',
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;

//Fin sms NOTIF 

//RH
//Envoi sms NOTIF 

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://panel.smsing.app/smsAPI?sendsms=null&apikey=IbILNr1bs1sCV1RNuvaB7amMDS9cUGG3&apitoken=bOdV1680020257&type=sms&from=STTCI&to=2250507240169&text=URGENT%20!!!%20Demande%20de%20d%C3%A9caissement%20d%27un%20montant%20de%20'.$montant_demande_decaissement.'%20%C3%A9mise%20par%20STT-CI%20%20veuillez%20cliquer%20sur%20https%3A%2F%2Fapp.stt.ci%2F%20pour%20la%20consulter.%20Merci',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'GET',
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;

//Fin sms NOTIF 





unset($con);

?>