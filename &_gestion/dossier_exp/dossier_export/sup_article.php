<?php
session_start();

include('../../../connex.php');
$ido=$_SESSION['id_article_sup'];


$reb=$con->prepare("SELECT * FROM article WHERE id_article=:A"); 
$reb->execute(array('A' =>$ido));
$utib=$reb->fetch();



$req=$con->prepare("DELETE FROM article WHERE id_article=:J");
$req->execute(array('J'=>$ido));

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Suppression article (".stripslashes($utib['code_tarifaire']).")  ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
 
echo'0';

unset($_SESSION['id_article_sup']);
unset($con);

?>