<?php
session_start();

include('../../../connex.php');

$nbre_colis_autre_envoi=$_POST["nbre_colis_autre_envoi"];
$nbre_article=$_POST["nbre_article"];
$nature_colis_autre_envoi=addslashes($_POST["nature_colis_autre_envoi"]);
$poids_colis_autre_envoi=$_POST["poids_colis_autre_envoi"];
$pu_colis_autre_envoi=$_POST["pu_colis_autre_envoi"];
$emballage_colis_autre_envoi=$_POST["emballage_colis_autre_envoi"];
//$autre_envoi_time=$_SESSION['time'];
$autre_envoi_time=$_POST['time_autre_envoi'];

//$montant_assurance=$_POST['montant_assurance'];

$date=date("Y-m-d H:i:s");


$n=$con->query('SELECT * FROM colis_autre_envoi');
$n->execute();
$nb=$n->rowcount();

$nb++;

$num_colis_autre_envoi='STT-COL'.date("YmdHis").'/0'.$nb;

/*
$sqlQuery 	= $con->query("SELECT * FROM caisse WHERE lib_caisse='".$lib_caisse."' ");
$count  	= $sqlQuery->rowCount();


$n=$con->query('SELECT * FROM caisse');
$n->execute();
$nb=$n->rowcount();

$num_caisse='ZP/CLI00'.$nb;

if($count>0)
{
echo'1';
}
else
{
    */

$req=$con->prepare("INSERT INTO colis_autre_envoi(nbre_colis_autre_envoi, nature_colis_autre_envoi, poids_colis_autre_envoi, pu_colis_autre_envoi, autre_envoi_time, date_creat_colis_autre_envoi, secur_ajout_colis_autre_envoi, nbre_article, emballage_colis_autre_envoi) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I)");
$req->execute(array('A'=>$nbre_colis_autre_envoi, 'B'=>$nature_colis_autre_envoi, 'C'=>$poids_colis_autre_envoi, 'D'=>$pu_colis_autre_envoi, 'E'=>$autre_envoi_time, 'F'=>$date, 'G'=>$_SESSION['secur_site'], 'H'=>$nbre_article, 'I'=>$emballage_colis_autre_envoi));
echo'0';

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Ajout de <b>".$nbre_colis_autre_envoi."</b> colis_autre_envoi de nature <b>".$nature_colis_autre_envoi."</b> composé de <b>".$nbre_article."</b> article au autre_envoi N° <b>".$autre_envoi_time."</b> ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
/*
}
*/
unset($con);

?>