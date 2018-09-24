<?php 
session_start();
if (empty($_SESSION)){
    header ('location: login.php');
    exit();
}

 ?>

<?php $type = $_SESSION['type_compte']; ?>

<div class="container">
	<?php include "templates/header.php"; ?>

	<div class="list-group">
		<ul>
		
			<a class="list-group-item list-group-item-action list-group-item-primary" <?php if ($type == 0) : ?> href="javascript:alert('Vous devez être Admin ou Super Admin pour utiliser cette fonction');" <?php endif; ?> <?php if ($type != 0) : ?> href="../install.php" <?php endif; ?>><strong> - Installer la base de données</strong></a></li>
			<a class="list-group-item list-group-item-action list-group-item-light" <?php if ($type == 0) : ?> href="javascript:alert('Vous devez être Admin ou Super Admin pour utiliser cette fonction');" <?php endif; ?> href="create.php"><strong> - Ajouter un employé</strong></a></li>
			<a class="list-group-item list-group-item-action list-group-item-primary" href="lire.php"><strong> - Afficher les employés</strong></a></li>
		
		</ul>

		<div class="btn-group">
			<form action="" method="post">
				<input type="submit" value="Déconnexion" name="logout" type="button" class="btn btn-info">
					<?php if ($type == 1){
						echo "<p class='text-info'>Admin</p>";
					}

					else if ($type == 0){
						echo "<p class='text-info'>Basique</p>";
					}

					else {
						echo "<p class='text-info'>Super admin</p>";
					} ?>
			</form>
		</div>

	</div>
</div>



<?php





if (isset($_POST['logout'])){
	session_unset();
	session_destroy();
	header ('location: index.php');
}

?>

<?php include "templates/footer.php"; ?>