<?php
    session_start();
  include('../../../connex.php');
  
    ini_set('memory_limit','512M');
    ini_set('max_execution_time', 12000);
  
 if(isset($_POST['recher_pers']) && $_POST['recher_pers']!='')
	{
	$recher_pers=$_POST['recher_pers'];
    $_SESSION['recher_pers']=$recher_pers;
	}
	else
	{
	$recher_pers='';
    $_SESSION['recher_pers']=$recher_pers;
	}
		
  
  if($recher_pers!=''){
  ?>
  <script>
   function change_page_pers(page_id){
   
   var recher_pers='<?php echo $recher_pers; ?>';

   var dataString = 'page_id='+page_id+'&recher_pers='+recher_pers;
   
     $.ajax({
            type: "POST",
            url: "client/charge_client.php",
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
   
     if($recher_pers!='')
	 {	 
 
    $_SESSION["recher_pers"]=$recher_pers;
	
	 $requete="SELECT * FROM client WHERE valide=0 ";
	 
	 if($recher_pers!=""){
	 $requete.=" AND id_client=".$recher_pers." ";
	 }
	 	 
	 $sqlQuery= $con->query($requete);
	 
     }
	 else
	 {
	 $_SESSION["recher_pers"]='';
	
	 $sqlQuery 	= $con->query("SELECT * FROM client WHERE valide=0 ");
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


   if($recher_pers!='')
	 {	 
 
    $_SESSION["recher_pers"]=$recher_pers;

 
	 $requete="SELECT * FROM client WHERE valide=0 ";
	 
	 if($recher_pers!=""){
	 $requete.=" and id_client=".$recher_pers."";
	 }
	 

	 $requete.=" ORDER BY code_client DESC LIMIT $start, $records_per_page";
	 $records= $con->query($requete);
	 
     }
	 else
	 {
	$_SESSION["recher_pers"]='';
	
	$records = $con->query("SELECT * FROM client WHERE id_client!='' AND valide='0' ORDER BY code_client DESC LIMIT $start, $records_per_page");
	 }
	 
   
$count  = $records->rowCount();
$HTML='';

$HTML.='<p class="col_titre">Nombre de clients : <b>'.$count_1.'</b>&nbsp;&nbsp;';

$HTML.='
    <a href="client/exportation/pdf/pdf_client.php" target="_blank" style="font-size:20px; font-weight:600; color: #da0909" title="Générer le fichier pdf">
        <i class="fa fa-file-pdf"></i>
    </a>  &nbsp;&nbsp;&nbsp;
    <a href="client/exportation/excel/excel_client.php" target="_blank" style="font-size:20px; font-weight:600; color: #006f38" title="Générer le fichier excel">
        <i class="fa fa-file-excel"></i>
    </a> &nbsp;&nbsp;
</p>
<br/>
';

                       
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
			 <th>Code</th>
			 <th>Nom du client</th>
             <th>Email</th>
             <th>Téléphone</th>
             <th>Adresse</th>
			 <th colspan="2" class="rounded-end">Action</th>
		 </tr>
		 <!-- end tr -->
	 </thead>
	 <!-- end thead -->
	 <tbody>';
 
    foreach($records as $row) {
    
	        
				if($row['valide']==0){ $class_act='unlock'; }else{ $class_act='lock'; }
				

$HTML.='	
			<tr>
			<td><span class="c_0">'.stripslashes(strtoupper($row['code_client'])).'</span></td>
			<td><span class="text-lg text-semibold text-main fo_per">'.stripslashes($row['nom_client']).'</span></td>
            <td><span class="text-lg text-semibold text-main fo_per">'.stripslashes($row['email_client']).'</span></td>
            <td><span class="text-lg text-semibold text-main fo_per">'.stripslashes($row['tel_client']).'</span></td>
            <td><span class="text-lg text-semibold text-main fo_per">'.stripslashes($row['adresse']).'</span></td>
';
			
           $HTML.=' 
        <td>	           
            <a href="javascript:void();" class="btn btn-sm  supr" title="Supprimer" data-toggle="modal" data-target="#modal_sup" data-id='.$row['id_client'].'><i class="fa fa-trash"></i></a>
            <a href="javascript:void();" class="btn btn-sm  detail" title="D&eacute;tail" data-toggle="modal" data-target="#modal_detail" data-id='.$row['id_client'].'><i class="fa fa-align-justify fa_jus"></i></a>
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
    $titre='<br />Aucun client trouv&eacute;';
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