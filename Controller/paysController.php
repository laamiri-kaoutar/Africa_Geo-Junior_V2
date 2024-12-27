<?php
require_once '../config/database.php';
require_once '../Model/Pays.php';


class PaysController{
    private $pdo;

    public function __construct(){
        $this->pdo = new GestionBaseDeDonnees();
    }

    public function create(Pays $Pays ){
        $query = "INSERT INTO Pays(nom,population ,langues ,id_continent,image) VALUES (?,?,?,?,?)";
        $params = [$Pays->getNom() , $Pays->getPopulation(),$Pays->getLangues() , $Pays->getContinent() , $Pays->getImage()];
        return  $this->pdo->execute($query, $params);
    }

    public function readAll($id_continent){
        $query = "SELECT * FROM pays where id_continent = ?";
        $params = [$id_continent];
        return  $this->pdo->select($query , $params);
    }

    public function update(Pays $Pays ){
        $query = "UPDATE Pays SET nom = ?,population= ? ,langues= ? ,id_continent= ?,image= ? WHERE id_pays = ?";
        $params = [$Pays->getNom() , $Pays->getPopulation(),$Pays->getLangues() , $Pays->getContinent() , $Pays->getImage() , $Pays->getId()];
        return  $this->pdo->execute($query, $params);
    }
    public function deleteById($id){
        $query = "DELETE FROM  Pays  WHERE id_pays = ?";
        $params = [$id];
        return  $this->pdo->execute($query, $params);
    }

    public function getElementById($id){
        $query = "SELECT * FROM pays WHERE id_pays = ? ";
        $params = [$id];
        return  $this->pdo->select($query , $params);
    }


}