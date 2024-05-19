<?php
session_start();

include('../../../connex.php');
$ido=$_SESSION['id_colis_sup'];



$reb=$con->prepare("SELECT * FROM colis LEFT JOIN groupage ON colis.groupage_time=groupage.time_groupage WHERE id_colis=:A"); 
$reb->execute(array('A' =>$ido));
$utib=$reb->fetch();


$req=$con->prepare("DELETE FROM colis WHERE id_colis=:J");
$req->execute(array('J'=>$ido));

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Suppression de  <b>".stripslashes($utib['poids_colis'])."</b> Kg du colis <b>".stripslashes($utib['nature_colis'])."</b> du groupage N° <b>".stripslashes($utib['num_groupage'])."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
 
echo'0';

//unset($_SESSION['id_colis_sup']);
//unset($con);

//header('Location: detail_groupage.php?id_groupage='.$_SESSION['id_groupage']);

?>