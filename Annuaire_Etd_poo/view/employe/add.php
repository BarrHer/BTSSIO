<?php include "templates/header.php";?>

<h2>Adjouter un employé</h2>
<a href="?ctrl=employe">Retour</a><br><br>
<form action="?ctrl=employe&mth=add" method="post">
    <label for="prenom">Prénom</label><br>
    <input type="text" name="prenom" id="prenom"><br>
    <SELECT name="genre" size="1">
    <OPTION>M.
    <OPTION>Md.
    <OPTION>Mdlle
    </SELECT>
    <label for="nom">Nom</label><br>
    <input type="text" name="nom" id="nom"><br>
    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo" >
    <label for="password">Password</label>
    <input type="text" name="password" id="password">
    <label for="email">Adresse mail</label><br>
    <input type="text" name="email" id="email"><br>
    <label for="age">Age</label><br>
    <input type="text" name="age" id="age"><br>
    <label for="ville">ville de résidence</label><br>
    <input type="text" name="ville" id="ville">
    <label for="type de compte">Type de compte</label>
    <SELECT name="type_compte" size="1" required>
    <OPTION value="0">Basique</option>
    <OPTION value="1">Admin</option>
    <OPTION value="2">Super-Admin</option>
    </SELECT>
    <br><br>
    <input type="submit" name="submit" value="Ajouter">
    <br><br>

	<?php if ($errors) : ?>
			<h3>Erreur:</h3>
			<ul>
				<?php foreach ($errors as $value) : ?>
					<li><?php echo $value; ?></li>
                <?php endforeach; ?>
			</ul>
    <?php endif; ?>
</form>

<?php include "templates/footer.php";?>