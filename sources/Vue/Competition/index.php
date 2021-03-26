    <div class="princip">
    <h1>Calendrier des rencontres </h1>
    <table>
        <thead>
            <th>Nom compétition</th>
            <th>Equipe</th>
            <th>Equipe adverse</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Terrain</th>
            <th>Site</th>
        </thead>
        <tbody>
        <?php
        while($resul=$donnees["competitions"]->fetch(PDO::FETCH_ASSOC))
        {
            echo "<tr>";
            foreach($resul as $key => $value)
            {
                if($key=="id_compet")
                {
                        continue;
                }
                else
                {
                    echo "<td>";
                    echo $this->nettoyer($value);
                    echo "</td>";
                }
            }
            echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</div>