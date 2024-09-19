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
        <div class="evetext">
            <h1>Les événements du club</h1>
            <p>
                Au sein du club, nous vivons une multitude d'événements captivants qui enrichissent notre expérience, parmi
                lesquels figurent les entraînements, les compétitions et les galas de fin de saison. Ces moments sont bien
                plus que de simples rendez-vous, ils créent des souvenirs inoubliables et façonnent notre passion commune
                pour la glace.
            </p>
        </div>

        <div class="entrtext">
            <h2>Les Entraînements :</h2>
            <p>
                Nos entraînements sont le point de départ de cette aventure sur la glace. Ils représentent l'occasion pour
                chaque patineur de se perfectionner, d'explorer de nouveaux mouvements et de renforcer ses compétences
                techniques. Encadrés par des entraîneurs dévoués, ces moments sur la glace sont empreints d'apprentissage,
                de persévérance et de camaraderie.
                <video width="640" height="360" controls>
                    <source src="video/video_entr.mp4" type="video/mp4">
                </video>
            </p>
        </div>

        <div class="comptext">
            <h2>Les Compétitions :</h2>
            <p>
                Les compétitions sont le terrain où nos patineurs révèlent leur talent et leur détermination. C'est là que
                se mesurent l'entraînement intensif et la passion déployée. Partager ces moments de compétition renforce les
                liens au sein du club, créant une atmosphère de soutien et d'encouragement mutuel. Chaque compétition est
                une opportunité pour nos patineurs de briller et de repousser leurs propres limites.
                <video width="640" height="360" controls>
                    <source src="video/video_comp.mp4" type="video/mp4">
                </video>
            </p>
        </div>

        <div class="galatext">
            <h2>Les Galas de Fin de Saison :</h2>
            <p>
                Les galas de fin de saison sont les joyaux de notre calendrier. Ils marquent la clôture d'une année riche en
                efforts et en accomplissements. Ces spectacles époustouflants sont le fruit du travail acharné de nos
                patineurs et de la créativité de nos entraîneurs. Les galas offrent une plateforme pour mettre en lumière
                les talents artistiques, dévoiler des chorégraphies enchanteresses et célébrer la magie du patinage.
                Au fil de ces événements, le club devient un véritable foyer où les membres partagent des émotions intenses,
                forgent des amitiés durables et développent un amour indéfectible pour le patinage artistique. Chacun de ces
                moments contribue à tisser une toile vivante de passion, de compétence et de convivialité qui définit notre
                club de patinage comme une communauté unique et vibrante.
                <br><br><br>
                <video width="640" height="360" controls>
                    <source src="video/video_gala.mp4" type="video/mp4">
                </video>
            </p>
        </div>

        
        <div class="calendrier">
            <h2>Calendrier des événements à venir</h2>
            <h3>Les entrainements</h3>

            <!-- Affichage des données stockées dans la bdd, lié à la table entrainement -->
            <div class="entrainement">
                <?php
                $stmt = $connexion->query('SELECT lieu_entrainement, horaire_entrainement FROM entrainement');
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($result) > 0) {
                    echo "<ul>";
                    foreach ($result as $row) {
                        echo "<li>" . "❄️ " . $row["lieu_entrainement"] . ' - ' . $row["horaire_entrainement"] . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo 'Aucun événement trouvé.';
                }

                echo '<a id="vieclubcouleurentre" href="telechargerentrainement.php?categorie=entrainement"  onmouseover="changeCouleur2()">Télécharger les entraînements</a>';
                ?>

                <script>
                    function changeCouleur2() {
                        document.getElementById('vieclubcouleurentre').style.color = '#8181FF';
                    }
                </script>
            </div>

            <!-- Affichage des données stockées dans la bdd, lié à la table competition -->
            <h3>Les compétitions</h3>
            <div class=comp>
                <?php
                $sql = "SELECT lieu_competition, date_competition, duree_competitions, type_competition FROM competition";
                $stmt = $connexion->query($sql);

                if ($stmt) {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (count($result) > 0) {
                        echo "<ul>";
                        foreach ($result as $row) {
                            echo "<li>" . "❄️ " . $row['lieu_competition'] . " - " . $row['date_competition'] . " - " . $row['duree_competitions'] . " - " . $row['type_competition'] . "</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo 'Aucun événement trouvé.';
                    }
                } else {
                    echo 'Erreur dans la requête.';
                }
                echo '<a id="vieclubcouleurcomp"  href="telechargercompetitions.php?categorie=competition" onmouseover="changeCouleur1()">Télécharger les compétitions</a>';
                ?>

                <script>
                    function changeCouleur1() {
                        document.getElementById('vieclubcouleurcomp').style.color = '#8181FF';
                    }
                </script>

            </div>

            <!-- Affichage des données stockées dans la bdd, lié à la table gala -->
            <h3>Les galas</h3>
            <div class="gala">
                <?php
                $sql = 'SELECT * FROM gala';
                $stmt = $connexion->query($sql);

                if ($stmt) {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (count($result) > 0) {
                        echo '<ul>';
                        foreach ($result as $row) {
                            echo '<li>' . "❄️ " . $row['lieu'] . ' - ' . $row['nom'] . ' - ' . $row['date'] . '</li>';
                        }
                        echo '</ul>';
                    } else {
                        echo 'Aucun événement trouvé.';
                    }
                } else {
                    echo 'Erreur dans la requête.';
                }
                echo '<a id="vieclubcouleurgala" href="telechargergala.php?categorie=gala" onmouseover="changeCouleur()">Télécharger les galas</a>';
                ?>
                
                <!-- Script permettant de changer de couleur le texte lorsque l'on passe la souris dessus-->
                <script>
                    function changeCouleur() {
                        document.getElementById('vieclubcouleurgala').style.color = '#8181FF';
                    }
                </script>
            </div>


            <!-- Affichage des données stockées dans la bdd, lié à la table vieclub -->
            <h3>La vie du club </h3>
            <div class="vieclubtext">
                <?php
                $stmt = $connexion->query('SELECT description, heure, lieu, date FROM vieclub');
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($result) > 0) {
                    echo "<ul>";
                    foreach ($result as $row) {
                        echo "<li>" . "❄️ " . $row["description"] . ' - ' . $row["heure"] . ' - ' . $row["lieu"] . ' - ' . $row["date"] . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo 'Aucun événement VieClub trouvé.';
                }

                echo '<a id="vieclubcouleur" href="telechargervieclub.php" onmouseover="changeColor()">Télécharger les prochaines activitées du club</a>';
                ?>
            
                <script>
                    function changeColor() {
                        document.getElementById('vieclubcouleur').style.color = '#8181FF';
                    }
                </script>
            </div>
        </div>
    </body>
</html>

<?php
require('footer.php');
?>