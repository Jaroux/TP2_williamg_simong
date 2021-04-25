<?php

class Compte {
    private $no;
    private $nom;
    private $prenom;
    private $adresse;
    private $ville;
    private $province;
    private $codePostal;
    private $login;
    private $motDePasse;
    private $email;

    public function __construct($nom, $prenom,
                                $adresse, $ville, $province,
                                $codePostal, $login, $motDePasse,
                                $email)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setAdresse($adresse);
        $this->setVille($ville);
        $this->setProvince($province);
        $this->setCodePostal($codePostal);
        $this->setLogin($login);
        $this->setMotDePasse($motDePasse);
        $this->setEmail($email);
    }

    public function setNom($nom) {
        if (empty($nom)) {
            trigger_error('Le nom est vide!',E_USER_ERROR);
            return;
        }
        
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        if (empty($prenom)) {
            trigger_error('Le prénom est vide!',E_USER_ERROR);
            return;
        }
        
        $this->prenom = $prenom;
    }

    public function setAdresse($adresse) {
        if (empty($adresse)) {
            trigger_error('Ladresse est vide!',E_USER_ERROR);
            return;
        }
        
        $this->adresse = $adresse;
    }

    public function setVille($ville) {
        if (empty($ville)) {
            trigger_error('La ville est vide!',E_USER_ERROR);
            return;
        }
        
        $this->ville = $ville;
    }

    public function setProvince($province) {
        if (empty($adresse)) {
            trigger_error('La province est vide!',E_USER_ERROR);
            return;
        }
        
        $this->province = $province;
    }

    public function setCodePostal($codePostal) {
        if (empty($codePostal)) {
            trigger_error('Le code postal est vide!',E_USER_ERROR);
            return;
        }
        
        $this->codePostal = $codePostal;
    }
    
    public function setLogin($login) {
        if (empty($login)) {
            trigger_error('Le login est vide!',E_USER_ERROR);
            return;
        }
        
        $this->login = $login;
    }

    public function setMotDePasse($motDePasse) {
        if (empty($motDePasse)) {
            trigger_error('Le mot de passe est vide!',E_USER_ERROR);
            return;
        }
        
        $this->motDePasse = $motDePasse;
    }

    public function setEmail($email) {
        if (empty($email)) {
            trigger_error('Le email est vide!',E_USER_ERROR);
            return;
        }
        
        $this->email = $email;
    }

    public function setId($id) {
        if (!is_numeric($id)) {
            throw new Exception('Le id est n\'est pas un chiffre!',E_USER_ERROR);
        }
        
        $this->id = $id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getProvince() {
        return $this->province;
    }

    public function getCodePostal() {
        return $this->codePostal;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getMotDePasse() {
        return $this->motDePasse;
    }

    public function getEmail() {
        return $this->email;
    }
}


?>