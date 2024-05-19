<?php
session_start();
include('../../../connex.php');

$matr=addslashes($_POST['mat']); 
$nom_p=$_POST['nom'];
$sex=$_POST['sexe']; 
$tele=$_POST['tel']; 
$mail=addslashes($_POST['email']); 
$servi=$_POST['service'];
$Foncti=$_POST['fonctio']; 
$statu=$_POST['statut']; 
$date_entre=$_POST['date_entre']; 
$date_nais=$_POST['date_nais']; 


$date=gmdate("Y-m-d H:i:s");

$sqlQuery = $con->query("SELECT * FROM personnel WHERE matricule_personnel='".$matr."'");
$count = $sqlQuery->rowCount();

if($count>0)
{
echo'1';
}
else
{
if(isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
{
$tmp_name=$_FILES["photo"]['tmp_name'];
$name=$_FILES["photo"]['name'];
$info = pathinfo($name);
$extension = $info['extension'];
$img="photo_".time().".".$extension;
move_uploaded_file($tmp_name, '../../../photo/'.$img);
}
else
{
$img='';
}

$req=$con->prepare("INSERT INTO personnel(matricule_personnel, nom_personnel, sexe_personnel, date_nais_personnel, tel_personnel, email_personnel, photo_personnel, service_id, fonction_id, statut_personnel_id, date_creat_personnel, secur_ajout, date_recrutement) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I, :J, :K, :L, :M)");
$req->execute(array('A'=>$matr, 'B'=>$nom_p, 'C'=>$sex, 'D'=>$date_nais, 'E'=>$tele, 'F'=>$mail, 'G'=>$img, 'H'=>$servi, 'I'=>$Foncti, 'J'=>$statu, 'K'=>$date, 'L'=>$_SESSION['secur_site'], 'M'=>$date_entre));

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$reg=$con->prepare("SELECT * FROM service WHERE id_service=:A"); 
$reg->execute(array('A' =>$servi));
$utig=$reg->fetch();

$ref=$con->prepare("SELECT * FROM fonction WHERE id_fonction=:A"); 
$ref->execute(array('A' =>$Foncti));
$utif=$ref->fetch();

$res=$con->prepare("SELECT * FROM statut_personnelant WHERE code_statut_personnelant=:A"); 
$res->execute(array('A' =>$statu));
$utis=$res->fetch();

$lib_trace="Creation du personnel (".$matr.") ".$nom_p." ayant pour fonction ".stripslashes($utif['lib_fonction']).' et pour statut '.stripslashes($utis['lib_statut_personnelant'])." du service ".$utig['lib_service'];

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
 

echo'0';
unset($con);
}
?>