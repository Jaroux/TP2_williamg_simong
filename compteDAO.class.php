<?php

require_once "compte.class.php";


class CompteDao
{
  private $db;
 
  public function __construct($db)
  {
    $this->setDb($db);
  }
 
  public function add(Compte $compte)
  {
    $req = $this->db->prepare('INSERT INTO clients (nom, prenom, adresse, ville, province, codePostal, login, motPasse, email) VALUES (:nom, :prenom, :adresse, :ville, :province, :codePostal, :login, :motPasse, :email)');
	
    $req->bindValue(':nom', $compte->getNom(), PDO::PARAM_STR);
    $req->bindValue(':prenom', $compte->getPrenom(), PDO::PARAM_STR);
    $req->bindValue(':adresse', $compte->getAdresse(), PDO::PARAM_STR);
    $req->bindValue(':ville', $compte->getVille(), PDO::PARAM_STR);
    $req->bindValue(':province', $compte->getProvince(), PDO::PARAM_STR);
    $req->bindValue(':codePostal', $compte->getCodePostal(), PDO::PARAM_STR);
    $req->bindValue(':login', $compte->getLogin(), PDO::PARAM_STR);
    $req->bindValue(':motPasse', $compte->getMotDePasse(), PDO::PARAM_STR);
    $req->bindValue(':email', $compte->getEmail(), PDO::PARAM_STR);

    $req->execute();

    // on veut maintenant connaitre le id de ce nouvel enregistrement
    // puis l'assigner à la propriété de l'objet
    $last_id = $this->db->lastInsertId();
    $compte->setId($last_id);

    $req->closeCursor();

  }
 
  public function update(Compte $compte)
  {
    $req = $this->db->prepare('UPDATE clients SET nom = :nom, prenom = :prenom, adresse = :adresse, ville = :ville, province = :province, codePostal = codePostal, motPasse = :motPasse  WHERE login = :login AND motPasse = :motPasse');
 
    $req->bindValue(':nom', $compte->getNom(), PDO::PARAM_STR);
    $req->bindValue(':prenom', $compte->getPrenom(), PDO::PARAM_STR);
    $req->bindValue(':adresse', $compte->getAdresse(), PDO::PARAM_STR);
    $req->bindValue(':ville', $compte->getVille(), PDO::PARAM_STR);
    $req->bindValue(':province', $compte->getProvince(), PDO::PARAM_STR);
    $req->bindValue(':codePostal', $compte->getCodePostal(), PDO::PARAM_STR);
    $req->bindValue(':login', $compte->getLogin(), PDO::PARAM_STR);
    $req->bindValue(':motPasse', $compte->getMotDePasse(), PDO::PARAM_STR);
 
    $req->execute();
	
	  $req->closeCursor();
  }

  
  
  public function setDb(PDO $db)
  {
    $this->db = $db;
  }


}
?>