<div class="princip" >
    <h1>Liste des absences </h1>
    <table>
        <thead>
            <th>Nom et prenom joueur</th>
            <th>Type d'absence</th>
            <th>Date</th>
        </thead>
        <tbody>
        <?php
        $matab=["N"=>"Non Licencié","A"=>"Absent(e)","B"=>"Blessé(e)","S"=>"Suspendu(e)"];
        foreach($donnees as $tab)
        {
            echo "<tr>";
                echo "<td>$tab[id_joueur]</td>";
                echo "<td>";echo $matab[$tab['type_absence']];echo "</td>";
                echo "<td>$tab[dateAb]</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>