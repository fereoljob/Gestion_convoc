<div class="princip">
    <form action="Absence/modif" method="post">
        <fieldset>
            <legend><h1>Formulaire de modification</h1></legend>
            <label for="type"><strong>Type d'absence:</label>
            <select name="type" >
                <option value="A" selected>Absent(e)</option>
                <option value="S">Suspendu(e)</option>
                <option value="B" >Blessé(e)</option>
                <option value="N" >Non-Licencié(e)</option>
            </select><br/><br/>
            <label for="ladate" >Date: </label>&nbsp
            &nbsp&nbsp
            <input type="date" name="ladate" /><br/><br/>
            <label for="lid" > Id joueur:</strong></label>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="text" name="lid" /><br/><br/>
            <input type="submit" name="ajouter" Value="Ajouter" />
        </fieldset>
    </form>
</div>

<div class="recherche2">
    <form action="Absence/modif" method="post">
        <fieldset>
            <h3>Id absence à modifier et renseigner les nouvelles valeures </h3>
            <label for="lida"><strong>Id absence:</label>&nbsp
            <input type="text" name="lida" /><br/><br/>
            <label for="type">Type d'absence:</label>
            <select name="type" >
                <option value="A" selected >Absent(e)</option>
                <option value="S">Suspendu(e)</option>
                <option value="B" >Blessé(e)</option>
                <option value="N" >Non-Licencié(e)</option>
            </select><br/><br/>
            <label for="ladate" >Date: </label>
            &nbsp&nbsp&nbsp&nbsp
            <input type="date" name="ladate" /><br/><br/>
            <label for="lid" > Id joueur:</label>
            &nbsp&nbsp&nbsp
            <input type="text" name="lid" /><br/><br/>
            <input type="submit" name="Maj" value="Mettre à jour" />
        </fieldset>
    </form>
</div>
<div class="recherche">
    <form action="Absence/modif" method="post">
        <fieldset>
            <label for="lida"><strong>Id absence:</strong>(consulter liste joueurs absents plus bas)<label><br/><br/>
                <input type="text" name="lida" />
            <br/><br/>
                <input type="submit" name="retirer" value="Retirer" />
        </fieldset>
    </form>
</div>
<div class="liste">
    <form action="Absence/modifier" method="post" >
        <label for="listeAbsences" ><h2>Pour consulter la liste des joueurs absents</h2></label>
        <input type="submit" value="cliquez ici" name="listeAbsences" />
    </form>
    <?php

        if(isset($_POST['listeAbsences']))
        {
            echo "
            <br/><br/>
            <form action='Absence/modifier' post='post' >
            <input type='submit' value='Cacher liste' name='cacher' />
            </form>";
            echo "<table>
            <thead>
                <th>id absence</th>
                <th>Nom et prenom joueur</th>
                <th>Type d'absence</th>
                <th>Date</th>
            </thead>
            <tbody>";
            $matab=["N"=>"Non Licencié","A"=>"Absent(e)","B"=>"Blessé(e)","S"=>"Suspendu(e)"];
            foreach($donnees as $tab)
            {
                echo "<tr>";
                    echo "<td>$tab[id_etat]</td>";
                    echo "<td>$tab[id_joueur]</td>";
                    echo "<td>";echo $matab[$tab['type_absence']];echo "</td>";
                    echo "<td>$tab[dateAb]</td>";
                echo "</tr>";
            }
            echo "
            </tbody>
        </table>";
        }
    ?>
</div>