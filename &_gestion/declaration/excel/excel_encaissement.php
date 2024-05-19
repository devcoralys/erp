<?PHP 
include('../../../connex.php');
session_start ();
$date=gmdate("Y-m-d H:i:s");
   


	$req=" SELECT * FROM caisse WHERE code_caisse!='' ";


    $req.=" ORDER BY lib_caisse ASC ";
	$records=$con->query($req);   
	
	/*
	$inf=$con->query(" SELECT * FROM utilisateur WHERE id_utilisateur='".$recher_utilisateur."' ");
	$info=$inf->fetch();
	$nom_utilisateur=$info['nom_utilisateur'];
	*/		  

header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-disposition: attachment; filename=liste_caisses_".$date.".xls");

$count = $records->rowCount();

  echo'<h3>LISTE DES caisseS</h3>';
/*
  echo '<b>Crit&egrave;res:</b><p>Recherche= <b>'.$recher_historique.'</b>, Utilisateur= <b>'.$nom_utilisateur.'</b>,  Debut= <b>'.$dp1.'</b>, Fin= <b>'.$dp2.'</b></p> ';
  */
  echo'&Eacute;L&Eacute;MENTS TROUV&Eacute;S : '.$count;
  
   echo'<table  style="border:1px solid;">
          <tr style="font-size:14px; font-weight:500; border:1px solid; color:#fff; background-color:#038dda;">
           <td width="150">CODE</td>
            <td width="130">NOM ET PRENOM(S)</td>
			<td width="380">TELEPHONE</td>
			<td width="250">ADRESSE</td>
			</tr>'; 
 
	while($row= $records->fetch())
   {
 				
		
                   echo'<tr style="border:1px solid">
				   	 <td width="180">'.$row['lib_caisse'].'</td>
					 <td width="100">'.$row['num_caisse'].'</td>
					 <td width="130">'.$row['tel_caisse'].'</td>
			         <td width="300">'.$row['adresse_caisse'].'</td>
					 </tr>';
 
	}
	
   echo'</table>';
   
   unset($con); 
 
?>
