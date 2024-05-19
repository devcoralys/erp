<?php
    session_start();
	
	include('../../../connex.php');
	
    ini_set('memory_limit','512M');
    ini_set('max_execution_time', 12000);
	
    if(isset($_SESSION['time']) && $_SESSION['time']!='')
    {
        $colis_fret_time=$_SESSION['time'];
    }
    else
    {
        $colis_fret_time='';
    }
	
    ?>
    <script>

	 function change_page_colis_colis_fret(page_id_cons){
       
  var dataString = 'page_id_cons='+ page_id_cons;
	 
     $.ajax({
           type: "POST",
           url: "caisse/charge_colis_colis_fret.php",
           data: dataString,
           cache: false,
		    beforeSend: function(){
			$("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').show();
            $(".aff_colis_colis_fret").hide();
            },
           success: function(result){
		  $("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').hide();
		  $(".aff_colis_colis_fret").html(result).show();
		   }
      });
    }
	</script>
     

    <?php

$requete=" SELECT * FROM colis_colis_fret LEFT JOIN colis_fret ON colis_fret.time_colis_fret=colis_colis_fret.colis_fret_time WHERE id_colis_fret!='' AND time_colis_fret='".$colis_fret_time."' ";


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
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_colis_colis_fret(1);'>&laquo; Debut</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Debut</span>";
		
		if ($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_colis_colis_fret(".($prev).");'>&laquo; Precedent&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Precedent&nbsp;&nbsp;</span>";   
		
        if ($last_page < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $last_page; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href='javascript:void(0);' onClick='change_page_colis_colis_fret(".($counter).");'>$counter</a>";     
                         
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
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_colis_colis_fret(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_colis_colis_fret(".($second_last).");'> $second_last</a>";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_colis_colis_fret(".($last_page).");'>$last_page</a>";   
           
           }
           elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_colis_colis_fret(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_colis_colis_fret(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href='javascript:void(0);' onClick='change_page_colis_colis_fret(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_colis_colis_fret(".($second_last).");'>$second_last</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_colis_colis_fret(".($last_page).");'>$last_page</a>";   
           }
           else
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_colis_colis_fret(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_colis_colis_fret(2);'>2</a>";
               $pagination.= "..";
               for($counter = $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_colis_colis_fret(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_colis_colis_fret(".($next).");'>Suivant &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Suivant &raquo;</span>";
		
		if($page < $last_page)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_colis_colis_fret(".($last_page).");'>Fin &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Fin &raquo;</span>";
        
        $pagination.= "</div>";       
    }

    $req=" SELECT * FROM colis_colis_fret LEFT JOIN colis_fret ON colis_fret.time_colis_fret=colis_colis_fret.colis_fret_time WHERE id_colis_fret!='' AND time_colis_fret='".$colis_fret_time."' ";
 
    
    $req.=" ORDER BY id_colis_colis_fret ASC LIMIT ".$start.", ".$records_per_page." ";

$records=$con->query($req);    
 
$count  = $records->rowCount();
$HTML='';

$HTML.='
<p style="color:grey;">Nombre d\' &eacute;l&eacute;ments trouv&eacute;s : <b>'.$count_1.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>';




					             
if($count > 0)
{

    $HTML.='
                    <div class="table-responsive">
                                    <table id="myTable" class="table table-responsive" style="text-align:left;">
					                    <thead>
					                        <tr>
                                                <th>&nbsp;</th>
                                                <th><a href="javascript:void();">Nbre colis_colis_fret</a></th>
                                                <th><a href="javascript:void();">Nbre Article</a></th>
                                                <th><a href="javascript:void();">Nature du colis_colis_fret</a></th>
                                                <th><a href="javascript:void();">Poids du colis_colis_fret</a></th>		
                                                <th><a href="javascript:void();">Prix / Kg</a></th>	
                                                <th><a href="javascript:void();">Coût Emballage</a></th>
                                                <th><a href="javascript:void();">Prix Total</a></th>
					                        </tr>
					                    </thead>
					                    <tbody>';

$i=1;

    foreach($records as $row) {

        /* Requêtes Sélectives */
        $prix_total=floatval($row['poids_colis_colis_fret'])*floatval($row['pu_colis_colis_fret'])+floatval($row['emballage_colis_colis_fret'])+floatval($row['montant_assurance']);
        /* Fin Requêtes Sélectives */

$HTML.='
        <tr>
            <td><span class="text-muted" style="color:#CC9900;  ">'.$i.'</span></td> 
            <td><span class="text-muted" style="color:#CC9900;  ">'.$row['nbre_colis_colis_fret'].'</span></td> 
            <td><span class="text-muted" style="color:#CC9900;  ">'.$row['nbre_article'].'</span></td> 
            <td><span class="text-muted" style="color:#CC9900;  ">'.$row['nature_colis_colis_fret'].'</span></td>   
            <td><span class="text-muted" style="color:#CC9900;  ">'.$row['poids_colis_colis_fret'].'</span></td>    
            <td><span class="text-muted" style="color:#CC9900;  ">'.$row['pu_colis_colis_fret'].'</span></td>   
            <td><span class="text-muted" style="color:#CC9900;  ">'.number_format($row['emballage_colis_colis_fret'],0,',',' ').' FCFA</span></td>  
            <td><span class="text-muted" style="color:#CC9900;  ">'.$prix_total.'</span></td>  
            ';
            
                                                                    if($row['etat_colis_fret']==0 && $_SESSION['acces_dashboard']==1){
                                                                    $HTML.='   
                                                                    <td>                                                                 
        <a href="#" class="btn btn-icon icon-lg delete_colis_colis_fret" data-toggle="modal" data-target="#myModal_colis_colis_fret_sup" data-id='.$row['id_colis_colis_fret'].' title="Supprimer" style="color:#006699;"><i class="fa fa-trash"></i></a>
                                                                    </td>                                                                
                                                                        ';
                                                                    }
                                                                        
$HTML.='</tr>'; 

  $i++;		                                                                 
}

$HTML.='</table></div>';
			
}
 
else
{
    $titre='<br />Aucun article trouv&eacute;';
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