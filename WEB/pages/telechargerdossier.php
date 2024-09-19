<?php
require('fpdf183/fpdf.php');
require('dbconnect.php');

$connexion = dbconnect();
$connexion->exec("SET CHARACTER SET utf8");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$nom_utilisateur = isset($_SESSION['login']) ? $_SESSION['login'] : '';

// Récupération des informations de l'utilisateur depuis la base de données
if (isset($_SESSION['login'])) {
    $user_id = $_SESSION['login'];
    $stmt_get_user = $connexion->prepare("SELECT login, nom, prenom, age, email, adresse_postale, code_postal FROM `patinageclub`.`adhérent` WHERE login = :username");
    $stmt_get_user->bindParam(':username', $user_id);
    $stmt_get_user->execute();

    // Si l'utilisateur existe dans la base de données
    if ($stmt_get_user->rowCount() > 0) {
        $user_info = $stmt_get_user->fetch(PDO::FETCH_ASSOC);
    }
}

// Génération du PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

$pdf->Cell(0, 10, "Dossier adherent - $nom_utilisateur", 0, 1, 'C');
$pdf->Ln(10);

// Création du tableau
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10);
$pdf->Cell(0, 10);
$pdf->Ln();

$pdf->SetFont('Arial', '', 12);

addRowToTable($pdf, 'Nom', $user_info['nom']);
addRowToTable($pdf, 'Prenom', $user_info['prenom']);
addRowToTable($pdf, 'Age', $user_info['age']);
addRowToTable($pdf, 'Email', $user_info['email']);
addRowToTable($pdf, 'Adresse postale', $user_info['adresse_postale']);
addRowToTable($pdf, 'Code postal', $user_info['code_postal']);

// Nom du fichier PDF
$filename = "InformationsUtilisateur_$nom_utilisateur.pdf";

// Nettoyage du tampon de sortie sans l'envoyer au navigateur
ob_end_clean();

// Envoi du PDF au navigateur pour téléchargement
$pdf->Output($filename, 'D');

$connexion = null;

// Fonction pour ajouter une ligne au tableau
function addRowToTable($pdf, $champ, $valeur)
{
    $pdf->Cell(50, 10, $champ, 1);
    $pdf->Cell(0, 10, $valeur, 1);
    $pdf->Ln();
}
?>
