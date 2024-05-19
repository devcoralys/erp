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

    if(isset($_POST['recher_etat']) && $_POST['recher_etat']!='')
	{
	$recher_etat=$_POST['recher_etat'];
    $_SESSION['recher_etat']=$recher_etat;
	}
	else
	{
	$recher_etat='';
    $_SESSION['recher_etat']='';
	}



	if($recher_date_debut!='' || $recher_date_fin!='' || $recher_etat!=''){
    ?>
    <script>

	function change_page_demande_decaissement(page_id){
       
    var recher_date_debut='<?php echo $recher_date_debut; ?>';
    var recher_date_fin='<?php echo $recher_date_fin; ?>';
    var recher_etat='<?php echo $recher_etat; ?>';

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_etat='+recher_etat;
	 
     $.ajax({
           type: "POST",
           url: "demande_decaissement/charge_demande_decaissement.php",
           data: dataString,
           cache: false,
		    beforeSend: function(){
			$("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').show();
            $(".aff_demande_decaissement").hide();
            },
           success: function(result){
		  $("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').hide();
		  $(".aff_demande_decaissement").html(result).show();
		   }
      });
    }
	</script>
     

    <?php
	}

    $requete=" SELECT * FROM demande_decaissement LEFT JOIN utilisateur ON utilisateur.secur=demande_decaissement.secur_ajout_demande_decaissement WHERE id_demande_decaissement!='' ";
    
    if($recher_date_debut!=''){
	    $requete.=" AND date_demande_decaissement>='".$recher_date_debut."'  ";
	}

    if($recher_date_fin!=''){
	    $requete.=" AND date_demande_decaissement<='".$recher_date_fin."'  ";
	}
	
	if($recher_etat!=''){
	    $requete.=" AND etat_demande=".$recher_etat."  ";
	}


    $sqlQuery=$con->query($requete);

	$count  	= $sqlQuery->rowCount();
    $count_1  	= $sqlQuery->rowCount();
	
	$adjacents = 2;
	$records_per_page = 100;
	
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
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_demande_decaissement(1);'>&laquo; Debut</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Debut</span>";
		
		if ($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_demande_decaissement(".($prev).");'>&laquo; Precedent&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Precedent&nbsp;&nbsp;</span>";   
		
        if ($last_page < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $last_page; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href='javascript:void(0);' onClick='change_page_demande_decaissement(".($counter).");'>$counter</a>";     
                         
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
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_demande_decaissement(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_demande_decaissement(".($second_last).");'> $second_last</a>";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_demande_decaissement(".($last_page).");'>$last_page</a>";   
           
           }
           elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_demande_decaissement(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_demande_decaissement(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href='javascript:void(0);' onClick='change_page_demande_decaissement(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_demande_decaissement(".($second_last).");'>$second_last</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_demande_decaissement(".($last_page).");'>$last_page</a>";   
           }
           else
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_demande_decaissement(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_demande_decaissement(2);'>2</a>";
               $pagination.= "..";
               for($counter = $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_demande_decaissement(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_demande_decaissement(".($next).");'>Suivant &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Suivant &raquo;</span>";
		
		if($page < $last_page)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_demande_decaissement(".($last_page).");'>Fin &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Fin &raquo;</span>";
        
        $pagination.= "</div>";       
    }

    $req=" SELECT * FROM demande_decaissement LEFT JOIN utilisateur ON utilisateur.secur=demande_decaissement.secur_ajout_demande_decaissement WHERE id_demande_decaissement!=''  ";
    
    if($recher_date_debut!=''){
	    $req.=" AND date_demande_decaissement>='".$recher_date_debut."'  ";
	}

    if($recher_date_fin!=''){
	    $req.=" AND date_demande_decaissement<='".$recher_date_fin."'  ";
	}
	
	if($recher_etat!=''){
	    $req.=" AND etat_demande=".$recher_etat."  ";
	}

    
    $req.=" ORDER BY date_creat_demande_decaissement DESC LIMIT ".$start.", ".$records_per_page." ";

$records=$con->query($req);    
 
$count  = $records->rowCount();
$HTML='';

$HTML.='
<p style="color:grey;">Nombre d\'demande_decaissements : <b>'.$count_1.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>';


$HTML.='
<p>
    <a href="../exportation/pdf/pdf_liste_demande_decaissement.php" target="_blank" style="font-size:20px; font-weight:600; color: #da0909" title="Générer le fichier pdf">
        Exporter en  <i class="fa fa-file-pdf"></i>
    </a>  &nbsp;
    
    
    <!--
    <a href="exportation/excel/excel_liste_demande_decaissement.php" target="_blank" style="font-size:20px; font-weight:600; color: #006f38" title="Générer le fichier excel">
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

    $HTML.='
					                <table id="myTable" class="table" style="text-align:left;">
					                    <thead>
					                        <tr>
					                            <th>&nbsp;</th>
					                            <th><a href="javascript:void();">Date</a></th>	
					                             <th><a href="javascript:void();">Demandeur</a></th>	
                                                <th><a href="javascript:void();">Montant</a></th>
                                                <th><a href="javascript:void();">Mode Règlement</a></th>	
                                                <th><a href="javascript:void();">Affectation</a></th>	
                                                <th><a href="javascript:void();">Motif</a></th>	
                                                <th>&nbsp;</th>	
					                        </tr>
					                    </thead>
					                    <tbody>';

$i=1;

$montant_total=0;

    foreach($records as $row) {

        
        
        $montant_total=$montant_total+floatval($row['montant_demande_decaissement']);
        $_SESSION['total_dem_dec']=$montant_total;
       
	
$HTML.=' 
<tr>
            <td><span class="text-muted" style="color:#CC9900;  ">'.$i.'</span></td> 
            <td><span class="text-muted" style="color:#CC9900;  ">'.stripslashes(date("d/m/Y", strtotime($row['date_demande_decaissement']))).'</span></td> 
            <td><span class="text-muted" style="color:#CC9900;  ">'.$row['nom_utilisateur'].'</span></td> 
            <td><span class="text-muted" style="color:#CC9900;  ">'.number_format($row['montant_demande_decaissement'],0,',',' ').' FCFA</span></td>   
            <td><span class="text-muted" style="color:green;  ">'.stripslashes($row['mode_reglement_demande_decaissement']).'</span></td>    
            <td><span class="text-muted" style="color:green;  ">'.stripslashes($row['affectation']).'</span></td>    
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['motif_demande_decaissement']).'</span></td>   
            <td>
';

                /*
                $HTML.='
                <a target="_blank" href="../exportation/pdf/pdf_demande_decaissement.php?id_demande_decaissement='.$row['id_demande_decaissement'].'"><span class="text-muted" style="color:#CC9900;"><i class="fa fa-file-pdf "></i> Exporter</span></a>
                &nbsp;
                ';
                */
                
                if($row['etat_demande']==0 && $_SESSION['acces_valid_decaissement']==1){
                $HTML.='
                <a href="decider_demande_decaissement.php?id_accepte='.$row['id_demande_decaissement'].'"><span class="text-muted" style="color:green;"><i class="fa fa-tag" style="color:#251f75;"></i> Répondre à la demande</span></a>
                &nbsp;
                ';
                }
                
                if($row['etat_demande']==1){
                $HTML.='
                <a href="decaisser_demande_decaissement.php?id_decaisse='.$row['id_demande_decaissement'].'"><span class="text-muted"><i class="fa fa-money-bill" style="color:green;"></i> Décaisser</span></a>
                ';
                }
                
                if($row['etat_demande']==2){
                $HTML.='
                <a href="javascript:void();"><span class="text-muted"><i class="fa fa-ban" style="color:red;"></i> Demande réfusée</span></a>
                ';
                }
                
                if($row['etat_demande']==3){
                $HTML.='
                <a href="javascript:void();"><span class="text-muted"><i class="fa fa-check" style="color:green;"></i> Demande décaissée</span></a>
                ';
                }
                
                
                
                $HTML.='
            </td>   
       ';

$HTML.='</tr>'; 

  $i++;		                                                                 
}

$HTML.='';
			
}
 
else
{
    $titre='<br />Aucun demande_decaissement trouv&eacute;';
    $donnee=$titre;
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