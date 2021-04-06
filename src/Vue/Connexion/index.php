<form method="post" action="Connexion/connecter" >
    <fieldset>
        <legend><h1>Connexion</h1></legend>
        <h2>Connectez vous!</h2>
        <label for="_login">Identifiant</label>
        &nbsp &nbsp&nbsp <input type="text" name="_login"
        placeholder="Entrez votre login" required autofocus />
        <br/><br/>
        <label for="mot_de_passe">Mot de passe</label>
        <input type="password" name="mot_de_passe"  placeholder="Entrez votre mot de passe" required />
        <br/><br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" name="Envoyer" value="Connexion" />
        <br/><br/>
    </fieldset>
</form>
<?php
if(isset($donnees["msgErreur"]))
    echo "<h3><strong>$donnees[msgErreur]</strong></h3>";
?>