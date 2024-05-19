<?php
    session_start();
	
	include('../../../connex.php');
	
    ini_set('memory_limit','512M');
    ini_set('max_execution_time', 12000);
	
	
    $dos_id=$_SESSION['ref_dos'];

    ?>
    <script>

	 function change_page_article(page_id_cons){
       
  var dataString = 'page_id_cons='+ page_id_cons;
	 
     $.ajax({
           type: "POST",
           url: "dossier_import/charge_article.php",
           data: dataString,
           cache: false,
           success: function(result){
		  //$("div.chargement").html('<img src="../../../images/loading.gif" style="width:25px; height:25px;" />').hide();
          $(".aff_article").html('');
		  $(".aff_article").html(result).show();
		   }
      });
    }
	</script>
     

    <?php

    $requete=" SELECT * FROM article WHERE id_article!='' AND dossier_id=".$dos_id." ";

/*
    if($_SESSION['is_dg']==1 || $_SESSION['is_valid']==1)
    {
        $requete=" SELECT * FROM article LEFT JOIN utilisateur ON utilisateur.secur=article.demandeur_secur WHERE id_article!='' ";
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
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_article(1);'>&laquo; Debut</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Debut</span>";
		
		if ($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_article(".($prev).");'>&laquo; Precedent&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Precedent&nbsp;&nbsp;</span>";   
		
        if ($last_page < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $last_page; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href='javascript:void(0);' onClick='change_page_article(".($counter).");'>$counter</a>";     
                         
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
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_article(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_article(".($second_last).");'> $second_last</a>";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page_article(".($last_page).");'>$last_page</a>";   
           
           }
           elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_article(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_article(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href='javascript:void(0);' onClick='change_page_article(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_article(".($second_last).");'>$second_last</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_article(".($last_page).");'>$last_page</a>";   
           }
           else
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_article(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page_article(2);'>2</a>";
               $pagination.= "..";
               for($counter = $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page_article(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_article(".($next).");'>Suivant &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Suivant &raquo;</span>";
		
		if($page < $last_page)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page_article(".($last_page).");'>Fin &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Fin &raquo;</span>";
        
        $pagination.= "</div>";       
    }

    $req=" SELECT * FROM article WHERE id_article!='' AND dossier_id=".$dos_id."  ";
 
    /*
    if($_SESSION['is_dg']==1 || $_SESSION['is_valid']==1)
    {
        $req=" SELECT * FROM article LEFT JOIN utilisateur ON utilisateur.secur=article.demandeur_secur WHERE id_article!='' ";
    }
    */

    $req.=" ORDER BY id_article ASC LIMIT ".$start.", ".$records_per_page." ";

$records=$con->query($req);    
 
$count  = $records->rowCount();
$HTML='';

$_SESSION['nbre_article']=$count_1;

$HTML.='<p style="color:grey;">Nombre d\'articles : <b>'.$count_1.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>';

			             
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
                <th style="width: 70px;">SH CODE</th>
          
                <th>FOB EUR</th>
                <th>FOB CFA</th>
                <th>FRET</th>
                <th>ASS</th>
                <th>CAF</th>
                <th>TAUX</th>
                <th>Droit Douane</th>
                <th>Action</th>
            </tr>
            <!-- end tr -->
        </thead>
        <!-- end thead -->
        <tbody>';

        $tot_fob_euro=0; 
        $tot_fob_cfa=0; 
        $tot_fret=0; 
        $tot_ass=0; 
        $tot_caf=0; 
        $tot_dd=0;

    foreach($records as $row) {

$HTML.=' 

<!-- /tr -->
<tr>
    <td>'.$i.'</td>
    <td>'.$row['code_tarifaire'].'</td>

    <td>'.$row['fob_euro'].'</td>
    <td>'.$row['fob_cfa'].'</td>
    <td>'.$row['fret'].'</td>
    <td>'.$row['ass'].'</td>
    <td>'.$row['caf'].'</td>
    <td>'.floatval(100*$row['taux']).' %</td>
    <td>'.$row['dd'].'</td>
    <td>
    <!--
    <a class="edit_article" href="javascript:void(0);"  data-toggle="modal" data-target="#myModal_article_mod" data-id='.$row['id_article'].' title="Modifier"><i class="fa fa-edit"></i> </a>&nbsp;&nbsp;&nbsp;
    -->
    <a class="delete_article" href="javascript:void(0);"  data-toggle="modal" data-target="#myModal_article_sup" data-id='.$row['id_article'].' title="Supprimer"><i class="fa fa-trash"></i> </a>&nbsp;&nbsp;&nbsp;
    </td>
</tr>
<!-- end tr -->

';
$tot_fob_euro= $row['fob_euro']+ $tot_fob_euro; 
$tot_fob_cfa= $row['fob_cfa']+$tot_fob_cfa; 
$tot_fret=$row['fret']+$tot_fret; 
$tot_ass=$row['ass']+$tot_ass; 
$tot_caf=$row['caf']+$tot_caf; 
$tot_dd=$row['dd']+$tot_dd;

$_SESSION['total_dd']=$tot_dd;
$_SESSION['total_fob_cfa']=$tot_fob_cfa;
$_SESSION['total_fret']=$tot_fret;
$_SESSION['total_ass']=$tot_ass;
$_SESSION['total_caf']=$tot_caf;

$total_fob_cfa=$_SESSION['total_fob_cfa'];
$ts=20000;



if(floatval($total_fob_cfa)<500000)
{
    $rpi=0;
}
if( floatval($total_fob_cfa)<1000000 && floatval($total_fob_cfa)>=500000 )
{
    $rpi=70000;
}
if(floatval($total_fob_cfa)<13350000 && floatval($total_fob_cfa)>=1000000 )
{
    $rpi=100000;
}
if(floatval($total_fob_cfa)>13350000)
{
    $rpi=floatval($total_fob_cfa)*0.0075;
}
$_SESSION['rpi']=$rpi;

$dt=floatval($tot_dd)+floatval($rpi)+floatval($ts);
$_SESSION['dt']=$dt;


//Mise à jour dossier 
$ud=$con->prepare('UPDATE dossier SET dd_total=:A, rpi_total=:B, ts_total=:C, dt_total=:D WHERE id_dossier=:E');
$ud->execute(array('A'=>$tot_dd, 'B'=>$rpi, 'C'=>$ts, 'D'=>$dt, 'E'=>$dos_id));

  $i++;	                                                                 
}


//Calcul des totaux

$HTML.='

<tr style="font-weight:bold;">
    <td COLSPAN="2">TOTAL</td>

    <td>'.number_format($tot_fob_euro,0,',',' ').'</td>
    <td>'.number_format($tot_fob_cfa,0,',',' ').'</td>
    <td>'.number_format($tot_fret,0,',',' ').'</td>
    <td>'.number_format($tot_ass,0,',',' ').'</td>
    <td>'.number_format($tot_caf,0,',',' ').'</td>
    <td>&nbsp;</td>
    <td>'.number_format($tot_dd,0,',',' ').'</td>
    <td>
    <a class="recalcul" href="javascript:void(0);" data-id='.$row['id_article'].' title="Recalculer"><i class="fa fa-calculator"></i> Recalculer</a>&nbsp;&nbsp;&nbsp;
    </td>
</tr>

';


$HTML.='
</tbody><!-- end tbody -->
</table><!-- end table -->
</div>
';
			
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