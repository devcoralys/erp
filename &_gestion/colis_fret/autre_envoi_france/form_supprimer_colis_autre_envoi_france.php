<?php
session_start();
include('../../../connex.php');

$id = $_GET["ref"];

if($id!='')
{
$red=$con->prepare("SELECT * FROM colis_colis_fret WHERE id_colis_colis_fret=:A"); 
$red->execute(array('A' =>$id));
$uti=$red->fetch();

$_SESSION['id_colis_colis_fret_sup']=$uti["id_colis_colis_fret"];

echo'<form name="sup_marque" id="sup_marque" action="#">
	<div>';
echo"<p class='col_sup'>Etes vous sûr de vouloir supprimer <b>".stripslashes($uti['poids_colis_colis_fret'])."</b> Kg du colis_colis_fret <b>".stripslashes($uti['nature_colis_colis_fret'])."</b> ?</p>";
echo'</form>';
}
unset($con);
?>