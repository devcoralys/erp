<?PHP 
include('../../../connex.php');
session_start ();
$date=gmdate("Y-m-d H:i:s");
   

$req=" SELECT * FROM budget LEFT JOIN budget_service ON budget.code_budget=budget_service.budget_code_service LEFT JOIN service ON budget_service.service_id_budget=service.id_service WHERE actif_budget=0 ";
$records=$con->query($req);   
  

header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-disposition: attachment; filename=budget_formation_par_service_".$date.".xls");

$count = $records->rowCount();

  echo'<h3>ETAT DU BUDGET PAR SERVICE</h3>';

  echo'&Eacute;L&Eacute;MENTS TROUV&Eacute;S : '.$count;
  
   echo'
   		<table  style="border:1px solid">
         	<tr style="font-size:14px; font-weight:500; border:1px solid; background-color:#f5f6f8;">
				<td width="20">ID</td>
                <td width="80">Date et heure</td>
                <td width="350">Service</td>
                <td width="150">Budget allou&eacute;</td>
                <td width="150">Faction ex&eacute;cut&eacute;e</td>
                <td width="150">Fraction disponible</td>
			</tr>
	'; 
	$i=0;
	while($row= $records->fetch())
   {				
	   		$i++;
			$montant_restant=$row['montant_alloue']-$row['montant_execute'];
            echo'
				<tr style="border:1px solid">
					<td width="20">'.$i.'</td>
					<td width="120">'.gmdate('d/m/Y H:i:s').'</td>
					<td width="350">'.$row['lib_service'].'</td>
					<td width="150">'.$row['montant_alloue'].'</td>
					<td width="150">'.$row['montant_execute'].'</td>
					<td width="150">'.$montant_restant.'</td>
				</tr>
			';
 
	}
	
   echo'
   		</table>
	';
   
   unset($con); 
 
?>
