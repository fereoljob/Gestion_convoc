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
                    <li><a href="" >Accueil</a></li>
                    <li><a href="Convocation/index" >Convocations</a></li>
                    <li><a href=#>Calendrier</a></li>
                    <li><a href=#>Effectifs</a></li>
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