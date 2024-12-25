<?php
// Ville classe
class Ville {
    private $id;
    private $nom;
    private $description;
    private $type;
    private $pays;
    private $image;

    public function __construct($id, $nom, $description, $type, $pays, $image) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->type = $type;
        $this->pays = $pays;
        $this->image = $image;
    }

    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getDescription() { return $this->description; }
    public function getType() { return $this->type; }
    public function getPays() { return $this->pays; }
    public function getImage() { return $this->image; }

    public function setNom($nom) { $this->nom = $nom; }
    public function setDescription($description) { $this->description = $description; }
    public function setType($type) { $this->type = $type; }
    public function setImage($image) { $this->image = $image; }
}
