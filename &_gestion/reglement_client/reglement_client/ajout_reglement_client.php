<?php
session_start();
include('../../../connex.php');

$date_reglement_client=$_POST['date_reglement_client'];
$num_recu_reglement_client=$_POST['num_recu_reglement_client'];
$num_dossier_reglement_client=$_POST['num_dossier_reglement_client'];
$nom_client_reglement_client=addslashes($_POST['nom_client_reglement_client']);
$montant_reglement_client=addslashes($_POST['montant_reglement_client']);
$depense_reglement_client=addslashes($_POST['depense_reglement_client']);
$benefice_reglement_client=addslashes($_POST['benefice_reglement_client']);
$motif_reglement_client=addslashes($_POST['motif_reglement_client']);
$mode_reglement=addslashes($_POST['mode_reglement']);

$date=gmdate("Y-m-d H:i:s");


    $n=$con->query('SELECT * FROM reglement_client');
    $n->execute();
    $nb=$n->rowcount();
    
    $nb++;
    
    $num_reglement_client='CA/FN00'.$nb;

$req=$con->prepare("INSERT INTO reglement_client(date_reglement_client, num_dossier_reglement_client, nom_client_reglement_client, montant_reglement_client, motif_reglement_client, date_creat_reglement_client, secur_ajout_reglement_client, num_reglement_client, mode_reglement_reglement_client, depense_reglement_client, benefice_reglement_client) VALUES (:A, :C, :D, :E, :F, :G, :H, :I, :J, :L, :M)");
$req->execute(array('A'=>$date_reglement_client, 'C'=>$num_dossier_reglement_client, 'D'=>$nom_client_reglement_client, 'E'=>$montant_reglement_client, 'F'=>$motif_reglement_client, 'G'=>$date, 'H'=>$_SESSION['secur_site'], 'I'=>$num_reglement_client, 'J'=>$mode_reglement, 'L'=>$depense_reglement_client, 'M'=>$benefice_reglement_client));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="facture normalise d\'un montant de <b>".number_format($montant_reglement_client,0,',',' ')." FCFA</b> effectuée pour <b>".$motif_reglement_client."</b> enregistre sur la piece justificative N° <b>".$num_recu_reglement_client."</b> concernant le dossier N° <b>".$num_dossier_reglement_client."</b> du client <b>".$nom_client_reglement_client."</b> paye par <b>".$mode_reglement."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


unset($con);

?>