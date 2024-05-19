<?php
session_start();

include('../../../connex.php');


	//Calcul Total
        $tot=$con->prepare('SELECT * FROM autre_envoi_france LEFT JOIN colis_autre_envoi_france ON autre_envoi_france.time_autre_envoi_france=colis_autre_envoi_france.autre_envoi_france_time WHERE id_autre_envoi_france="'.$_SESSION['id_autre_envoi_france'].'" ');
        $tot->execute();
        $montant_total=0;
        while($itot=$tot->fetch())
        {
            $montant_total=$montant_total + ($itot['poids_colis_autre_envoi_france']*$itot['pu_colis_autre_envoi_france']) + $itot['emballage_colis_autre_envoi_france'];
        }
        
        echo $montant_total;



unset($con);

?>