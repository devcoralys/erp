<?php
    session_start();
	
	include('../../../connex.php');
	
    ini_set('memory_limit','512M');
    ini_set('max_execution_time', 12000);
	
	
    ?>
    <script>

	 function change_page_rapport(page_id_cons){
       
  var dataString = 'page_id_cons='+ page_id_cons;
	 
     $.ajax({
           type: "POST",
           url: "rapport/charge_rapport.php",
           data: dataString,
           cache: false,
		    beforeSend: function(){
			$("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').show();
            $(".aff_rapport").hide();
            },
           success: function(result){
		  $("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').hide();
		  $(".aff_rapport").html(result).show();
		   }
      });
    }
	</script>
     

    <?php

$requete=" SELECT * FROM rapport WHERE id_rapport!='' AND secur_ajout_rapport=".$_SESSION['secur_site']." ";

if($_SESSION['acces_tout_rapport']==1)
{
    $requete=" SELECT * FROM rapport WHERE id_rapport!='' ";
}


    $sqlQuery=$con->query($requete);

	$count  	= $sqlQuery->rowCount();
    $count_1  	= $sqlQuery->rowCount();
	
	$adjacents = 2;
	$records_per_page = 6;
	
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
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_rapport(1);'>&laquo; Debut</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Debut</span>";
		
		if ($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_rapport(".($prev).");'>&laquo; Precedent&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Precedent&nbsp;&nbsp;</span>";   
		
        if ($last_page < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $last_page; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href='javascript:void(0);' onClick='change_page_rapport(".($counter).");'>$counter</a>";     
                         
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
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_rapport(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_rapport(".($second_last).");'> $second_last</a>";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_rapport(".($last_page).");'>$last_page</a>";   
           
           }
           elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_rapport(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_rapport(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href='javascript:void(0);' onClick='change_page_rapport(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_rapport(".($second_last).");'>$second_last</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_rapport(".($last_page).");'>$last_page</a>";   
           }
           else
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_rapport(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_rapport(2);'>2</a>";
               $pagination.= "..";
               for($counter = $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_rapport(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_rapport(".($next).");'>Suivant &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Suivant &raquo;</span>";
		
		if($page < $last_page)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_rapport(".($last_page).");'>Fin &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Fin &raquo;</span>";
        
        $pagination.= "</div>";       
    }

    $req=" SELECT * FROM rapport WHERE id_rapport!='' AND secur_ajout_rapport=".$_SESSION['secur_site']." ";
    
    if($_SESSION['acces_tout_rapport']==1)
    {
        $req=" SELECT * FROM rapport WHERE id_rapport!='' ";
    }
 
    
    $req.=" ORDER BY date_creat_rapport DESC LIMIT ".$start.", ".$records_per_page." ";

$records=$con->query($req);    
 
$count  = $records->rowCount();
$HTML='';

$HTML.='
<p style="color:grey;">Nombre de rapports : <b>'.$count_1.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>';


					             
if($count > 0)
{

    $HTML.='                        <div class="table-responsive">
					                <table id="myTable" class="table" style="text-align:left;">
					                    <thead>
					                        <tr>
					                            <th>&nbsp;</th>
					                            <th>&nbsp;</th>
					                            <th><a href="javascript:void();">Date</a></th>	
                                                <th><a href="javascript:void();">Dossier N°</a></th>
                                                <th><a href="javascript:void();">Client</a></th>	
                                                <th><a href="javascript:void();">Montant Cotation</a></th>	
                                                <th><a href="javascript:void();">Montant Décaissé</a></th>
                                                <th><a href="javascript:void();">Montant Restant</a></th>
                                                <th><a href="javascript:void();">N° Déclaration</a></th>
                                                <th><a href="javascript:void();">Date Déclaration</a></th>
                                                <th><a href="javascript:void();">Avancement Dossier</a></th>
                                                <th><a href="javascript:void();">Date Livraison</a></th>
                                                <th><a href="javascript:void();">Bénéfice</a></th>
                                                <th><a href="javascript:void();">Statut Dossier</a></th>
                                                <th><a href="javascript:void();">Statut Facture</a></th>
                                                <th><a href="javascript:void();">Date Trans. Fact.</a></th>
                                                <th><a href="javascript:void();">Date Fin Dossier</a></th>
                                                <th><a href="javascript:void();">Observations</a></th>
                                                <th><a href="javascript:void();">&nbsp;</a></th>
					                        </tr>
					                    </thead>
					                    <tbody>';

$i=1;

    foreach($records as $row) {
        
        
        //$montant_total=floatval($row['dt_rapport'])+floatval($row['agio_rapport'])+floatval($row['tirage_rapport'])+floatval($row['ouverture_rapport'])+floatval($row['fdi_rapport'])+floatval($row['assurance_rapport']);
       
	if($row['type_rapport']!='Autre')
	{
$HTML.=' 
<tr>
            <td><span class="text-muted" style="color:#CC9900;  ">'.$i.'</span></td> 
            <td><span class="text-muted" style="color:red;">'.$row['type_rapport'].'</span></td> 
            <td><span class="text-muted" style="color:#CC9900;  ">'.stripslashes(date("d/m/Y", strtotime($row['date_rapport']))).'</span></td>  
            <td><span class="text-muted" style="color:#CC9900;  ">'.stripslashes($row['num_dossier_rapport']).'</span></td> 
            <td><span class="text-muted" style="color:#CC9900;  ">'.stripslashes($row['nom_client_rapport']).'</span></td>  
            <td><span class="text-muted" style="color:#CC9900;  ">'.number_format($row['montant_cotation_rapport'],0,',',' ').'</span></td>     
            <td><span class="text-muted" style="color:#CC9900;  ">'.number_format($row['montant_decaisse_rapport'],0,',',' ').'</span></td>    
            <td><span class="" style="color:#CC9900;  ">'.number_format($row['montant_restant_rapport'],0,',',' ').' FCFA</span></td>   
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['num_declaration_rapport']).'</span></td>  
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['date_declaration_rapport']).'</span></td>   
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['avancement_dossier_rapport']).'</span></td>  
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['date_livraison_rapport']).'</span></td>  
            <td><span class="" style="color:#CC9900;  ">'.number_format($row['benefice_rapport'],0,',',' ').'</span></td>  
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['statut_dossier_rapport']).'</span></td> 
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['statut_facture_rapport']).'</span></td> 
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['date_transmission_facture_rapport']).'</span></td>  
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['date_cloture_dossier_rapport']).'</span></td>  
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['observation_rapport']).'</span></td> 

            <td><a target="_blank" href="../exportation/pdf/pdf_recu.php?id_rapport='.$row['id_rapport'].'"><span class="text-muted" style="color:#CC9900;"><i class="fa fa-file-pdf fa-2x"></i></span></a></td>   
       ';
	}
	else
	{
	    $HTML.=' 
	    <td><span class="text-muted" style="color:#CC9900;  ">'.$i.'</span></td> 
	    <td><span class="text-muted" style="color:red;">'.$row['type_rapport'].'</span></td> 
	    <td colspan="16"><textarea readonly class="form-control" style="color:#CC9900;  ">'.stripslashes($row['observation_rapport']).'</textarea></td> 
	    <td><a target="_blank" href="../exportation/pdf/pdf_rapport.php?id_rapport='.$row['id_rapport'].'"><span class="text-muted" style="color:#CC9900;"><i class="fa fa-file-pdf fa-2x"></i></span></a></td> 
	    ';
	}
	

$HTML.='</tr>

</div>
'; 

  $i++;		                                                                 
}

$HTML.='';
			
}
 
else
{
    $titre='<br />Aucune rapport trouv&eacute;e';
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