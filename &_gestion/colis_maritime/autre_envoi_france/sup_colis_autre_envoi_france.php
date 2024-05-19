<?php
session_start();

include('../../../connex.php');
$ido=$_SESSION['id_colis_colis_maritime_sup'];



$reb=$con->prepare("SELECT * FROM colis_colis_maritime LEFT JOIN colis_maritime ON colis_colis_maritime.colis_maritime_time=colis_maritime.time_colis_maritime WHERE id_colis_colis_maritime=:A"); 
$reb->execute(array('A' =>$ido));
$utib=$reb->fetch();


$req=$con->prepare("DELETE FROM colis_colis_maritime WHERE id_colis_colis_maritime=:J");
$req->execute(array('J'=>$ido));

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Suppression de  <b>".stripslashes($utib['poids_colis_colis_maritime'])."</b> Kg du colis_colis_maritime <b>".stripslashes($utib['nature_colis_colis_maritime'])."</b> du colis_maritime N° <b>".stripslashes($utib['num_colis_maritime'])."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
 
echo'0';

//unset($_SESSION['id_colis_colis_maritime_sup']);
//unset($con);

//header('Location: detail_colis_maritime.php?id_colis_maritime='.$_SESSION['id_colis_maritime']);

?>