<?php
    session_start();
	
	include('../../../connex.php');
	
    ini_set('memory_limit','512M');
    ini_set('max_execution_time', 12000);
	
	
    ?>
    <script>

	 function change_page_dossier_aerien(page_id_cons){
       
  var dataString = 'page_id_cons='+ page_id_cons;
	 
     $.ajax({
           type: "POST",
           url: "dossier_import/charge_dossier_aerien.php",
           data: dataString,
           cache: false,
		    beforeSend: function(){
			$("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').show();
            $(".aff_dossier_aerien").hide();
            },
           success: function(result){
		  $("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').hide();
		  $(".aff_dossier_aerien").html(result).show();
		   }
      });
    }
	</script>
     

    <?php

    $requete=" SELECT * FROM dossier WHERE id_dossier!='' AND type_transit_id=2 AND import=1 AND export=0 ";

/*
    if($_SESSION['is_dg']==1 || $_SESSION['is_valid']==1)
    {
        $requete=" SELECT * FROM dossier LEFT JOIN utilisateur ON utilisateur.secur=dossier.demandeur_secur WHERE id_dossier!='' ";
    }
*/

    $sqlQuery=$con->query($requete);

	$count  	= $sqlQuery->rowCount();
    $count_1  	= $sqlQuery->rowCount();
	
	$adjacents = 2;
	$records_per_page = 12;
	
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
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_dossier_aerien(1);'>&laquo; Debut</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Debut</span>";
		
		if ($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_dossier_aerien(".($prev).");'>&laquo; Precedent&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Precedent&nbsp;&nbsp;</span>";   
		
        if ($last_page < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $last_page; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href='javascript:void(0);' onClick='change_page_dossier_aerien(".($counter).");'>$counter</a>";     
                         
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
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_dossier_aerien(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_dossier_aerien(".($second_last).");'> $second_last</a>";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_dossier_aerien(".($last_page).");'>$last_page</a>";   
           
           }
           elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_dossier_aerien(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_dossier_aerien(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href='javascript:void(0);' onClick='change_page_dossier_aerien(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_dossier_aerien(".($second_last).");'>$second_last</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_dossier_aerien(".($last_page).");'>$last_page</a>";   
           }
           else
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_dossier_aerien(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_dossier_aerien(2);'>2</a>";
               $pagination.= "..";
               for($counter = $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_dossier_aerien(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_dossier_aerien(".($next).");'>Suivant &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Suivant &raquo;</span>";
		
		if($page < $last_page)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_dossier_aerien(".($last_page).");'>Fin &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Fin &raquo;</span>";
        
        $pagination.= "</div>";       
    }

    $req=" SELECT * FROM dossier WHERE id_dossier!='' AND type_transit_id=2 AND import=1 AND export=0 ";
 
    /*
    if($_SESSION['is_dg']==1 || $_SESSION['is_valid']==1)
    {
        $req=" SELECT * FROM dossier LEFT JOIN utilisateur ON utilisateur.secur=dossier.demandeur_secur WHERE id_dossier!='' ";
    }
    */

    $req.=" ORDER BY date_creat_dossier DESC LIMIT ".$start.", ".$records_per_page." ";

$records=$con->query($req);    
 
$count  = $records->rowCount();
$HTML='';

$HTML.='
<p style="color:grey;">Nombre de dossiers : <b>'.$count_1.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>';

			             
if($count > 0)
{


$i=1;

    foreach($records as $row) {

        //Requêtes affichage
        $lst_mb=$con->prepare('SELECT * FROM membre_dossier LEFT JOIN utilisateur ON utilisateur.secur=membre_dossier.utilisateur_secur_dossier WHERE dossier_time_membre=:A');
        $lst_mb->execute(array('A'=>$row['time_dossier']));

        $ls='';
        while($ils=$lst_mb->fetch())
        {
            if($ils['photo_util']==''){$photo_mem='../photo/profile-2398782.png';}else{$photo_mem='../photo/'.$ils['photo_util'];}
            
            $ls.='
            <div class="avatar-group-item">
                <a href="javascript: void(0);" class="d-block" data-bs-toggle="tooltip" data-bs-placement="top" title="'.$ils['nom_utilisateur'].'">
                    <img src="'.$photo_mem.'" alt="" class="rounded-circle avatar-sm">
                </a>
            </div>
            ';
        }
       

$HTML.=' 

                                                        <div class="col-xl-2 col-sm-6">
                                                            <div class="card shadow-none border">
                                                                <div class="card-body p-3">
                                                                    <div>
                                                                        <div class="float-end ms-2">
                                                                            <div class="dropdown mb-2">
                                                                                <a class="font-size-16 text-muted dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                     <!-- <i class="uil uil-ellipsis-h"></i>  -->
                                                                                </a>
                                                                                
                                                                                <div class="dropdown-menu dropdown-menu-end" style="">
                                                                                     <!--
                                                                                    <a class="dropdown-item" href="#">Ouvrir</a>
                                                                                    <a class="dropdown-item" href="#">Modifier</a>
                                                                                    <div class="dropdown-divider"></div>
                                                                                    <a class="dropdown-item" href="#">Supprimer</a>
                                                                                     -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-sm me-3 mb-3">
                                                                            <div class="avatar-title bg-transparent rounded">
                                                                                <i class="fas fa-folder-open font-size-24 text-warning"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <h5 class="font-size-14 text-truncate"><a href="detail_dossier_import.php?ref_dos='.$row['id_dossier'].'" class="text-body">'.$row['num_dossier'].'</a></h5>
                                                                            <div class="mt-3">
                                                                                <p class="text-muted font-size-13 mb-1">Progression des tâches</p>
                                                                                <div class="progress animated-progess custom-progress">
                                                                                    <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- end card body -->
                                                            </div><!-- end card -->
                                                        </div>

';

  $i++;		                                                                 
}

$HTML.='';
			
}
 
else
{
    $titre='<br />Aucun dossier trouv&eacute;';
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