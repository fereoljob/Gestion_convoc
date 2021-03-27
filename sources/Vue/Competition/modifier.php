<div>
    <form action="Competition/modif" method="post">
        <fieldset>
            
            <legend><h1>Formulaire de modification</h1></legend><table><tr><td>
            <label for="nomcompet"><strong>Nom competition:</strong></label></td><td>
            <input type="text" name="nomcompet" required autofocus /></td></tr><tr><td>
            <label for="Equipe"><strong>Equipe:</strong></label></td><td>
                <select name="Equipe">
                        <option value="SENIORS_A" selected >SENIORS_A</option>
                        <option value="SENIORS_B" >SENIORS_B</option>
                        <option value="SENIORS_C" >SENIORS_C</option>
                </select></td></tr><tr><td>
            <label for="equipAdv" ><strong>Equipe adverse:</strong></label></td><td>
            <input type="text" name="equipAdv" required /></td></tr><tr><td>
            <label for="ladate" > <strong>Date:</strong></label></td><td>
            <input type="date" name="ladate" required /></td></tr><tr><td>
            <label for="heure" ><strong>Heure:</strong></label></td><td>
            <input type="time" name="heure" required /></td></tr><tr><td>
            <label for="terrain" ><strong>Terrain:</strong></label></td><td>
            <input type="text" name="terrain" required /></td></tr><tr><td>
            <label for ="site" ><strong>Site:</strong></label></td><td>
            <input type="text" name="site" required /></td></tr><tr><td>
            <input type="submit" name="ajouter" value="Ajouter" /></td></tr>
            </table>
        </fieldset>
    </form>
</div>
<div class="recherche2">
    <form action="Competition/modif" method="post">
        <fieldset>
            <h3>Id compet à modifier et renseigner les nouvelles valeures </h3>
            <table><tr>
                <td><label for="lid"><strong>Id competition</strong></label></td>
                <td><input type="text" name="lid" /></td>
            </tr><tr><td>
            <label for="nomcompet"><strong>Nom competition:</strong></label></td><td>
            <input type="text" name="nomcompet" required autofocus /></td></tr><tr><td>
            <label for="Equipe"><strong>Equipe:</strong></label></td><td>
                <select name="Equipe">
                        <option value="SENIORS_A" selected>SENIORS_A</option>
                        <option value="SENIORS_B" >SENIORS_B</option>
                        <option value="SENIORS_C" >SENIORS_C</option>
                </select></td></tr><tr><td>
            <label for="equipAdv" ><strong>Equipe adverse:</strong></label></td><td>
            <input type="text" name="equipAdv" required /></td></tr><tr><td>
            <label for="ladate" > <strong>Date:</strong></label></td><td>
            <input type="date" name="ladate" required /></td></tr><tr><td>
            <label for="heure" ><strong>Heure:</strong></label></td><td>
            <input type="time" name="heure" required /></td></tr><tr><td>
            <label for="terrain" ><strong>Terrain:</strong></label></td><td>
            <input type="text" name="terrain" required /></td></tr><tr><td>
            <label for ="site" ><strong>Site:</strong></label></td><td>
            <input type="text" name="site" required /></td></tr><tr><td>
            <input type="submit" name="Maj" value="Mettre à jour" /></td></tr>
            </table>
        </fieldset>
    </form>
</div>
<div class="recherche">
    <form action="Competition/modif" method="post">
        <fieldset>
            <label for="lid"><strong>Id joueur:</strong>(consulter liste joueurs plus bas)<label><br/><br/>
                <input type="text" name="lid" required /><br/><br/>
                <input type="submit" name="retirer" value="Retirer" />
        </fieldset>
    </form>
</div>
<div class="liste">
    <form action="Competition/modifier" method="post" >
        <label for="listecompet" ><h2>Pour consulter la liste des competitions</h2></label>
        <input type="submit" value="cliquez ici" name="listecompet" />
    </form>
    <?php

        if(isset($_POST['listecompet']))
        {
            echo "
            <br/><br/>
            <form action='Competition/modifier' post='post' >
            <input type='submit' value='Cacher liste' name='cacher' />
            </form>";
            echo "<table>
            <thead>
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
            while($resul=$donnees["competitions"]->fetch(PDO::FETCH_ASSOC))
            {
                echo "<tr>";
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
        }
    ?>
</div>
