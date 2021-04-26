<?php 

require_once "produits.class.php";

class produitsDao{
    private $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function get($id)
    {
        $id = (int) $id;

        $req = $this->db->prepare('SELECT no, nom, description, prix, qte, dateParution, image FROM produits WHERE no = :no');
        $req->bindValue(':no', $id, PDO::PARAM_INT);
        $req->execute();

        $line = $req->fetch();
        $unProduit[$id] = new Produit($line['nom'], $line['description'], $line['prix'], $line['qte'], $line['dateParution'], $line['image']);

        $unProduit[$id]->setId($id);

        $req->closeCursor();

        return $unProduit[$id];
    }

    public function setDb(PDO $db){
        $this->db = $db;

    }

    public function compterProduit($conn){
        $reponse = $conn->prepare('SELECT * FROM produits');
        $reponse->execute();



        return $reponse->rowCount();

    }

    public function chercherProduit($recherche){
        $req = $this->db->prepare('SELECT no, nom, description, prix, qte, dateParution, image FROM produits WHERE nom LIKE :nom');
        $req->bindValue(':nom', '%' . $recherche . '%', PDO::PARAM_STR);
        $req->execute();


        $resultat = $req->fetchAll();

        if($resultat)
        {
            foreach($resultat as $row){
                echo '<div class="text-center col-md-6 col-lg-4 col-12 p-3" id="sectionImage"> <h4 class="text-primary">' .  $row['nom'] . ' - ' .  $row['prix'] . '$'. '</h4>';
                
                echo '<img class="img-fluid" src= "images/' .$row['image'].'"></div>';
            }
        }
        else{
            echo "<h1> Aucun résultat </h1>";
        }

    }

}