<?php
session_start();
$time_dossier=time();
include('../../../connex.php');


$date=gmdate("Y-m-d H:i:s");

$r_liquidation=addslashes($_POST['r_liquidation']);


if($r_liquidation!='')
{
$req=$con->prepare("UPDATE dossier SET r_liquidation=:A WHERE id_dossier=:B");
$req->execute(array('A'=>$r_liquidation, 'B'=>$_SESSION['ref_dos']));


$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Ajout r_liquidation dossier N° ".$_SESSION['ref_dos']." ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

echo'0';
unset($con);
}
 
?>