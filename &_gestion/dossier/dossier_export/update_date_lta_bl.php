<?php
session_start();
$time_dossier=time();
include('../../../connex.php');


$date=gmdate("Y-m-d H:i:s");

$date_lta_bl=addslashes($_POST['date_lta_bl']);


if($date_lta_bl!='')
{
$req=$con->prepare("UPDATE dossier SET date_lta_bl=:A WHERE id_dossier=:B");
$req->execute(array('A'=>$date_lta_bl, 'B'=>$_SESSION['ref_dos']));


$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Ajout date_lta_bl dossier N° ".$_SESSION['ref_dos']." ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

echo'0';
unset($con);
}
 
?>