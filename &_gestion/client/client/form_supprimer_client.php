<?php
session_start();
include('../../../connex.php');

$id = $_GET["ref"];

if($id!='')
{
$red=$con->prepare("SELECT * FROM client WHERE id_client=:A"); 
$red->execute(array('A' =>$id));
$uti=$red->fetch();

$_SESSION['id_client_sup']=$uti["id_client"];

echo'<form name="sup_marque" id="sup_marque" action="#">
	<div>';
echo"<p class='col_sup'>Etes vous sûr de vouloir supprimer le client <b>(".stripslashes($uti['code_client']).") ".stripslashes($uti['nom_client'])."</b> ?</p>";
echo'</form>';
}
unset($con);
?>