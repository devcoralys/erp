<?php
session_start();
include('../../../connex.php');

$id = $_GET["ref"];

if($id!='')
{
$red=$con->prepare(" SELECT * FROM utilisateur LEFT JOIN personnel ON personnel.id_personnel=utilisateur.personnel_id INNER JOIN service ON service.id_service=personnel.service_id INNER JOIN fonction ON fonction.id_fonction=personnel.fonction_id WHERE id_utilisateur=:A ");
$red->execute(array('A' =>$id));
$util=$red->fetch();

$_SESSION['id_utilisateur_sup']=$util["id_utilisateur"];

echo'<form name="sup_marque" id="sup_marque" action="#">
	<div>';
echo"<p class='col_sup'>Etes vous sûr de vouloir supprimer l'utilisateur <b>".stripslashes($util['nom_personnel'])."</b> ?</p>";
echo'</form>';
}
unset($con);
?>
