<?php
require_once '../config/database.php';
require_once '../Model/Pays.php';


class PaysController{
    private $pdo;

    public function __construct{
        $pdo = new GestionBaseDeDonnees();
        $this->pdo = $pdo->getDB();
        
    }

    public function create(Pays $Pays ){
        $query = "INSERT INTO Pays(nom,population ,langues ,id_continent,image) VALUES (?,?,?,?,?)";
        $params = [$Pays->getNom() , $Pays->getPopulation(),$Pays->getLangues() , $Pays->getContinent() , $Pays->getImage()];
        return  $this->pdo->execute($query, $params);
    }

    public function readAll(){
        $query = "SELECT * FROM pays";
        return  $this->pdo->select($query);
    }

    public function update(Pays $Pays ){
        $query = "UPDATE Pays  nom = ?,population= ? ,langues= ? ,id_continent= ?,image= ? WHERE id = ?";
        $params = [$Pays->getNom() , $Pays->getPopulation(),$Pays->getLangues() , $Pays->getContinent() , $Pays->getImage() , $Pays->getId()];
        return  $this->pdo->execute($query, $params);
    }

    public function delete(Pays $Pays ){
        $query = "DELETE FROM  Pays  WHERE id = ?";
        $params = [$Pays->getId()];
        return  $this->pdo->execute($query, $params);
    }

    public function getElementById(Pays $Pays){
        $query = "SELECT * FROM pays WHERE id = ? ";
        $params = [$Pays->getId()];
        return  $this->pdo->select($query);
    }


}