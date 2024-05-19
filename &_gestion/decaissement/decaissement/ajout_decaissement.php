<?php
session_start();
include('../../../connex.php');

$date_decaissement=$_POST['date_decaissement'];
$num_recu_decaissement=$_POST['num_recu_decaissement'];
$num_dossier_decaissement=$_POST['num_dossier_decaissement'];
$nom_client_decaissement=addslashes($_POST['nom_client_decaissement']);
$montant_decaissement=addslashes($_POST['montant_decaissement']);
$motif_decaissement=addslashes($_POST['motif_decaissement']);

$date=gmdate("Y-m-d H:i:s");


    $n=$con->query('SELECT * FROM decaissement');
    $n->execute();
    $nb=$n->rowcount();
    
    $num_decaissement='CA/DEC00'.$nb;

$req=$con->prepare("INSERT INTO decaissement(date_decaissement, num_recu_decaissement, num_dossier_decaissement, nom_client_decaissement, montant_decaissement, motif_decaissement, date_creat_decaissement, secur_ajout_decaissement, num_decaissement) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I)");
$req->execute(array('A'=>$date_decaissement, 'B'=>$num_recu_decaissement, 'C'=>$num_dossier_decaissement, 'D'=>$nom_client_decaissement, 'E'=>$montant_decaissement, 'F'=>$motif_decaissement, 'G'=>$date, 'H'=>$_SESSION['secur_site'], 'I'=>$num_decaissement));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="decaissement dun montant de <b>".number_format($montant_decaissement,0,',',' ')." FCFA</b> effectuée pour <b>".$motif_decaissement."</b> enregistre sur la piece justificative N° <b>".$num_recu_decaissement."</b> concernant le dossier N° <b>".$num_dossier_decaissement."</b> du client <b>".$nom_client_decaissement."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


unset($con);

?>