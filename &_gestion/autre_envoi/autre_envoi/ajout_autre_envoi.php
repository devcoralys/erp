<?php
session_start();
$_SESSION['time']=time();
include('../../../connex.php');

$date_autre_envoi=$_POST["date_autre_envoi"];
//$code_colis_autre_envoi_autre_envoi=$_POST["code_colis_autre_envoi_autre_envoi"];
$expediteur_autre_envoi=$_POST["expediteur_autre_envoi"];
$num_cni_expediteur_autre_envoi=$_POST["num_cni_expediteur_autre_envoi"];
$tel_expediteur_autre_envoi=$_POST["tel_expediteur_autre_envoi"];
$destinataire_autre_envoi=$_POST["destinataire_autre_envoi"];
$destination_autre_envoi=$_POST["destination_autre_envoi"];
$tel_destinataire_autre_envoi=$_POST["tel_destinataire_autre_envoi"];
$adresse_recuperation_autre_envoi=$_POST["adresse_recuperation_autre_envoi"];
$nom_recuperateur=$_POST["nom_recuperateur"];
$tel_recuperateur=$_POST["tel_recuperateur"];
$mode_envoi=$_POST['mode_envoi'];

$date=date("Y-m-d H:i:s");


$n=$con->query('SELECT * FROM autre_envoi');
$n->execute();
$nb=$n->rowcount();

$nb_1=$nb+1;

if($nb_1<10)
{
    $num_autre_envoi="AE00".$nb_1;
}

if($nb_1>9)
{
    $num_autre_envoi="AE00".$nb_1;
}

if($nb_1>99)
{
    $num_autre_envoi="AE0".$nb_1;
}

if($nb_1>999)
{
    $num_autre_envoi="AE".$nb_1;
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

$req=$con->prepare("INSERT INTO autre_envoi(time_autre_envoi, date_autre_envoi, nom_recuperateur, expediteur_autre_envoi, num_cni_expediteur_autre_envoi, tel_expediteur_autre_envoi, destinataire_autre_envoi, destination_autre_envoi, tel_destinataire_autre_envoi, adresse_recuperation_autre_envoi, secur_ajout_autre_envoi, date_creat_autre_envoi, num_autre_envoi, tel_recuperateur, mode_envoi ) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I, :J, :K, :L, :M, :N, :O)");
$req->execute(array('A'=>$_SESSION['time'], 'B'=>$date_autre_envoi, 'C'=>$nom_recuperateur, 'D'=>$expediteur_autre_envoi, 'E'=>$num_cni_expediteur_autre_envoi, 'F'=>$tel_expediteur_autre_envoi, 'G'=>$destinataire_autre_envoi, 'H'=>$destination_autre_envoi, 'I'=>$tel_destinataire_autre_envoi, 'J'=>$adresse_recuperation_autre_envoi, 'K'=>$_SESSION['secur_site'], 'L'=>$date, 'M'=>$num_autre_envoi, 'N'=>$tel_recuperateur, 'O'=>$mode_envoi ));
echo'0';

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Creation envoi exterieur N° <b>".$num_autre_envoi."</b> Expediteur <b>".$expediteur_autre_envoi."</b> Destinataire <b>".$destinataire_autre_envoi."</b> Adresse de recuperation <b>".$adresse_recuperation_autre_envoi."</b>    ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
/*
}
*/
unset($con);

?>