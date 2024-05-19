<?php
session_start();
$time_dossier=time();
include('../../../connex.php');


$date=gmdate("Y-m-d H:i:s");

$transport_deja_paye=addslashes($_POST['transport_deja_paye']);
$montant_transport=addslashes($_POST['montant_transport']);


if($transport_deja_paye!='' && $montant_transport!='')
{
$req=$con->prepare("UPDATE dossier SET transport_deja_paye=:A, montant_transport=:B WHERE id_dossier=:C");
$req->execute(array('A'=>$transport_deja_paye, 'B'=>$montant_transport, 'C'=>$_SESSION['ref_dos']));


$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Ajout transport au dossier N° ".$_SESSION['ref_dos']." ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

echo'0';
unset($con);
}
 
?>