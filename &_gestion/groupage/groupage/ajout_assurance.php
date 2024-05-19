<?php
session_start();

include('../../../connex.php');

$valeur_colis=$_POST["valeur_colis"];
$montant_assurance=$_POST["montant_assurance"];


$date=date("Y-m-d H:i:s");

$req=$con->prepare("UPDATE groupage SET valeur_colis=:A, montant_assurance=:B WHERE id_groupage=:C");
$req->execute(array('A'=>$valeur_colis, 'B'=>$montant_assurance, 'C'=>$_SESSION['id_groupage']));
echo'0';

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Souscription a une assurance dune valeur de <b>".$montant_assurance."</b> au groupage N° <b>".$groupage_time."</b> ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

unset($con);

?>