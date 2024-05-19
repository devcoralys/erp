<?php
session_start();
include('../../../connex.php');

$id = $_GET["ref"];

if($id!='')
{
$red=$con->prepare("SELECT * FROM personnel WHERE id_personnel=:A"); 
$red->execute(array('A' =>$id));
$uti=$red->fetch();

$_SESSION['id_pers_soig_sup']=$uti["id_personnel"];

echo'<form name="sup_marque" id="sup_marque" action="#">
	<div>';
echo"<p class='col_sup'>Etes vous sûr de vouloir supprimer <b>(".stripslashes($uti['matricule_personnel']).") ".stripslashes($uti['nom_personnel'])."</b> ?</p>";
echo'</form>';
}
unset($con);
?>