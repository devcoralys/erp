<?php
session_start();
include('../../../connex.php');

$date_rapport=$_POST["date_rapport"];
$observation_rapport=$_POST["observation_rapport"];

$type_rapport=$_SESSION['type_rapport'];

$date=gmdate("Y-m-d H:i:s");



    $n=$con->query('SELECT * FROM rapport');
    $n->execute();
    $nb=$n->rowcount();
    
    $code_rapport='RH/RAP00'.$nb;
    

$req=$con->prepare("INSERT INTO rapport(
    date_rapport,
    observation_rapport,
    secur_ajout_rapport,
    date_creat_rapport,
    type_rapport
    ) VALUES (:A, :B, :C, :D, :E)");
$req->execute(array(
    'A'=>$date_rapport, 
    'B'=>$observation_rapport, 
    'C'=>$_SESSION['secur_site'],
    'D'=>$date,
    'E'=>$type_rapport
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