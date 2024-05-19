<?php
session_start();

include('../../../connex.php');
$ido=$_SESSION['id_colis_autre_envoi_sup'];



$reb=$con->prepare("SELECT * FROM colis_autre_envoi LEFT JOIN autre_envoi ON colis_autre_envoi.autre_envoi_time=autre_envoi.time_autre_envoi WHERE id_colis_autre_envoi=:A"); 
$reb->execute(array('A' =>$ido));
$utib=$reb->fetch();


$req=$con->prepare("DELETE FROM colis_autre_envoi WHERE id_colis_autre_envoi=:J");
$req->execute(array('J'=>$ido));

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Suppression de  <b>".stripslashes($utib['poids_colis_autre_envoi'])."</b> Kg du colis_autre_envoi <b>".stripslashes($utib['nature_colis_autre_envoi'])."</b> du autre_envoi N° <b>".stripslashes($utib['num_autre_envoi'])."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
 
echo'0';

//unset($_SESSION['id_colis_autre_envoi_sup']);
//unset($con);

//header('Location: detail_autre_envoi.php?id_autre_envoi='.$_SESSION['id_autre_envoi']);

?>