<?php
session_start();

include('../../../connex.php');
$ido=$_SESSION['id_fournisseur_sup'];

$red=$con->prepare("SELECT * FROM dossier WHERE fournisseur_id=:A"); 
$red->execute(array('A' =>$ido));
$count = $red->rowCount();
$uti=$red->fetch();

$reb=$con->prepare("SELECT * FROM fournisseur WHERE id_fournisseur=:A"); 
$reb->execute(array('A' =>$ido));
$utib=$reb->fetch();

if($count>0)
{
echo'1';
}
else
{

$req=$con->prepare("DELETE FROM fournisseur WHERE id_fournisseur=:J");
$req->execute(array('J'=>$ido));

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Suppression fournisseur (".stripslashes($utib['code_fournisseur']).") ".stripslashes($utib['nom_fournisseur'])."  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
 
echo'0';

unset($_SESSION['id_fournisseur_sup']);
unset($con);
}
?>