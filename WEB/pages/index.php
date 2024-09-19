<?php
    // Inclusion du fichier de connexion à la base de données
    require('dbconnect.php');

    // Démarrage de la session
    session_start();

    // Vérification de la variable de session pour déterminer si un administrateur est connecté
    $admin = isset($_SESSION['admin']) ? $_SESSION['admin'] : false;

    // Gestion de la déconnexion si la variable "disconnect" est présente dans l'URL
    if (isset($_GET["disconnect"])) {
        if ($_GET["disconnect"] == 1) {
            // Réinitialisation des variables de session et redirection vers la page actuelle
            $_SESSION["admin"] = false;
            unset($_SESSION["login"]);
            unset($_SESSION["password"]);
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        }
    }

    // Vérification si des données de connexion ont été soumises via le formulaire POST
    if (isset($_POST['login']) && isset($_POST["password"])) {
        // Requête SQL pour récupérer le mot de passe associé à l'identifiant fourni
        $sql = "SELECT password FROM adhérent WHERE login = :login";

        // Connexion à la base de données
        $connexion = dbconnect();
        $stmt = $connexion->prepare($sql);

        // Liaison de la valeur de l'identifiant
        $stmt->bindValue(':login', $_POST['login'], PDO::PARAM_STR);

        // Exécution de la requête préparée
        if ($stmt->execute()) {
            // Récupération du mot de passe haché depuis la base de données
            $hashedPassword = $stmt->fetchColumn();

            // Vérification du mot de passe saisi avec le mot de passe haché
            if (password_verify($_POST["password"], $hashedPassword)) {
                // Authentification réussie, configuration des variables de session et redirection
                $_SESSION["admin"] = true;
                $_SESSION['login'] = $_POST['login'];
                header("Location: {$_SERVER['PHP_SELF']}");
                exit();
            } else {
                // Affichage d'un message en cas d'identifiants incorrects
                echo "Identifiants incorrects";
            }
        } else {
            // Affichage d'un message en cas d'erreur d'exécution de la requête
            echo "Erreur d'exécution de la requête";
        }

        // Fermeture de la connexion à la base de données
        $connexion = null;
    }
?>

<html>
    <head>
        <title>Ethereal Skate</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="icon" href="images/LogoClub.png">
        
        <script>
            // Fonction pour afficher le formulaire de connexion
            function authenticate() {
                let modal = document.getElementById('Connexion');
                modal.style.display = 'block';
            }

            // Fonction pour effectuer la déconnexion
            function disconnect() {
                window.location.href = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" + '?disconnect=1';
            }

            // Fonction pour fermer le modal
            function closeModal() {
                document.getElementById('Connexion').style.display = 'none';
            }
        </script>
    </head>

    <body>
        <div class="navbarindex">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php">
                        <img src="images/LogoClub.png" alt="logo">
                    </a>
                </div>
                <ul>
                    <li><a href="notreclub.php">Notre club</a></li>
                    <?php
                        if (!isset($_SESSION['login'])) {
                    ?>
                        <li><a href="inscription.php">Inscription</a></li>
                    <?php
                        }
                    ?>
                    <li><a href="competition.php">Compétition</a></li>
                    <li><a href="evenements.php">Événements</a></li>
                    <li><a href="galerie.php">Galerie</a></li>

                    <!-- Si une personne est connecté l'espace apparait dans la navbar, sinon rien ne s'affiche -->
                    <?php if ($admin) { ?>
                        <li style="float:right;"><a href="moncompte.php">Mon compte</a></li>
                        <li style="float:right;"><a href="#" onclick="disconnect();">Déconnexion</a></li>
                    <?php } else { ?>
                        <li style="float:right;"><a href="#" onclick="authenticate();">Connexion</a></li>
                    <?php } ?>

                </ul>
            </div>
            <img src="images/imAccueil1.jpg" alt="image accueil">
        </div>

        <!-- Permet de créer l'espace de connexion-->
        <div id="Connexion" class="modal">
            <form id="loginForm" class="modal-content animate"
                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="haut">
                    <img src="images/flocon.png" alt="image flocon">
                    <span onclick="document.getElementById('Connexion').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <h1>Se connecter</h1>
                </div>

                <div class="connectlog">
                    <input type="text" placeholder="Nom d'utilisateur" name="login" id="login" required>
                    <input type="password" placeholder="Mot de passe" name="password" id="password" required>
                </div>

                <div class="boutonlog">
                    <button type="submit" class="okbtn">Valider</button>
                    <button type="button" onclick="document.getElementById('Connexion').style.display='none'"
                        class="cancelbtn">Annuler</button>
                </div>
            </form>
        </div>
    </body>
</html>

<?php
    require 'footer.php';
?>