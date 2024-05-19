<?php
session_start();
include('../../../connex.php');

$id = $_GET["ref"];

if($id!='')
{
$red=$con->prepare("SELECT * FROM colis_colis_dhl WHERE id_colis_colis_dhl=:A"); 
$red->execute(array('A' =>$id));
$uti=$red->fetch();

$_SESSION['id_colis_colis_dhl_sup']=$uti["id_colis_colis_dhl"];

echo'<form name="sup_marque" id="sup_marque" action="#">
	<div>';
echo"<p class='col_sup'>Etes vous sûr de vouloir supprimer <b>".stripslashes($uti['poids_colis_colis_dhl'])."</b> Kg du colis_colis_dhl <b>".stripslashes($uti['nature_colis_colis_dhl'])."</b> ?</p>";
echo'</form>';
}
unset($con);
?>