<?php
session_start();
include('connex.php');

$moto=addslashes($_POST['mot_pas']);
$passo= hash("sha512", $moto);

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
//$hi=strftime("%A %d %B %Y");
$hi=date('d/m/Y');
$zone=3600*0 ;
$hist=gmdate("H:i", time() + $zone); 
$histo=$hi.' '.$hist;
$date_ajout=date('Y-m-d');


$ident=$_POST['ident'];
$mot=addslashes($_POST['mot_pas']);

$pass= hash("sha512", $mot);

$red=$con->prepare("SELECT * FROM utilisateur LEFT JOIN groupe_utilisateur ON groupe_utilisateur.id_type_groupe=utilisateur.type_groupe_id LEFT JOIN personnel ON personnel.id_personnel=utilisateur.personnel_id WHERE email_utilisateur=:A AND motpass_utilisateur=:B AND valide_util=:C"); 
$red->execute(array('A' => $ident, 'B' => $pass, 'C' => '0'));
$membre=$red->fetch();
$count = $red->rowCount();

echo'0';

if($count>0){


$_SESSION['secur_site']=$membre['secur'];
$_SESSION['pass_site']=$membre['motpass_utilisateur'];
$_SESSION['photo_site']=$membre['photo_util'];
$_SESSION['tel_utilisateur']=stripslashes($membre['tel_utilisateur']);
$_SESSION['id_utilisateur']=$membre['id_utilisateur'];
$_SESSION['secur_site']=$membre['secur'];
$_SESSION['nom_utilisateur_site']=$membre['nom_utilisateur'];
$_SESSION['pass_site']=$membre['motpass_utilisateur'];
$_SESSION['email_utilisateur_site']=$membre['email_utilisateur'];
$_SESSION['photo_site']=$membre['photo_util'];
$_SESSION['id_type_groupe']=$membre['id_type_groupe'];
$_SESSION['nom_type_groupe']=$membre['nom_type_groupe'];
$_SESSION['is_dg']=$membre['is_dg'];
$_SESSION['is_valid']=$membre['is_valid'];
$_SESSION['service_id']=$membre['service_id'];

//Controles d'acces
$_SESSION['acces_rh'] = $membre['acces_rh'];
$_SESSION['acces_secur'] = $membre['acces_secur'];

$req=$con->prepare("UPDATE utilisateur SET connecte=:A WHERE id_utilisateur=:B");
$req->execute(array('A'=>'1', 'B'=>$membre['id_utilisateur']));

//tra�abilite
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;
$date_trace=gmdate('Y-m-d H:i:s');

$lib_trace="Connexion de <b>".$membre["nom_utilisateur"]." (".$membre["email_utilisateur"].")</b>";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date_trace, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));




unset($con);
}
else
{

    echo'2';

    //tra�abilite
    
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;
$date_trace=gmdate('Y-m-d H:i:s');

$lib_trace="Echec de la tentative de connexion avec identifiant <b>".$_POST['ident']." et mot de passe (".$_POST['mot_pas'].")</b>";

if($_SESSION['secur_site']!='qXylyjW6OV'){
    
$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip) VALUES (:A, :B, :C)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date_trace, 'C'=>$adresse));
    
}



}

?>