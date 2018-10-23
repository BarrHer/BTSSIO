<?php

require_once 'connexionDB.php';

class employe extends ConnexionDB  {

	public function getAllEmploye() {
        return $this->cnx->query("SELECT * FROM employes")->fetchAll();
	}

	public function getEmploye($id) {
		$sql = $this->cnx->prepare("SELECT * FROM employes WHERE id=?");
		$sql->execute( array($id) );
		return $sql->fetch();
	}

	public function add($empl)
	{
		$sql = $this->cnx->prepare("INSERT INTO employes (prenom,nom,email,age,ville,pseudo,mdp,type_compte,genre) 
        VALUES (?,?,?,?,?,?,?,?,?)");
		$sql->execute( array($empl['prenom'],$empl['nom'],$empl['email'],$empl['age'],$empl['ville'],$empl['pseudo'],$empl['password'],$empl['type_compte'],$empl['genre']) );
		return $sql->rowCount();
	}

	public function edit($empl,$id)
	{
		$sql = $this->cnx->prepare("UPDATE employes 
                                    SET prenom=?,nom=?,email=?,age=?,ville=?,pseudo=?,mdp=?,genre=?
                                    WHERE id=?");
        $sql->execute( array($empl['prenom'],$empl['nom'],$empl['email'],$empl['age'],$empl['ville'],$empl['pseudo'],$empl['password'],$empl['genre'],$id) );
		return $sql->rowCount();
	}

	public function delete($id)
	{
		$sql = $this->cnx->prepare("DELETE FROM employes WHERE id = ?");
		$sql->execute( array($id) );
		return $sql->rowCount();
	}

	public function login($pseudo, $mdp)
	{
	$sql = $this->cnx->prepare("SELECT id,pseudo,mdp,type_compte FROM employes WHERE pseudo=? AND mdp=?");
	$sql->execute( array($pseudo, $mdp) );
	return $sql->fetch();
	}
}