<?php
session_start();

include('../../../connex.php');


	//Calcul Total
        $tot=$con->prepare('SELECT * FROM colis_fret LEFT JOIN colis_colis_fret ON colis_fret.time_colis_fret=colis_colis_fret.colis_fret_time WHERE id_colis_fret="'.$_SESSION['id_colis_fret'].'" ');
        $tot->execute();
        $montant_total=0;
        while($itot=$tot->fetch())
        {
            $montant_total=$montant_total + ($itot['poids_colis_colis_fret']*$itot['pu_colis_colis_fret']) + $itot['emballage_colis_colis_fret'];
        }
        
        echo $montant_total;



unset($con);

?>