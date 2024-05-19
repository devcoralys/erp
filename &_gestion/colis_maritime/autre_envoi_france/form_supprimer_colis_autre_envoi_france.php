<?php
session_start();
include('../../../connex.php');

$id = $_GET["ref"];

if($id!='')
{
$red=$con->prepare("SELECT * FROM colis_colis_maritime WHERE id_colis_colis_maritime=:A"); 
$red->execute(array('A' =>$id));
$uti=$red->fetch();

$_SESSION['id_colis_colis_maritime_sup']=$uti["id_colis_colis_maritime"];

echo'<form name="sup_marque" id="sup_marque" action="#">
	<div>';
echo"<p class='col_sup'>Etes vous sûr de vouloir supprimer <b>".stripslashes($uti['poids_colis_colis_maritime'])."</b> Kg du colis_colis_maritime <b>".stripslashes($uti['nature_colis_colis_maritime'])."</b> ?</p>";
echo'</form>';
}
unset($con);
?>