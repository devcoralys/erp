<?php
session_start();

include('../../../connex.php');
$id_colis_maritime=$_GET['id_colis_maritime'];
$etat=1;

$inf=$con->prepare('SELECT * FROM colis_maritime WHERE id_colis_maritime=:A');
$inf->execute(array('A'=>$id_colis_maritime));
$info=$inf->fetch();


$code_colis_colis_maritime=$info['num_colis_maritime'];
$destinataire_colis_colis_maritime=$info['destinataire_colis_maritime'];
$destination_colis_colis_maritime=$info['destination_colis_maritime'];
$expediteur_colis_colis_maritime=$info['expediteur_colis_maritime'];

$tel_expediteur=$info['tel_expediteur_colis_maritime'];
$tel_destinataire=$info['tel_destinataire_colis_maritime'];


        $nbre_colis_colis_maritime=0;
        $nco1=$con->prepare(" SELECT * FROM colis_maritime LEFT JOIN colis_colis_maritime ON colis_maritime.time_colis_maritime=colis_colis_maritime.colis_maritime_time WHERE id_colis_maritime='".$id_colis_maritime."' ");
        $nco1->execute();
        while($info_nco=$nco1->fetch())
        {
            $nbre_colis_colis_maritime=$nbre_colis_colis_maritime+$info_nco['nbre_colis_colis_maritime'];
        }	




$msg = '

Bonsoir '.$expediteur_colis_colis_maritime.' ,
Votre envoie N° '.$code_colis_colis_maritime.'est arrivé
Destinataire : '.$destinataire_colis_colis_maritime.'
Nbre colis_colis_maritime : '.$nbre_colis_colis_maritime.'
Adresse entrepôt : '.$destination_colis_colis_maritime.'

Nos Agences Abidjan: AÉROPORT - ADJAME 
Jours de Départ : Mercredi jeudi vendredi et dimanche

vous pouvez visiter notre plateforme a l\'adresse https://stt-ci.com
Merci.

';
/*
$msg='

Test

';
*/
$tel_dest='2250748367710';



//Envoi sms NOTIF EXPEDITEUR

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://panel.smsing.app/smsAPI?sendsms=null&apikey=IbILNr1bs1sCV1RNuvaB7amMDS9cUGG3&apitoken=bOdV1680020257&type=sms&from=STTCI&to=225'.$tel_expediteur.'&text=Bonjour%2C%0AVotre%20colis%20N%C2%B0%20'.$code_colis_colis_maritime.'%20est%20arriv%C3%A9%0ANombre%20%3A%20'.$nbre_colis_colis_maritime.'%0AAdresse%20entrep%C3%B4t%20%3A%201%20Avenue%20Louis%20Bl%C3%A9riot%2093120%20La%20Courneuve%20Porte%20A26%0ATel%20%3A%2033777444001%0A%0ANos%20Agences%20Abidjan%3A%20A%C3%89ROPORT%20-%20ADJAME%20RENAULT%20%2C%20tel%202721580978-%200757290429-%200500200376-0507213727-%200500200474%0AJours%20de%20D%C3%A9part%20%3A%20Mercredi%20jeudi%20vendredi%20et%20dimanche%0A%0AVeuillez%20cliquer%20sur%20le%20lien%20ci-dessous%20pour%20la%20facture%0Ahttps%3A%2F%2Fapp.stt.ci%2Fverification_envoi.php',
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

$req=$con->prepare('UPDATE colis_maritime SET colis_colis_maritime_arrive=1, sms_envoye=1 WHERE id_colis_maritime=:A');
$req->execute(array('A'=>$id_colis_maritime));

echo'0';

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Notification d'arrivee du colis_colis_maritime  N° <b>".$id_colis_maritime."</b>";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


// if($tel_expediteur!=$tel_destinataire)
// {
// //Envoi sms NOTIF DESTINATAIRE

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://panel.smsing.app/smsAPI?sendsms=null&apikey=IbILNr1bs1sCV1RNuvaB7amMDS9cUGG3&apitoken=bOdV1680020257&type=sms&from=STTCI&to=225'.$tel_destinataire.'&text=Bonjour%2C%0AVotre%20colis_colis_maritime%20N%C2%B0%20'.$code_colis_colis_maritime.'%20est%20arriv%C3%A9%0ANombre%20%3A%20'.$nbre_colis_colis_maritime.'%0AAdresse%20entrep%C3%B4t%20%3A%201%20Avenue%20Louis%20Bl%C3%A9riot%2093120%20La%20Courneuve%20Porte%20A26%0ATel%20%3A%2033777444001%0A%0ANos%20Agences%20Abidjan%3A%20A%C3%89ROPORT%20-%20ADJAME%20RENAULT%20%2C%20tel%202721580978-%200757290429-%200500200376-0507213727-%200500200474%0AJours%20de%20D%C3%A9part%20%3A%20Mercredi%20jeudi%20vendredi%20et%20dimanche%0A%0AVeuillez%20cliquer%20sur%20le%20lien%20ci-dessous%20pour%20la%20facture%0Ahttps%3A%2F%2Fapp.stt.ci%2Fverification.php',
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

// //Fin sms NOTIF DESTINATAIRE
// }




unset($con);


header('Location: ../colis_maritime.php');

?>