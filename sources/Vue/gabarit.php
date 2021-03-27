<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <base href="<?php echo $racineWeb; ?>" >
        <link rel="stylesheet" href="./contenu/style.css" />
        <title><?php  echo $titre;  ?></title>
    </head>
    <body>
        <div> <!--global-->
            <header>
                <h1><strong><em>Club Sportif</em></strong></h1>
                <button><a href="Connexion/index" >Se connecter</a></button>
            </header>
            <nav>
                <ul>
                    <li><a href="" ><strong>Accueil</strong></a></li>
                    <li><a href="Convocation/index" ><strong>Convocations</strong></a></li>
                    <li><a href="Competition/index"><strong>Calendrier</strong></a></li>
                    <li><a href="Effectif/index"><strong>Effectifs</strong></a></li>
                    <li><a href="Absence/index"><strong>Absences</strong></a></li>
                </ul>
            </nav>
            <div id='contenu'>
                <?php echo $contenu; ?>
            </div>
            <footer>
                <hr/>
                Site realisé avec PHP, HTML5, CSS3 et JAVASCRIPT
            </footer>
        </div>
    </body>
</html>