<?php
session_start();
include('../../../connex.php');

$date_caisse=$_POST['date_caisse'];
$num_recu_caisse=$_POST['num_recu_caisse'];
$num_dossier_caisse=$_POST['num_dossier_caisse'];
$nom_client_caisse=addslashes($_POST['nom_client_caisse']);
$montant_caisse=$_POST['montant_caisse'];
$motif_caisse=addslashes($_POST['motif_caisse']);
$mode_reglement=addslashes($_POST['mode_reglement']);

$date=gmdate("Y-m-d H:i:s");

$req=$con->prepare("UPDATE caisse SET date_caisse=:A, num_recu_caisse=:B, num_dossier_caisse=:C, nom_client_caisse=:D, montant_caisse=:E, motif_caisse=:F, mode_reglement_caisse=:G WHERE id_caisse=:H");
$req->execute(array('A'=>$date_caisse, 'B'=>$num_recu_caisse, 'C'=>$num_dossier_caisse, 'D'=>$nom_client_caisse, 'E'=>$montant_caisse, 'F'=>$motif_caisse, 'G'=>$mode_reglement, 'H'=>$_SESSION['id_dec_mod']));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Modification caisse recu N* <b>".$num_recu_caisse." FCFA</b> ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

unset($_SESSION['id_dec_mod']);
unset($con);

?>