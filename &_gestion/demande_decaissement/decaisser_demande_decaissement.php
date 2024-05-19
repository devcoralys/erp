<?php
session_start();
include('../../connex.php');


$date=gmdate("Y-m-d H:i:s");

$_SESSION['id_accepte']=$_GET['id_decaisse'];

$req=$con->prepare("UPDATE demande_decaissement SET etat_demande=3, secur_decaisse_demande_decaissement=:A, date_decaisse_demande_decaissement=:B WHERE id_demande_decaissement=:C ");
$req->execute(array('A'=>$_SESSION['secur_site'], 'B'=>$date,'C'=>$_SESSION['id_accepte']));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Decaissement de la demande N° <b>".$_SESSION['id_accepte']."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


header('Location: demande_decaissement.php');

unset($_SESSION['id_accepte']);
unset($con);

?>