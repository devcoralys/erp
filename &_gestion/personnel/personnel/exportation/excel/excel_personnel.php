<?php
date_default_timezone_set("Europe/London");
include('../../../connex.php');
 session_start ();
$date=date('Y-m-d', time());

ini_set('memory_limit','512M');
ini_set('max_execution_time', 12000);
	

	$heure='00:00:00';

header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-disposition: attachment; filename=liste_personnel_cms_".$date.".xls");/**/	


if(isset($_SESSION['recher_pers']) && $_SESSION['recher_pers']!='')
{
$recher_pers=$_SESSION['recher_pers'];
}
else
{
$recher_pers='';
}

if(isset($_SESSION['recher_service']) && $_SESSION['recher_service']!='')
{
$recher_service=$_SESSION['recher_service'];
}
else
{
$recher_service='';
}

if(isset($_SESSION['recher_fonction']) && $_SESSION['recher_fonction']!='')
{
$recher_fonction=$_SESSION['recher_fonction'];
}
else
{
$recher_fonction='';
}

if(isset($_SESSION['recher_statut']) && $_SESSION['recher_statut']!='')
{
$recher_statut=$_SESSION['recher_statut'];
}
else
{
$recher_statut='';
}

if(isset($_SESSION['recher_actif']) && $_SESSION['recher_actif']!='')
{
$recher_actif=$_SESSION['recher_actif'];
}
else
{
$recher_actif='';
}

if(isset($_SESSION['recher_sexe']) && $_SESSION['recher_sexe']!='')
{
$recher_sexe=$_SESSION['recher_sexe'];
}
else
{
$recher_sexe='';
}

	
if(isset($_SESSION['recher_site']) && $_SESSION['recher_site']!='')
{
$recher_site=$_SESSION['recher_site'];
}
else
{
$recher_site='';
}


$req="SELECT * FROM personnel_soignant WHERE id_personnel_soignant!=''";
 
 if($recher_pers!=""){
 $req.=" and id_personnel_soignant IN (".$recher_pers.")";
 }
 
 if($recher_service!=""){
 $req.="and service_id IN (".$recher_service.")";
 }
 
 if($recher_fonction!=""){
 $req.="and fonction_id IN (".$recher_fonction.")";
 }
 
 if($recher_statut!=""){
 $req.="and statut_pers_soignant_code IN (".$recher_statut.")";
 }
  
 if($recher_actif!=""){
 $req.="and valide=".$recher_actif."";
 }  
 
 if($recher_sexe!=""){
 $req.="and sexe_personnel_soignant IN (".$recher_sexe.")";
 }

 if($recher_site!=""){
	$req.="and site_id IN (".$recher_site.")";
 }
		
		
$req.=" ORDER BY nom_personnel_soignant ASC, matricule_personnel_soignant ASC ";

$lst=$con->prepare($req);
$lst->execute();
//$fino=$lst->fetch();
      
 $couleur[0]="#F1F1F1";
    $couleur[1]="#FFFFFF"; 
	$i=1;

	echo'
	<br />
<h1><strong style="font-size:20px; color:red; align:center; text-decoration:underline;">LISTE DU PERSONNEL CMS</strong></h1>
 	<strong>G&eacute;n&eacute;r&eacute;e le : </strong>'.Date('d/m/Y  H:i').'
	<br /><br /><br /> Par<br />  ';


	//Liste des bons
	/*
	echo'
 	<strong>Nom et Pr&eacute;nom(s): </strong>'.$_SESSION['nom_utilisateur_hop'].' 

<br />
 	<strong>Email : </strong>'.$_SESSION['email_utilisateur_hop'].'
<br />
 	<strong>T&eacute;l&eacute;phone : </strong> '.$_SESSION['tel_utilisateur'].'
<br /><br /><br />';
*/

	echo'<strong style="font-size:18px; font-color:red;">Liste du personnel du CMS :</strong>  <br/><br/>';

	echo '<table class="utilisateur tab_list_client"  border="2" >
		 <tr class="td tr"  bgcolor="#0e7e70"  >
			<td width="150">MATRICULE</td>
			<td width="150">NOM ET PRENOM(S)</td>
			<td width="150">SERVICE</td>
			<td width="150">FONCTION</td>
			<td width="150">STATUT</td>
			<td width="150">SITE</td>
		</tr>';

	while($row=$lst->fetch())
   {

//Req
$rep=$con->prepare("SELECT * FROM service WHERE id_service='".$row['service_id']."'");
$rep->execute(); 
$ro=$rep->fetch();

$rep_1=$con->prepare("SELECT * FROM fonction WHERE id_fonction='".$row['fonction_id']."'");
$rep_1->execute(); 
$ro_1=$rep_1->fetch();

$rep_2=$con->prepare("SELECT * FROM statut_pers_soignant WHERE code_statut_pers_soignant='".$row['statut_pers_soignant_code']."'");
$rep_2->execute(); 
$ro_2=$rep_2->fetch();

$rep_3=$con->prepare("SELECT * FROM site WHERE id_site='".$row['site_id']."'");
$rep_3->execute(); 
$ro_3=$rep_3->fetch();

if($row['sexe_personnel_soignant']=='1'){ $sexe='HOMME'; }else if($row['sexe_personnel_soignant']=='2'){ $sexe='FEMME'; }else{ $sexe=''; } 

$date_nais = date("d/m/Y", strtotime($row['date_nais_personnel_soignant']));
//Req

	//Liste des bons d'entrée en stock
	  
	   	echo'<tr class="td td_vu" bgcolor="'.$couleur[($i%2)].'" >
		   	<td>'.utf8_decode($row['matricule_personnel_soignant']).'</td>
		   	<td>'.utf8_decode($row['nom_personnel_soignant']).'</td>	  
			<td>'.utf8_decode($ro['lib_service']).'</td>
			<td>'.utf8_decode($ro_1['lib_fonction']).'</td>
			<td>'.utf8_decode($ro_2['lib_statut_pers_soignant']).'</td>
			<td>'.utf8_decode($ro_3['lib_site']).'</td>
			</tr>';   $i++;	   
	}
	
   echo'</table><br/><br/>';

  
unset($_SESSION["recher_pers"]);

unset($con); 
?>