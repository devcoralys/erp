<?PHP 
include('../../../connex.php');
session_start ();
$date=gmdate("Y-m-d H:i:s");
   

$req=" SELECT * FROM formation LEFT JOIN demande_formation ON demande_formation.id_demande_formation=formation.demande_formation_id WHERE date_fin_formation<='".gmdate('Y-m-d')."' ";
$records=$con->query($req);   
  

header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-disposition: attachment; filename=liste_formation".$date.".xls");

$count = $records->rowCount();

  echo'<h3>LISTE DES FORMATIONS</h3>';

  echo'&Eacute;L&Eacute;MENTS TROUV&Eacute;S : '.$count;
  
   echo'
   		<table  style="border:1px solid">
         	<tr style="font-size:14px; font-weight:500; border:1px solid; background-color:#f5f6f8;">
				<td width="20">ID</td>
                <td width="80">Code</td>
                <td width="350">Th&egrave;me de la formation</td>
				<td width="80">Montant</td>
                <td width="120">D&eacute;but</td>
                <td width="120">Fin</td>
			</tr>
	'; 
	$i=0;
	while($row= $records->fetch())
   {				
	   		$i++;
            echo'
				<tr style="border:1px solid">
					<td width="20">'.$i.'</td>
					<td width="120">'.$row['num_formation'].'</td>
					<td width="350">'.$row['formation_demande'].'</td>
					<td width="80">'.$row['montant_formation'].'</td>
					<td width="120">'.$row['date_debut_formation'].'</td>
					<td width="120">'.$row['date_fin_formation'].'</td>
				</tr>
			';
 
	}
	
   echo'
   		</table>
	';
   
   unset($con); 
 
?>
