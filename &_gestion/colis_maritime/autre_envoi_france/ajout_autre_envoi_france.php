<?php
session_start();
$_SESSION['time']=time();
include('../../../connex.php');

$date_colis_maritime=$_POST["date_colis_maritime"];
//$code_colis_colis_maritime_colis_maritime=$_POST["code_colis_colis_maritime_colis_maritime"];
$expediteur_colis_maritime=$_POST["expediteur_colis_maritime"];
$num_cni_expediteur_colis_maritime=$_POST["num_cni_expediteur_colis_maritime"];
$tel_expediteur_colis_maritime=$_POST["tel_expediteur_colis_maritime"];
$destinataire_colis_maritime=$_POST["destinataire_colis_maritime"];
$destination_colis_maritime=$_POST["destination_colis_maritime"];
$tel_destinataire_colis_maritime=$_POST["tel_destinataire_colis_maritime"];
$adresse_recuperation_colis_maritime=$_POST["adresse_recuperation_colis_maritime"];
$nom_recuperateur=$_POST["nom_recuperateur"];
$tel_recuperateur=$_POST["tel_recuperateur"];
$mode_envoi=$_POST['mode_envoi'];

$date=date("Y-m-d H:i:s");


$n=$con->query('SELECT * FROM colis_maritime');
$n->execute();
$nb=$n->rowcount();

$nb_1=$nb+1;

if($nb_1<10)
{
    $num_colis_maritime="SPF00".$nb_1;
}

if($nb_1>9)
{
    $num_colis_maritime="SPF00".$nb_1;
}

if($nb_1>99)
{
    $num_colis_maritime="SPF0".$nb_1;
}

if($nb_1>999)
{
    $num_colis_maritime="SPF".$nb_1;
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

$req=$con->prepare("INSERT INTO colis_maritime(time_colis_maritime, date_colis_maritime, nom_recuperateur, expediteur_colis_maritime, num_cni_expediteur_colis_maritime, tel_expediteur_colis_maritime, destinataire_colis_maritime, destination_colis_maritime, tel_destinataire_colis_maritime, adresse_recuperation_colis_maritime, secur_ajout_colis_maritime, date_creat_colis_maritime, num_colis_maritime, tel_recuperateur, mode_envoi ) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I, :J, :K, :L, :M, :N, :O)");
$req->execute(array('A'=>$_SESSION['time'], 'B'=>$date_colis_maritime, 'C'=>$nom_recuperateur, 'D'=>$expediteur_colis_maritime, 'E'=>$num_cni_expediteur_colis_maritime, 'F'=>$tel_expediteur_colis_maritime, 'G'=>$destinataire_colis_maritime, 'H'=>$destination_colis_maritime, 'I'=>$tel_destinataire_colis_maritime, 'J'=>$adresse_recuperation_colis_maritime, 'K'=>$_SESSION['secur_site'], 'L'=>$date, 'M'=>$num_colis_maritime, 'N'=>$tel_recuperateur, 'O'=>$mode_envoi ));
echo'0';

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Creation envoi exterieur N° <b>".$num_colis_maritime."</b> Expediteur <b>".$expediteur_colis_maritime."</b> Destinataire <b>".$destinataire_colis_maritime."</b> Adresse de recuperation <b>".$adresse_recuperation_colis_maritime."</b>    ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
/*
}
*/
unset($con);

?>