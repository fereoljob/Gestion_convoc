<div class="princip">
        <h1>Liste des joueurs du club</h1>
    <table>
        <thead>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Licence</th>
        </thead>
        <tbody>
        <?php
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
        ?>
        </tbody>
    </table>
</div>