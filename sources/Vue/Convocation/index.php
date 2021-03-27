<div class=convo >
<form method="post" action="Convocation/index" >
    <fieldset>
        <legend><h1>Consultation convocation</h1></legend>
                <label for="ladate"><strong>Date:</label>&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="date" name="ladate" required/>
                <br/><br/>
                <label for="lequipe">Equipe:</label>
                <select name="Equipe">
                        <option value="SENIORS_A" selected >SENIORS_A</option>
                        <option value="SENIORS_B" >SENIORS_B</option>
                        <option value="SENIORS_C" >SENIORS_C</option></strong>
                </select>
                <br/><br/>
            <input type="submit" name="Envoyer" value="Consulter" />
    </fieldset>
</form>
</div>
<?php
    if(!empty($donnees))
    {
        if($donnees["trouve"]=="oui")
        {
            echo "<hr/>";
            echo "<h1>Convocation</h1>";
            $tabC=$donnees["compe"];
            echo "<strong>Nom competition : </strong>";
            echo $tabC["nom_compet"];
            echo "<br/>";
            echo "<strong>Nom de l'equipe : </strong>";
            echo $tabC["nom_equipe"];
            echo "<br/>";
            echo "<strong>Date : </strong>";
            echo $tabC["datecompet"];
            echo "<br/>";
            echo "<strong>Heure : </strong>";
            echo $tabC["heure"];
            echo "<br/>";
            echo "<strong>Terrain : </strong>";
            echo $tabC["terrain"];
            echo "<br/>";
            echo "<strong>Site : </strong>";
            echo $tabC["site"];
            echo "<br/>";
            echo "<table>";
            echo "<caption>Noms et prenoms des joueurs convoqués </caption>";
            echo "<thead>";
            echo "<th scope=col>Nom</th>";
            echo "<th scope=col>Prenom</th>";
            echo "</thead>";
            echo "<tbody>";
            while($joueu=$joueurs->fetch(PDO::FETCH_ASSOC))
            {
                echo "<tr>";
                echo "<td>$joueu[nom]</td>";
                echo "<td>$joueu[prenom]</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }
        else
        {
            echo "<hr/>";
            echo "<h1>Aucune convocation n'a été publiée  à ce jour pour les informations entrées</h1>";
        }
    }
?>