<?php
session_start();
include('../../../connex.php');

$id_besoin = $_POST["refus_ref"];
$date_refus=gmdate('Y-m-d H:i:s');

$motif_decision = $_POST["motif_decision"];

if($_SESSION['is_dg']==1)
{
$liv=$con->prepare('UPDATE besoin SET secur_refus_2=:A, date_refus_2=:B, etat_besoin=4, motif_decision=:D WHERE id_besoin=:C ');
$liv->execute(array('A'=>$_SESSION['secur_site'], 'B'=>$date_refus, 'C'=>$id_besoin, 'D'=>$motif_decision));
}
else
{
$liv=$con->prepare('UPDATE besoin SET secur_refus_1=:A, date_refus_1=:B, etat_besoin=4, motif_decision=:D  WHERE id_besoin=:C ');
$liv->execute(array('A'=>$_SESSION['secur_site'], 'B'=>$date_refus, 'C'=>$id_besoin, 'D'=>$motif_decision));
}

//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$be=$con->prepare('SELECT * FROM besoin WHERE id_besoin=:A');
$be->execute(array('A'=>$id_besoin));
$ibe=$be->fetch();
$num_fiche=$ibe['num_fiche'];
$objet_demande=$ibe['objet_demande'];

$lib_trace="Refus de la fiche N° <b>".$num_fiche."</b> pour  <b>".$objet_demande."</b> | Motif : <b>".$motif_decision."</b>";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

?>
