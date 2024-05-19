<?php
session_start();
include('../../../connex.php');

$qte_article = $_POST['qte_article_mod'];
$designation_article = addslashes($_POST['designation_article_mod']);
$prix_article = $_POST['prix_article_mod'];
$id_article_mod=$_SESSION['id_article_mod'];

$date=gmdate("Y-m-d H:i:s");

$req=$con->prepare("UPDATE article SET designation_article=:A, prix_article=:B WHERE id_article=:C )");
$req->execute(array('A'=>$designation_article, 'B'=>$prix_article, 'C'=>$id_article_mod));


$req1=$con->prepare("UPDATE article_besoin SET qte_article=:A WHERE id_article=:B");
$req1->execute(array('A'=>$qte_article, 'B'=>$id_article_mod));

echo'0';
unset($con);

?>