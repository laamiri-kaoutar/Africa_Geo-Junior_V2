<?php

class GestionBaseDeDonnees {


    private $pdo;
    private $host = "localhost";
    private $db_name = "geo_junior"; 
    private $username = "root"; 
    private $password = ""; 

    public function __construct() {
        $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        return $this->pdo;
    }



    // Méthode pour exécuter une requête SELECT
    public function select($query, $params = []) {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour exécuter une requête INSERT, UPDATE ou DELETE
    public function execute($query, $params = []) {
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute($params);
    }

    // Obtenir l'ID du dernier élément inséré
    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }
}
