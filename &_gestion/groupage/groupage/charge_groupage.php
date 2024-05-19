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


    if(isset($_POST['recher_expediteur']) && $_POST['recher_expediteur']!='')
	{
	$recher_expediteur=$_POST['recher_expediteur'];
    $_SESSION['recher_expediteur']=$recher_expediteur;
	}
	else
	{
	$recher_expediteur='';
    $_SESSION['recher_expediteur']='';
	}

    if(isset($_POST['recher_num_cni']) && $_POST['recher_num_cni']!='')
	{
	$recher_num_cni=$_POST['recher_num_cni'];
    $_SESSION['recher_num_cni']=$recher_num_cni;
	}
	else
	{
	$recher_num_cni='';
    $_SESSION['recher_num_cni']='';
	}


    if(isset($_POST['recher_code_colis']) && $_POST['recher_code_colis']!='')
	{
	$recher_code_colis=$_POST['recher_code_colis'];
    $_SESSION['recher_code_colis']=$recher_code_colis;
	}
	else
	{
	$recher_code_colis='';
    $_SESSION['recher_code_colis']='';
	}
	
	if(isset($_POST['recher_destinataire']) && $_POST['recher_destinataire']!='')
	{
	$recher_destinataire=$_POST['recher_destinataire'];
    $_SESSION['recher_destinataire']=$recher_destinataire;
	}
	else
	{
	$recher_destinataire='';
    $_SESSION['recher_destinataire']='';
	}
	
	if(isset($_POST['recher_destination']) && $_POST['recher_destination']!='')
	{
	$recher_destination=$_POST['recher_destination'];
    $_SESSION['recher_destination']=$recher_destination;
	}
	else
	{
	$recher_destination='';
    $_SESSION['recher_destination']='';
	}
	
    if($recher_date_debut!='' || $recher_date_fin!='' || $recher_expediteur!='' || $recher_num_cni!='' || $recher_code_colis!='' || $recher_destinataire!='' || $recher_destination!=''){
    ?>
    <script>

	function change_page_groupage(page_id){

    var recher_date_debut='<?php echo $recher_date_debut; ?>';
    var recher_date_fin='<?php echo $recher_date_fin; ?>';
    var recher_expediteur='<?php echo $recher_expediteur; ?>';
    var recher_num_cni='<?php echo $recher_num_cni; ?>';
    var recher_code_colis='<?php echo $recher_code_colis; ?>';
    var recher_destinataire='<?php echo $recher_destinataire; ?>';
    var recher_destination='<?php echo $recher_destination; ?>';
    
       
    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_code_colis='+recher_code_colis+'&recher_num_cni='+recher_num_cni+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	 
     $.ajax({
           type: "POST",
           url: "groupage/charge_groupage.php",
           data: dataString,
           cache: false,
		    beforeSend: function(){
			$("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').show();
            $(".aff_groupage").hide();
            },
           success: function(result){
		  $("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').hide();
		  $(".aff_groupage").html(result).show();
		   }
      });
    }
	</script>
     

    <?php
    }

    $requete=" SELECT * FROM groupage WHERE id_groupage!='' AND annulation!=2 AND secur_ajout_groupage='".$_SESSION['secur_site']."' ";
    
    if($_SESSION['acces_tout_groupage']==1)
    {
        $requete=" SELECT * FROM groupage WHERE id_groupage!='' AND annulation!=2 ";
    }

    if($recher_date_debut!=''){
	    $requete.=" AND date_groupage>='".$recher_date_debut."'  ";
	}

    if($recher_date_fin!=''){
	    $requete.=" AND date_groupage<='".$recher_date_fin."'  ";
	}

    if($recher_expediteur!=''){
	    $requete.=" AND expediteur_groupage LIKE '%".$recher_expediteur."%' ";
	}
    
    if($recher_num_cni!=''){
	    $requete.=" AND num_cni_expediteur_groupage LIKE '%".$recher_num_cni."%' ";
	}

    if($recher_code_colis!=''){
	    $requete.=" AND num_groupage LIKE '%".$recher_code_colis."%'  ";
	}

    if($recher_destinataire!=''){
	    $requete.=" AND destinataire_groupage LIKE '%".$recher_destinataire."%'  ";
	}


    if($recher_destination!=""){
        $requete.=" AND destination_groupage LIKE '%".$recher_destination."%' ";
    }



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
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_groupage(1);'>&laquo; Debut</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Debut</span>";
		
		if ($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_groupage(".($prev).");'>&laquo; Precedent&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Precedent&nbsp;&nbsp;</span>";   
		
        if ($last_page < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $last_page; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href='javascript:void(0);' onClick='change_page_groupage(".($counter).");'>$counter</a>";     
                         
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
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_groupage(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_groupage(".($second_last).");'> $second_last</a>";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_groupage(".($last_page).");'>$last_page</a>";   
           
           }
           elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_groupage(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_groupage(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href='javascript:void(0);' onClick='change_page_groupage(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_groupage(".($second_last).");'>$second_last</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_groupage(".($last_page).");'>$last_page</a>";   
           }
           else
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_groupage(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_groupage(2);'>2</a>";
               $pagination.= "..";
               for($counter = $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_groupage(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_groupage(".($next).");'>Suivant &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Suivant &raquo;</span>";
		
		if($page < $last_page)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_groupage(".($last_page).");'>Fin &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Fin &raquo;</span>";
        
        $pagination.= "</div>";       
    }

    $req=" SELECT * FROM groupage WHERE id_groupage!='' AND annulation!=2 AND secur_ajout_groupage='".$_SESSION['secur_site']."' ";
    
      if($_SESSION['acces_tout_groupage']==1)
    {
        $req=" SELECT * FROM groupage WHERE id_groupage!='' AND annulation!=2 ";
    }

    if($recher_date_debut!=''){
	    $req.=" AND date_groupage>='".$recher_date_debut."'  ";
	}

    if($recher_date_fin!=''){
	    $req.=" AND date_groupage<='".$recher_date_fin."'  ";
	}

    if($recher_expediteur!=''){
	    $req.=" AND expediteur_groupage LIKE '%".$recher_expediteur."%' ";
	}
    
    if($recher_num_cni!=''){
	    $req.=" AND num_cni_expediteur_groupage LIKE '%".$recher_num_cni."%' ";
	}

    if($recher_code_colis!=''){
	    $req.=" AND num_groupage LIKE '%".$recher_code_colis."%'  ";
	}

    if($recher_destinataire!=''){
	    $req.=" AND destinataire_groupage LIKE '%".$recher_destinataire."%'  ";
	}

    if($recher_destination!=""){
        $req.=" AND destination_groupage LIKE '%".$recher_destination."%' ";
    }


    $req.=" ORDER BY id_groupage DESC ";
    //$req.=" ORDER BY id_groupage DESC LIMIT ".$start.", ".$records_per_page." ";

$records=$con->query($req);    
 
$count  = $records->rowCount();
$HTML='';

$HTML.='

';

$HTML.='
<p style="color:grey;">Nombre de groupages : <b>'.$count_1.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
';

$ecs=$con->prepare('SELECT * FROM groupage WHERE etat_groupage=0 AND secur_ajout_groupage="'.$_SESSION['secur_site'].'" ');
$ecs->execute();
$necs=$ecs->rowcount();

$ecl=$con->prepare('SELECT * FROM groupage WHERE etat_groupage=1 AND secur_ajout_groupage="'.$_SESSION['secur_site'].'" ');
$ecl->execute();
$necl=$ecl->rowcount();


$cl=$con->prepare('SELECT * FROM groupage WHERE etat_groupage=2 AND secur_ajout_groupage="'.$_SESSION['secur_site'].'" ');
$cl->execute();
$ncl=$cl->rowcount();

if($_SESSION['acces_tout_groupage']==1)
{
$ecs=$con->prepare('SELECT * FROM groupage WHERE etat_groupage=0');
$ecs->execute();
$necs=$ecs->rowcount();

$ecl=$con->prepare('SELECT * FROM groupage WHERE etat_groupage=1');
$ecl->execute();
$necl=$ecl->rowcount();


$cl=$con->prepare('SELECT * FROM groupage WHERE etat_groupage=2');
$cl->execute();
$ncl=$cl->rowcount();
}

$HTML.='

<span style="background-color:#d9dcf1; color:#038edc; padding:2px; border-radius:0px; font-size:15px; padding:6px;"><span style="background-color:#038edc; color:#fff; padding:2px; border-radius:0px; font-size:5px; position:relative; bottom:2.3px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <b>'.$necs.'</b> En cours de saisie</span>  
&nbsp;&nbsp;
<span style="background-color:#dcdcdc; color:#74788d; padding:2px; border-radius:0px; font-size:15px; padding:6px;"><span style="background-color:#74788d; color:#fff; padding:2px; border-radius:0px; font-size:5px; position:relative; bottom:2.3px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <b>'.$necl.'</b> En cours de livraison</span>  
&nbsp;&nbsp;
<span style="background-color:#d7f9e9; color:#51d28c; padding:2px; border-radius:0px; font-size:15px; padding:6px;"><span style="background-color:#51d28c; color:#51d28c; padding:2px; border-radius:0px; font-size:5px; position:relative; bottom:2.3px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <b>'.$ncl.'</b> Colis livré</span>  


</p>';

$HTML.='

    <a href="../exportation/pdf/pdf_liste_groupage.php" target="_blank" style="font-size:20px; font-weight:600; color: #da0909" title="Générer le fichier pdf">
        Exporter en  <i class="fa fa-file-pdf"></i>
    </a>  &nbsp;
    <!--
    <a href="exportation/excel/excel_fiche.php" target="_blank" style="font-size:20px; font-weight:600; color: #006f38" title="Générer le fichier excel">
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


$i=1;

    foreach($records as $row) {

        $nbre_colis=0;
        $nco1=$con->prepare(" SELECT * FROM groupage LEFT JOIN colis ON groupage.time_groupage=colis.groupage_time WHERE id_groupage='".$row['id_groupage']."' ");
        $nco1->execute();
        while($info_nco=$nco1->fetch())
        {
            $nbre_colis=$nbre_colis+$info_nco['nbre_colis'];
        }	

        //Calcul Total
        $tot=$con->prepare('SELECT * FROM groupage LEFT JOIN colis ON groupage.time_groupage=colis.groupage_time WHERE id_groupage="'.$row['id_groupage'].'" ');
        $tot->execute();
        $montant_total=0;
        while($itot=$tot->fetch())
        {
            $montant_total=$montant_total + ($itot['poids_colis']*$itot['pu_colis']) + $itot['emballage_colis'];
        }

        if($row['etat_groupage']==0)
        {
            $progress_class="primary";
        }

        if($row['etat_groupage']==1)
        {
            $progress_class="secondary";
        }

        if($row['etat_groupage']==2)
        {
            $progress_class="success";
        }


        // Infos sur l'agence
        $infoAgence = $con->prepare('SELECT * FROM agence WHERE id_agence=:A ');
        $infoAgence->execute(array('A' => $row['agence_id']));
        $agence = $infoAgence->fetch();

        // Check if 'code_agence' is set and not NULL
        $str_agence = isset($agence['code_agence']) && $agence['code_agence'] !== null ? '('.$agence['code_agence'].') '.$agence['lib_agence'] : 'Non Renseignée';

        //Infos sur le type de piece
        $infoType_piece = $con->prepare('SELECT * FROM type_piece WHERE id_type_piece=:A ');
        $infoType_piece->execute(array('A'=>($row['type_piece_id'])));
        
        $type_piece = $infoType_piece->fetch();


$HTML.='
        
<div class="col-xl-2 col-sm-3">
<div class="card border shadow-none">
                                     
                                            
    <div class="card-body p-4">
    
           <div class="flex-shrink-0">
                                                <div class="dropdown">
                                                    <a class="font-size-16 text-muted dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <!--   <i class="mdi mdi-dots-horizontal"></i>-->
                                                    </a>
                                                
                                                   <!--   
                                                    <div class="dropdown-menu" style="">
                                             
                                                        <a class="dropdown-item" href="demande_annulation.php?id_groupage_annul='.$row['id_groupage'].'><i class="fa fa-exclamation-triangle"></i>  Demander l\'annulation de ce groupage</a>

                                                    </div>
                                                    -->
                                                </div>
                                            </div>
    
    <div class="row" style="text-align:center;" style="margin-bottom:1px;">
        <h4><i  style="color:red;" class="fa fa-globe"></i> Colis N° <b>'.stripslashes($row['num_groupage']).'</b></h4>

        <hr>

        <h5><i  style="color:red;" class="fa fa-office"></i> Agence : <b>'.$str_agence.'</b></h5>

    </div>
        <div class="d-flex align-items-start" style="margin-top:2px;">
            <!--
            <div class="flex-shrink-0 avatar rounded-circle me-4">
                <i  style="color:red;" class="fa fa-globe fa-4x"></i>
            </div>
            -->
            <div class="flex-grow-1 overflow-hidden">
                <p class="text-muted text-truncate mb-0" style="text-align:left;">
                
                <i class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;'.date("d/m/Y", strtotime($row['date_groupage'])).'  <br>
                <i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;'.$row['expediteur_groupage'].'  <br>
                <i class="fa fa-location"></i>&nbsp;&nbsp;&nbsp;'.$row['destinataire_groupage'].'  <br>
                <i class="fa fa-location-pin"></i>&nbsp;&nbsp;&nbsp;'.$row['destination_groupage'].' 
                <br>
                Nombre de colis : <b>'.$nbre_colis.'</b> 
                <br>
                Montant : <b style="color:green;">'.number_format($montant_total,0,',',' ').' FCFA</b>
                <br>
                <i> Fait le '.date("d/m/Y H:i:s", strtotime($row['date_creat_groupage'])).' </i>
                </p>
            </div>
            <!-- end dropdown
            <div class="flex-shrink-0 dropdown">
                <a class="text-body dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-xs"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a target="_blank" href="javascript:void();" class="dropdown-item"> <i class="fa fa-edit"></i> Modifier</a>
                    <a target="_blank" href="javascript:void();" class="dropdown-item"> <i class="fa fa-trash"></i> Supprimer</a>
                    <a target="_blank" href="../exportation/pdf/pdf_groupage.php?id_groupage='.$row['id_groupage'].'" class="dropdown-item"> <i class="fa fa-print"></i> Imprimer</a>
                </div>
              
            </div> -->
        </div>
    </div>
    <!-- end card body -->
    <div class="btn-group btn-icon" role="group">';

        if($row['etat_groupage']==0)
        {
        $HTML.= '
            <a href="detail_groupage.php?id_groupage='.$row['id_groupage'].'" class="btn btn-success_ btn-xs"><button type="button" class="btn btn-outline-light btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Profile"><i class="uil uil-clipboard"></i> Editer</button></a>
       ';
        }
        
        else if($row['etat_groupage']==1 && $row['colis_arrive']==0)
        {
            $HTML.='
            <a  href="detail_groupage.php?id_groupage='.$row['id_groupage'].'" class="btn btn-warning_"><button type="button" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Profile"><i class="uil uil-print"></i> Consulter</button></a>
            <a href="groupage/notifier_groupage.php?id_groupage='.$row['id_groupage'].'" class="btn btn-warning_"><button type="button" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Profile"><i class="uil uil-envelope"></i> Notifier</button></a>
            ';
        }
        else if($row['etat_groupage']==1 && $row['colis_arrive']==1)
        {
            $HTML.='
            <a  href="detail_groupage.php?id_groupage='.$row['id_groupage'].'" class="btn btn-warning_"><button type="button" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Profile"><i class="uil uil-print"></i> Consulter</button></a>
            <a href="livrer_groupage.php?id_groupage='.$row['id_groupage'].'" class="btn btn-warning_"><button type="button" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Profile"><i class="uil uil-check-circle"></i> Livrer</button></a>
            ';
        }
        
        else if($row['etat_groupage']==2)
        {
            $HTML.='
            <a href="detail_groupage.php?id_groupage='.$row['id_groupage'].'" class="btn btn-warning_"><button type="button" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Profile"><i class="uil uil-print"></i> Consulter</button></a>
            ';
            
             $HTML.='
            <a target="_blank" href="../exportation/pdf/etiquette_groupage.php?id_groupage='.$row['id_groupage'].'" class="btn btn-warning_"><button type="button" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Profile"><i class="uil uil-tag"></i> Etiquette</button></a>
            ';
        }
        else
        {
            $HTML.='Erreur veuillez consulter votre administrateur !';
        }

        $HTML.= '

     
    </div>
    <div class="progress">
        <div class="progress-bar bg-'.$progress_class.'" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div><!-- end card -->
</div><!-- end col -->

';

  $i++;		                                                                 
}

$HTML.='';
			
}
 
else
{
    $titre='<br />Aucun groupage trouv&eacute;';
    $donnee=mb_convert_encoding($titre, 'ISO-8859-7', 'UTF-8');
    $HTML.='<div><font color="#990000" style="font-size:11px; align="center"">'.$donnee.'</font></div>';
}
	   	
$HTML.='';	   
echo $HTML;
//echo $pagination;
echo'<br /><br />';
unset($con);

?>
<!--
<script src="../assets/libs/tabletolist/tableToCards.js"></script>
-->