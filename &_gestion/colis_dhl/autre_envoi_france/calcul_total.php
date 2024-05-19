<?php
session_start();

include('../../../connex.php');


	//Calcul Total
        $tot=$con->prepare('SELECT * FROM colis_dhl LEFT JOIN colis_colis_dhl ON colis_dhl.time_colis_dhl=colis_colis_dhl.colis_dhl_time WHERE id_colis_dhl="'.$_SESSION['id_colis_dhl'].'" ');
        $tot->execute();
        $montant_total=0;
        while($itot=$tot->fetch())
        {
            $montant_total=$montant_total + ($itot['poids_colis_colis_dhl']*$itot['pu_colis_colis_dhl']) + $itot['emballage_colis_colis_dhl'];
        }
        
        echo $montant_total;



unset($con);

?>