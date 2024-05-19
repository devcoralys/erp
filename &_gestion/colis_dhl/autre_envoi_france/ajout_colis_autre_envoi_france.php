<?php
session_start();

include('../../../connex.php');

$nbre_colis_colis_dhl=$_POST["nbre_colis_colis_dhl"];
$nbre_article=$_POST["nbre_article"];
$nature_colis_colis_dhl=addslashes($_POST["nature_colis_colis_dhl"]);
$poids_colis_colis_dhl=$_POST["poids_colis_colis_dhl"];
$pu_colis_colis_dhl=$_POST["pu_colis_colis_dhl"];
$emballage_colis_colis_dhl=$_POST["emballage_colis_colis_dhl"];
//$colis_dhl_time=$_SESSION['time'];
$colis_dhl_time=$_POST['time_colis_dhl'];

//$montant_assurance=$_POST['montant_assurance'];

$date=date("Y-m-d H:i:s");


$n=$con->query('SELECT * FROM colis_colis_dhl');
$n->execute();
$nb=$n->rowcount();

$nb++;

$num_colis_colis_dhl='STT-COL'.date("YmdHis").'/0'.$nb;

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

$req=$con->prepare("INSERT INTO colis_colis_dhl(nbre_colis_colis_dhl, nature_colis_colis_dhl, poids_colis_colis_dhl, pu_colis_colis_dhl, colis_dhl_time, date_creat_colis_colis_dhl, secur_ajout_colis_colis_dhl, nbre_article, emballage_colis_colis_dhl) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I)");
$req->execute(array('A'=>$nbre_colis_colis_dhl, 'B'=>$nature_colis_colis_dhl, 'C'=>$poids_colis_colis_dhl, 'D'=>$pu_colis_colis_dhl, 'E'=>$colis_dhl_time, 'F'=>$date, 'G'=>$_SESSION['secur_site'], 'H'=>$nbre_article, 'I'=>$emballage_colis_colis_dhl));
echo'0';

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Ajout de <b>".$nbre_colis_colis_dhl."</b> colis_colis_dhl de nature <b>".$nature_colis_colis_dhl."</b> composé de <b>".$nbre_article."</b> article au colis_dhl N° <b>".$colis_dhl_time."</b> ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
/*
}
*/
unset($con);

?>