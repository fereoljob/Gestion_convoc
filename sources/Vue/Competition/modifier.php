<div>
    <form action="Competition/modif" method="post">
        <fieldset>
            <table>
            <legend><h1>Formulaire de modification</h1></legend><tr><td>
            <label for="nomcompet"><strong>Nom competition:</strong></label></td><td>
            <input type="text" name="nomcompet" required autofocus /></td></tr><tr><td>
            <label for="Equipe"><strong>Equipe:</strong></label></td><td>
                <select name="Equipe">
                        <option value="SENIORS_A" >SENIORS_A</option>
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
