<?php
session_start();
include('../../../connex.php');

// Récupérez les données du formulaire
$dossier = $_POST["dossier"];
$client = $_POST["client"];
$agent = $_POST["agent"];
$numero_cotation = $_POST["numero_cotation"];
$fdi_ac = $_POST["fdi_ac"];
$numero_rfcv = $_POST["numero_rfcv"];
$numero_dch = $_POST["numero_dch"];
$bureau = $_POST["bureau"];
$passage = $_POST["passage"];
$facture = $_POST["facture"];
$montant = $_POST["montant"];
$mode_reglement = $_POST["mode_reglement"];
$date_reglement = $_POST["date_reglement"];
$caution = $_POST["caution"];
$numero_bordereau = $_POST["numero_bordereau"];
$numero_archive = $_POST["numero_archive"];

// Préparez et exécutez la requête SQL
$stmt = $con->prepare("INSERT INTO suivi_dossier (numero_dossier, client, agent_en_charge, numero_cotation, fdi_ac, numero_rfcv, numero_dch, bureau, passage, facture, montant, mode_reglement, date_reglement, caution, numero_bordereau, numero_archive) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssdsssss", $dossier, $client, $agent, $numero_cotation, $fdi_ac, $numero_rfcv, $numero_dch, $bureau, $passage, $facture, $montant, $mode_reglement, $date_reglement, $caution, $numero_bordereau, $numero_archive);

if ($stmt->execute()) {
    echo "Données enregistrées en base de données avec succès !";
} else {
    echo "Erreur : " . $stmt->error;
}

// Fermez la connexion
$stmt->close();
$con->close();

header('Location: .../suivi_general.php');
?>
