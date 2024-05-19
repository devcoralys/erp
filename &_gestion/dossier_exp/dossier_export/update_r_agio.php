<?php
session_start();
$time_dossier = time();
include('../../../connex.php');

$date = gmdate("Y-m-d H:i:s");

// Vérifier si r_agio est défini dans $_POST, sinon, définir sa valeur par défaut à 0
$r_agio = isset($_POST['r_agio']) ? $_POST['r_agio'] : 0;

if ($_SESSION['ref_dos'] !== '' && isset($_POST['r_agio'])) {
    $req = $con->prepare("UPDATE dossier_exp SET r_agio = :r_agio WHERE id_dossier = :id_dossier");
    $req->execute(array('r_agio' => $r_agio, 'id_dossier' => $_SESSION['ref_dos']));

    echo '0';
    unset($con);
}
?>
