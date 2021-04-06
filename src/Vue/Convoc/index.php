<div class="princip" >
<h1>Liste des convocations enregistrés du club</h1>
    <h3>Cliquez sur l'id d'une convocation pour la modifier et y ajouter des joueurs( si nécéssaire)</h3> 
    <form action="Convoc/modifier" method="post">
    <table>
        <thead>
            <th>Nom competition</th>
            <th>Equipe</th>
            <th>Date Convocation</th>
            <th>Equipe adverse</th>
            <th>Publiable</th>
            <th>Publié</th>
            <th>id_convo</th>
        </thead>
        <tbody>
        <?php
            foreach($donnees as $val)
            {
                echo "<tr>";
                echo "<td>$val[nom]</td>";
                echo "<td>$val[nomEquipe]</td>";
                echo "<td>$val[DateConvoc]</td>";
                echo "<td>$val[equipe_adv]</td>";
                echo "<td>$val[publiable]</td>";
                echo "<td>$val[publie]</td>";
                echo "<td><input type=submit name=valider Value=";
                echo $val["id_convocation"];
                echo " /></td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
    </form>
</div>