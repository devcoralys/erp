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

    if(isset($_POST['recher_demandeur']) && $_POST['recher_demandeur']!='')
	{
	$recher_demandeur=$_POST['recher_demandeur'];
    $_SESSION['recher_demandeur']=$recher_demandeur;
	}
	else
	{
	$recher_demandeur='';
    $_SESSION['recher_demandeur']='';
	}


	if($recher_date_debut!='' || $recher_date_fin!='' || $recher_demandeur!=''){
    ?>
    <script>

	 function change_page_caisse(page_id){
       
    var recher_date_debut='<?php echo $recher_date_debut; ?>';
    var recher_date_fin='<?php echo $recher_date_fin; ?>';
    var recher_demandeur='<?php echo $recher_demandeur; ?>';

    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_demandeur='+recher_demandeur;
	 
     $.ajax({
           type: "POST",
           url: "caisse/charge_caisse.php",
           data: dataString,
           cache: false,
		    beforeSend: function(){
			$("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').show();
            $(".aff_caisse").hide();
            },
           success: function(result){
		  $("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').hide();
		  $(".aff_caisse").html(result).show();
		   }
      });
    }
	</script>
     

    <?php
	}
	
    $requete=" SELECT * FROM caisse WHERE id_caisse!='' ";

    if($recher_date_debut!=''){
	    $requete.=" AND date_caisse>='".$recher_date_debut."'  ";
	}

    if($recher_date_fin!=''){
	    $requete.=" AND date_caisse<='".$recher_date_fin."'  ";
	}

    if($recher_demandeur!=''){
	    $requete.=" AND nom_client_caisse LIKE '%".$recher_demandeur."%' ";
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
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_caisse(1);'>&laquo; Debut</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Debut</span>";
		
		if ($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_caisse(".($prev).");'>&laquo; Precedent&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Precedent&nbsp;&nbsp;</span>";   
		
        if ($last_page < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $last_page; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href='javascript:void(0);' onClick='change_page_caisse(".($counter).");'>$counter</a>";     
                         
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
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_caisse(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_caisse(".($second_last).");'> $second_last</a>";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_caisse(".($last_page).");'>$last_page</a>";   
           
           }
           elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_caisse(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_caisse(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href='javascript:void(0);' onClick='change_page_caisse(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_caisse(".($second_last).");'>$second_last</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_caisse(".($last_page).");'>$last_page</a>";   
           }
           else
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_caisse(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_caisse(2);'>2</a>";
               $pagination.= "..";
               for($counter = $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_caisse(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_caisse(".($next).");'>Suivant &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Suivant &raquo;</span>";
		
		if($page < $last_page)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_caisse(".($last_page).");'>Fin &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Fin &raquo;</span>";
        
        $pagination.= "</div>";       
    }

    $req=" SELECT * FROM caisse WHERE id_caisse!=''  ";
    
    if($recher_date_debut!=''){
	    $req.=" AND date_caisse>='".$recher_date_debut."'  ";
	}

    if($recher_date_fin!=''){
	    $req.=" AND date_caisse<='".$recher_date_fin."'  ";
	}

    if($recher_demandeur!=''){
	    $req.=" AND nom_client_caisse LIKE '%".$recher_demandeur."%' ";
	}
    

    $req.=" ORDER BY date_caisse DESC LIMIT ".$start.", ".$records_per_page." ";

$records=$con->query($req);    
 
$count  = $records->rowCount();
$HTML='';

$HTML.='
<p style="color:grey;">Nombre d enregistrements : <b>'.$count_1.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>';


$HTML.='
<p>
    <a href="../exportation/pdf/pdf_liste_caisse.php" target="_blank" style="font-size:20px; font-weight:600; color: #da0909" title="Générer le fichier pdf">
        Exporter en  <i class="fa fa-file-pdf"></i>
    </a>  &nbsp;
    
    
    <!--
    <a href="exportation/excel/excel_liste_caisse.php" target="_blank" style="font-size:20px; font-weight:600; color: #006f38" title="Générer le fichier excel">
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
    
    <div class="table-responsive" id="parent" style="margin-top:10px auto;">

    <table id="list_trait" class="table table-hover table-nowrap mb-0 align-middle table-check">
    <thead>					                    <thead>
					                        <tr>
					                            <th>&nbsp;</th>
					                            <th><a href="javascript:void();">Date</a></th>	
                                                <th><a href="javascript:void();">Donneur</a></th>	
                                                <th><a href="javascript:void();">Montant</a></th>
                                                <th><a href="javascript:void();">Motif</a></th>		
					                        </tr>
					                    </thead>
					                    <tbody>';

$i=1;

    foreach($records as $row) {
       
	
$HTML.=' 
<tr>
            <td><span class="text-muted" style="color:#CC9900;  ">'.$i.'</span></td> 
            <td><span class="text-muted" style="color:#CC9900;  ">'.stripslashes(date("d/m/Y", strtotime($row['date_caisse']))).'</span></td>  
            <td><span class="text-muted" style="color:#CC9900;  ">'.stripslashes($row['nom_client_caisse']).'</span></td>     
            <td><span class="text-muted" style="color:#CC9900;  ">'.number_format($row['montant_caisse'],0,',',' ').' FCFA</span></td>    
            <td><span class="" style="color:#CC9900;  ">'.stripslashes($row['motif_caisse']).'</span></td>   
            <td>
                <!--
                <a target="_blank" href="../exportation/pdf/pdf_recu_sortie.php?id_caisse='.$row['id_caisse'].'"><span class="text-muted" style="color:#CC9900;"><i class="fa fa-file-pdf fa-2x"></i></span></a>
                 &nbsp;
                 -->
                 
                 ';
                 
                 /*
                 $HTML.='
                <a href="modifier_caisse.php?id_dec_mod='.$row['id_caisse'].'"><span class="text-muted" style="color:#CC9900;"><i class="fa fa-edit fa-2x"></i></span></a>     &nbsp;';
                */
           
                
                /*
                $HTML.='
                <a href="caisse/supprimer_caisse.php?id_dec_sup='.$row['id_caisse'].'"><span class="text-muted" style="color:#CC9900;"><i class="fa fa-trash fa-2x"></i></span></a>
                ';
                */
                
                $HTML.='
            </td>   
       ';

$HTML.='</tr>'; 

  $i++;		                                                                 
}

$HTML.='</div>';
			
}
 
else
{
    $titre='<br />Aucun enregistrement trouv&eacute;';
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