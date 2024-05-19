<?php
session_start();
include('../../../connex.php');

$date_rapport=$_POST["date_rapport"];
$num_dossier_rapport=$_POST["num_dossier_rapport"];
$nom_client_rapport=$_POST["nom_client_rapport"];
$montant_cotation_rapport=$_POST["montant_cotation_rapport"];
$montant_decaisse_rapport=$_POST["montant_decaisse_rapport"];
$montant_restant_rapport=$_POST["montant_restant_rapport"];
$num_declaration_rapport=$_POST["num_declaration_rapport"];
$date_declaration_rapport=$_POST["date_declaration_rapport"];
$avancement_dossier_rapport=$_POST["avancement_dossier_rapport"];
$date_livraison_rapport=$_POST["date_livraison_rapport"];
$benefice_rapport=$_POST["benefice_rapport"];
$statut_dossier_rapport=$_POST["statut_dossier_rapport"];
$statut_facture_rapport=$_POST["statut_facture_rapport"];
$date_transmission_facture_rapport=$_POST["date_transmission_facture_rapport"];
$date_cloture_dossier_rapport=$_POST["date_cloture_dossier_rapport"];
$observation_rapport=$_POST["observation_rapport"];

$type_rapport=$_SESSION['type_rapport'];

$date=gmdate("Y-m-d H:i:s");



    $n=$con->query('SELECT * FROM rapport');
    $n->execute();
    $nb=$n->rowcount();
    
    $code_rapport='RH/RAP00'.$nb;
    

$req=$con->prepare("INSERT INTO rapport(
    date_rapport,
    num_dossier_rapport,
    nom_client_rapport,
    montant_cotation_rapport,
    montant_decaisse_rapport,
    montant_restant_rapport,
    num_declaration_rapport,
    date_declaration_rapport,
    avancement_dossier_rapport,
    date_livraison_rapport,
    benefice_rapport,
    statut_dossier_rapport,
    statut_facture_rapport,
    date_transmission_facture_rapport,
    date_cloture_dossier_rapport,
    observation_rapport,
    secur_ajout_rapport,
    date_creat_rapport,
    type_rapport
    ) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I, :J, :K, :L, :M, :N, :O, :P, :Q, :R, :S)");
$req->execute(array(
    'A'=>$date_rapport, 
    'B'=>$num_dossier_rapport, 
    'C'=>$nom_client_rapport, 
    'D'=>$montant_cotation_rapport, 
    'E'=>$montant_decaisse_rapport, 
    'F'=>$montant_restant_rapport, 
    'G'=>$num_declaration_rapport, 
    'H'=>$date_declaration_rapport,
    'I'=>$avancement_dossier_rapport, 
    'J'=>$date_livraison_rapport, 
    'K'=>$benefice_rapport, 
    'L'=>$statut_dossier_rapport, 
    'M'=>$statut_facture_rapport, 
    'N'=>$date_transmission_facture_rapport, 
    'O'=>$date_cloture_dossier_rapport, 
    'P'=>$observation_rapport, 
    'Q'=>$_SESSION['secur_site'],
    'R'=>$date,
    'S'=>$type_rapport
));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Soumission du rapport N° <b>".$code_rapport."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


unset($con);

?>