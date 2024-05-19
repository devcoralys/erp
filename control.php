<?php
session_start();
//include('access.php');
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
$_SESSION['acces_fournisseur']=$membre['acces_fournisseur'];
$_SESSION['acces_client']=$membre['acces_client'];
$_SESSION['acces_groupage']=$membre['acces_groupage'];
$_SESSION['acces_dossier']=$membre['acces_dossier'];
$_SESSION['acces_finance']=$membre['acces_finance'];
$_SESSION['acces_rh']=$membre['acces_rh'];
$_SESSION['acces_secur']=$membre['acces_secur'];
$_SESSION['acces_dashboard']=$membre['acces_dashboard'];
$_SESSION['acces_cotation_valide']=$membre['acces_cotation_valide'];
$_SESSION['acces_tout_groupage']=$membre['acces_tout_groupage'];
$_SESSION['acces_autre_envoi']=$membre['acces_autre_envoi'];
$_SESSION['acces_autre_envoi_france']=$membre['acces_autre_envoi_france'];
$_SESSION['acces_tout_autre_envoi']=$membre['acces_tout_autre_envoi'];
$_SESSION['acces_tout_autre_envoi_france']=$membre['acces_tout_autre_envoi_france'];
$_SESSION['acces_tout_rapport']=$membre['acces_tout_rapport'];
$_SESSION['acces_rapport_import']=$membre['acces_rapport_import'];
$_SESSION['acces_rapport_export']=$membre['acces_rapport_export'];
$_SESSION['acces_rapport_autre']=$membre['acces_rapport_autre'];
$_SESSION['agence_utilisateur']=$membre['agence_utilisateur'];
$_SESSION['acces_comptabilite']=$membre['acces_comptabilite'];
$_SESSION['acces_demande_decaissement']=$membre['acces_demande_decaissement'];
$_SESSION['acces_caisse']=$membre['acces_caisse'];
$_SESSION['acces_valid_decaissement']=$membre['acces_valid_decaissement'];

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


$to = "jacques_kadjo@stt.ci";
$subject = "CONNEXION REUSSIE";
$txt = "Nouvelle connexion effectuée sur l'application. Cliquez sur <app.stt.ci'> pour vous connecter.";
$headers = "From: support@stt.ci";
mail($to,$subject,$txt,$headers);

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