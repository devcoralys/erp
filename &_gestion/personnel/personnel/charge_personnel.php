<?php
    session_start();
  include('../../../connex.php');
  
    ini_set('memory_limit','512M');
    ini_set('max_execution_time', 12000);
  
 if(isset($_POST['recher_pers']) && $_POST['recher_pers']!='')
	{
	$recher_pers=$_POST['recher_pers'];
	}
	else
	{
	$recher_pers='';
	}
	
	if(isset($_POST['recher_service']) && $_POST['recher_service']!='')
	{
	$recher_service=$_POST['recher_service'];
	}
	else
	{
	$recher_service='';
	}
	
	if(isset($_POST['recher_fonction']) && $_POST['recher_fonction']!='')
	{
	$recher_fonction=$_POST['recher_fonction'];
	}
	else
	{
	$recher_fonction='';
	}
	
	if(isset($_POST['recher_statut']) && $_POST['recher_statut']!='')
	{
	$recher_statut=$_POST['recher_statut'];
	}
	else
	{
	$recher_statut='';
	}
	
	
	if(isset($_POST['recher_sexe']) && $_POST['recher_sexe']!='')
	{
	$recher_sexe=$_POST['recher_sexe'];
	}
	else
	{
	$recher_sexe='';
	}

	
	
  
  if($recher_pers!='' || $recher_service!='' || $recher_fonction!='' || $recher_statut!='' || $recher_sexe!=''){
  ?>
  <script>
   function change_page_pers(page_id){
   
   var recher_pers='<?php echo $recher_pers; ?>';
   var recher_service='<?php echo $recher_service; ?>';
   var recher_fonction='<?php echo $recher_fonction; ?>';
   var recher_statut='<?php echo $recher_statut; ?>';
   var recher_sexe='<?php echo $recher_sexe; ?>';
   var dataString = 'page_id='+page_id+'&recher_pers='+recher_pers+'&recher_service='+recher_service+'&recher_fonction='+recher_fonction+'&recher_statut='+recher_statut+'&recher_sexe='+recher_sexe;
   
     $.ajax({
            type: "POST",
            url: "personnel/charge_personnel.php",
           data: dataString,
           cache: false,
        beforeSend: function(){
      $("div.chargement").html('<img src="../../img/giphy.gif" style="width:65px; height:65px;" />').show();
            },
           success: function(result){
      $("div.chargement").html('<img src="../../img/giphy.gif" style="width:65px; height:65px;" />').hide();
      $(".affiche_pers").html(result);
       }
      });
    }
  </script>
  <?php 
   }
   
     if($recher_pers!='' || $recher_service!='' || $recher_fonction!='' || $recher_statut!='' || $recher_sexe!='')
	 {	 
 
    $_SESSION["recher_pers"]=$recher_pers;
	$_SESSION["recher_service"]=$recher_service;
	$_SESSION["recher_fonction"]=$recher_fonction;
	$_SESSION["recher_statut"]=$recher_statut;
	$_SESSION["recher_sexe"]=$recher_sexe;
	
	 $requete="SELECT * FROM personnel WHERE id_personnel!=''";
	 
	 if($recher_pers!=""){
	 $requete.=" and id_personnel=".$recher_pers."";
	 }
	 
	 if($recher_service!=""){
	 $requete.=" AND service_id=".$recher_service."";
	 }
	 
	 if($recher_fonction!=""){
	 $requete.=" AND fonction_id=".$recher_fonction."";
	 }
	 
	 if($recher_statut!=""){
	 $requete.=" AND statut_personnel_id=".$recher_statut."";
	 }
	  	 
	 if($recher_sexe!=""){
	 $requete.=" AND sexe_personnel=".$recher_sexe."";
	 }

	 
	 $sqlQuery= $con->query($requete);
	 
     }
	 else
	 {
	 $_SESSION["recher_pers"]='';
	$_SESSION["recher_service"]='';
	$_SESSION["recher_fonction"]='';
	$_SESSION["recher_statut"]='';
	$_SESSION["recher_sexe"]='';
	
	 $sqlQuery 	= $con->query("SELECT * FROM personnel WHERE id_personnel!='' AND valide='0' ");
	 }
   
    $count    = $sqlQuery->rowCount();
    $count_1    = $sqlQuery->rowCount();
  
  $adjacents = 2;
  $records_per_page =12;
  
  $page = (int) (isset($_POST['page_id']) ? $_POST['page_id'] : 1);
  $page = ($page == 0 ? 1 : $page);
  $start = ($page-1) * $records_per_page;
  
  $next = $page + 1;    
  $prev = $page - 1;
  $last_page = ceil($count/$records_per_page);
  $second_last = $last_page - 1; 

  
  $pagination = "";
  if($last_page > 1){
        $pagination .= "<div class='pagination'>";
        if($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_pers(1);'>&laquo; Debut</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Debut</span>";
    
    if ($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_pers(".($prev).");'>&laquo; Precedent&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Precedent&nbsp;&nbsp;</span>";   
    
        if ($last_page < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $last_page; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href='javascript:void(0);' onClick='change_page_pers(".($counter).");'>$counter</a>";     
                         
            }
        }
        elseif($last_page > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))
            {
                for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                    else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_pers(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_pers(".($second_last).");'> $second_last</a>";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_pers(".($last_page).");'>$last_page</a>";   
           
           }
           elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_pers(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_pers(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href='javascript:void(0);' onClick='change_page_pers(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_pers(".($second_last).");'>$second_last</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_pers(".($last_page).");'>$last_page</a>";   
           }
           else
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_pers(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_pers(2);'>2</a>";
               $pagination.= "..";
               for($counter = $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_pers(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_pers(".($next).");'>Suivant &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Suivant &raquo;</span>";
    
    if($page < $last_page)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_pers(".($last_page).");'>Fin &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Fin &raquo;</span>";
        
        $pagination.= "</div>";       
    }


   if($recher_pers!='' || $recher_service!='' || $recher_fonction!='' || $recher_statut!='' )
	 {	 
 
    $_SESSION["recher_pers"]=$recher_pers;
	$_SESSION["recher_service"]=$recher_service;
	$_SESSION["recher_fonction"]=$recher_fonction;
	$_SESSION["recher_statut"]=$recher_statut;
 
	 $requete="SELECT * FROM personnel WHERE id_personnel!='' ";
	 
	 if($recher_pers!=""){
	 $requete.=" and id_personnel=".$recher_pers."";
	 }
	 
	 if($recher_service!=""){
	 $requete.=" AND service_id=".$recher_service."";
	 }
	 
	 if($recher_fonction!=""){
	 $requete.=" AND fonction_id=".$recher_fonction."";
	 }
	 
	 if($recher_statut!=""){
	 $requete.=" AND statut_personnel_id=".$recher_statut."";
	 }
	  	  
	 if($recher_sexe!=""){
	 $requete.=" AND sexe_personnel=".$recher_sexe."";
	 }

	 $requete.=" ORDER BY nom_personnel ASC, matricule_personnel ASC LIMIT $start, $records_per_page";
	 $records= $con->query($requete);
	 
     }
	 else
	 {
	$_SESSION["recher_pers"]='';
	$_SESSION["recher_service"]='';
	$_SESSION["recher_fonction"]='';
	$_SESSION["recher_statut"]='';
	$_SESSION["recher_sexe"]='';
	
	$records = $con->query("SELECT * FROM personnel WHERE id_personnel!='' AND valide='0' ORDER BY nom_personnel ASC, matricule_personnel ASC LIMIT $start, $records_per_page");
	 }
	 
   
$count  = $records->rowCount();
$HTML='';

$HTML.='<p class="col_titre">Nombre de personnes : <b>'.$count_1.'</b>&nbsp;&nbsp;';
/*
$HTML.='
    <a href="personnel/exportation/pdf/pdf_personnel.php" target="_blank" style="font-size:20px; font-weight:600; color: #da0909" title="Générer le fichier pdf">
        <i class="fa fa-file-pdf-o"></i>
    </a>  &nbsp;&nbsp;&nbsp;
    <a href="personnel/exportation/excel/excel_personnel.php" target="_blank" style="font-size:20px; font-weight:600; color: #006f38" title="Générer le fichier excel">
        <i class="fa fa-file-excel-o"></i>
    </a> &nbsp;&nbsp;
    <a href="personnel/exportation/imprimer/imprim_personnel.php" target="_blank" style="font-size:20px; font-weight:600; color: #000000" title="Imprimer">
        <i class="fa fa-print"></i>
    </a>
</p>
<br/>
';
*/
                       
if($count > 0)
{

$HTML.=' <div class="row">';
 $i=1;
 $couleur[0]="#ffffff";
 $couleur[1]="#f6f6f6"; 
 $k=0; 

$HTML.='
 <div class="table-responsive" id="parent" style="margin-top:10px auto;">
 <table id="list_trait" class="table table-hover table-nowrap mb-0 align-middle table-check">
	 <thead class="bg-light">
		 <tr>
			 <th>Matricule</th>
			 <th>Photo</th>
			 <th>Nom et Prénom</th>
             <th>Sexe</th>
             <th>Email</th>
             <th>Téléphone</th>
			 <th>Service</th>
			 <th>Fonction</th>
			 <th>Statut</th>
			 <th colspan="2" class="rounded-end">Action</th>
		 </tr>
		 <!-- end tr -->
	 </thead>
	 <!-- end thead -->
	 <tbody>';
 
    foreach($records as $row) {
    
	            $rep=$con->prepare("SELECT * FROM service WHERE id_service='".$row['service_id']."'");
                $rep->execute(); 
	            $ro=$rep->fetch();
				
				$rep_1=$con->prepare("SELECT * FROM fonction WHERE id_fonction='".$row['fonction_id']."'");
                $rep_1->execute(); 
	            $ro_1=$rep_1->fetch();
				
				$rep_2=$con->prepare("SELECT * FROM statut_personnel WHERE id_statut_personnel='".$row['statut_personnel_id']."'");
                $rep_2->execute(); 
				$ro_2=$rep_2->fetch();

				if($row['valide']==0){ $class_act='unlock'; }else{ $class_act='lock'; }
				
				
if($row['sexe_personnel']=='1'){ $sexe='HOMME'; }else if($row['sexe_personnel']=='2'){ $sexe='FEMME'; }else{ $sexe=''; } 

$date_nais = date("d/m/Y", strtotime($row['date_nais_personnel']));

$HTML.='	
			<tr>
			<td><span class="c_0">'.stripslashes(strtoupper($row['matricule_personnel'])).'</span></td>
			<td><img style="height:50px; text-align:center; border-radius:50px;" alt="Photo" class="img-md img-circle img_col" src="../../photo/'; if($row['photo_personnel']!=''){ $HTML.= $row['photo_personnel']; }else{ $HTML.='profile-icon.png'; }  $HTML.='"></td>
			<td><span class="text-lg text-semibold text-main fo_per">'.stripslashes($row['nom_personnel']).'</span></td>
            <td><span class="text-lg text-semibold text-main fo_per">'.stripslashes($row['sexe_personnel']).'</span></td>
            <td><span class="text-lg text-semibold text-main fo_per">'.stripslashes($row['email_personnel']).'</span></td>
            <td><span class="text-lg text-semibold text-main fo_per">'.stripslashes($row['tel_personnel']).'</span></td>
			<td>'.stripslashes($ro['lib_service']).'</td>
			<td>'.stripslashes($ro_1['lib_fonction']).'</td>
			<td>'.stripslashes($ro_2['lib_statut_personnel']).'</td>

';
			
           $HTML.=' 
        <td>	           
            <a href="javascript:void();" class="btn btn-sm  actif" title="D&eacute;sactivez cette personne" data-toggle="modal" data-target="#modal_actif" data-id='.$row['id_personnel'].'><i class="fa fa-'.$class_act.'"></i></a>
            <a href="javascript:void();" class="btn btn-sm  supr" title="Supprimer" data-toggle="modal" data-target="#modal_sup" data-id='.$row['id_personnel'].'><i class="fa fa-trash"></i></a>
            <a href="javascript:void();" class="btn btn-sm  edit_mod" title="Modifier" data-toggle="modal" data-target="#modal_mod" data-id='.$row['id_personnel'].'><i class="fa fa-edit"></i></a>
            <a href="javascript:void();" class="btn btn-sm  detail" title="D&eacute;tail" data-toggle="modal" data-target="#modal_detail" data-id='.$row['id_personnel'].'><i class="fa fa-align-justify fa_jus"></i></a>
		</td>
		</tr>
		';
								
                    
                  $i++;
                  $k++;                                                                    
}
      

$HTML.='
</tbody><!-- end tbody -->
</table><!-- end table -->
</div>
';
                  

}
 
else
{
    $titre='<br />Aucune personne trouv&eacute;e';
    $donnee=mb_convert_encoding($titre, 'ISO-8859-7', 'UTF-8');
    $HTML.='<div align="center"><font color="#990000" style="font-size:11px;">'.$donnee.'</font></div>';
}
      
$HTML.='</div>';
                             
echo $HTML;
echo $pagination;
echo'<br /><br />';
unset($con);

?>

<script src="../assets/libs/tabletolist/tableToList.js"></script>
        <script>
            $(function() {
                getList('#list_trait', '#parent');
            });
        </script>