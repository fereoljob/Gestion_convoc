<!DOCTYPE html>
<html>
    <head>
        <meta charsert="UTF-8" />
        <link rel="stylesheet" href="contenu/style.css" />
        <title><?php  echo $titre;  ?></title>
        <base href="<?php echo $racineWeb; ?>" >
    </head>
    <body>
        <div> <!--global-->
            <header>
                <h1><strong><em>Club Sportif</em></strong></h1>
                <button><a href="index.php?controleur=Connexion&action=index" >Se connecter</a></button>
            </header>
            <nav>
                <ul>
                    <li><a href="index.php" >Accueil</a></li>
                    <li><a href="index.php?controleur=Convocation&action=index" >Convocations</a></li>
                    <li><a href=#>Calendriers</a></li>
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