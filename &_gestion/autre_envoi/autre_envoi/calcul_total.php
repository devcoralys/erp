<?php
session_start();

include('../../../connex.php');


	//Calcul Total
        $tot=$con->prepare('SELECT * FROM autre_envoi LEFT JOIN colis_autre_envoi ON autre_envoi.time_autre_envoi=colis_autre_envoi.autre_envoi_time WHERE id_autre_envoi="'.$_SESSION['id_autre_envoi'].'" ');
        $tot->execute();
        $montant_total=0;
        while($itot=$tot->fetch())
        {
            $montant_total=$montant_total + ($itot['poids_colis_autre_envoi']*$itot['pu_colis_autre_envoi']) + $itot['emballage_colis_autre_envoi'];
        }
        
        echo $montant_total;



unset($con);

?>