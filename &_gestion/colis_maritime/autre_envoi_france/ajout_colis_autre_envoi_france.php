<?php
session_start();

include('../../../connex.php');

$nbre_colis_colis_maritime=$_POST["nbre_colis_colis_maritime"];
$nbre_article=$_POST["nbre_article"];
$nature_colis_colis_maritime=addslashes($_POST["nature_colis_colis_maritime"]);
$poids_colis_colis_maritime=$_POST["poids_colis_colis_maritime"];
$pu_colis_colis_maritime=$_POST["pu_colis_colis_maritime"];
$emballage_colis_colis_maritime=$_POST["emballage_colis_colis_maritime"];
//$colis_maritime_time=$_SESSION['time'];
$colis_maritime_time=$_POST['time_colis_maritime'];

//$montant_assurance=$_POST['montant_assurance'];

$date=date("Y-m-d H:i:s");


$n=$con->query('SELECT * FROM colis_colis_maritime');
$n->execute();
$nb=$n->rowcount();

$nb++;

$num_colis_colis_maritime='STT-COL'.date("YmdHis").'/0'.$nb;

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

$req=$con->prepare("INSERT INTO colis_colis_maritime(nbre_colis_colis_maritime, nature_colis_colis_maritime, poids_colis_colis_maritime, pu_colis_colis_maritime, colis_maritime_time, date_creat_colis_colis_maritime, secur_ajout_colis_colis_maritime, nbre_article, emballage_colis_colis_maritime) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I)");
$req->execute(array('A'=>$nbre_colis_colis_maritime, 'B'=>$nature_colis_colis_maritime, 'C'=>$poids_colis_colis_maritime, 'D'=>$pu_colis_colis_maritime, 'E'=>$colis_maritime_time, 'F'=>$date, 'G'=>$_SESSION['secur_site'], 'H'=>$nbre_article, 'I'=>$emballage_colis_colis_maritime));
echo'0';

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Ajout de <b>".$nbre_colis_colis_maritime."</b> colis_colis_maritime de nature <b>".$nature_colis_colis_maritime."</b> composé de <b>".$nbre_article."</b> article au colis_maritime N° <b>".$colis_maritime_time."</b> ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
/*
}
*/
unset($con);

?>