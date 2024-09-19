<?php
require('header.php');
$connexion = dbconnect();

// Initialisation de la variable $prenom
$prenom = '';

 // Vérification si la session est active, sinon démarrage de la session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

 // Récupération du nom d'utilisateur depuis la session
$nom_utilisateur = isset($_SESSION['login']) ? $_SESSION['login'] : '';

// Récupération des informations de l'utilisateur depuis la base de données
if (isset($_SESSION['login'])) {
    $user_id = $_SESSION['login'];
    $stmt_get_user = $connexion->prepare("SELECT login, nom, prenom, age, email, adresse_postale, code_postal  FROM `patinageclub`.`adhérent` WHERE login = :username");
    $stmt_get_user->bindParam(':username', $user_id);
    $stmt_get_user->execute();

    // Si l'utilisateur existe dans la base de données
    if ($stmt_get_user->rowCount() > 0) {
        $user_info = $stmt_get_user->fetch(PDO::FETCH_ASSOC);
        $nom = $user_info['nom'];
        $prenom = $user_info['prenom'];
        $age = $user_info['age'];
        $email = $user_info['email'];
        $adresse_postale = $user_info['adresse_postale'];
        $code_postal = $user_info['code_postal'];
        $id_utilisateur = $user_info['login'];
    }
}

// Vérification si la requête est de type POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit_certificat_medical"])) {
        // Endroit où mettre le fichier
        $dossier_upload = "uploads/";

        // Nommage fichier
        $nouveau_nom_fichier = $nom_utilisateur . "_CertificatMedical.pdf";
        $chemin_fichier = $dossier_upload . $nouveau_nom_fichier;

        // edit ou ajout
        $mode_operation = isset($_POST['mode_operation']) ? $_POST['mode_operation'] : '';

        if (file_exists($chemin_fichier) && $mode_operation === 'edit') {
            unlink($chemin_fichier); //suppression fichier

            // On le remplace par le nouveau
            if (move_uploaded_file($_FILES["certificat_medical"]["tmp_name"], $chemin_fichier)) {
                echo '<div style="background-color: green; padding: 15px; color: white;">Le fichier a été modifié avec succès !</div>';
            } else {
                echo '<div style="background-color: #red; padding: 15px; color: white;">Erreur lors de la modification du fichier </div>';
            }
        } else {
            // Mode ajout
            if (!file_exists($chemin_fichier) && $mode_operation !== 'edit') {
                if (move_uploaded_file($_FILES["certificat_medical"]["tmp_name"], $chemin_fichier)) {
                    // Requête BDD
                    $sql_update_chemin = "UPDATE docadmin SET chemin_certificat_medical = :chemin WHERE login = :id";
                    $stmt_update_chemin = $connexion->prepare($sql_update_chemin);
                    $stmt_update_chemin->bindParam(':chemin', $chemin_fichier);
                    $stmt_update_chemin->bindParam(':id', $id_utilisateur);
                    $stmt_update_chemin->execute();

                    echo '<div style="background-color: green; padding: 15px; color: white;">Le fichier a été ajouté avec succès !</div>';
                } else {
                    echo '<div style="background-color: #red; padding: 15px; color: white;">Erreur lors de l\'ajout du fichier </div>';
                }
            } elseif ($mode_operation !== 'edit') {
                echo '<div style="background-color: red; padding: 15px; color: white;">Erreur : le fichier existe déjà</div>';
            }
        }
    } else if (isset($_POST["submit_photo"])) {
        // Endroit où mettre le fichier
        $dossier_upload = "uploads/";

        // Nommage fichier
        $nouveau_nom_fichier = $nom_utilisateur . "_PhotoIdentite.jpg";
        $chemin_fichier = $dossier_upload . $nouveau_nom_fichier;

        // edit ou ajout
        $mode_operation2 = isset($_POST['mode_operation2']) ? $_POST['mode_operation2'] : '';

        if (file_exists($chemin_fichier) && $mode_operation2 === 'edit2') {
            unlink($chemin_fichier); // Suppression fichier

            // On le remplace par le nouveau
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $chemin_fichier)) {
                echo '<div style="background-color: green; padding: 15px; color: white;">Le fichier a été modifié avec succès !</div>';
            } else {
                echo '<div style="background-color: red; padding: 15px; color: white;">Erreur lors de la modifiation/div>';
            }
        } else {
            // Mode ajout
            if (!file_exists($chemin_fichier) && $mode_operation2 !== 'edit2') {
                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $chemin_fichier)) {
                    // Requête BDD
                    $sql_update_chemin = "UPDATE docadmin SET chemin_photo_identite = :chemin WHERE login = :id";
                    $stmt_update_chemin = $connexion->prepare($sql_update_chemin);
                    $stmt_update_chemin->bindParam(':chemin', $chemin_fichier);
                    $stmt_update_chemin->bindParam(':id', $id_utilisateur);
                    $stmt_update_chemin->execute();

                    echo '<div style="background-color: green; padding: 15px; color: white;">Le fichier a été ajouté avec succès !</div>';
                } else {
                    echo '<div style="background-color: #red; padding: 15px; color: white;">Erreur lors de l\'ajout du fichier </div>';
                }
            } elseif ($mode_operation2 !== 'edit') {
                echo '<div style="background-color: red; padding: 15px; color: white;">Erreur : le fichier existe déjà</div>';
            }
        }
    } else if (isset($_POST["submit_piece_identite"])) {
        // Endroit où mettre le fichier
        $dossier_upload = "uploads/";

        // Nommage fichier
        $nouveau_nom_fichier = $nom_utilisateur . "_PieceIdentite.pdf";
        $chemin_fichier = $dossier_upload . $nouveau_nom_fichier;

        // edit ou ajout
        $mode_operation3 = isset($_POST['mode_operation3']) ? $_POST['mode_operation3'] : '';

        if (file_exists($chemin_fichier) && $mode_operation3 === 'edit3') {
            unlink($chemin_fichier); // Suppression fichier

            // On le remplace par le nouveau
            if (move_uploaded_file($_FILES["piece_identite"]["tmp_name"], $chemin_fichier)) {
                echo '<div style="background-color: green; padding: 15px; color: white;">Le fichier a été modifié avec succès !</div>';
            } else {
                echo '<div style="background-color: #red; padding: 15px; color: white;">Erreur lors de la modification du fichier </div>';
            }
        } else {
            // Mode ajout
            if (!file_exists($chemin_fichier) && $mode_operation3 !== 'edit3') {
                if (move_uploaded_file($_FILES["piece_identite"]["tmp_name"], $chemin_fichier)) {
                    // Requête BDD
                    $sql_update_chemin = "UPDATE docadmin SET chemin_piece_identite = :chemin WHERE login = :id";
                    $stmt_update_chemin = $connexion->prepare($sql_update_chemin);
                    $stmt_update_chemin->bindParam(':chemin', $chemin_fichier);
                    $stmt_update_chemin->bindParam(':id', $id_utilisateur);
                    $stmt_update_chemin->execute();

                    echo '<div style="background-color: green; padding: 15px; color: white;">Le fichier a été ajouté avec succès !</div>';
                } else {
                    echo '<div style="background-color: #red; padding: 15px; color: white;">Erreur lors de l\'ajout du fichier </div>';
                }
            } elseif ($mode_operation3 !== 'edit') {
                echo '<div style="background-color: red; padding: 15px; color: white;">Erreur : le fichier existe déjà</div>';
            }
        }
    }
}
?>

