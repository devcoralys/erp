<?php
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
*/
session_start();

include('../../../connex.php');
$id_groupage=$_SESSION['id_groupage'];
$etat=1;

$req=$con->prepare('UPDATE groupage SET etat_groupage=:A WHERE id_groupage=:B');
$req->execute(array('A'=>$etat, 'B'=>$id_groupage));

echo'0';

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Cloture de la saisie du groupage  N° <b>".$id_groupage."</b>";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


//Envoi sms NOTIF EXPEDITEUR
$inf_group=$con->prepare('SELECT * FROM groupage WHERE id_groupage=:A');
$inf_group->execute(array('A'=>$id_groupage));
$info=$inf_group->fetch();
$nom_expediteur=$info['expediteur_groupage'];
$tel_expediteur=$info['tel_expediteur_groupage'];
$code_colis=$info['num_groupage'];

        $nbre_colis=0;
        $nco1=$con->prepare(" SELECT * FROM groupage LEFT JOIN colis ON groupage.time_groupage=colis.groupage_time WHERE id_groupage='".$id_groupage."' ");
        $nco1->execute();
        while($info_nco=$nco1->fetch())
        {
            $nbre_colis=$nbre_colis+$info_nco['nbre_colis'];
        }	


// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://panel.smsing.app/smsAPI?sendsms=null&apikey=IbILNr1bs1sCV1RNuvaB7amMDS9cUGG3&apitoken=bOdV1680020257&type=sms&from=STTCI&to=225'.$tel_expediteur.'&text='.$nom_expediteur.'%2C%0AVotre%20envoi%20N%C2%B0%20'.$code_colis.'%20a%20bien%20%C3%A9t%C3%A9%20enregistr%C3%A9%20et%20sera%20trait%C3%A9%20dans%20les%20plus%20brefs%20d%C3%A9lais.%0ANbre%20colis%20%3A%20'.$nbre_colis.'%0A%0AVeuillez%20cliquer%20sur%20le%20lien%20ci-dessous%20pour%20la%20facture%0Ahttps%3A%2F%2Fapp.stt.ci%2Fverification.php%0A%0ASTTCI%20vous%20remercie%20!',
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