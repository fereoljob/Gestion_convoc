<div class="princip">
    <form action="Effectif/modif" method="post">
        <fieldset>
            <legend><h1>Formulaire de modification</h1></legend>
            <label for="nom"><strong>Nom du joueur:</label>&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp
            <input type="text" name="nom" required autofocus /><br/><br/>
            <label for="prenom" >Prénom du joueur:</label>
            &nbsp
            <input type="text" name="prenom" required /><br/><br/>
            <label for="licence" >Licence:</strong></label>
            &nbsp&nbsp
            <select name="licence" >
                <option value="Sans licence">Sans licence</option>
                <option value="Libre">Libre</option>
            </select><br/><br/>
            <input type="submit" name="ajouter" value="Ajouter" />
            <input type="submit" name="retirer" value="Retirer" />
        </fieldset>
    </form>
</div>
<div class="princip">
    <br/><br/><br/>
    <form action="Effectif/modifier" method="post" >
        <label for="listejoueurs" ><h2>Pour consulter la liste des joueurs</h2></label>
        <input type="submit" value="cliquez ici" name="listejoueurs" />
    </form>
    <?php

        if(isset($_POST['listejoueurs']))
        {
            echo "
            <br/><br/>
            <form action='Effectif/modifier' post='post' >
            <input type='submit' value='Cacher liste' name='cacher' />
            </form>";
            echo "<table>
                <thead>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Licence</th>
                </thead>
                <tbody>";
                while($resul=$donnees["joueurs"]->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<tr>";
                    echo "<td>";
                    echo $this->nettoyer($resul["nom"]);
                    echo "</td>";
                    echo "<td>";
                    echo $this->nettoyer($resul["prenom"]);
                    echo "</td>";
                    echo "<td>";
                    echo $this->nettoyer($resul["licence"]);
                    echo "</td>";
                }
                echo "</tbody>
            </table>";
        }
    ?>
</div>