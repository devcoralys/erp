<?php
session_start();

include('../../../connex.php');


	//Calcul Total
        $tot=$con->prepare('SELECT * FROM groupage LEFT JOIN colis ON groupage.time_groupage=colis.groupage_time WHERE id_groupage="'.$_SESSION['id_groupage'].'" ');
        $tot->execute();
        $montant_total=0;
        while($itot=$tot->fetch())
        {
            $montant_total=$montant_total + ($itot['poids_colis']*$itot['pu_colis']) + $itot['emballage_colis'];
        }
        
        echo $montant_total;



unset($con);

?>