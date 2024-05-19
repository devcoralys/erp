<?php
session_start();
include('../../../connex.php');

$date_reglement_fournisseur=$_POST['date_reglement_fournisseur'];
$num_recu_reglement_fournisseur=$_POST['num_recu_reglement_fournisseur'];
$num_dossier_reglement_fournisseur=$_POST['num_dossier_reglement_fournisseur'];
$nom_client_reglement_fournisseur=addslashes($_POST['nom_client_reglement_fournisseur']);
$montant_reglement_fournisseur=addslashes($_POST['montant_reglement_fournisseur']);
$depense_reglement_fournisseur=addslashes($_POST['depense_reglement_fournisseur']);
$benefice_reglement_fournisseur=addslashes($_POST['benefice_reglement_fournisseur']);
$motif_reglement_fournisseur=addslashes($_POST['motif_reglement_fournisseur']);
$mode_reglement=addslashes($_POST['mode_reglement']);

$date=gmdate("Y-m-d H:i:s");


    $n=$con->query('SELECT * FROM reglement_fournisseur');
    $n->execute();
    $nb=$n->rowcount();
    
    $nb++;
    
    $num_reglement_fournisseur='CA/FN00'.$nb;

$req=$con->prepare("INSERT INTO reglement_fournisseur(date_reglement_fournisseur, num_dossier_reglement_fournisseur, nom_client_reglement_fournisseur, montant_reglement_fournisseur, motif_reglement_fournisseur, date_creat_reglement_fournisseur, secur_ajout_reglement_fournisseur, num_reglement_fournisseur, mode_reglement_reglement_fournisseur, depense_reglement_fournisseur, benefice_reglement_fournisseur) VALUES (:A, :C, :D, :E, :F, :G, :H, :I, :J, :L, :M)");
$req->execute(array('A'=>$date_reglement_fournisseur, 'C'=>$num_dossier_reglement_fournisseur, 'D'=>$nom_client_reglement_fournisseur, 'E'=>$montant_reglement_fournisseur, 'F'=>$motif_reglement_fournisseur, 'G'=>$date, 'H'=>$_SESSION['secur_site'], 'I'=>$num_reglement_fournisseur, 'J'=>$mode_reglement, 'L'=>$depense_reglement_fournisseur, 'M'=>$benefice_reglement_fournisseur));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="facture normalise d\'un montant de <b>".number_format($montant_reglement_fournisseur,0,',',' ')." FCFA</b> effectuée pour <b>".$motif_reglement_fournisseur."</b> enregistre sur la piece justificative N° <b>".$num_recu_reglement_fournisseur."</b> concernant le dossier N° <b>".$num_dossier_reglement_fournisseur."</b> du client <b>".$nom_client_reglement_fournisseur."</b> paye par <b>".$mode_reglement."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


unset($con);

?>