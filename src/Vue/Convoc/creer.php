<div class="princip" >
<form method="post" action="Convoc/creer" >
    <fieldset>
        <legend><h1>Gestion convocation</h1></legend>
                <h3>Selectionnner une equipe et consulter les différentes rencontres qui lui sont associées</h3>
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
    if(isset($_POST["Envoyer"]))
    {
        echo "<br/>";
        if(isset($donnees["compet"]))
        {
            echo "<h2>Choisissez une en cochant dans la case choix puis en validant en bas pour creer une convocation pour cette rencontre</h2>";
            echo '
            <form action=Convoc/gestion  method=post >';

            echo "<table>
            <thead>
                <th>Choix</th>
                <th>Id competition</th>
                <th>Nom compétition</th>
                <th>Equipe</th>
                <th>Equipe adverse</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Terrain</th>
                <th>Site</th>
            </thead>
            <tbody>";
            while($resul=$donnees["compet"]->fetch(PDO::FETCH_ASSOC))
            {
                echo "<tr>";
                echo  '<td><input type="radio" name="competit" value=';
                echo $resul['id_compet'];
                echo ' required /></td>';
                foreach($resul as $key => $value)
                {
                        echo "<td>";
                        echo $this->nettoyer($value);
                        echo "</td>";
                }
                echo "</tr>";
            }
            echo "</tbody>
            </table>";
            echo "<br/>";
            echo ' <input type="submit" name="valider" value="Valider" />';
            echo '
            </form>';
        }
        else
        {
            echo "<hr/>";
            echo "<h1>Aucune competittion n'est associée à cette équipe</h1>";
        }
    }
?>
<div>