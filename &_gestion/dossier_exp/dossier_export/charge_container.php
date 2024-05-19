<?php
    session_start();
	
	include('../../../connex.php');
	
    ini_set('memory_limit','512M');
    ini_set('max_execution_time', 12000);
	
	
    $dos_id=$_SESSION['ref_dos'];

    ?>
    <script>

	 function change_page_container(page_id_cons){
       
  var dataString = 'page_id_cons='+ page_id_cons;
	 
     $.ajax({
           type: "POST",
           url: "dossier_export/charge_container.php",
           data: dataString,
           cache: false,
           success: function(result){
		  //$("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').hide();
          $(".aff_container").html('');
		  $(".aff_container").html(result).show();
		   }
      });
    }
	</script>
     

    <?php

    $requete=" SELECT * FROM container_exp WHERE id_container!='' AND dossier_id_container=".$dos_id." ";

/*
    if($_SESSION['is_dg']==1 || $_SESSION['is_valid']==1)
    {
        $requete=" SELECT * FROM container LEFT JOIN utilisateur ON utilisateur.secur=container.demandeur_secur WHERE id_container!='' ";
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
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_container(1);'>&laquo; Debut</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Debut</span>";
		
		if ($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_container(".($prev).");'>&laquo; Precedent&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Precedent&nbsp;&nbsp;</span>";   
		
        if ($last_page < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $last_page; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href='javascript:void(0);' onClick='change_page_container(".($counter).");'>$counter</a>";     
                         
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
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_container(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_container(".($second_last).");'> $second_last</a>";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_container(".($last_page).");'>$last_page</a>";   
           
           }
           elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_container(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_container(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href='javascript:void(0);' onClick='change_page_container(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_container(".($second_last).");'>$second_last</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_container(".($last_page).");'>$last_page</a>";   
           }
           else
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_container(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_container(2);'>2</a>";
               $pagination.= "..";
               for($counter = $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_container(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_container(".($next).");'>Suivant &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Suivant &raquo;</span>";
		
		if($page < $last_page)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_container(".($last_page).");'>Fin &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Fin &raquo;</span>";
        
        $pagination.= "</div>";       
    }

    $req=" SELECT * FROM container_exp WHERE id_container!='' AND dossier_id_container=".$dos_id."  ";
 
    /*
    if($_SESSION['is_dg']==1 || $_SESSION['is_valid']==1)
    {
        $req=" SELECT * FROM container LEFT JOIN utilisateur ON utilisateur.secur=container.demandeur_secur WHERE id_container!='' ";
    }
    */

    $req.=" ORDER BY id_container ASC LIMIT ".$start.", ".$records_per_page." ";

$records=$con->query($req);    
 
$count  = $records->rowCount();
$HTML='';

//$HTML.='<p style="color:grey;">Nombre d\'containers : <b>'.$count_1.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>';

			             
if($count > 0)
{


    $HTML.=' <div class="row">';
    $i=1;
    $couleur[0]="#ffffff";
    $couleur[1]="#f6f6f6"; 
    $k=0; 
   
   $HTML.='
    <div class="table-responsive" id="parent" style="margin-top:10px auto;">
    <table id="list_trait" class="table table-hover table-nowrap mb-0 align-middle table-check">
        <thead class="bg-light">
            <tr>
                <th>&nbsp;</th>
                <th style="width: 70px;">N° du container</th>
                <th>Type de Container</th>
                <th>Taille</th>
                <th>N° de scellé</th>
                <th>Action</th>
            </tr>
            <!-- end tr -->
        </thead>
        <!-- end thead -->
        <tbody>';

    foreach($records as $row) {


       

$HTML.=' 

<!-- /tr -->
<tr>
    <td>'.$i.'</td>
    <td>'.$row['num_container'].'</td>
    <td>'.$row['type_container'].'</td>
    <td>'.$row['taille_container'].'</td>
    <td>'.$row['num_scelle_container'].'</td>
    <td>
        <a class="edit" href="javascript:void(0);"  data-toggle="modal" data-target="#myModal_container_mod" data-id='.$row['id_container'].' title="Modifier"><i class="fa fa-edit"></i> </a>&nbsp;&nbsp;&nbsp;
        <a class="delete" href="javascript:void(0);"  data-toggle="modal" data-target="#myModal_container_sup" data-id='.$row['id_container'].' title="Supprimer"><i class="fa fa-trash"></i> </a>&nbsp;&nbsp;&nbsp;
    </td>
</tr>
<!-- end tr -->

';

  $i++;		                                                                 
}

$HTML.='
</tbody><!-- end tbody -->
</table><!-- end table -->
</div>
';
			
}
 
else
{
    $titre='<br />Aucun container trouv&eacute;';
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