<?php
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
*/
session_start();

include('../../../connex.php');
$id_colis_dhl=$_SESSION['id_colis_dhl'];
$etat=1;


$req=$con->prepare('UPDATE colis_dhl SET etat_colis_dhl=:A WHERE id_colis_dhl=:B');
$req->execute(array('A'=>$etat, 'B'=>$id_colis_dhl));

echo'0';

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Cloture de la saisie du colis_dhl  N° <b>".$id_colis_dhl."</b>";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

//Envoi sms NOTIF EXPEDITEUR
$inf_group=$con->prepare('SELECT * FROM colis_dhl WHERE id_colis_dhl=:A');
$inf_group->execute(array('A'=>$id_colis_dhl));
$info=$inf_group->fetch();
$nom_expediteur=$info['expediteur_colis_dhl'];
$tel_expediteur=$info['tel_expediteur_colis_dhl'];
$code_colis_colis_dhl=$info['num_colis_dhl'];

        $nbre_colis_colis_dhl=0;
        $nco1=$con->prepare(" SELECT * FROM colis_dhl LEFT JOIN colis_colis_dhl ON colis_dhl.time_colis_dhl=colis_colis_dhl.colis_dhl_time WHERE id_colis_dhl='".$id_colis_dhl."' ");
        $nco1->execute();
        while($info_nco=$nco1->fetch())
        {
            $nbre_colis_colis_dhl=$nbre_colis_colis_dhl+$info_nco['nbre_colis_colis_dhl'];
        }	


// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://panel.smsing.app/smsAPI?sendsms=null&apikey=IbILNr1bs1sCV1RNuvaB7amMDS9cUGG3&apitoken=bOdV1680020257&type=sms&from=STTCI&to=225'.$tel_expediteur.'&text='.$nom_expediteur.'%2C%0AVotre%20envoi%20N%C2%B0%20'.$code_colis_colis_dhl.'%20a%20bien%20%C3%A9t%C3%A9%20enregistr%C3%A9%20et%20sera%20trait%C3%A9%20dans%20les%20plus%20brefs%20d%C3%A9lais.%0ANbre%20colis%20%3A%20'.$nbre_colis_colis_dhl.'%0A%0AVeuillez%20cliquer%20sur%20le%20lien%20ci-dessous%20pour%20la%20facture%0Ahttps%3A%2F%2Fapp.stt.ci%2Fverification.php%0A%0ASTTCI%20vous%20remercie%20!',
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

//Fin sms NOTIF EXPEDITEUR


unset($con);


?>