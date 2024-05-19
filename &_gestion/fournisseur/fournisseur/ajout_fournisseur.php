<?php
session_start();
include('../../../connex.php');

//$matr=addslashes($_POST['mat']); 
$nom_p=$_POST['nom'];
$tele=$_POST['tel']; 
$adresse=addslashes($_POST['adresse']); 
$mail=addslashes($_POST['email']); 


$date=gmdate("Y-m-d H:i:s");

$sqlQuery = $con->query("SELECT * FROM fournisseur WHERE code_fournisseur='".$matr."'");
$count = $sqlQuery->rowCount();

if($count>0)
{
echo'1';
}
else
{

    $nc=$con->prepare('SELECT * FROM fournisseur ');
    $nc->execute();
    $nb=$nc->rowcount();

    $nb_cli=$nb+1;

    $init= substr(''.$nom_p.'', 0, 3);
    $ord='000'.$nb_cli;
    $mois=gmdate('m');
    $annee=gmdate('Y');


    $code_fournisseur='F-'.$init.''.$ord.''.$mois.''.$annee;

   // $code_fournisseur='STT'.gmdate('Ymd').'-000'.$nb_cli;


$req=$con->prepare("INSERT INTO fournisseur(code_fournisseur, nom_fournisseur, tel_fournisseur, email_fournisseur, date_creat_fournisseur, secur_ajout, adresse) VALUES (:A, :B, :E, :F, :K, :L, :M)");
$req->execute(array('A'=>$code_fournisseur, 'B'=>$nom_p, 'E'=>$tele, 'F'=>$mail, 'K'=>$date, 'L'=>$_SESSION['secur_site'], 'M'=>$adresse));

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Creation du fournisseur (".$code_fournisseur.") ".$nom_p." ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
 

echo'0';
unset($con);
}
?>