<?php
session_start();

include('../../../connex.php');

$nbre_colis=$_POST["nbre_colis"];
$nbre_article=$_POST["nbre_article"];
$nature_colis=addslashes($_POST["nature_colis"]);
$poids_colis=$_POST["poids_colis"];
$pu_colis=$_POST["pu_colis"];
$emballage_colis=$_POST["emballage_colis"];
//$groupage_time=$_SESSION['time'];
$groupage_time=$_POST['time_groupage'];

//$montant_assurance=$_POST['montant_assurance'];

$date=date("Y-m-d H:i:s");


$n=$con->query('SELECT * FROM colis');
$n->execute();
$nb=$n->rowcount();

$num_colis='STT-COL'.date("YmdHis").'/0'.$nb+1;

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

$req=$con->prepare("INSERT INTO colis(nbre_colis, nature_colis, poids_colis, pu_colis, groupage_time, date_creat_colis, secur_ajout_colis, nbre_article, emballage_colis) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I)");
$req->execute(array('A'=>$nbre_colis, 'B'=>$nature_colis, 'C'=>$poids_colis, 'D'=>$pu_colis, 'E'=>$groupage_time, 'F'=>$date, 'G'=>$_SESSION['secur_site'], 'H'=>$nbre_article, 'I'=>$emballage_colis));
echo'0';

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Ajout de <b>".$nbre_colis."</b> colis de nature <b>".$nature_colis."</b> composé de <b>".$nbre_article."</b> article au groupage N° <b>".$groupage_time."</b> ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
/*
}
*/
unset($con);

?>