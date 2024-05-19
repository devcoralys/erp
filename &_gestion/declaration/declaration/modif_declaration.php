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
    $id_declaration=$_SESSION["id_dec_mod"];

$date=gmdate("Y-m-d H:i:s");



$req=$con->prepare("UPDATE declaration SET date_declaration=:A, reference_declaration=:B, client_declaration=:C, regime_declaration=:D, bureau_declaration=:E, num_declaration=:F, num_liquidation_declaration=:G, paiement_declaration=:H, dt_declaration=:I, agio_declaration=:J, tirage_declaration=:K, ouverture_declaration=:L, fdi_declaration=:M, assurance_declaration=:N, num_quittance_declaration=:O, conteneur_declaration=:P, bsc_declaration=:Q, secur_mod_declaration=:R, date_mod_declaration=:S, lta_declaration=:T, poids_declaration=:U WHERE id_declaration=:V");
$req->execute(array('A'=>$date_declaration, 'B'=>$reference_declaration, 'C'=>$client_declaration, 'D'=>$regime_declaration, 'E'=>$bureau_declaration, 'F'=>$num_declaration, 'G'=>$num_liquidation_declaration, 'H'=>$paiement_declaration, 'I'=>$dt_declaration, 'J'=>$agio_declaration, 'K'=>$tirage_declaration, 'L'=>$ouverture_declaration, 'M'=>$fdi_declaration, 'N'=>$assurance_declaration, 'O'=>$num_quittance_declaration, 'P'=>$conteneur_declaration, 'Q'=>$bsc_declaration, 'R'=>$_SESSION['secur_site'], 'S'=>$date, 'T'=>$lta_declaration, 'U'=>$poids_declaration, 'V'=>$id_declaration));
echo'0';


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Modification Declaration  N* <b>".$reference_declaration."</b>  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));


unset($_SESSION["id_dec_mod"]);
unset($con);

?>