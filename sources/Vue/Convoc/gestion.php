<div class="princip" >
    <?php
        $tabC=$donnees["competition"];
        echo "<strong>Nom competition : </strong>";
        echo $tabC["nom_compet"];
        echo "<br/><br/>";
        echo "<strong>Nom de l'equipe : </strong>";
        echo $tabC["nom_equipe"];
        echo "<br/><br>";
        echo "<strong>Date : </strong>";
        echo $tabC["datecompet"];
        echo "<br/><br>";
        echo "<strong>Heure : </strong>";
        echo $tabC["heure"];
        echo "<br/><br/>";
        echo "<strong>Terrain : </strong>";
        echo $tabC["terrain"];
        echo "<br/><br/>";
        echo "<strong>Site : </strong>";
        echo $tabC["site"];
    ?>
</div>
<div class ="liste">
    <?php
        echo "<br/>";
        echo '<form id=myform method=post action=Convoc/ajout >';
        echo "<table>";
        echo "<caption><h2>Noms et prenoms des joueurs disponible à cette date: </h2></caption>";
        echo "<thead>";
        echo "<th scope=col>Nom</th>";
        echo "<th scope=col>Prenom</th>";
        echo "</thead>";
        echo "<tbody>";
        while($joueu=$donnees["dispo"]->fetch(PDO::FETCH_ASSOC))
        {
            echo "<tr>";
            echo "<td><input type=checkbox name=choix[] class=choix value=$joueu[id_joueur] /></td>";
            echo "<td>$joueu[nom]</td>";
            echo "<td>$joueu[prenom]</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";    
        echo '<input type=submit name=Valider value=Valider />';
        echo '<input type=hidden name=idcomp value=';
        echo $donnees["competition"]["id_compet"];
        echo " />";
        echo '<input type=hidden name=nomEquipe value=';
        echo $donnees["competition"]["nom_equipe"];
        echo " />";
        echo '<input type=hidden name=adv value=';
        echo $donnees["competition"]["equipe_adv"];
        echo " />";
        echo '<input type=hidden name=ladate value=';
        echo $donnees["competition"]["datecompet"];
        echo " />";
        echo '</form>';
    ?>
    <script>
            
            let monform = document.querySelector('#myform');
            let mybtn = document.querySelector('input[type="submit"]');
            monform.addEventListener('submit',function(e)
            {
                let cs = document.querySelectorAll("input[type='checkbox']:checked");
                if(cs.length>14)
                {
                    e.preventDefault();
                    alert("Vous devez selectionner rigoureusement un nombre de joueurs inferieur ou égale à 14!");
                   
                }
                else if(cs.length==0)
                {
                    e.preventDefault();
                    alert("vous devez selectionner au moins un joueur a ajouter dans la convocation!");
                   
                }
            },);   
            
    </script>
    
</div>
    
