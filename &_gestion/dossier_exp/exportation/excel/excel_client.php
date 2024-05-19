<?php
date_default_timezone_set("Europe/London");
include('../../../../../connex.php');
 session_start ();
$date=date('Y-m-d', time());

ini_set('memory_limit','512M');
ini_set('max_execution_time', 12000);
	

	$heure='00:00:00';

header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-disposition: attachment; filename=liste_client_sttci_".$date.".xls");/**/	


if(isset($_SESSION['recher_pers']) && $_SESSION['recher_pers']!='')
{
$recher_pers=$_SESSION['recher_pers'];
}
else
{
$recher_pers='';
}


$req="SELECT * FROM client WHERE id_client!='' ";
 
 if($recher_pers!=""){
 $req.=" and id_client =".$recher_pers." ";
 }
 		
$req.=" ORDER BY code_client DESC ";

$lst=$con->prepare($req);
$lst->execute();
//$fino=$lst->fetch();
      
 $couleur[0]="#F1F1F1";
    $couleur[1]="#FFFFFF"; 
	$i=1;

	echo'
	<br />
<h1><strong style="font-size:20px; color:red; align:center; text-decoration:underline;">LISTE DES CLIENTS</strong></h1>
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

	echo'<strong style="font-size:18px; font-color:red;">Liste des clients STTCI :</strong>  <br/><br/>';

	echo '<table class="utilisateur tab_list_client"  border="2" >
		 <tr class="td tr"  bgcolor="#0e7e70"  >
			<td width="150">Code</td>
			<td width="150">Nom du client</td>
			<td width="150">Email</td>
			<td width="150">Téléphone</td>
		</tr>';

	while($row=$lst->fetch())
   {

//Req

//Req

	//Liste des bons d'entrée en stock
	  
	   	echo'<tr class="td td_vu" bgcolor="'.$couleur[($i%2)].'" >
				<td>'.utf8_decode($row['code_client']).'</td>
				<td>'.utf8_decode($row['nom_client']).'</td>	  
				<td>'.utf8_decode($row['email_client']).'</td>
				<td>'.utf8_decode($row['tel_client']).'</td>
			</tr>';   
			$i++;	   
	}
	
   echo'</table><br/><br/>';

  
unset($_SESSION["recher_pers"]);

unset($con); 
?>