<div class= >
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
<div class="liste">
<?php
    if(!empty($donnees))
    {
        if($donnees["trouve"]=="oui")
        {
            $joueurs=$donnees["joueur"];
            echo "<hr/>";
            echo "<h1>Convocation</h1>";
            $tabC=$donnees["compe"];
            echo "<span>Nom competition : </span>";
            echo $tabC["nom_compet"];
            echo "<br/><br/>";
            echo "<span>Nom de l'equipe : </span>";
            echo $tabC["nom_equipe"];
            echo "<br/><br/>";
            echo "<span>Date : </span>";
            echo $tabC["datecompet"];
            echo "<br/><br/>";
            echo "<span>Heure : </span>";
            echo $tabC["heure"];
            echo "<br/><br/>";
            echo "<span>Terrain : </span>";
            echo $tabC["terrain"];
            echo "<br/><br/>";
            echo "<span>Site : </span>";
            echo $tabC["site"];
            echo "<br/><br/>";
            echo "<table>";
            echo "<caption><h2>Noms et prenoms des joueurs convoqués pour cette rencontre :</h2></caption>";
            echo "<thead>";
            echo "<th scope=col>Nom</th>";
            echo "<th scope=col>Prenom</th>";
            echo "</thead>";
            echo "<tbody>";
            foreach($joueurs as $joueu)
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
<div>