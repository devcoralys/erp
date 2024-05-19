<?php
session_start();
include('../../../connex.php');

$id = $_GET["ref"];

if($id!='')
{
$red=$con->prepare("SELECT * FROM fournisseur WHERE id_fournisseur=:A"); 
$red->execute(array('A' =>$id));
$uti=$red->fetch();

$_SESSION['id_fournisseur_sup']=$uti["id_fournisseur"];

echo'<form name="sup_marque" id="sup_marque" action="#">
	<div>';
echo"<p class='col_sup'>Etes vous sûr de vouloir supprimer le fournisseur <b>(".stripslashes($uti['code_fournisseur']).") ".stripslashes($uti['nom_fournisseur'])."</b> ?</p>";
echo'</form>';
}
unset($con);
?>