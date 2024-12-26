<?php
require_once '../config/database.php';
require_once '../Model/Continent.php';


class ContinentController{
    private $pdo;

    public function __construct{
        $pdo = new GestionBaseDeDonnees();
        $this->pdo = $pdo->getDB();
        
    }

    public function create(Continent $continent ){
        $query = "INSERT INTO Continent(nom,image,nombrePays) VALUES (?,?,?)";
        $params = [$continent->getNom() , $continent->getImage(),$continent->getNombrePays()];
        return  $this->pdo->execute($query, $params);
    }

    public function readAll(){
        $query = "SELECT * FROM Continent";
        return  $this->pdo->select($query);
    }

    public function update(Continent $continent ){
        $query = "UPDATE Continent set nom = ? ,image = ? ,nombrePays = ? WHERE id = ?";
        $params = [$continent->getNom() , $continent->getImage(),$continet->getNombrePays() ,$continent->getId()];
        return  $this->pdo->execute($query, $params);
    }

    public function delete(Continent $continent ){
        $query = "DELETE FROM  Continent  WHERE id = ?";
        $params = [$continent->getId()];
        return  $this->pdo->execute($query, $params);
    }


}