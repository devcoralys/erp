<?php
session_start();
include('../../../connex.php');

$id_besoin= $_GET["ref"];

 //Calcul Total
 $tot=$con->prepare('SELECT * FROM besoin LEFT JOIN article_besoin ON article_besoin.besoin_num = besoin.num_fiche LEFT JOIN article ON article.num_article=article_besoin.article_num LEFT JOIN utilisateur ON utilisateur.secur=besoin.demandeur_secur WHERE id_besoin=:A ');
 $tot->execute(array('A'=>$id_besoin));
 $montant_total=0;
 while($itot=$tot->fetch())
 {
     $montant_total=$montant_total + ($itot['qte_article']*$itot['prix_article']);
 }
 $montant=$montant_total;

 echo $montant;

//header('Location: ../caisse.php');

?>
