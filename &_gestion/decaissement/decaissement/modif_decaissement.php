<?php
session_start();
include('../../../connex.php');

$date_decaissement=$_POST['date_decaissement'];
$num_recu_decaissement=$_POST['num_recu_decaissement'];
$num_dossier_decaissement=$_POST['num_dossier_decaissement'];
$nom_client_decaissement=addslashes($_POST['nom_client_decaissement']);
$montant_decaissement=$_POST['montant_decaissement'];
$motif_decaissement=addslashes($_POST['motif_decaissement']);
$mode_reglement=addslashes($_POST['mode_reglement']);

$date=gmdate("Y-m-d H:i:s");

$req=$con->prepare("UPDATE decaissement SET date_decaissement=:A, num_recu_decaissement=:B, num_dossier_decaissement=:C, nom_client_decaissement=:D, montant_decaissement=:E, motif_decaissement=:F, mode_reglement_decaissement=:G WHERE id_decaissement=:H");
$req->execute(array('A'=>$date_decaissement, 'B'=>$num_recu_decaissement, 'C'=>$num_dossier_decaissement, 'D'=>$nom_client_decaissement, 'E'=>$montant_decaissement, 'F'=>$motif_decaissement, 'G'=>$mode_reglement, 'H'=>$_SESSION['id_dec_mod']));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Modification decaissement recu N* <b>".$num_recu_decaissement." FCFA</b> ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

unset($_SESSION['id_dec_mod']);
unset($con);

?>