<?php
session_start();

include('../../../connex.php');
$ido=$_SESSION['id_colis_colis_dhl_sup'];



$reb=$con->prepare("SELECT * FROM colis_colis_dhl LEFT JOIN colis_dhl ON colis_colis_dhl.colis_dhl_time=colis_dhl.time_colis_dhl WHERE id_colis_colis_dhl=:A"); 
$reb->execute(array('A' =>$ido));
$utib=$reb->fetch();


$req=$con->prepare("DELETE FROM colis_colis_dhl WHERE id_colis_colis_dhl=:J");
$req->execute(array('J'=>$ido));

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Suppression de  <b>".stripslashes($utib['poids_colis_colis_dhl'])."</b> Kg du colis_colis_dhl <b>".stripslashes($utib['nature_colis_colis_dhl'])."</b> du colis_dhl N° <b>".stripslashes($utib['num_colis_dhl'])."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
 
echo'0';

//unset($_SESSION['id_colis_colis_dhl_sup']);
//unset($con);

//header('Location: detail_colis_dhl.php?id_colis_dhl='.$_SESSION['id_colis_dhl']);

?>