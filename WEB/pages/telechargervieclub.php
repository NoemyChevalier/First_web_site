<?php
require('fpdf183/fpdf.php');
require('dbconnect.php');

$connexion = dbconnect();
$connexion->exec("SET CHARACTER SET utf8");

// Fonction pour générer un PDF à partir des données d'une table avec des champs spécifiques
function generatePDF($table, $filename, $pdf, $fields)
{
    global $connexion;

    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 8);

    // Modification du titre du document
    $pdf->Cell(0, 10, "Programme du club", 0, 1, 'C');
    $pdf->Ln(10);

    // Sélection des champs spécifiques
    $fieldString = implode(', ', $fields);
    $stmt = $connexion->query("SELECT $fieldString FROM $table");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Header du tableau
    foreach ($fields as $field) {
        $pdf->Cell(47, 10, utf8_decode($field), 1);
    }

    $pdf->Ln();

    // Contenu du tableau
    foreach ($result as $row) {
        foreach ($fields as $field) {
            $pdf->Cell(47, 10, utf8_decode($row[$field]), 1);
        }
        $pdf->Ln();
    }
}

$pdf = new FPDF();

generatePDF('vieclub', 'VieClub.pdf', $pdf, ['description', 'heure', 'lieu', 'date']);

// Nettoyage du tampon de sortie sans l'envoyer au navigateur
ob_end_clean();

// Envoi du PDF au navigateur pour téléchargement
$pdf->Output('EvenementsClub.pdf', 'D');

$connexion = null;
?>
