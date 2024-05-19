<?php
session_start();
include('../../../connex.php');

$id = $_GET["ref"];

if($id!='')
{
$red=$con->prepare("SELECT * FROM article WHERE id_article=:A"); 
$red->execute(array('A' =>$id));
$uti=$red->fetch();

$_SESSION['id_article_sup']=$uti["id_article"];

echo'<form name="sup_marque" id="sup_marque" action="#">
	<div>';
echo"<p class='col_sup'>Etes vous sûr de vouloir supprimer l'article N° <b>(".stripslashes($uti['code_tarifaire']).")</b> ?</p>";
echo'</form>';
}
unset($con);
?>