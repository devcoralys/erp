<?php
session_start();
include('../../../connex.php');

$date=gmdate("Y-m-d H:i:s");


$dd=$caf*$taux;

$dos_id=$_SESSION['ref_dos'];

$req=$con->prepare("UPDATE dossier_exp SET cotation_soumise=1 WHERE id_dossier=:A");
$req->execute(array('A'=>$_SESSION['ref_dos']));

echo'0';


$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Soumission à validation de la cotation du dossier N째 ".$_SESSION['ref_dos']." ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


unset($con);

header('Location: ../exportation/pdf/pdf_cotation.php');
?>