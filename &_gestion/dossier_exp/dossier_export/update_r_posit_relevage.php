<?php
session_start();
$time_dossier=time();
include('../../../connex.php');


$date=gmdate("Y-m-d H:i:s");

$r_posit_relevage=addslashes($_POST['r_posit_relevage']);


if($r_posit_relevage!='')
{
$req=$con->prepare("UPDATE dossier_exp SET r_posit_relevage=:A WHERE id_dossier=:B");
$req->execute(array('A'=>$r_posit_relevage, 'B'=>$_SESSION['ref_dos']));


$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$dos=$con->prepare('SELECT * FROM dossier_exp WHERE id_dossier=:A');
$dos->execute(array('A'=>$_SESSION['ref_dos']));
$idos=$dos->fetch();
$num_dossier=$idos['num_dossier'];

$lib_trace="Mise a jour montant reel <b>posit_relevage</b> dossier N <b>".$num_dossier."</b> ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

echo'0';
unset($con);
}
 
?>