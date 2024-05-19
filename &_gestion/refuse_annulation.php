<?php
session_start();
if( isset($_SESSION['pass_site']) && $_SESSION['pass_site']!='' && isset($_SESSION['secur_site']) && $_SESSION['secur_site']!='')
{
include('../connex.php');


$id_groupage=$_GET['id_groupage'];

$inf=$con->prepare('SELECT * FROM groupage WHERE id_groupage=:A');
$inf->execute(array('A'=>$id_groupage_annul));
$info=$inf->fetch();

$num_groupage=$info['num_groupage'];
$time_groupage=$info['time_groupage'];


$inf=$con->prepare('UPDATE groupage SET annulation=:A, secur_demande_annulation="" WHERE id_groupage=:B');
$inf->execute(array('A'=>0, 'B'=>$id_groupage));
$info=$inf->fetch();


//Tracabilite
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Refus de lannulation du groupage N째 <b>".$time_groupage."</b> ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

header('Location: accueil_dg.php');

}
else
{
 echo'<meta http-equiv="refresh" content="0; url=../deconex.php" />';
}
?>