<?php
session_start();
$time_dossier=time();
include('../../../connex.php');

$date=gmdate("Y-m-d H:i:s");

$code_tarifaire=$_POST['code_tarifaire'];
$fob_euro=$_POST['fob_euro'];
$fob_cfa=$_POST['fob_cfa'];
$fret=$_POST['fret'];
$ass=$_POST['ass'];
$caf=$_POST['caf'];
$taux=$_POST['taux'];

$dd=$caf*$taux;

$dos_id=$_SESSION['ref_dos'];

$req=$con->prepare("INSERT INTO article(code_tarifaire, fob_euro, fob_cfa, fret, ass, caf, taux, dossier_id, dd) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I)");
$req->execute(array('A'=>$code_tarifaire, 'B'=>$fob_euro, 'C'=>$fob_cfa, 'D'=>$fret, 'E'=>$ass, 'F'=>$caf, 'G'=>$taux, 'H'=>$dos_id, 'I'=>$dd));

echo'0';


$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Ajout article au dossier N° ".$_SESSION['ref_dos']." ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


unset($con);
?>