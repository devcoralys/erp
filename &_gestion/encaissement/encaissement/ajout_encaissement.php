<?php
session_start();
include('../../../connex.php');

$date_encaissement=$_POST['date_encaissement'];
$num_recu_encaissement=$_POST['num_recu_encaissement'];
$num_dossier_encaissement=$_POST['num_dossier_encaissement'];
$nom_client_encaissement=addslashes($_POST['nom_client_encaissement']);
$montant_encaissement=addslashes($_POST['montant_encaissement']);
$motif_encaissement=addslashes($_POST['motif_encaissement']);
$mode_reglement=addslashes($_POST['mode_reglement']);

$date=gmdate("Y-m-d H:i:s");


    $n=$con->query('SELECT * FROM encaissement');
    $n->execute();
    $nb=$n->rowcount();
    
    $nb++;
    
    $num_encaissement='CA/ENC00'.$nb;

$req=$con->prepare("INSERT INTO encaissement(date_encaissement, num_recu_encaissement, num_dossier_encaissement, nom_client_encaissement, montant_encaissement, motif_encaissement, date_creat_encaissement, secur_ajout_encaissement, num_encaissement, mode_reglement_encaissement) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I, :J)");
$req->execute(array('A'=>$date_encaissement, 'B'=>$num_recu_encaissement, 'C'=>$num_dossier_encaissement, 'D'=>$nom_client_encaissement, 'E'=>$montant_encaissement, 'F'=>$motif_encaissement, 'G'=>$date, 'H'=>$_SESSION['secur_site'], 'I'=>$num_encaissement, 'J'=>$mode_reglement));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Encaissement dun montant de <b>".number_format($montant_encaissement,0,',',' ')." FCFA</b> effectuée pour <b>".$motif_encaissement."</b> enregistre sur la piece justificative N° <b>".$num_recu_encaissement."</b> concernant le dossier N° <b>".$num_dossier_encaissement."</b> du client <b>".$nom_client_encaissement."</b> paye par <b>".$mode_reglement."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


unset($con);

?>