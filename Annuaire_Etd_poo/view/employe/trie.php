<?php if (!isset($_SESSION)){
    session_start(); }
    ?>
<?php include "templates/header.php";?>

<?php

if (empty($_SESSION)){
	echo "<script type='text/javascript'>alert('Vous devez être connecté pour accéder à cette page'); 
	window.location.href='?ctrl=employe&mth=login';</script>";
	//echo "<script type='text/javascript'> alert('test'); </script>";
	//header("Location: ?ctrl=Accueil&mth=index");
    //exit();
    
}

?>
<?php $fleche = 'ASC/DESC';?>
<table>
	<thead>
		<tr>
            <th></th>
			<th> <a href="?ctrl=employe&mth=ordre&by=prenom&AD=<?php if (isset($_GET['AD']) && ($_GET['AD'] == 'ASC')) {
                echo 'DESC';}
                else { echo 'ASC';}?>"> Prénom</th>
			<th> <a href="?ctrl=employe&mth=ordre&by=nom&AD=<?php if (isset($_GET['AD']) && ($_GET['AD'] == 'ASC')) {
                echo 'DESC';}
                else { echo 'ASC';}?>"> Nom</th>
			<th>Catégorie</th>
            <th>Cliquer sur prenom ou nom pour trier croissant/décroissant</th>
            
		</tr>
	</thead>
	<tbody>
		<?php
		if ($data['employes']) : ?>
			<?php foreach ($data['employes'] as $k => $v) : ?>
				<tr>
                    <td><?php echo $k+1; ?></td>
					<td><?php echo $v['prenom']; ?></td>
					<td><?php echo $v['nom']; ?></td>
					<td><?php echo $v['categorie']; ?></td>
				</tr>
			<?php
			endforeach; ?>
		<?php else : ?>
			<tr>
				<td colspan="6">Pas d\'employé</td>
			</tr>
		<?php
		endif;
		?>
	</tbody>
</table>
<br>
<a href="?ctrl=Accueil&mth=index">Retour au menu</a><br><br>

<?php include "templates/footer.php";?>