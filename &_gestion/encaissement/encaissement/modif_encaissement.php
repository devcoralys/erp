<?php
session_start();
include('../../../connex.php');

$date_encaissement=$_POST['date_encaissement'];
$num_recu_encaissement=$_POST['num_recu_encaissement'];
$num_dossier_encaissement=$_POST['num_dossier_encaissement'];
$nom_client_encaissement=addslashes($_POST['nom_client_encaissement']);
$montant_encaissement=$_POST['montant_encaissement'];
$motif_encaissement=addslashes($_POST['motif_encaissement']);
$mode_reglement=addslashes($_POST['mode_reglement']);

$date=gmdate("Y-m-d H:i:s");

$req=$con->prepare("UPDATE encaissement SET date_encaissement=:A, num_recu_encaissement=:B, num_dossier_encaissement=:C, nom_client_encaissement=:D, montant_encaissement=:E, motif_encaissement=:F, mode_reglement_encaissement=:G WHERE id_encaissement=:H");
$req->execute(array('A'=>$date_encaissement, 'B'=>$num_recu_encaissement, 'C'=>$num_dossier_encaissement, 'D'=>$nom_client_encaissement, 'E'=>$montant_encaissement, 'F'=>$motif_encaissement, 'G'=>$mode_reglement, 'H'=>$_SESSION['id_enc_mod']));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Modification encaissement recu N* <b>".$num_recu_encaissement." FCFA</b> ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

unset($_SESSION['id_enc_mod']);
unset($con);

?>