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


    if(isset($_POST['recher_code_colis_autre_envoi_france']) && $_POST['recher_code_colis_autre_envoi_france']!='')
	{
	$recher_code_colis_autre_envoi_france=$_POST['recher_code_colis_autre_envoi_france'];
    $_SESSION['recher_code_colis_autre_envoi_france']=$recher_code_colis_autre_envoi_france;
	}
	else
	{
	$recher_code_colis_autre_envoi_france='';
    $_SESSION['recher_code_colis_autre_envoi_france']='';
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
	
    if($recher_date_debut!='' || $recher_date_fin!='' || $recher_expediteur!='' || $recher_num_cni!='' || $recher_code_colis_autre_envoi_france!='' || $recher_destinataire!='' || $recher_destination!=''){
    ?>
    <script>

	function change_page_autre_envoi_france(page_id){

    var recher_date_debut='<?php echo $recher_date_debut; ?>';
    var recher_date_fin='<?php echo $recher_date_fin; ?>';
    var recher_expediteur='<?php echo $recher_expediteur; ?>';
    var recher_num_cni='<?php echo $recher_num_cni; ?>';
    var recher_code_colis_autre_envoi_france='<?php echo $recher_code_colis_autre_envoi_france; ?>';
    var recher_destinataire='<?php echo $recher_destinataire; ?>';
    var recher_destination='<?php echo $recher_destination; ?>';
    
       
    var dataString = 'page_id='+page_id+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin+'&recher_expediteur='+recher_expediteur+'&recher_code_colis_autre_envoi_france='+recher_code_colis_autre_envoi_france+'&recher_num_cni='+recher_num_cni+'&recher_destinataire='+recher_destinataire+'&recher_destination='+recher_destination;
	 
     $.ajax({
           type: "POST",
           url: "autre_envoi_france/charge_autre_envoi_france.php",
           data: dataString,
           cache: false,
		    beforeSend: function(){
			$("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').show();
            $(".aff_autre_envoi_france").hide();
            },
           success: function(result){
		  $("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').hide();
		  $(".aff_autre_envoi_france").html(result).show();
		   }
      });
    }
	</script>
     

    <?php
    }

    $requete=" SELECT * FROM autre_envoi_france WHERE id_autre_envoi_france!='' AND annulation!=2 AND secur_ajout_autre_envoi_france='".$_SESSION['secur_site']."' ";
    
    if($_SESSION['acces_tout_autre_envoi_france']==1)
    {
            $requete=" SELECT * FROM autre_envoi_france WHERE id_autre_envoi_france!='' AND annulation!=2 ";
    }

    if($recher_date_debut!=''){
	    $requete.=" AND date_autre_envoi_france>='".$recher_date_debut."'  ";
	}

    if($recher_date_fin!=''){
	    $requete.=" AND date_autre_envoi_france<='".$recher_date_fin."'  ";
	}

    if($recher_expediteur!=''){
	    $requete.=" AND expediteur_autre_envoi_france LIKE '%".$recher_expediteur."%' ";
	}
    
    if($recher_num_cni!=''){
	    $requete.=" AND num_cni_expediteur_autre_envoi_france LIKE '%".$recher_num_cni."%' ";
	}

    if($recher_code_colis_autre_envoi_france!=''){
	    $requete.=" AND num_autre_envoi_france LIKE '%".$recher_code_colis_autre_envoi_france."%'  ";
	}

    if($recher_destinataire!=''){
	    $requete.=" AND destinataire_autre_envoi_france LIKE '%".$recher_destinataire."%'  ";
	}


    if($recher_destination!=""){
        $requete.=" AND destination_autre_envoi_france LIKE '%".$recher_destination."%' ";
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
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_autre_envoi_france(1);'>&laquo; Debut</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Debut</span>";
		
		if ($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_autre_envoi_france(".($prev).");'>&laquo; Precedent&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Precedent&nbsp;&nbsp;</span>";   
		
        if ($last_page < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $last_page; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href='javascript:void(0);' onClick='change_page_autre_envoi_france(".($counter).");'>$counter</a>";     
                         
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
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_autre_envoi_france(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_autre_envoi_france(".($second_last).");'> $second_last</a>";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_autre_envoi_france(".($last_page).");'>$last_page</a>";   
           
           }
           elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_autre_envoi_france(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_autre_envoi_france(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href='javascript:void(0);' onClick='change_page_autre_envoi_france(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_autre_envoi_france(".($second_last).");'>$second_last</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_autre_envoi_france(".($last_page).");'>$last_page</a>";   
           }
           else
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_autre_envoi_france(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_autre_envoi_france(2);'>2</a>";
               $pagination.= "..";
               for($counter = $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_autre_envoi_france(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_autre_envoi_france(".($next).");'>Suivant &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Suivant &raquo;</span>";
		
		if($page < $last_page)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_autre_envoi_france(".($last_page).");'>Fin &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Fin &raquo;</span>";
        
        $pagination.= "</div>";       
    }

    $req=" SELECT * FROM autre_envoi_france WHERE id_autre_envoi_france!='' AND annulation!=2 AND secur_ajout_autre_envoi_france='".$_SESSION['secur_site']."' ";
    
      if($_SESSION['acces_tout_autre_envoi_france']==1)
    {
        $req=" SELECT * FROM autre_envoi_france WHERE id_autre_envoi_france!='' AND annulation!=2 ";
    }

    if($recher_date_debut!=''){
	    $req.=" AND date_autre_envoi_france>='".$recher_date_debut."'  ";
	}

    if($recher_date_fin!=''){
	    $req.=" AND date_autre_envoi_france<='".$recher_date_fin."'  ";
	}

    if($recher_expediteur!=''){
	    $req.=" AND expediteur_autre_envoi_france LIKE '%".$recher_expediteur."%' ";
	}
    
    if($recher_num_cni!=''){
	    $req.=" AND num_cni_expediteur_autre_envoi_france LIKE '%".$recher_num_cni."%' ";
	}

    if($recher_code_colis_autre_envoi_france!=''){
	    $req.=" AND num_autre_envoi_france LIKE '%".$recher_code_colis_autre_envoi_france."%'  ";
	}

    if($recher_destinataire!=''){
	    $req.=" AND destinataire_autre_envoi_france LIKE '%".$recher_destinataire."%'  ";
	}

    if($recher_destination!=""){
        $req.=" AND destination_autre_envoi_france LIKE '%".$recher_destination."%' ";
    }


    $req.=" ORDER BY id_autre_envoi_france DESC ";
    //$req.=" ORDER BY id_autre_envoi_france DESC LIMIT ".$start.", ".$records_per_page." ";

$records=$con->query($req);    
 
$count  = $records->rowCount();
$HTML='';

$HTML.='

';

$HTML.='
<p style="color:grey;">Nombre d\'envoi : <b>'.$count_1.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
';

$HTML.='

<span style="background-color:#d9dcf1; color:#038edc; padding:2px; border-radius:0px; font-size:15px; padding:6px;"><span style="background-color:#038edc; color:#fff; padding:2px; border-radius:0px; font-size:5px; position:relative; bottom:2.3px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> En cours de saisie</span>  
&nbsp;&nbsp;
<span style="background-color:#dcdcdc; color:#74788d; padding:2px; border-radius:0px; font-size:15px; padding:6px;"><span style="background-color:#74788d; color:#fff; padding:2px; border-radius:0px; font-size:5px; position:relative; bottom:2.3px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> En cours de livraison</span>  
&nbsp;&nbsp;
<span style="background-color:#d7f9e9; color:#51d28c; padding:2px; border-radius:0px; font-size:15px; padding:6px;"><span style="background-color:#51d28c; color:#51d28c; padding:2px; border-radius:0px; font-size:5px; position:relative; bottom:2.3px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> colis livré</span>  


</p>';

$HTML.='

    <a href="../exportation/pdf/pdf_liste_autre_envoi_france.php" target="_blank" style="font-size:20px; font-weight:600; color: #da0909" title="Générer le fichier pdf">
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

        $nbre_colis_autre_envoi_france=0;
        $nco1=$con->prepare(" SELECT * FROM autre_envoi_france LEFT JOIN colis_autre_envoi_france ON autre_envoi_france.time_autre_envoi_france=colis_autre_envoi_france.autre_envoi_france_time WHERE id_autre_envoi_france='".$row['id_autre_envoi_france']."' ");
        $nco1->execute();
        while($info_nco=$nco1->fetch())
        {
            $nbre_colis_autre_envoi_france=$nbre_colis_autre_envoi_france+$info_nco['nbre_colis_autre_envoi_france'];
        }	

        //Calcul Total
        $tot=$con->prepare('SELECT * FROM autre_envoi_france LEFT JOIN colis_autre_envoi_france ON autre_envoi_france.time_autre_envoi_france=colis_autre_envoi_france.autre_envoi_france_time WHERE id_autre_envoi_france="'.$row['id_autre_envoi_france'].'" ');
        $tot->execute();
        $montant_total=0;
        while($itot=$tot->fetch())
        {
            $montant_total=$montant_total + ($itot['poids_colis_autre_envoi_france']*$itot['pu_colis_autre_envoi_france']) + $itot['emballage_colis_autre_envoi_france'];
        }

        if($row['etat_autre_envoi_france']==0)
        {
            $progress_class="primary";
        }

        if($row['etat_autre_envoi_france']==1)
        {
            $progress_class="secondary";
        }

        if($row['etat_autre_envoi_france']==2)
        {
            $progress_class="success";
        }


$HTML.='
        
<div class="col-xl-3 col-sm-3">
<div class="card border shadow-none">
                                     
                                            
    <div class="card-body p-4">
    
           <div class="flex-shrink-0">
                                                <div class="dropdown">
                                                    <a class="font-size-16 text-muted dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <!--   <i class="mdi mdi-dots-horizontal"></i>-->
                                                    </a>
                                                
                                                   <!--   
                                                    <div class="dropdown-menu" style="">
                                             
                                                        <a class="dropdown-item" href="demande_annulation.php?id_autre_envoi_france_annul='.$row['id_autre_envoi_france'].'><i class="fa fa-exclamation-triangle"></i>  Demander l\'annulation de ce autre_envoi_france</a>

                                                    </div>
                                                    -->
                                                </div>
                                            </div>
    
    <div class="row" style="text-align:center;" style="margin-bottom:1px;">
        <h4><i  style="color:red;" class="fa fa-share"></i> '.stripslashes($row['mode_envoi']).' N° <b>'.stripslashes($row['num_autre_envoi_france']).'</b></h4>
    </div>
';

if($row['frais_compagnie']==0 || $row['frais_compagnie']=='')
{
$HTML.='
   <hr>
    <div class="row" style="text-align:center;" style="margin-bottom:1px;">
         <a href="saisir_frais_compagnie.php?id_autre_envoi_france='.$row['id_autre_envoi_france'].'" class="btn btn-warning_"><button type="button" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Profile"><i class="uil uil-money-bill"></i> Saisir Frais Compagnie</button></a>
    </div>
    <div class="row" style="text-align:center;" style="margin-bottom:1px;">
         <b style="color:red;"><i class="uil uil-exclamation-triangle"></i> Attention Frais de Compagnie Non Précisés !</b>
    </div>
    <hr>
';
}
else
{
    $HTML.='
    <hr>
    <div class="row" style="text-align:center;" style="margin-bottom:1px;">
         <span style="color:#000;">Frais Compagnie : <b style="color:green;">'.number_format($row['frais_compagnie'],0,',',' ').' FCFA</b></span>
    </div>
    <hr>
    ';
}

$HTML.='    

    
        <div class="d-flex align-items-start" style="margin-top:2px;">
            <!--
            <div class="flex-shrink-0 avatar rounded-circle me-4">
                <i  style="color:red;" class="fa fa-globe fa-4x"></i>
            </div>
            -->
            <div class="flex-grow-1 overflow-hidden">
                <p class="text-muted text-truncate mb-0" style="text-align:left;">
                
                <i class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;'.date("d/m/Y", strtotime($row['date_autre_envoi_france'])).'  <br>
                <i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;'.$row['expediteur_autre_envoi_france'].'  <br>
                <i class="fa fa-location"></i>&nbsp;&nbsp;&nbsp;'.$row['destinataire_autre_envoi_france'].'  <br>
                <i class="fa fa-location-pin"></i>&nbsp;&nbsp;&nbsp;'.$row['destination_autre_envoi_france'].' 
                <br>
                Nombre de colis : <b>'.$nbre_colis_autre_envoi_france.'</b> 
                <br>
                Montant : <b style="color:green;">'.number_format($montant_total,0,',',' ').' FCFA</b>
                <br>
                <i> Fait le '.date("d/m/Y H:i:s", strtotime($row['date_creat_autre_envoi_france'])).' </i>
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
                    <a target="_blank" href="../exportation/pdf/pdf_autre_envoi_france.php?id_autre_envoi_france='.$row['id_autre_envoi_france'].'" class="dropdown-item"> <i class="fa fa-print"></i> Imprimer</a>
                </div>
              
            </div> -->
        </div>
    </div>
    <!-- end card body -->
    <div class="btn-group btn-icon" role="group">';

        if($row['etat_autre_envoi_france']==0)
        {
        $HTML.= '
            <a href="detail_autre_envoi_france.php?id_autre_envoi_france='.$row['id_autre_envoi_france'].'" class="btn btn-success_ btn-xs"><button type="button" class="btn btn-outline-light btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Profile"><i class="uil uil-clipboard"></i> Editer</button></a>
       ';
        }
        else if($row['etat_autre_envoi_france']==1 && $row['colis_arrive']==0)
        {
            $HTML.='
            <a  href="detail_autre_envoi_france.php?id_autre_envoi_france='.$row['id_autre_envoi_france'].'" class="btn btn-warning_"><button type="button" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Profile"><i class="uil uil-print"></i> Consulter</button></a>
            <a href="autre_envoi_france/notifier_autre_envoi_france.php?id_autre_envoi_france='.$row['id_autre_envoi_france'].'" class="btn btn-warning_"><button type="button" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Profile"><i class="uil uil-envelope"></i> Notifier</button></a>
            ';
        }
        else if($row['etat_autre_envoi_france']==1 && $row['colis_autre_envoi_france_arrive']==1)
        {
            $HTML.='
            <a  href="detail_autre_envoi_france.php?id_autre_envoi_france='.$row['id_autre_envoi_france'].'" class="btn btn-warning_"><button type="button" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Profile"><i class="uil uil-print"></i> Consulter</button></a>
            <a href="livrer_autre_envoi_france.php?id_autre_envoi_france='.$row['id_autre_envoi_france'].'" class="btn btn-warning_"><button type="button" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Profile"><i class="uil uil-check-circle"></i> Livrer</button></a>
            ';
        }
        else if($row['etat_autre_envoi_france']==2)
        {
            $HTML.='
            <a href="detail_autre_envoi_france.php?id_autre_envoi_france='.$row['id_autre_envoi_france'].'" class="btn btn-warning_"><button type="button" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Profile"><i class="uil uil-print"></i> Consulter</button></a>
            ';
            
             $HTML.='
            <a target="_blank" href="../exportation/pdf/etiquette_autre_envoi_france.php?id_autre_envoi_france='.$row['id_autre_envoi_france'].'" class="btn btn-warning_"><button type="button" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Profile"><i class="uil uil-tag"></i> Etiquette</button></a>
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
    $titre='<br />Aucun envoi trouv&eacute;';
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