<?php
session_start();
include('../../../connex.php');

$date_demande_decaissement=$_POST['date_demande_decaissement'];
$num_recu_demande_decaissement=$_POST['num_recu_demande_decaissement'];
$num_dossier_demande_decaissement=$_POST['num_dossier_demande_decaissement'];
$nom_client_demande_decaissement=addslashes($_POST['nom_client_demande_decaissement']);
$montant_demande_decaissement=$_POST['montant_demande_decaissement'];
$motif_demande_decaissement=addslashes($_POST['motif_demande_decaissement']);
$mode_reglement=addslashes($_POST['mode_reglement']);

$date=gmdate("Y-m-d H:i:s");

$req=$con->prepare("UPDATE demande_decaissement SET date_demande_decaissement=:A, montant_demande_decaissement=:E, motif_demande_decaissement=:F, mode_reglement_demande_decaissement=:G WHERE id_demande_decaissement=:H");
$req->execute(array('A'=>$date_demande_decaissement, 'E'=>$montant_demande_decaissement, 'F'=>$motif_demande_decaissement, 'G'=>$mode_reglement, 'H'=>$_SESSION['id_enc_mod']));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Modification demande_decaissement pour <b>".$motif_demande_decaissement." FCFA</b> ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

unset($_SESSION['id_enc_mod']);
unset($con);

?>