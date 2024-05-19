<?php
session_start();
include('../../../connex.php');

$date_caisse=$_POST['date_caisse'];
$nom_client_caisse=addslashes($_POST['nom_client_caisse']);
$montant_caisse=addslashes($_POST['montant_caisse']);
$motif_caisse=addslashes($_POST['motif_caisse']);

$date=gmdate("Y-m-d H:i:s");


    $n=$con->query('SELECT * FROM caisse');
    $n->execute();
    $nb=$n->rowcount();
    
    $num_caisse='CA00'.$nb;

$req=$con->prepare("INSERT INTO caisse(date_caisse, nom_client_caisse, montant_caisse, motif_caisse, date_creat_caisse, secur_ajout_caisse, num_caisse) VALUES (:A, :D, :E, :F, :G, :H, :I)");
$req->execute(array('A'=>$date_caisse, 'D'=>$nom_client_caisse, 'E'=>$montant_caisse, 'F'=>$motif_caisse, 'G'=>$date, 'H'=>$_SESSION['secur_site'], 'I'=>$num_caisse));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="enregistrement sortie caisse dun montant de <b>".number_format($montant_caisse,0,',',' ')." FCFA</b> effectuée pour <b>".$motif_caisse."</b> enregistre sur la piece justificative N° <b>".$num_recu_caisse."</b> du demandeur <b>".$nom_client_caisse."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


unset($con);

?>