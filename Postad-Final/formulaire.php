<div id="formulaire">
    <p id = "titrecompte">Création du compte</p>
    <br>
<form action="" method="post">
    <label for="POST-name">Nom : </label>
    <input type="text" name="nom">
    <br>
    <label for="POST-surname">Prénom : </label>
    <input type="text" name="prénom">
    <br>
    <label for="POST-username">Nom d'utilisateur : </label>
    <input type="text" name="nomutilisateur" placeholder="Identifiant">
    <br>
    <label for="POST-mail">Mail : </label>
    <input type="email" name="mail" placeholder="Exemple@gmail.com">
    <br>
    <label for="POST-password">Mot de passe : </label>
    <input type="password" name="mdp" pattern=".{6,}"   required title="6 caracteres minimum" placeholder="6 caractères minimum">
    <br>
    <label for="POST-password">Confirmer mot de passe : </label>
    <input type="password" name="cmdp">
    <br>
    <input type="submit" value="S'inscrire" class="bouton" id="b1">
</form>
</div>