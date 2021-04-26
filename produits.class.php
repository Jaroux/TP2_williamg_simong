<?php
    class Produit {

        private $id;
        private $nom;
        private $description;
        private $prix;
        private $qte;
        private $date;
        private $image;


        public function __construct($nom, $description, $prix, $qte, $date, $image)
        {
            $this->setNom($nom);
            $this->setDescription($description);
            $this->setPrix($prix);
            $this->setQte($qte);
            $this->setDate($date);
            $this->setImage($image);


        }

        public function setNom($nom){
            $this->nom = $nom;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setDescription($description){
            $this->description = $description;
        }

        public function setPrix($prix){
            $this->prix = $prix;
        }

        public function setQte($qte){
            $this->qte = $qte;
        }

        public function setDate($date){
            $this->date = $date;
        }

        public function setImage($image){
            $this->image = $image;
        }



        public function getNom(){
            return $this->nom;
        }

        public function getId(){
            return $this->id;
        }

        public function getDescription(){
            return $this->description;
        }

        public function getPrix(){
            return $this->prix;
        }

        public function getQte(){
            return $this->qte;
        }

        public function getDate(){
            return $this->date;
        }

        public function getImage(){
            return $this->image;
        }


    }


?>