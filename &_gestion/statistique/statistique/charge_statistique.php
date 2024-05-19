<?php
    session_start();
	
	include('../../../connex.php');
	
    ini_set('memory_limit','512M');
    ini_set('max_execution_time', 12000);

    if(isset($_POST['recher_date_debut']) && $_POST['recher_date_debut']!='')
	{
	$recher_date_debut=$_POST['recher_date_debut'];
    $_SESSION['recher_date_debut']=$_POST['recher_date_debut'];
	}
	else
	{
	$recher_date_debut='';
    $_SESSION['recher_date_debut']='';
	}

    if(isset($_POST['recher_date_fin']) && $_POST['recher_date_fin']!='')
	{
	$recher_date_fin=$_POST['recher_date_fin'];
    $_SESSION['recher_date_fin']=$_POST['recher_date_fin'];
	}
	else
	{
	$recher_date_fin='';
    $_SESSION['recher_date_fin']='';
	}
	
    if($recher_date_debut!='' || $recher_date_fin!=''){
    ?>
    <script>

	 function change_page_statistique(page_id_cons){
       
 
  var recher_date_debut = '<?php echo $recher_date_debut; ?>';
  var recher_date_fin = '<?php echo $recher_date_fin; ?>';

  var dataString = 'page_id_cons='+ page_id_cons+'&recher_date_debut='+recher_date_debut+'&recher_date_fin='+recher_date_fin;
	 
     $.ajax({
           type: "POST",
           url: "caisse/charge_statistique.php",
           data: dataString,
           cache: false,
		    beforeSend: function(){
			$("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').show();
            $(".aff_statistique").hide();
            },
           success: function(result){
		  $("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').hide();
		  $(".aff_statistique").html(result).show();
		   }
      });
    }
	</script>
     

    <?php
    }

$requete=" SELECT * FROM mouvement WHERE id_mouvement!='' ";

if($recher_date_debut!='')
{
    $requete.=" AND date_creat_mouvement>='".$recher_date_debut."' ";
}

if($recher_date_fin!='')
{
    $requete.=" AND date_creat_mouvement<='".$recher_date_fin."' ";
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
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_statistique(1);'>&laquo; Debut</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Debut</span>";
		
		if ($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_statistique(".($prev).");'>&laquo; Precedent&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Precedent&nbsp;&nbsp;</span>";   
		
        if ($last_page < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $last_page; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href='javascript:void(0);' onClick='change_page_statistique(".($counter).");'>$counter</a>";     
                         
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
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_statistique(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_statistique(".($second_last).");'> $second_last</a>";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_statistique(".($last_page).");'>$last_page</a>";   
           
           }
           elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_statistique(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_statistique(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href='javascript:void(0);' onClick='change_page_statistique(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_statistique(".($second_last).");'>$second_last</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_statistique(".($last_page).");'>$last_page</a>";   
           }
           else
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_statistique(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_statistique(2);'>2</a>";
               $pagination.= "..";
               for($counter = $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_statistique(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_statistique(".($next).");'>Suivant &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Suivant &raquo;</span>";
		
		if($page < $last_page)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_statistique(".($last_page).");'>Fin &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Fin &raquo;</span>";
        
        $pagination.= "</div>";       
    }

    $req=" SELECT * FROM mouvement WHERE id_mouvement!=''  ";

    if($recher_date_debut!='')
    {
        $req.=" AND date_creat_mouvement>='".$recher_date_debut."' ";
    }

    if($recher_date_fin!='')
    {
        $req.=" AND date_creat_mouvement<='".$recher_date_fin."' ";
    }
 
    
    $req.=" ORDER BY date_creat_mouvement DESC LIMIT ".$start.", ".$records_per_page." ";

$records=$con->query($req);    
 
$count  = $records->rowCount();
$HTML='';

$HTML.='
<p style="color:grey;">Nombre de transactions : <b>'.$count_1.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>';


					             
if($count > 0)
{

                                $HTML.='
					                <table id="myTable" class="table" style="text-align:left;">
					                    <thead>
					                        <tr>
                                                <th><a href="javascript:void();">Code</a></th>
                                                <th><a href="javascript:void();">Date</a></th>	
                                                <th><a href="javascript:void();">Montant</a></th>	
                                                <th><a href="javascript:void();">Type</a></th>	
					                        </tr>
					                    </thead>
					                    <tbody>
                                ';

$i=1;

    foreach($records as $row) {

        if($row['type_mouvement']==0)
        {
            $type_mouvement='<i class="fa fa-ban"></i> Sortie';
            $color='red';
        }
        else if($row['type_mouvement']==1)
        {
            $type_mouvement='<i class="fa fa-check"></i> entrée';
            $color='green';
        }
       
	
$HTML.=' 
<tr>

            <td>'.stripslashes($row['num_mouvement']).'</td> 
            <td>'.stripslashes(date("d/m/Y H:i:s", strtotime($row['date_creat_mouvement']))).'</td>  
            <td>'.number_format($row['montant_mouvement'],0,',',' ').' FCFA</td>     
            <td style="color:'.$color.';">'.$type_mouvement.'</td>        
       ';

$HTML.='</tr>'; 

  $i++;		                                                                 
}

$HTML.='';
			
}
 
else
{
            $titre='<br />Aucune transaction trouv&eacute;e';
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