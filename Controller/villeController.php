<?php
require_once '../config/database.php';
require_once '../Model/Ville.php';


class VilleController{
    private $pdo;

    public function __construct(){
        $this->pdo = new GestionBaseDeDonnees();
    }

    public function create(Ville $Ville ){
        $query = "INSERT INTO Ville(nom,type ,id_pays ,image) VALUES (?,?,?,?)";
        $params = [$Ville->getNom() , $Ville->getType(),$Ville->getPays() , $Ville->getImage() ];
        return  $this->pdo->execute($query, $params);
    }


    public function readAll($id_Pays){
        $query = "SELECT * FROM Ville where id_Pays= ?";
        $params = [$id_Pays];
        return  $this->pdo->select($query , $params);
    }

    public function update(Ville $Ville){
        $query = "UPDATE Ville SET nom = ?,type= ? ,id_pays= ? ,image= ? WHERE id_pays = ?";
        $params = [$Ville->getNom() , $Ville->getType(),$Ville->getPays() , $Ville->getImage() , $Ville->getId() ];
        return  $this->pdo->execute($query, $params);
    }
    public function deleteById($id){
        $query = "DELETE FROM  Ville  WHERE id_ville = ?";
        $params = [$id];
        return  $this->pdo->execute($query, $params);
    }

    public function getElementById($id){
        $query = "SELECT * FROM Ville WHERE id_ville = ? ";
        $params = [$id];
        return  $this->pdo->select($query , $params);
    }


}