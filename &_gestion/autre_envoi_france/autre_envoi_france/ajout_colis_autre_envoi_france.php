<?php
session_start();

include('../../../connex.php');

$nbre_colis_autre_envoi_france=$_POST["nbre_colis_autre_envoi_france"];
$nbre_article=$_POST["nbre_article"];
$nature_colis_autre_envoi_france=addslashes($_POST["nature_colis_autre_envoi_france"]);
$poids_colis_autre_envoi_france=$_POST["poids_colis_autre_envoi_france"];
$pu_colis_autre_envoi_france=$_POST["pu_colis_autre_envoi_france"];
$emballage_colis_autre_envoi_france=$_POST["emballage_colis_autre_envoi_france"];
//$autre_envoi_france_time=$_SESSION['time'];
$autre_envoi_france_time=$_POST['time_autre_envoi_france'];

//$montant_assurance=$_POST['montant_assurance'];

$date=date("Y-m-d H:i:s");


$n=$con->query('SELECT * FROM colis_autre_envoi_france');
$n->execute();
$nb=$n->rowcount();

$nb++;

$num_colis_autre_envoi_france='STT-COL'.date("YmdHis").'/0'.$nb;

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

$req=$con->prepare("INSERT INTO colis_autre_envoi_france(nbre_colis_autre_envoi_france, nature_colis_autre_envoi_france, poids_colis_autre_envoi_france, pu_colis_autre_envoi_france, autre_envoi_france_time, date_creat_colis_autre_envoi_france, secur_ajout_colis_autre_envoi_france, nbre_article, emballage_colis_autre_envoi_france) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I)");
$req->execute(array('A'=>$nbre_colis_autre_envoi_france, 'B'=>$nature_colis_autre_envoi_france, 'C'=>$poids_colis_autre_envoi_france, 'D'=>$pu_colis_autre_envoi_france, 'E'=>$autre_envoi_france_time, 'F'=>$date, 'G'=>$_SESSION['secur_site'], 'H'=>$nbre_article, 'I'=>$emballage_colis_autre_envoi_france));
echo'0';

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Ajout de <b>".$nbre_colis_autre_envoi_france."</b> colis_autre_envoi_france de nature <b>".$nature_colis_autre_envoi_france."</b> composé de <b>".$nbre_article."</b> article au autre_envoi_france N° <b>".$autre_envoi_france_time."</b> ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
/*
}
*/
unset($con);

?>