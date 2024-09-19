<?php
require('dbconnect.php');

// Lancement de la connexion à une session
session_start();

// Si personne n'est actuellement connecté, le système suppose que la session est celle d'un utilisateur non authentifié
$admin = isset($_SESSION['admin']) ? $_SESSION['admin'] : false;

// Si l'utilisateur demande une déconnexion
if (isset($_GET["disconnect"])) {
    if ($_GET["disconnect"] == 1) {
        $_SESSION["admin"] = false;
        unset($_SESSION["login"]);
        unset($_SESSION["password"]);
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}

// Si la méthode de requête est POST et une action de connexion est demandée
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {

    $sql = "SELECT password FROM adhérent WHERE login = :login";

    // Connexion à la base de données
    $connexion = dbconnect();
    $stmt = $connexion->prepare($sql);

    // Liaison des valeurs
    $stmt->bindValue(':login', $_POST['login'], PDO::PARAM_STR);

    if ($stmt->execute()) {
        $hashedPassword = $stmt->fetchColumn();

        // Vérification du mot de passe
        if (password_verify($_POST["password"], $hashedPassword)) {
            $_SESSION["admin"] = true;
            $_SESSION['login'] = $_POST['login'];

            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } 
        else {
            echo '<div class="message-erreur">Erreur d\'identifiants</div>';
        }        
    }

    $connexion = null;
}
?>

<html>
    <head>
        <title>Ethereal Skate</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="icon" href="images/LogoClub.png">

        <script>
            // Fonction pour afficher le formulaire de connexion
            function authenticate() {
                let modal = document.getElementById('Connexion');
                modal.style.display='block';
            }

            // Fonction pour effectuer la déconnexion
            function disconnect() {
                window.location.href = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" + '?disconnect=1';
            }
        </script>
    </head>


    <body>
        <header>
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
                        <li style="float:right;"><a onclick="disconnect();">Déconnexion</a></li>
                    <?php } else { ?>
                        <li style="float:right;"><a onclick="authenticate();">Connexion</a></li>
                    <?php } ?>

                </ul>
            </div>
            <img src="images/impage.jpg" alt="image accueil">
            <div class="bas">
                <a class="descendre" href="#descendre">
                    <img src="images/imancre.png" alt="bouton vers le bas">
                </a>
            </div>
        </header>

        <!-- Permet de créer l'espace de connexion-->
        <div id="Connexion" class="modal">
            <form id="loginForm" class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="haut">
                    <img src="images/flocon.png" alt="image flocon">
                    <span onclick="document.getElementById('Connexion').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <h1>Se connecter</h1>
                </div>

                <input type="hidden" name="action" value="login">

                <div class="connectlog">
                    <input type="text" placeholder="Nom d'utilisateur" name="login" id="login" required>
                    <input type="password" placeholder="Mot de passe" name="password" id="password" required>
                </div>

                <div class="boutonlog">
                    <button type="submit" class="okbtn">Valider</button>
                    <button type="button" onclick="document.getElementById('Connexion').style.display='none'" class="cancelbtn">Annuler</button>
                </div>
            </form>
        </div>
    </body>
</html>