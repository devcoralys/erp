<?php
session_start();
include('../../../connex.php');

$id = $_GET["ref"];

if($id!='')
{
$red=$con->prepare("SELECT * FROM colis_autre_envoi_france WHERE id_colis_autre_envoi_france=:A"); 
$red->execute(array('A' =>$id));
$uti=$red->fetch();

$_SESSION['id_colis_autre_envoi_france_sup']=$uti["id_colis_autre_envoi_france"];

echo'<form name="sup_marque" id="sup_marque" action="#">
	<div>';
echo"<p class='col_sup'>Etes vous sûr de vouloir supprimer <b>".stripslashes($uti['poids_colis_autre_envoi_france'])."</b> Kg du colis_autre_envoi_france <b>".stripslashes($uti['nature_colis_autre_envoi_france'])."</b> ?</p>";
echo'</form>';
}
unset($con);
?>