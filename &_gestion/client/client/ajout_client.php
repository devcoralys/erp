<?php
session_start();
include('../../../connex.php');

//$matr=addslashes($_POST['mat']); 
$nom_p=$_POST['nom'];
$tele=$_POST['tel']; 
$adresse=addslashes($_POST['adresse']); 
$mail=addslashes($_POST['email']); 


$date=gmdate("Y-m-d H:i:s");

$sqlQuery = $con->query("SELECT * FROM client WHERE code_client='".$matr."'");
$count = $sqlQuery->rowCount();

if($count>0)
{
echo'1';
}
else
{

    $nc=$con->prepare('SELECT * FROM client ');
    $nc->execute();
    $nb=$nc->rowcount();

    $nb_cli=$nb+1;

    $init= substr(''.$nom_p.'', 0, 3);
    $ord='000'.$nb_cli;
    $mois=gmdate('m');
    $annee=gmdate('Y');


    $code_client='S-'.$init.''.$ord.''.$mois.''.$annee;

   // $code_client='STT'.gmdate('Ymd').'-000'.$nb_cli;


$req=$con->prepare("INSERT INTO client(code_client, nom_client, tel_client, email_client, date_creat_client, secur_ajout, adresse) VALUES (:A, :B, :E, :F, :K, :L, :M)");
$req->execute(array('A'=>$code_client, 'B'=>$nom_p, 'E'=>$tele, 'F'=>$mail, 'K'=>$date, 'L'=>$_SESSION['secur_site'], 'M'=>$adresse));

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Creation du client (".$code_client.") ".$nom_p." ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
 

echo'0';
unset($con);
}
?>