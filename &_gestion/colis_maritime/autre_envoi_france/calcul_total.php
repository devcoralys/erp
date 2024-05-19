<?php
session_start();

include('../../../connex.php');


	//Calcul Total
        $tot=$con->prepare('SELECT * FROM colis_maritime LEFT JOIN colis_colis_maritime ON colis_maritime.time_colis_maritime=colis_colis_maritime.colis_maritime_time WHERE id_colis_maritime="'.$_SESSION['id_colis_maritime'].'" ');
        $tot->execute();
        $montant_total=0;
        while($itot=$tot->fetch())
        {
            $montant_total=$montant_total + ($itot['poids_colis_colis_maritime']*$itot['pu_colis_colis_maritime']) + $itot['emballage_colis_colis_maritime'];
        }
        
        echo $montant_total;



unset($con);

?>