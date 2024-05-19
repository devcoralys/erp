<?php
    session_start();
	
	include('../../../connex.php');
	
    ini_set('memory_limit','512M');
    ini_set('max_execution_time', 12000);
	
	
    ?>
    <script>

	 function change_page_reglement_client(page_id_cons){
       
  var dataString = 'page_id_cons='+ page_id_cons;
	 
     $.ajax({
           type: "POST",
           url: "reglement_client/charge_reglement_client.php",
           data: dataString,
           cache: false,
		    beforeSend: function(){
			$("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').show();
            $(".aff_reglement_client").hide();
            },
           success: function(result){
		  $("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').hide();
		  $(".aff_reglement_client").html(result).show();
		   }
      });
    }
	</script>
     

    <?php

$requete=" SELECT * FROM reglement_client WHERE id_reglement_client!='' ";


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
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_reglement_client(1);'>&laquo; Debut</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Debut</span>";
		
		if ($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_reglement_client(".($prev).");'>&laquo; Precedent&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Precedent&nbsp;&nbsp;</span>";   
		
        if ($last_page < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $last_page; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href='javascript:void(0);' onClick='change_page_reglement_client(".($counter).");'>$counter</a>";     
                         
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
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_reglement_client(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_reglement_client(".($second_last).");'> $second_last</a>";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_reglement_client(".($last_page).");'>$last_page</a>";   
           
           }
           elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_reglement_client(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_reglement_client(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href='javascript:void(0);' onClick='change_page_reglement_client(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_reglement_client(".($second_last).");'>$second_last</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_reglement_client(".($last_page).");'>$last_page</a>";   
           }
           else
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_reglement_client(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_reglement_client(2);'>2</a>";
               $pagination.= "..";
               for($counter = $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_reglement_client(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_reglement_client(".($next).");'>Suivant &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Suivant &raquo;</span>";
		
		if($page < $last_page)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_reglement_client(".($last_page).");'>Fin &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Fin &raquo;</span>";
        
        $pagination.= "</div>";       
    }

    $req=" SELECT * FROM reglement_client WHERE id_reglement_client!=''  ";
 
    
    $req.=" ORDER BY date_creat_reglement_client DESC LIMIT ".$start.", ".$records_per_page." ";

$records=$con->query($req);    
 
$count  = $records->rowCount();
$HTML='';

$HTML.='
<p style="color:grey;">Nombre de factures normalisées : <b>'.$count_1.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>';


					             
if($count > 0)
{

    $HTML.='
    <div class="table-responsive" id="parent" style="margin-top:10px auto;">

    <table id="list_trait" class="table table-hover table-nowrap mb-0 align-middle table-check">
    <thead>					                    <thead>
					                        <tr>
					                            <th>&nbsp;</th>
					                            <th><a href="javascript:void();">Date</a></th>	
                                                <th><a href="javascript:void();">Dossier N°</a></th>	
                                                <th><a href="javascript:void();">Client</a></th>	
                                                <th><a href="javascript:void();">Montant</a></th>
                                                <th><a href="javascript:void();">Dépenses</a></th>
                                                <th><a href="javascript:void();">Bénéfice</a></th>
                                                <th><a href="javascript:void();">Mode Règlement</a></th>	
                                                <th><a href="javascript:void();">Observation</a></th>		
					                        </tr>
					                    </thead>
					                    <tbody>';

$i=1;

    foreach($records as $row) {
       
	
$HTML.=' 
<tr>
            <td><span class="text-muted" style="color:#CC9900;  ">'.$i.'</span></td> 
            <td><span class="text-muted" style="color:#CC9900;  ">'.stripslashes(date("d/m/Y", strtotime($row['date_reglement_client']))).'</span></td>  
            <td><span class="text-muted" style="color:#CC9900;  ">'.stripslashes($row['num_dossier_reglement_client']).'</span></td>  
            <td><span class="text-muted" style="color:#CC9900;  ">'.stripslashes($row['nom_client_reglement_client']).'</span></td>     
            <td><span class="text-muted" style="color:#CC9900;  ">'.number_format($row['montant_reglement_client'],0,',',' ').' FCFA</span></td> 
            <td><span class="text-muted" style="color:#CC9900;  ">'.number_format($row['depense_reglement_client'],0,',',' ').' FCFA</span></td> 
            <td><span class="text-muted" style="color:#CC9900;  ">'.number_format($row['benefice_reglement_client'],0,',',' ').' FCFA</span></td> 
            <td><span class="text-muted" style="color:green;  ">'.stripslashes($row['mode_reglement_reglement_client']).'</span></td>    
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['motif_reglement_client']).'</span></td>   
            <td><a target="_blank" href="../exportation/pdf/pdf_recu.php?id_reglement_client='.$row['id_reglement_client'].'"><span class="text-muted" style="color:#CC9900;"><i class="fa fa-file-pdf fa-2x"></i></span></a></td>   
       ';

$HTML.='</tr>'; 

  $i++;		                                                                 
}

$HTML.='</div>';
			
}
 
else
{
    $titre='<br />Aucune facture normalis&eacute;e trouv&eacute;e';
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