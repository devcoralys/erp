<?php
session_start();

include('../../../connex.php');
$ido=$_SESSION['article_sup_id'];


$rem=$con->prepare("SELECT * FROM article WHERE id_article=:A");
$rem->execute(array('A'=>$ido));
$rofo=$rem->fetch();
$num_article=$rofo['num_article'];


$red=$con->prepare("DELETE FROM article_besoin WHERE article_num=:A" ); 
$red->execute(array( 'A'=>$num_article));

$red=$con->prepare("DELETE FROM article WHERE num_article=:A" ); 
$red->execute(array( 'A'=>$num_article));


echo'0';

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;

$heure=gmdate("H:i", time() + $zone);
$date=gmdate('Y-m-d H:i:s');

$lib_trace="Suppression du article <b>".$rofo['designation_article']."</b>";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur']));



unset($_SESSION['article_sup_id']);

unset($con);


?>