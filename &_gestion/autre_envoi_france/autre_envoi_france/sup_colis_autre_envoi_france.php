<?php
session_start();

include('../../../connex.php');
$ido=$_SESSION['id_colis_autre_envoi_france_sup'];



$reb=$con->prepare("SELECT * FROM colis_autre_envoi_france LEFT JOIN autre_envoi_france ON colis_autre_envoi_france.autre_envoi_france_time=autre_envoi_france.time_autre_envoi_france WHERE id_colis_autre_envoi_france=:A"); 
$reb->execute(array('A' =>$ido));
$utib=$reb->fetch();


$req=$con->prepare("DELETE FROM colis_autre_envoi_france WHERE id_colis_autre_envoi_france=:J");
$req->execute(array('J'=>$ido));

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Suppression de  <b>".stripslashes($utib['poids_colis_autre_envoi_france'])."</b> Kg du colis_autre_envoi_france <b>".stripslashes($utib['nature_colis_autre_envoi_france'])."</b> du autre_envoi_france N° <b>".stripslashes($utib['num_autre_envoi_france'])."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
 
echo'0';

//unset($_SESSION['id_colis_autre_envoi_france_sup']);
//unset($con);

//header('Location: detail_autre_envoi_france.php?id_autre_envoi_france='.$_SESSION['id_autre_envoi_france']);

?>