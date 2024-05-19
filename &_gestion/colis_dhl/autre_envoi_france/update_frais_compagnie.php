<?php
session_start();
include('../../../connex.php');


$date=gmdate("Y-m-d H:i:s");

$frais_compagnie=addslashes($_POST['frais_compagnie']);


if($frais_compagnie!='')
{
$req=$con->prepare("UPDATE colis_dhl SET frais_compagnie=:A WHERE id_colis_dhl=:B");
$req->execute(array('A'=>$frais_compagnie, 'B'=>$_SESSION['id_colis_dhl']));


$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Mise à jour frais de compagnie | valeur des frais : <b>".$frais_compagnie."</b> pour ENVOI N° <b>".$_SESSION['id_colis_dhl']."</b> ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

echo'0';
unset($con);
}
 
?>