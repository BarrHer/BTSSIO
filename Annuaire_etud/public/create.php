<div class="container">
<?php
session_start();
if ($_SESSION['type_compte'] == 0){
    header ('location: index.php');
    exit;
}
/**
 * Utilisez un formulaire HTML pour créer une nouvelle entrée 
 * dans la table des utilisateurs.
 *
 */


if (isset($_POST['submit'])) {
    require "../config.php";
    require "../common.php";

    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        
        $new_user = array(
            "prenom"    => $_POST['prenom'],
            "nom"       => $_POST['nom'],
            "email"     => $_POST['email'],
            "age"       => $_POST['age'],
            "ville"     => $_POST['ville'],
            "genre"     => $_POST['genre'],
            "mdp"       => $_POST['password'],
            "pseudo"    => $_POST['pseudo'],
            "type_compte"   => $_POST['type_compte']
        );

        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "employes",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user))
        );

        
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
    <blockquote><?php echo $_POST['prenom']; ?> a été ajouté avec succès.</blockquote>
<?php endif; ?>

<h2>Ajouter un employé</h2>

<form method="post" name="inscription">
    <label for="prenom">Prénom</label>
    <input placeholder="Obligatoire" type="text" name="prenom" id="prenom" class="form-control" style="width:20%" required>
    <label for="nom">Nom</label>
    <input placeholder="Obligatoire" type="text" name="nom" id="nom" class="form-control" style="width:20%" required>
    <label for="genre">Genre</label>
    <SELECT name="genre" size="1">
    <OPTION>M.
    <OPTION>Md.
    <OPTION>Mdlle
    </SELECT>
    <label for="email">Adresse mail</label>
    <input type="text" name="email" id="email" class="form-control" style="width:20%">
    <label for="age">Age</label>
    <input type="text" name="age" id="age" class="form-control" style="width:20%">
    <label for="ville">ville de résidence</label>
    <input type="text" name="ville" id="ville" class="form-control" style="width:20%">
    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo" class="form-control" style="width:20%" required>
    <label for="password">Password</label>
    <input type="text" name="password" id="password" class="form-control" style="width:20%" required>
    <label for="type de compte">Type de compte</label>
    <SELECT name="type_compte" size="1" required>
    <OPTION value="0">Basique</option>
    <OPTION value="1">Admin</option>
    <OPTION value="2">Super-Admin</option>
    </SELECT>
    <!--<input type="text" name="type_compte" id="type" class="form-control" style="width:20%" required>-->
    <br><br>
    <div  class="form-group">
    <a href="index.php" role="button" class="btn btn-info" id="retour" style="width:7%">Retour</a>
    <input type="submit" name="submit" value="Ajouter" class="btn btn-success" style="margin-left:5.7%">
    
    <br><br>
</form>

</div>
<?php require "templates/footer.php"; ?>
</div>