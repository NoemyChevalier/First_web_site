<?php
require('header.php');
?>

<!-- Importation de la librairie permettant d'afficher la carte -->
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

</head>

<html>
    <body>
        <!-- Définition de la barre de progression -->
        <div class="barredeprogression">
            <div class="barrescroll"></div>
        </div>
        <script src="script/barre.js"></script>

        <span id="descendre"></span>
        <div class="contenuclub">
            <div class="presentation">
                <h2> Présentation du club</h2>
                <p>Bienvenue à Ethereal Skate - le club de patinage artistique qui fait rêver depuis 1990 !
                    <br><br>
                    Plongez dans un monde de grâce, de beauté et d'élégance. Depuis plus de trois décennies, Ethereal Skate
                    a été le phare scintillant de l'univers du patinage artistique, alliant la tradition de ce sport à une
                    touche de magie intemporelle.
                    <br><br>
                    Nos patineurs, qu'ils soient des débutants prometteurs ou des champions confirmés, se consacrent à la
                    perfection, repoussant sans cesse les limites de la créativité et de l'excellence.
                    <br><br>
                    Au Ethereal Skate, nous célébrons l'élégance, la précision et la passion du patinage artistique. Notre
                    équipe d'entraîneurs dévoués, composée d'anciens champions et d'experts de renom, guide nos patineurs
                    dans leur voyage vers l'excellence.
                    <br><br>
                    Rejoignez nous pour vivre la magie du patinage artistique au Ethereal Skate. Que vous soyez un patineur
                    en herbe, un passionné de glace ou un spectateur admiratif, vous serez transporté dans un monde où la
                    beauté et la grâce règnent en maître. Venez créer des souvenirs étincelants avec nous, car au Ethereal
                    Skate, chaque glissade sur la glace est une histoire, chaque mouvement est un poème et chaque patineur
                    est une étoile brillante dans notre ciel de la patinoire.
                </p>
            </div>

            <div class="infosclub">
                <h3> Informations concernant le club </h3>
                <p> Afin de garantir la sécurité et le bien-être de tous nos membres, nous avons mis en place quelques
                    directives importantes concernant l'inscription, en particulier pour les enfants de moins de 16 ans.
                    Pour ces derniers, nous demandons qu'un adulte responsable autorise leur inscription. Cette mesure vise
                    à assurer la supervision appropriée et à garantir que les jeunes patineurs bénéficient d'un
                    environnement sécurisé et favorable à leur développement.</p>

                <p>Inscription standard : 70 euros
                    Veuillez noter que les tarifs d'inscription ne couvrent pas la location du matériel lié à la pratique du
                    patinage artistique, tels que les patins et la tenue. Ces articles peuvent être fournis par le club
                    moyennant des frais supplémentaires.<br>
                    Nous sommes convaincus que l'expérience au sein de notre club sera enrichissante, divertissante et
                    pleine de découvertes pour tous les participants. Si vous avez des questions supplémentaires ou des
                    préoccupations, n'hésitez pas à nous contacter.</p>
            </div>
        </div>

        <div class="equipe">
            <h2> L'équipe </h2>
            <h3> Natalia Kovalenki </h3>
            <div class="imageentre">
                <img src="images/natalia_entraineur.png" alt="natalia">
                <p>Natalia Kovalenko a passé la majeure partie de sa vie sur la glace. Née dans une petite ville en
                    Biélorussie, elle a commencé le patinage à l'âge de cinq ans. Elle a représenté son pays aux Jeux
                    olympiques d'hiver à deux reprises avant de devenir entraîneuse. Natalia est réputée pour sa discipline
                    rigoureuse et sa capacité à pousser ses élèves à atteindre leur plein potentiel. Sa carrière
                    d'entraîneuse a été marquée par de nombreux champions nationaux et internationaux, faisant d'elle une
                    figure emblématique du patinage artistique en Biélorussie.</p>
            </div>

            <div class="entre2">
                <h3>Orlane Taylor</h3>
                <img src="images/orlane_entraineur.png" alt="orlane">
                <p>Jordan Taylor a grandi dans la banlieue de Toronto, le cœur du patinage artistique canadien. Elle a
                    commencé à patiner à un jeune âge, inspirée par les performances de ses compatriotes légendaires. Sa
                    carrière sur la glace a été ponctuée de succès nationaux et internationaux. Après sa retraite sportive
                    prématurée en raison d'une blessure, Jordan s'est rapidement tournée vers l'enseignement. Elle a
                    développé une approche holistique de l'entraînement, mettant l'accent sur la connexion émotionnelle avec
                    la musique et l'authenticité dans la performance. Jordan est passionnée par la création d'un
                    environnement inclusif où chaque patineur peut s'épanouir et trouver sa propre voix artistique sur la
                    glace.</p>
            </div>

            <div class="entre3">
                <h3>Sophie Leclerc</h3>
                <img src="images/sophie_entraineur.png" alt="sophie">
                <p>Sophie Leclerc est une ancienne patineuse artistique française qui a rapidement fait la transition vers
                    une carrière d'entraîneuse après sa retraite sportive. Elle a remporté plusieurs médailles lors de
                    compétitions européennes et mondiales au cours de sa carrière. Passionnée par le mélange de la grâce
                    artistique et de la puissance athlétique sur la glace, Sophie apporte une approche moderne à
                    l'entraînement. Elle aime expérimenter avec de nouvelles chorégraphies et encourage ses élèves à
                    exprimer leur créativité sur la glace.</p>
            </div>
        </div>

        <!-- Définition de la carte intéractive -->
        <div class="localisation">
            <h2>Nous localiser</h2>
            <div id="maCarte"></div>
            <script src="script/carte.js"></script>
        </div>


        <div class="sponsor">
            <h2>Nos sponsors</h2>
            <div class="sponsorimg">
                <div class="spotify">
                    <a href="https://open.spotify.com"><img src="images/spotify" alt="spotify" id="imgspotify"></a>
                </div>

                <div class="ville">
                    <a href="https://www.paris.fr/quefaire/sport"><img src="images/villedeparis" alt="villedeparis"></a>
                </div>

                <div class="ffsg">
                    <a href="https://www.ffsg.org/"><img src="images/ffsg.png" alt="ffsg" id="ffsg"></a>
                </div>
            </div>
        </div>

        <div class="textefin">
            <p>Si vous souhaitez obtenir plus d'informations sur nos différents sponsors, vous pouvez soit cliquer sur le
                logo de l'entreprise, soit cliquer simplement <a href="sponsor.php">ici.</a></p>
        </div>
    </body>
</html>

<?php
require('footer.php');
?>