<?php
session_start();

include('../../../connex.php');
$ido=$_SESSION['id_pers_soig_sup'];

$red=$con->prepare("SELECT * FROM adm_user WHERE personnel_id=:A"); 
$red->execute(array('A' =>$ido));
$count = $red->rowCount();
$uti=$red->fetch();

$reb=$con->prepare("SELECT * FROM personnel WHERE id_personnel=:A"); 
$reb->execute(array('A' =>$ido));
$utib=$reb->fetch();

$reg=$con->prepare("SELECT * FROM service WHERE id_service=:A"); 
$reg->execute(array('A' =>$utib['service_id']));
$utig=$reg->fetch();

$ref=$con->prepare("SELECT * FROM fonction WHERE id_fonction=:A"); 
$ref->execute(array('A' =>$utib['fonction_id']));
$utif=$ref->fetch();

$res=$con->prepare("SELECT * FROM statut_pers_soignant WHERE code_statut_pers_soignant=:A"); 
$res->execute(array('A' =>$utib['statut_personnel_id']));
$utis=$res->fetch();

if($count>0)
{
echo'1';
}
else
{

$req=$con->prepare("DELETE FROM personnel WHERE id_personnel=:J");
$req->execute(array('J'=>$ido));

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Suppression personnel soignant (".stripslashes($utib['matricule_personnel']).") ".stripslashes($utib['nom_personnel'])." ayant pour fonction ".stripslashes($utif['lib_fonction']).' et pour statut '.stripslashes($utis['lib_statut_pers_soignant'])." du service ".$utig['lib_service'];

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur']));
 
echo'0';

unset($_SESSION['id_pers_soig_sup']);
unset($con);
}
?>