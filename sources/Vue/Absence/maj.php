<div class="princip" >
<form action="Absence/import" method="post" enctype="multipart/form-data" accept=".csv">
    <fieldset>
        <legend><h1>Ajout par import d'un fichier csv</h1></legend>
        <label for="fichier"><h2>Choisissez un fichier à importer dans la table des absences</h2></label><br/><br/>
        <input type="file" name="fichier" /><br/><br/>
        <input type="submit" name="charger" value="Charger les données" />
    </fieldset>
</form>
</div>
<div class="rechercher">
<?php
    if(isset($_POST["charger"]))
    {
        echo '<script type="text/javascript">';
        echo 'alert("';
        echo "$donnees[nbr] $donnees[error]";
        echo '");</script>';
        foreach($donnees["histo"] as $info)
        {
            echo "\t<strong>|$info</strong>";
            echo "<br/>";
        }
    }
?>
</div>