<html>
    <body>
        <span id="descendre"></span>
        <div class="infoadherent">
            <div class="partie1adherent">
                <div class="hautadherent">
                    <img src="images/adherenteLisa.png" alt="sophie">
                    <h1>
                        Mon compte -
                        <?php echo $prenom; ?>
                    </h1>
                </div>

                <!--Affiche les données du membre-->
                <h2>Mes informations</h2>

                <div class="nomadherent">
                    <label for="nom">Nom</label>
                </div>
                <input type="text" id="nom" name="nom" placeholder="NOM" value="<?php echo $nom; ?>" readonly>

                <div class="prenomadherent">
                    <label for="prenom">Prénom</label>
                </div>
                <input type="text" id="prenom" name="prenom" placeholder="PRENOM" value="<?php echo $prenom; ?>" readonly>

                <div class="dateadherent">
                    <label for="age">Age</label>
                </div>
                <input type="text" id="age" name="age" placeholder="AGE" value="<?php echo $age; ?>" readonly>

                <div class="mailadherent">
                    <label for="email">Adresse mail</label>
                </div>
                <input type="text" id="email" name="email" placeholder="ADRESSE MAIL" value="<?php echo $email; ?>"
                    readonly>

                <div class="adresseadherent">
                    <label for="adresse">Adresse postale</label>
                </div>
                <input type="text" id="adresse" name="adresse" placeholder="ADRESSE MAIL"
                    value="<?php echo $adresse_postale; ?>" readonly>

                <div class="codeadherent">
                    <label for="fname">Code postal</label>
                </div>
                <input type="text" id="fname" name="firstname" placeholder="ADRESSE MAIL"
                    value="<?php echo $code_postal; ?>" readonly>
            </div>
        </div>


        <!-- DOCUMENTS ADHERENT -->
        <div class="partiedoc">
            <h2>Mes documents </h2>

            <!-- PIECE IDENTITE -->
            <div class="docadherent">
                <label for="fname"><a href="uploads/<?php echo $nom_utilisateur; ?>_PieceIdentite.pdf" download>
                        Cliquez ici pour télécharger votre pièce d'identité
                    </a></label>
                <div class="boutonadherent">
                    <button type="button" style="background-color: lightgreen;"
                        onclick="openDocumentModalForAdd('identite')"><i class='fas fa-plus fa-2x'></i></button>
                </div>
                <div class="boutonadherent">
                    <button type="button" onclick="openDocumentModalForEdit('identite')"><i
                            class='fas fa-pencil-alt fa-2x'></i></button>
                </div>
            </div>

            <!-- CERTIFICAT MEDICAL -->
            <div class="docadherent">
                <label for="fname"><a href="uploads/<?php echo $nom_utilisateur; ?>_CertificatMedical.pdf" download>
                        Cliquez ici pour télécharger votre certificat médical
                    </a>
                    <div class="boutonadherent">
                        <button type="button" style="background-color: lightgreen;"
                            onclick="openDocumentModalForAdd('certificat')"><i class='fas fa-plus fa-2x'></i></button>
                    </div>
                    <div class="boutonadherent">
                        <button type="button" onclick="openDocumentModalForEdit('certificat')"><i
                                class='fas fa-pencil-alt fa-2x'></i></button>
                    </div>
            </div>


            <!-- PHOTO IDENTITE -->
            <div class="docadherent">
                <label for="photo">
                    <a href="uploads/<?php echo $nom_utilisateur; ?>_PhotoIdentite.jpg" download>
                        Cliquez ici pour télécharger votre photo d'identité
                    </a>
                </label>
                <div class="boutonadherent">
                    <button type="button" style="background-color: lightgreen;" onclick="openDocumentModalForAdd('photo')">
                        <i class='fas fa-plus fa-2x'></i>
                    </button>
                </div>
                <div class="boutonadherent">
                    <button type="button" onclick="openDocumentModalForEdit('photo')">
                        <i class='fas fa-pencil-alt fa-2x'></i>
                    </button>
                </div>
            </div>


            <div class="docadherent">
                <label for="adhesion">
                    <?php
                    echo '<a href="telechargerdossier.php?login=' . $nom_utilisateur . '">Télécharger votre document d\'adhésion</a>';
                    ?>
                </label>
            </div>

            <!-- Espace pour ajouter un document-->
            <div id="DocumentModal" class="modalad">
                <form id="documentForm" class="modalad-content animate"
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="haut">
                        <img src="images/flocon.png" alt="image flocon">
                        <span onclick="closeDocumentModal()" class="close" title="Close Modal">&times;</span>
                        <h1 id="titreModale">Ajouter un document</h1>
                    </div>

                    <div class="documentFormContent">
                        <input type="hidden" name="document_id" id="document_id">
                        <div>
                            <label for="certificat_medical">Sélectionner votre certificat médical (PDF) :</label>
                            <input type="file" name="certificat_medical" id="certificat_medical" accept=".pdf" required>
                        </div>
                        <input type="hidden" name="document_path" id="document_path">
                        <input type="hidden" name="mode_operation" id="mode_operation" value="">

                    </div>

                    <div class="boutonlog">
                        <button type="submit" name="submit_certificat_medical" class="okbtn"
                            id="documentSubmitBtn">Valider</button>

                        <button type="button" onclick="closeDocumentModal()" class="cancelbtn">Annuler</button>
                    </div>
                </form>
            </div>

            <div id="DocumentModalIdentite" class="modalad">
                <form id="documentFormIdentite" class="modalad-content animate"
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="haut">
                        <img src="images/flocon.png" alt="image flocon">
                        <span onclick="closeDocumentModal()" class="close" title="Close Modal">&times;</span>
                        <h1 id="titreModaleIdentite">Ajouter un document</h1>
                    </div>

                    <div class="documentFormContent">
                        <input type="hidden" name="document_id" id="document_id">
                        <div>
                            <label for="certificat_medical">Sélectionner votre pièce d'identité (PDF) :</label>
                            <input type="file" name="piece_identite" id="piece_identite" accept=".pdf" required>
                        </div>
                        <input type="hidden" name="document_path" id="document_path">
                        <input type="hidden" name="mode_operation3" id="mode_operation3" value="">
                    </div>

                    <div class="boutonlog">
                        <button type="submit" name="submit_piece_identite" class="okbtn"
                            id="identiteSubmitBtn">Valider</button>
                        <button type="button" onclick="closeDocumentModal()" class="cancelbtn">Annuler</button>
                    </div>
                </form>
            </div>

            <div id="DocumentModalJpg" class="modalad">
                <form id="documentFormJpg" class="modalad-content animate"
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="haut">
                        <img src="images/flocon.png" alt="image flocon">
                        <span onclick="closeDocumentModal()" class="close" title="Close Modal">&times;</span>
                        <h1 id="titreModaleJpg">Ajouter un document</h1>
                    </div>

                    <div class="documentFormContent">
                        <input type="hidden" name="document_id" id="document_id">
                        <div>
                            <label for="photo">Sélectionner votre photo d'identité (JPG) :</label>
                            <input type="file" name="photo" id="photo" accept=".jpg" required>
                        </div>
                        <input type="hidden" name="document_path" id="document_path">
                        <input type="hidden" name="mode_operation2" id="mode_operation2" value="">
                    </div>

                    <div class="boutonlog">
                        <button type="submit" name="submit_photo" class="okbtn" id="photoSubmitBtn">Valider</button>
                        <button type="button" onclick="closeDocumentModal()" class="cancelbtn">Annuler</button>
                    </div>
                </form>
            </div>

        <script src="script/script.js"></script>
    </body>
</html>