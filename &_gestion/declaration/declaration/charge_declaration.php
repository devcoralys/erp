<?php
    session_start();
	
	include('../../../connex.php');
	
    ini_set('memory_limit','512M');
    ini_set('max_execution_time', 12000);
    
    
    if(isset($_POST['recher_date_debut']) && $_POST['recher_date_debut']!='')
	{
	$recher_date_debut=$_POST['recher_date_debut'];
    $_SESSION['recher_date_debut']=$recher_date_debut;
	}
	else
	{
	$recher_date_debut='';
    $_SESSION['recher_date_debut']='';
	}

    if(isset($_POST['recher_date_fin']) && $_POST['recher_date_fin']!='')
	{
	$recher_date_fin=$_POST['recher_date_fin'];
    $_SESSION['recher_date_fin']=$recher_date_fin;
	}
	else
	{
	$recher_date_fin='';
    $_SESSION['recher_date_fin']='';
	}

    if(isset($_POST['recher_num_declaration']) && $_POST['recher_num_declaration']!='')
	{
	$recher_num_declaration=$_POST['recher_num_declaration'];
    $_SESSION['recher_num_declaration']=$recher_num_declaration;
	}
	else
	{
	$recher_num_declaration='';
    $_SESSION['recher_num_declaration']='';
	}

    if(isset($_POST['recher_reference']) && $_POST['recher_reference']!='')
	{
	$recher_reference=$_POST['recher_reference'];
    $_SESSION['recher_reference']=$recher_reference;
	}
	else
	{
	$recher_reference='';
    $_SESSION['recher_reference']='';
	}


	if($recher_date_debut!='' || $recher_date_fin!='' || $recher_num_declaration!='' || $recher_reference!=''){
    ?>
    <script>

	 function change_page_declaration(page_id_cons){
       
   
    
    var recher_date_debut='<?php echo $recher_date_debut; ?>';
    var recher_date_fin='<?php echo $recher_date_fin; ?>';
    var recher_num_declaration='<?php echo $recher_num_declaration; ?>';
    var recher_reference='<?php echo $recher_reference; ?>';

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_num_declaration='+recher_num_declaration+'&recher_reference='+recher_reference;
	 
	 
     $.ajax({
           type: "POST",
           url: "declaration/charge_declaration.php",
           data: dataString,
           cache: false,
		    beforeSend: function(){
			$("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').show();
            $(".aff_declaration").hide();
            },
           success: function(result){
		  $("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').hide();
		  $(".aff_declaration").html(result).show();
		   }
      });
    }
	</script>
     

    <?php
	}
//	}

    $requete=" SELECT * FROM declaration WHERE id_declaration!='' ";
/*
    if($recher_date_debut!=''){
	    $requete.=" AND date_declaration>='".$recher_date_debut."'  ";
	}

    if($recher_date_fin!=''){
	    $requete.=" AND date_declaration<='".$recher_date_fin."'  ";
	}
*/

    if($recher_date_debut!=''){
	    $requete.=" AND date_declaration>='".$recher_date_debut."'  ";
	}

    if($recher_date_fin!=''){
	    $requete.=" AND date_declaration<='".$recher_date_fin."'  ";
	}

    if($recher_num_declaration!=''){
	    $requete.=" AND num_declaration LIKE '%".$recher_num_declaration."%' ";
	}
    
    if($recher_reference!=''){
	    $requete.=" AND reference_declaration LIKE '%".$recher_reference."%' ";
	}


    $sqlQuery=$con->query($requete);

	$count  	= $sqlQuery->rowCount();
    $count_1  	= $sqlQuery->rowCount();
	
	$adjacents = 2;
	$records_per_page = 100;
	
	$page = (int) (isset($_POST['page_id_cons']) ? $_POST['page_id_cons'] : 1);
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
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_declaration(1);'>&laquo; Debut</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Debut</span>";
		
		if ($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_declaration(".($prev).");'>&laquo; Precedent&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Precedent&nbsp;&nbsp;</span>";   
		
        if ($last_page < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $last_page; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href='javascript:void(0);' onClick='change_page_declaration(".($counter).");'>$counter</a>";     
                         
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
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_declaration(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_declaration(".($second_last).");'> $second_last</a>";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_declaration(".($last_page).");'>$last_page</a>";   
           
           }
           elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_declaration(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_declaration(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href='javascript:void(0);' onClick='change_page_declaration(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_declaration(".($second_last).");'>$second_last</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_declaration(".($last_page).");'>$last_page</a>";   
           }
           else
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_declaration(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_declaration(2);'>2</a>";
               $pagination.= "..";
               for($counter = $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_declaration(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_declaration(".($next).");'>Suivant &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Suivant &raquo;</span>";
		
		if($page < $last_page)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_declaration(".($last_page).");'>Fin &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Fin &raquo;</span>";
        
        $pagination.= "</div>";       
    }

    $req=" SELECT * FROM declaration WHERE id_declaration!=''  ";
    
    if($recher_date_debut!=''){
	    $req.=" AND date_declaration>='".$recher_date_debut."'  ";
	}

    if($recher_date_fin!=''){
	    $req.=" AND date_declaration<='".$recher_date_fin."'  ";
	}

    if($recher_num_declaration!=''){
	    $req.=" AND num_declaration LIKE '%".$recher_num_declaration."%' ";
	}
    
    if($recher_reference!=''){
	    $req.=" AND reference_declaration LIKE '%".$recher_reference."%' ";
	}

   /* 
    if($recher_date_debut!=''){
	    $req.=" AND date_declaration>='".$recher_date_debut."'  ";
	}

    if($recher_date_fin!=''){
	    $req.=" AND date_declaration<='".$recher_date_fin."'  ";
	}

 */
    
    $req.=" ORDER BY date_declaration DESC LIMIT ".$start.", ".$records_per_page." ";
    

$records=$con->query($req);    
 
$count  = $records->rowCount();
$HTML='';

$HTML.='
<p style="color:grey;">Nombre de declarations : <b>'.$count_1.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>';


$HTML.='
<p>
    <a href="../exportation/pdf/pdf_liste_declaration.php" target="_blank" style="font-size:20px; font-weight:600; color: #da0909" title="Générer le fichier pdf">
        Exporter en  <i class="fa fa-file-pdf"></i>
    </a>  &nbsp;
    
    
    <!--
    <a href="exportation/excel/excel_liste_declaration.php" target="_blank" style="font-size:20px; font-weight:600; color: #006f38" title="Générer le fichier excel">
        Exporter en <i class="fa fa-file-excel"></i>
    </a> &nbsp;&nbsp;
  
    
    <a href="javascript:void()" target="_blank" style="font-size:20px; font-weight:600; color: #000000" title="Imprimer">
        <i class="fa fa-print"></i>
    </a>
    -->
</p>
<br/>
';

					             
if($count > 0)
{

    $HTML.='                        <div class="table-responsive">
					                <table id="myTable" class="table" style="text-align:left;">
					                    <thead>
					                        <tr>
					                            <th>&nbsp;</th>
					                            <th><a href="javascript:void();">Date</a></th>	
                                                <th><a href="javascript:void();">Référence</a></th>
                                                <th><a href="javascript:void();">Client</a></th>	
                                                <th><a href="javascript:void();">Régime</a></th>	
                                                <th><a href="javascript:void();">Bureau</a></th>
                                                <th><a href="javascript:void();">N° Déclaration</a></th>
                                                <th><a href="javascript:void();">N° Liquidation</a></th>
                                                <th><a href="javascript:void();">Paiement</a></th>
                                                <th><a href="javascript:void();">D&T</a></th>
                                                <th><a href="javascript:void();">Agio</a></th>
                                                <th><a href="javascript:void();">Tirage</a></th>
                                                <th><a href="javascript:void();">Ouverture</a></th>
                                                <th><a href="javascript:void();">FDI + RFCV</a></th>
                                                <th><a href="javascript:void();">Assurance</a></th>
                                                <th><a href="javascript:void();">Quittance N°</a></th>
                                                <th><a href="javascript:void();">Conteneur</a></th>
                                                <th><a href="javascript:void();">Divers/BSC</a></th>
                                                <th><a href="javascript:void();">LTA</a></th>
                                                <th><a href="javascript:void();">Poids</a></th>
                                                <th><a href="javascript:void();">Total</a></th>
                                                <th><a href="javascript:void();">&nbsp;</a></th>
					                        </tr>
					                    </thead>
					                    <tbody>';

$i=1;

    foreach($records as $row) {
        
        
        $montant_total=floatval($row['dt_declaration'])+floatval($row['agio_declaration'])+floatval($row['tirage_declaration'])+floatval($row['ouverture_declaration'])+floatval($row['fdi_declaration'])+floatval($row['assurance_declaration'])+floatval($row['bsc_declaration']);
       
	
$HTML.=' 
<tr>
            <td><span class="text-muted" style="color:#CC9900;  ">'.$i.'</span></td> 
            <td><span class="text-muted" style="color:#CC9900;  ">'.stripslashes(date("d/m/Y", strtotime($row['date_declaration']))).'</span></td>  
            <td><span class="text-muted" style="color:#CC9900;  ">'.stripslashes($row['reference_declaration']).'</span></td> 
            <td><span class="text-muted" style="color:#CC9900;  ">'.stripslashes($row['client_declaration']).'</span></td>  
            <td><span class="text-muted" style="color:#CC9900;  ">'.stripslashes($row['regime_declaration']).'</span></td>     
            <td><span class="text-muted" style="color:#CC9900;  ">'.stripslashes($row['bureau_declaration']).'</span></td>    
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['num_declaration']).'</span></td>   
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['num_liquidation_declaration']).'</span></td>  
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['paiement_declaration']).'</span></td>   
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['dt_declaration']).'</span></td>  
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['agio_declaration']).'</span></td>  
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['tirage_declaration']).'</span></td>  
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['ouverture_declaration']).'</span></td> 
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['fdi_declaration']).'</span></td>  
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['assurance_declaration']).'</span></td>  
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['num_quittance_declaration']).'</span></td> 
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['conteneur_declaration']).'</span></td>  
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['bsc_declaration']).'</span></td>  
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['lta_declaration']).'</span></td>  
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['poids_declaration']).'</span></td>  
            <td><span class="" style="color:#CC9900;  ">'.stripslashes(number_format($montant_total,0,',',' ')).' FCFA</span></td>  
            <td>
                <a href="modifier_declaration.php?id_dec_mod='.$row['id_declaration'].'"><span class="text-muted" style="color:#CC9900;"><i class="fa fa-edit fa-2x"></i></span></a>
                &nbsp;
                <a href="declaration/supprimer_declaration.php?id_dec_sup='.$row['id_declaration'].'"><span class="text-muted" style="color:#CC9900;"><i class="fa fa-trash fa-2x"></i></span></a>
            </td>   
       ';

$HTML.='</tr>

</div>
'; 

  $i++;		                                                                 
}

$HTML.='';
			
}
 
else
{
    $titre='<br />Aucune declaration trouv&eacute;e';
    $donnee=mb_convert_encoding($titre, 'ISO-8859-7', 'UTF-8');
    $HTML.='<div><font color="#990000" style="font-size:11px; align="center"">'.$donnee.'</font></div>';
}
	   	
$HTML.='';	   
echo $HTML;
echo $pagination;
echo'<br /><br />';
unset($con);

?>
<!--
<script src="../assets/libs/tabletolist/tableToCards.js"></script>
-->