<?php
    // Inclusion du fichier d'en-tête
    require('header.php');

    // Connexion à la base de données
    $connexion = dbconnect();

    // Vérification si la requête est de type POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupération des données du formulaire
        $nom = isset($_POST['csurname']) ? $_POST['csurname'] : '';
        $prenom = isset($_POST['cname']) ? $_POST['cname'] : ''; 
        $age = isset($_POST['cage']) ? $_POST['cage'] : '';
        $type_competition = isset($_POST['type_competition']) ? $_POST['type_competition'] : '';
        $longueur = isset($_POST['longueur']) ? $_POST['longueur'] : '';
        $musique = isset($_POST['cmusic']) ? $_POST['cmusic'] : ''; 

        // Préparation de la requête SQL d'insertion
        $stmt = $connexion->prepare("INSERT INTO `patinageclub`.`inscricomp` (
            nom, prenom, age, type_competition, longueur, musique
        ) 
        VALUES (
            :nom, :prenom, :age, :type_competition, :longueur, :musique
        )");

        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':type_competition', $type_competition); 
        $stmt->bindParam(':longueur', $longueur);
        $stmt->bindParam(':musique', $musique);
    
        // Exécution de la requête
        if ($stmt->execute()) {
            // Affichage d'un message en cas de succès
            echo '<div style="background-color: #4CAF50; padding: 15px; color: white;">Les données ont été insérées avec succès.</div>';
        } else {
            // Affichage d'un message d'erreur avec les informations détaillées en cas d'échec
            echo '<div style="background-color: #FF4C4C; padding: 15px; color: white;">Erreur lors de la transmission des données.</div>';
            print_r($stmt->errorInfo());
        }

        // Fermeture de la connexion à la base de données
        $connexion = null;
    }
?>


<html>
    <body>
        <!-- Définition de la barre de progression -->
        <div class="barredeprogression">
            <div class="barrescroll"></div>
        </div>
        <script src="script/barre.js"></script>

        <span id="descendre"></span>
        
        <!-- Formulaire d'inscription à une compétition -->
        <div class="formuinscompetition">
            <h2>Formulaire d'inscription</h2>
            <form method="post" action="inscricomp.php" id="formulaireCompetition">
                <div class="formulaireCompetition">
                    <p>Nom </p>
                    <input type="text" id="csurname" name="csurname" placeholder="NOM" required>
                    <p>Prénom</p>
                    <input type="text" id="cname" name="cname" placeholder="PRENOM" required>
                    <p>Âge</p>
                    <input type="text" id="cage" name="cage" placeholder="ÂGE" required>
                    <p>Inscription à la discipline :</p>
                    <input type="text" id="type_competition" name="type_competition" placeholder="DISCIPLINE SOUHAITEE" required>
                    <p>Longueur de l'enchainement (m's'') </p>
                    <input type="text" id="longueur" name="longueur" placeholder="2'35''" required>
                    <p>Musique associée </p>
                    <input type="text" id="cmusic" name="cmusic" placeholder="MUSIQUE" required>
                    <input type="submit" value="Valider">
                </div>
            </form>
        </div>
    </body>
</html>

<?php
    require('footer.php');
?>
