<?php
// Continent class
class Continent {
    private $id;
    private $nom;
    private $nombrePays;
    private $image;

    public function __construct($id, $nom, $nombrePays, $image) {
        $this->id = $id;
        $this->nom = $nom;
        $this->nombrePays = $nombrePays;
        $this->image = $image;
    }

    
    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getNombrePays() { return $this->nombrePays; }
    public function getImage() { return $this->image; }

    public function setNom($nom) { $this->nom = $nom; }
    public function setNombrePays($nombrePays) { $this->nombrePays = $nombrePays; }
    public function setImage($image) { $this->image = $image; }

 





}
