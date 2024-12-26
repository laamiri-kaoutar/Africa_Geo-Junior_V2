<?php
// Pays class 
class Pays {
    private $id;
    private $nom;
    private $population;
    private $langue;
    private $continent;
    private $image;

    public function __construct($id, $nom, $population, $langue, $continent, $image) {
        $this->id = $id;
        $this->nom = $nom;
        $this->population = $population;
        $this->langue = $langue;
        $this->continent = $continent;
        $this->image = $image;
    }


    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getPopulation() { return $this->population; }
    public function getLangues() { return $this->langue; }
    public function getContinent() { return $this->continent; }
    public function getImage() { return $this->image; }

    public function setNom($nom) { $this->nom = $nom; }
    public function setPopulation($population) { $this->population = $population; }
    public function setLangue($langue) { $this->langue = $langue; }
    public function setImage($image) { $this->image = $image; }
}