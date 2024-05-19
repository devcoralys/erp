<?php
session_start();
$time_dossier=time();
include('../../../connex.php');

$date=gmdate("Y-m-d H:i:s");

$num_container=$_POST['num_container'];
$type_container=$_POST['type_container'];
$taille_container=$_POST['taille_container'];
$num_scelle_container=$_POST['num_scelle_container'];

$dos_id=$_SESSION['ref_dos'];

$req=$con->prepare("INSERT INTO container(num_container, type_container, taille_container, num_scelle_container, dossier_id_container) VALUES (:A, :B, :C, :D, :E)");
$req->execute(array('A'=>$num_container, 'B'=>$type_container, 'C'=>$taille_container, 'D'=>$num_scelle_container, 'E'=>$dos_id));

echo'0';


$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Ajout container au dossier N° ".$_SESSION['ref_dos']." ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

unset($con);
?>