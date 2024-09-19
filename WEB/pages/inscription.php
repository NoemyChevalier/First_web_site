<?php
    // Inclusion du fichier d'en-tête
    require('header.php');

    // Connexion à la base de données
    $connexion = dbconnect();

    // Initialisation de la variable pour la validation du formulaire
    $formulaireValide = false;

    // Vérification si la requête est de type POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupération des données du formulaire
        $login = isset($_POST['login']) ? $_POST['login'] : '';
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
        $age = isset($_POST['age']) ? $_POST['age'] : '';
        $adresse_postale = isset($_POST['adresse_postale']) ? $_POST['adresse_postale'] : '';
        $code_postal = isset($_POST['code_postal']) ? $_POST['code_postal'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // Vérification si le login existe déjà dans la base de données
        $stmtLogin = $connexion->prepare("SELECT COUNT(*) FROM `patinageclub`.`adhérent` WHERE login = :login");
        $stmtLogin->bindParam(':login', $login);
        $stmtLogin->execute();
        $loginExists = $stmtLogin->fetchColumn();

        if ($loginExists) {
            echo '<div style="background-color: #FF0000; padding: 15px; color: white;">Erreur : Le login existe déjà.</div>';
        } else {
            // Hashage du mot de passe
            $mdphash = password_hash($password, PASSWORD_DEFAULT);

            // Préparation de la première requête pour la table 'adhérent'
            $stmt1 = $connexion->prepare("INSERT INTO `patinageclub`.`adhérent` (
                login, nom, prenom, age, adresse_postale, code_postal, email, telephone, password
            ) 
            VALUES (
                :login, :nom, :prenom, :age, :adresse_postale, :code_postal, :email, :telephone, :password
            )");

            // Liaison des paramètres pour la première requête
            $stmt1->bindParam(':login', $login);
            $stmt1->bindParam(':nom', $nom);
            $stmt1->bindParam(':prenom', $prenom);
            $stmt1->bindParam(':age', $age);
            $stmt1->bindParam(':adresse_postale', $adresse_postale);
            $stmt1->bindParam(':code_postal', $code_postal);
            $stmt1->bindParam(':email', $email);
            $stmt1->bindParam(':telephone', $telephone);
            $stmt1->bindParam(':password', $mdphash);

            // Préparation de la deuxième requête pour la table 'documentadministratif'
            $stmt2 = $connexion->prepare("INSERT INTO `patinageclub`.`docadmin` (
                login, prenom
            ) 
            VALUES (
                :login, :prenom
            )");

            // Liaison des paramètres pour la deuxième requête
            $stmt2->bindParam(':login', $login);
            $stmt2->bindParam(':prenom', $prenom);

            try {
                // Début de la transaction
                $connexion->beginTransaction();

                // Exécution des deux requêtes
                $stmt1->execute();
                $stmt2->execute();

                // Validation de la transaction
                $connexion->commit();
                echo '<div style="background-color: #4CAF50; padding: 15px; color: white;">Les données ont été insérées avec succès.</div>';
                
                // Marquage du formulaire comme valide
                $formulaireValide = true;
            } catch (PDOException $e) {
                // En cas d'erreur, annulation de la transaction et affichage du message d'erreur
                $connexion->rollBack();
                echo "Erreur lors de l'envoi des données : " . $e->getMessage();
            }
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
        <div class="contenu">
            <h1>Si vous souhaitez vous inscrire au sein de notre club, veuillez remplir le formulaire ci-dessous.</h1>

            <!-- Formulaire d'inscription au club -->
            <form method="post" action="inscription.php" id="inscriptionformulaire">
                <div class="formulaire">
                    <p>Informations générales</p>
                    <input type="text" id="login" name="login" placeholder="NOM D'UTILISATEUR" required>
                    <input type="text" id="nom" name="nom" placeholder="NOM" required>
                    <input type="text" id="prenom" name="prenom" placeholder="PRENOM" required>
                    <input type="text" id="age" name="age" placeholder="ÂGE" oninput="nombreErreur(this); this.value=this.value.replace(/[^0-9]/g,'')" required>
                    <span id="MessageErreur" style="color: red;"></span>
                    <input type="password" id="password" name="password" placeholder="MOT DE PASSE" required>

                    <p>Coordonnées</p>
                    <input type="text" id="adresse_postale" name="adresse_postale" placeholder="ADRESSE POSTALE" required>
                    <input type="text" id="code_postal" name="code_postal" placeholder="CODE POSTAL" oninput="nombreErreur(this); this.value=this.value.replace(/[^0-9]/g,'')" required>
                    <span id="MessageErreur" style="color: red;"></span>
                    <input type="email" id="email" name="email" placeholder="ADRESSE MAIL" required>
                    <input type="tel" id="telephone" name="telephone" placeholder="NUMERO DE TELEPHONE" oninput="nombreErreur(this); this.value=this.value.replace(/[^0-9]/g,'')" required>
                    <span id="MessageErreur" style="color: red;"></span>

                    <!--Affiche un messge d'erreur si la personne saisit des caractères autres que des numéros-->
                    <script>
                        function nombreErreur(input) {
                            var donnee = input.value;
                            var MessageErreur = document.getElementById("MessageErreur");

                            if (!/^\d+$/.test(donnee)) {
                                MessageErreur.textContent = "Veuillez entrer uniquement des chiffres.";
                            } 
                        }
                    </script>
                </div>

                <!-- Permet d'accepter obligatoirement les conditions générales d'utilisation -->
                <div class="conditionsLabel">
                    <input type="checkbox" id="conditionsCheckbox" required>
                    <label for="conditionsCheckbox">
                        <div class="okgeneral">
                            <p>
                                Veillez accepter les conditions générales d'utilisation si vous souhaitez poursuivre. Pour plus de détails, cliquer sur ce lien : <a href="#" onclick="ouvrirMentionsLegales()">Conditions générales</a>
                            </p>
                        </div>  
                    </label>
                </div>
                
                <div class="bouton">
                    <a href="index.php" id="a1">Annuler</a>
                    <input type="submit" value="Envoyer" form="inscriptionformulaire" id="envoyer">
                </div>
            </form>
        </div>
    </body>
</html>

<?php
    require('footer.php');
?>
