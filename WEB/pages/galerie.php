<?php
    require('header.php');
?>

<html>
    <body>
        <!-- Définition de la barre de progression -->
        <div class="barredeprogression">
            <div class="barrescroll"></div>
        </div>
        <script src="script/barre.js"></script>

        <span id="descendre"></span>
        <div class="galeriecontenu">
            <p>
                Au sein de cette page, vous pourrez retrouver les photos des événements qui ont eu lieu récemment dans notre
                club de patinage artistique. Plongez dans l'atmosphère vibrante de nos compétitions, laissez-vous emporter
                par la grâce de nos galas de fin de saison, et revivez l'intensité de nos séances d'entraînement. Ces
                clichés captureront les moments magiques, les performances exceptionnelles, et les sourires partagés par
                notre communauté passionnée de patineurs artistiques. Explorez notre galerie visuelle et plongez-vous dans
                l'univers captivant du patinage artistique au sein de notre club.
            </p>

            <!--  Affichage des images des entrainements -->
            <div class="gaentrainement">
                <h1>Les entraînements</h1>
                <img src="images/fotoentre1.png" alt="Image entrainement">
                <img src="images/fotoentre2.png" alt="Image entrainement">
                <img src="images/fotoentre3.png" alt="Image entrainement">
                <img src="images/fotoentre4.png" alt="Image entrainement">
                <div class="fotoentre">
                    <img src="images/fotoentre5.png" alt="Image entrainement">
                    <img src="images/fotoentre6.png" alt="Image entrainement">
                    <img src="images/fotoentre7.png" alt="Image entrainement">
                    <img src="images/fotoentre8.png" alt="Image entrainement">
                </div>

            </div>

            <!--  Affichage des images des shooting photos -->
            <div class="gashooting">
                <h1>Les séances photos</h1>
                <img src="images/fotoshoot1.png" alt="Image seance photo">
                <img src="images/fotoshoot2.png" alt="Image seance photo">
                <img src="images/fotoshoot3.png" alt="Image seance photo">
                <img src="images/fotoshoot4.png" alt="Image seance photo">
                <div class="fotoshoot">
                    <img src="images/fotoshoot5.png" alt="Image entrainement">
                    <img src="images/fotoshoot6.png" alt="Image entrainement">
                    <img src="images/fotoshoot7.png" alt="Image entrainement">
                    <img src="images/fotoshoot8.png" alt="Image entrainement">
                </div>
            </div>

            <div class="gacompetition">
                <h1>Les compétitions</h1>
                <img src="images/fotocomp1.png" alt="Image seance photo">
                <img src="images/fotocomp2.png" alt="Image seance photo">
                <img src="images/fotocomp3.png" alt="Image seance photo">
                <img src="images/fotocomp4.png" alt="Image seance photo">
                <div class="fotogacomp2">
                    <img src="images/fotocomp5.png" alt="Image seance photo">
                    <img src="images/fotocomp6.png" alt="Image seance photo">
                    <img src="images/fotocomp7.png" alt="Image seance photo">
                    <img src="images/fotocomp8.png" alt="Image seance photo">
                </div>

            </div>

            <!--  Affichage des images des galas -->
            <div class="galegala">
                <h1>Les galas</h1>
                <img src="images/fotogala1.png" alt="Image seance photo">
                <img src="images/fotogala2.png" alt="Image seance photo">
                <img src="images/fotogala3.png" alt="Image seance photo">
                <img src="images/fotogala4.png" alt="Image seance photo">
                <div class="fotogala">
                    <img src="images/fotogala5.png" alt="Image seance photo">
                    <img src="images/fotogala6.png" alt="Image seance photo">
                    <img src="images/fotogala7.png" alt="Image seance photo">
                    <img src="images/fotogala8.png" alt="Image seance photo">
                </div>
            </div>

            <!--  Affichage des images des journées portes ouvertes -->
            <div class="gajpo">
                <h1>La journéee porte ouverte de notre club</h1>
                <img src="images/fotojpo1.png" alt="Image seance photo">
                <img src="images/fotojpo2.png" alt="Image seance photo">
                <img src="images/fotojpo3.png" alt="Image seance photo">
                <img src="images/fotojpo4.png" alt="Image seance photo">
                <div class="fotojpo">
                    <img src="images/fotojpo5.png" alt="Image seance photo">
                    <img src="images/fotojpo6.png" alt="Image seance photo">
                    <img src="images/fotojpo7.png" alt="Image seance photo">
                    <img src="images/fotojpo9.png" alt="Image seance photo">
                </div>
            </div>

            <div class="videogalerie">
                <video width="640" height="360" controls>
                    <source src="video/videogaleriefin.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </body>
</html>

<?php
    require('footer.php');
?>