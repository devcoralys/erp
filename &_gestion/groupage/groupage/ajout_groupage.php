<?php
session_start();
$_SESSION['time']=time();
include('../../../connex.php');

$date_groupage=$_POST["date_groupage"];
$expediteur_groupage=$_POST["expediteur_groupage"];
$num_cni_expediteur_groupage=$_POST["num_cni_expediteur_groupage"];
$tel_expediteur_groupage=$_POST["tel_expediteur_groupage"];
$destinataire_groupage=$_POST["destinataire_groupage"];
$destination_groupage=$_POST["destination_groupage"];
$tel_destinataire_groupage=$_POST["tel_destinataire_groupage"];
$adresse_recuperation_groupage=$_POST["adresse_recuperation_groupage"];
$nom_recuperateur=$_POST["nom_recuperateur"];
$tel_recuperateur=$_POST["tel_recuperateur"];
$agence_id=$_POST["agence_id"];
$type_piece_id=$_POST["type_piece_id"];


$date=date("Y-m-d H:i:s");


$n=$con->query('SELECT * FROM groupage');
$n->execute();
$nb=$n->rowcount();

$nb_1=$nb+1;

if($nb_1<10)
{
    $num_groupage="SP00".$nb_1;
}

if($nb_1>9)
{
    $num_groupage="SP00".$nb_1;
}

if($nb_1>99)
{
    $num_groupage="SP0".$nb_1;
}

if($nb_1>999)
{
    $num_groupage="SP".$nb_1;
}



$req=$con->prepare("INSERT INTO groupage(time_groupage, date_groupage, nom_recuperateur, expediteur_groupage, num_cni_expediteur_groupage, tel_expediteur_groupage, destinataire_groupage, destination_groupage, tel_destinataire_groupage, adresse_recuperation_groupage, secur_ajout_groupage, date_creat_groupage, num_groupage, tel_recuperateur, agence_id, type_piece_id ) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I, :J, :K, :L, :M, :N, :O, :P)");
$req->execute(array('A'=>$_SESSION['time'], 'B'=>$date_groupage, 'C'=>$nom_recuperateur, 'D'=>$expediteur_groupage, 'E'=>$num_cni_expediteur_groupage, 'F'=>$tel_expediteur_groupage, 'G'=>$destinataire_groupage, 'H'=>$destination_groupage, 'I'=>$tel_destinataire_groupage, 'J'=>$adresse_recuperation_groupage, 'K'=>$_SESSION['secur_site'], 'L'=>$date, 'M'=>$num_groupage, 'N'=>$tel_recuperateur, 'O'=>$agence_id, 'P'=>$type_piece_id ));
echo'0';

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Creation du groupage N° <b>".$num_groupage."</b> Expediteur <b>".$expediteur_groupage."</b> Destinataire <b>".$destinataire_groupage."</b> Adresse de recuperation <b>".$adresse_recuperation_groupage."</b>    ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


unset($con);

?>