<?php include "templates/header.php";?>

<?php
$prenom =  $employe['prenom'];


?> 


<h2>Modifier un employé</h2>
    
    <form action="?ctrl=employe&mth=edit" method="post">
        <label for="prenom">Prénom</label>
        <input placeholder="Obligatoire" type="text" name="prenom" id="prenom" value=<?php echo "$prenom"; ?> required>
        <label for="nom">Nom</label>
        <input placeholder="Obligatoire" type="text" name="nom" id="nom" value=<?php echo "$nom" ?> required>
        <label for="genre">Genre</label>
        <SELECT name="genre" size="1">
        <OPTION>M.
        <OPTION>Md.
        <OPTION>Mdlle
        </SELECT>
        <label for="email">Adresse mail</label>
        <input type="text" name="email" id="email" class="form-control" style="width:20%" value=<?php echo "$email" ?>>
        <label for="age">Age</label>
        <input type="text" name="age" id="age" class="form-control" style="width:20%" value=<?php echo "$age" ?>>
        <label for="ville">ville de résidence</label>
        <input type="text" name="ville" id="ville" class="form-control" style="width:20%" value=<?php echo "$ville" ?>>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" class="form-control" style="width:20%" value=<?php echo "$pseudo" ?>>
        <label for="password">Password</label>
        <input type="text" name="password" id="password" class="form-control" style="width:20%" value=<?php echo "$mdp" ?>>
        <label for="type de compte">Type de compte (actuellement 
        <?php if ($type == 0) : ?>
            <?php echo "Basique)"; ?>
        <?php endif; ?>
        <?php if ($type == 1) : ?>
            <?php echo "Admin)"; ?>
        <?php endif; ?>
        <?php if ($type == 2) : ?>
            <?php echo "Super Admin)"; ?>
        <?php endif; ?>
        </label>
        <SELECT name="type_compte" size="1">
        <OPTION value="0">Basique</option>
        <OPTION value="1">Admin</option>
        <OPTION value="2">Super-Admin</option>
        </SELECT>
        
        <br><br>
        <div  class="form-group">
        <a href="?ctrl=employe">Retour</a><br><br>
        <input type="submit" name="submit" value="Modifier">
        <br><br>
    </form>

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