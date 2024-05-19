<?php
session_start();

include('../../../connex.php');
$ido=$_SESSION['id_colis_colis_fret_sup'];



$reb=$con->prepare("SELECT * FROM colis_colis_fret LEFT JOIN colis_fret ON colis_colis_fret.colis_fret_time=colis_fret.time_colis_fret WHERE id_colis_colis_fret=:A"); 
$reb->execute(array('A' =>$ido));
$utib=$reb->fetch();


$req=$con->prepare("DELETE FROM colis_colis_fret WHERE id_colis_colis_fret=:J");
$req->execute(array('J'=>$ido));

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Suppression de  <b>".stripslashes($utib['poids_colis_colis_fret'])."</b> Kg du colis_colis_fret <b>".stripslashes($utib['nature_colis_colis_fret'])."</b> du colis_fret N° <b>".stripslashes($utib['num_colis_fret'])."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
 
echo'0';

//unset($_SESSION['id_colis_colis_fret_sup']);
//unset($con);

//header('Location: detail_colis_fret.php?id_colis_fret='.$_SESSION['id_colis_fret']);

?>