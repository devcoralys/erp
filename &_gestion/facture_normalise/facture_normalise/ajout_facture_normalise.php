<?php
session_start();
include('../../../connex.php');

$date_facture_normalise=$_POST['date_facture_normalise'];
$num_recu_facture_normalise=$_POST['num_recu_facture_normalise'];
$num_dossier_facture_normalise=$_POST['num_dossier_facture_normalise'];
$nom_client_facture_normalise=addslashes($_POST['nom_client_facture_normalise']);
$montant_facture_normalise=addslashes($_POST['montant_facture_normalise']);
$motif_facture_normalise=addslashes($_POST['motif_facture_normalise']);
$mode_reglement=addslashes($_POST['mode_reglement']);
$demandeur_facture_normalise=addslashes($_POST['demandeur_facture_normalise']);

$date=gmdate("Y-m-d H:i:s");


    $n=$con->query('SELECT * FROM facture_normalise');
    $n->execute();
    $nb=$n->rowcount();
    
    $nb++;
    
    $num_facture_normalise='CA/FN00'.$nb;

$req=$con->prepare("INSERT INTO facture_normalise(date_facture_normalise, num_recu_facture_normalise, num_dossier_facture_normalise, nom_client_facture_normalise, montant_facture_normalise, motif_facture_normalise, date_creat_facture_normalise, secur_ajout_facture_normalise, num_facture_normalise, mode_reglement_facture_normalise, demandeur_facture_normalise) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I, :J, :K)");
$req->execute(array('A'=>$date_facture_normalise, 'B'=>$num_recu_facture_normalise, 'C'=>$num_dossier_facture_normalise, 'D'=>$nom_client_facture_normalise, 'E'=>$montant_facture_normalise, 'F'=>$motif_facture_normalise, 'G'=>$date, 'H'=>$_SESSION['secur_site'], 'I'=>$num_facture_normalise, 'J'=>$mode_reglement, 'K'=>$demandeur_facture_normalise));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="facture normalise d\'un montant de <b>".number_format($montant_facture_normalise,0,',',' ')." FCFA</b> effectuée pour <b>".$motif_facture_normalise."</b> enregistre sur la piece justificative N° <b>".$num_recu_facture_normalise."</b> concernant le dossier N° <b>".$num_dossier_facture_normalise."</b> du client <b>".$nom_client_facture_normalise."</b> paye par <b>".$mode_reglement."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


unset($con);

?>