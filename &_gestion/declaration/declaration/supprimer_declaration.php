<?php
session_start();
include('../../../connex.php');



$date=gmdate("Y-m-d H:i:s");
$id_declaration=$_GET['id_dec_sup'];



$req=$con->prepare("DELETE FROM declaration WHERE id_declaration=:A");
$req->execute(array('A'=>$id_declaration));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Suppression Declaration  N* <b>".$id_declaration."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


unset($con);
unset($_GET['id_declaration']);

header('Location: ../declaration.php');

?>