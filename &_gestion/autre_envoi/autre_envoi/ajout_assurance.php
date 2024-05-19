<?php
session_start();

include('../../../connex.php');

$valeur_colis_autre_envoi=$_POST["valeur_colis_autre_envoi"];
$montant_assurance=$_POST["montant_assurance"];


$date=date("Y-m-d H:i:s");

$req=$con->prepare("UPDATE autre_envoi SET valeur_colis_autre_envoi=:A, montant_assurance=:B WHERE id_autre_envoi=:C");
$req->execute(array('A'=>$valeur_colis_autre_envoi, 'B'=>$montant_assurance, 'C'=>$_SESSION['id_autre_envoi']));
echo'0';

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Souscription a une assurance dune valeur de <b>".$montant_assurance."</b> au autre_envoi N° <b>".$autre_envoi_time."</b> ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

unset($con);

?>