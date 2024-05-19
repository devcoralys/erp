<?php
session_start();
$_SESSION['time']=time();
include('../../../connex.php');

$date_colis_dhl=$_POST["date_colis_dhl"];
//$code_colis_colis_dhl_colis_dhl=$_POST["code_colis_colis_dhl_colis_dhl"];
$expediteur_colis_dhl=$_POST["expediteur_colis_dhl"];
$num_cni_expediteur_colis_dhl=$_POST["num_cni_expediteur_colis_dhl"];
$tel_expediteur_colis_dhl=$_POST["tel_expediteur_colis_dhl"];
$destinataire_colis_dhl=$_POST["destinataire_colis_dhl"];
$destination_colis_dhl=$_POST["destination_colis_dhl"];
$tel_destinataire_colis_dhl=$_POST["tel_destinataire_colis_dhl"];
$adresse_recuperation_colis_dhl=$_POST["adresse_recuperation_colis_dhl"];
$nom_recuperateur=$_POST["nom_recuperateur"];
$tel_recuperateur=$_POST["tel_recuperateur"];
$mode_envoi=$_POST['mode_envoi'];

$date=date("Y-m-d H:i:s");


$n=$con->query('SELECT * FROM colis_dhl');
$n->execute();
$nb=$n->rowcount();

$nb_1=$nb+1;

if($nb_1<10)
{
    $num_colis_dhl="SPF00".$nb_1;
}

if($nb_1>9)
{
    $num_colis_dhl="SPF00".$nb_1;
}

if($nb_1>99)
{
    $num_colis_dhl="SPF0".$nb_1;
}

if($nb_1>999)
{
    $num_colis_dhl="SPF".$nb_1;
}



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

$req=$con->prepare("INSERT INTO colis_dhl(time_colis_dhl, date_colis_dhl, nom_recuperateur, expediteur_colis_dhl, num_cni_expediteur_colis_dhl, tel_expediteur_colis_dhl, destinataire_colis_dhl, destination_colis_dhl, tel_destinataire_colis_dhl, adresse_recuperation_colis_dhl, secur_ajout_colis_dhl, date_creat_colis_dhl, num_colis_dhl, tel_recuperateur, mode_envoi ) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I, :J, :K, :L, :M, :N, :O)");
$req->execute(array('A'=>$_SESSION['time'], 'B'=>$date_colis_dhl, 'C'=>$nom_recuperateur, 'D'=>$expediteur_colis_dhl, 'E'=>$num_cni_expediteur_colis_dhl, 'F'=>$tel_expediteur_colis_dhl, 'G'=>$destinataire_colis_dhl, 'H'=>$destination_colis_dhl, 'I'=>$tel_destinataire_colis_dhl, 'J'=>$adresse_recuperation_colis_dhl, 'K'=>$_SESSION['secur_site'], 'L'=>$date, 'M'=>$num_colis_dhl, 'N'=>$tel_recuperateur, 'O'=>$mode_envoi ));
echo'0';

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Creation envoi exterieur N° <b>".$num_colis_dhl."</b> Expediteur <b>".$expediteur_colis_dhl."</b> Destinataire <b>".$destinataire_colis_dhl."</b> Adresse de recuperation <b>".$adresse_recuperation_colis_dhl."</b>    ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
/*
}
*/
unset($con);

?>