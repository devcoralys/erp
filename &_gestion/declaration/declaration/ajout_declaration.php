<?php
session_start();
include('../../../connex.php');

    $date_declaration=$_POST["date_declaration"];
    $reference_declaration=$_POST["reference_declaration"];
    $client_declaration=$_POST["client_declaration"];
    $regime_declaration=$_POST["regime_declaration"];
    $bureau_declaration=$_POST["bureau_declaration"];
    $num_declaration=$_POST["num_declaration"];
    $num_liquidation_declaration=$_POST["num_liquidation_declaration"];
    $paiement_declaration=$_POST["paiement_declaration"];
    $dt_declaration=$_POST["dt_declaration"];
    $agio_declaration=$_POST["agio_declaration"];
    $tirage_declaration=$_POST["tirage_declaration"];
    $ouverture_declaration=$_POST["ouverture_declaration"];
    $fdi_declaration=$_POST["fdi_declaration"];
    $assurance_declaration=$_POST["assurance_declaration"];
    $num_quittance_declaration=$_POST["num_quittance_declaration"];
    $conteneur_declaration=$_POST["conteneur_declaration"];
    $bsc_declaration=$_POST["bsc_declaration"];
    $lta_declaration=$_POST["lta_declaration"];
    $poids_declaration=$_POST["poids_declaration"];

$date=gmdate("Y-m-d H:i:s");



    $n=$con->query('SELECT * FROM declaration');
    $n->execute();
    $nb=$n->rowcount();
    
    $code_declaration='CA/DEC00'.$nb;
    

$req=$con->prepare("INSERT INTO declaration(date_declaration, reference_declaration, client_declaration, regime_declaration, bureau_declaration, num_declaration, num_liquidation_declaration, paiement_declaration, dt_declaration, agio_declaration, tirage_declaration, ouverture_declaration, fdi_declaration, assurance_declaration, num_quittance_declaration, conteneur_declaration, bsc_declaration, secur_ajout_declaration, date_creat_declaration, code_declaration, lta_declaration, poids_declaration) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I, :J, :K, :L, :M, :N, :O, :P, :Q, :R, :S, :T, :U, :V)");
$req->execute(array('A'=>$date_declaration, 'B'=>$reference_declaration, 'C'=>$client_declaration, 'D'=>$regime_declaration, 'E'=>$bureau_declaration, 'F'=>$num_declaration, 'G'=>$num_liquidation_declaration, 'H'=>$paiement_declaration, 'I'=>$dt_declaration, 'J'=>$agio_declaration, 'K'=>$tirage_declaration, 'L'=>$ouverture_declaration, 'M'=>$fdi_declaration, 'N'=>$assurance_declaration, 'O'=>$num_quittance_declaration, 'P'=>$conteneur_declaration, 'Q'=>$bsc_declaration, 'R'=>$_SESSION['secur_site'], 'S'=>$date, 'T'=>$code_declaration, 'U'=>$lta_declaration, 'V'=>$poids_declaration));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Declaration  <b>".$client_declaration."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


unset($con);

?>