<?php
    require('header.php');
    $connexion = dbconnect();
?>

<html>
    <body>
        <!-- Définition de la barre de progression -->
        <div class="barredeprogression">
            <div class="barrescroll"></div>
        </div>
        <script src="script/barre.js"></script>

        <span id="descendre"></span>
        <div class="containerTxt">
            <div class="condition">
                <h2> Conditions d'accès </h2>
                <p>Les compétitions sont ouvertes à tous les adhérents ayant payé la licence spécifique à la compétition et ayant un certificat médical adapté à la pratique du sport en compétition valable pour l'année scolaire en cours. Aucun frais d'inscription supplémentaire n'est demandé. Les frais de déplacement et d'hébergement sont pris en charge par le club. En revanche, les dépenses liées à l'achat de tuniques et robes de patinage pour les compétitions sont à la charge du participant et de sa famille.<br><br>
                Vous pouvez consulter le planning des prochaines inscriptions et vous inscrire en remplissant le formulaire plus bas. Attention, l'inscription vous engage à réellement participer.</p>
            </div>
           
            <!-- Affichage des données stockées dans la bdd, lié à la table resultatart -->
            <div class="resultatart">
                <h2>Résultats des différentes compétitions</h2>
                
                <table>
                <caption>Résultats patinage artistique</caption>
                    <tr>
                        <th>Classement</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                    </tr>
                    <?php
                $sqlArt = 'SELECT nom, prenom, classement FROM resultatart';
                $stmtArt = $connexion->query($sqlArt);

                if ($stmtArt !== false) {
                    $resultArt = $stmtArt->fetchAll(PDO::FETCH_ASSOC);

                    if (count($resultArt) > 0) {
                        foreach ($resultArt as $row) {
                            echo "<tr><td>" . $row['classement'] . "</td><td>" . $row['nom'] . "</td><td>" . $row['prenom'] . "</td></tr>";
                        }
                    } 
                    else {
                        echo "<tr><td colspan='3'>Aucun résultat dans la table pour le patinage artistique.</td></tr>";
                    }
                } 
                else {
                    echo 'Erreur dans la requête.';
                }
                ?>
                </table>
            </div>

            <!-- Affichage des données stockées dans la bdd, lié à la table resultatsynchro -->
            <div class="resultsynchro">
                <table>
                    <caption>Résultats patinage synchronisé</caption>
                    <tr>
                        <th>Classement</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                    </tr>
                    <?php
                        $sqlSynchro = 'SELECT nom, prenom, classement FROM resultatsynchro';
                        $stmtSynchro = $connexion->query($sqlSynchro);

                        if ($stmtSynchro !== false) {
                            $resultSynchro = $stmtSynchro->fetchAll(PDO::FETCH_ASSOC);

                            if (count($resultSynchro) > 0) {
                                foreach ($resultSynchro as $row) {
                                    echo "<tr><td>" . $row['classement'] . "</td><td>" . $row['nom'] . "</td><td>" . $row['prenom'] . "</td></tr>";
                                }
                            } 
                            else {
                                echo "<tr><td colspan='3'>Aucun résultat dans la table pour le patinage synchronisé.</td></tr>";
                            }
                        } 
                        else {
                            echo 'Erreur dans la requête.';
                        }
                    ?>

                </table>
            </div>

            <!-- Affichage des données stockées dans la bdd, lié à la table resultatcouple -->
            <div class="resultcouple">
                <table>
                    <caption>Résultats patinage en couple</caption>
                    <tr>
                        <th>Classement</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                    </tr>
                    <?php
                        $sqlCouple = 'SELECT nom, prenom, classement FROM resultatcouple';
                        $stmtCouple = $connexion->query($sqlCouple);

                        if ($stmtCouple !== false) {
                            $resultCouple = $stmtCouple->fetchAll(PDO::FETCH_ASSOC);

                            if (count($resultCouple) > 0) {
                                foreach ($resultCouple as $row) {
                                    echo "<tr><td>" . $row['classement'] . "</td><td>" . $row['nom'] . "</td><td>" . $row['prenom'] . "</td></tr>";
                                }
                            } 
                            else {
                                echo "<tr><td colspan='3'>Aucun résultat dans la table pour le patinage en couple.</td></tr>";
                            }
                        } 
                        else {
                            echo 'Erreur dans la requête.';
                        }
                    ?>
                </table>
            </div>
           
            <!-- Permet au membre du club de s'inscrire à une compétition, cette zone n'est pas visible pour les non adhérents  -->
            <?php
                if (isset($_SESSION['login'])) {
            ?>
                <div class="compeinscri">
                    <p>Si vous souhaitez vous inscrire à une compétition, cliquez sur le lien suivant : <a href="inscricomp.php">Inscription à une compétition</a></p>
                </div>
            <?php
                }
            ?>
        </div>
    </body>
</html>

<?php
    require('footer.php');
?>
