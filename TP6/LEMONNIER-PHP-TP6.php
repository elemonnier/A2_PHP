<?php

class EquipeFootball {
    private $nom;
    private $nombreDeTitres;
    function display(){
        echo "L équipe ".$this->nom." a ".$this->nombreDeTitres." titre(s)<br>";
    }
    public function getNom(){
        return $this->nom;
    }
    public function getNombreDeTitres(){
        return $this->nombreDeTitres;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setNombreDeTitres($nombreDeTitres){
        $this->nombreDeTitres = $nombreDeTitres;
    }
    public function __construct($nom = "FC Nantes", $nombreDeTitres = 0){
        $this->setNom($nom);
        $this->setNombreDeTitres($nombreDeTitres);
        self::$s1++;
    }
    public function __destruct(){
        echo "Destructor<br>";
    }
    const NOMBRE_EQUIPES = "Nombre d'équipes : ";
    static $s1;
    static function nombreEquipesCrees(){
        echo self::NOMBRE_EQUIPES.self::$s1."<br>";
    }
}

$equipe1 = new EquipeFootball("FCB", 6);
$equipe2 = new EquipeFootball("OM", 1);
$equipe3 = new EquipeFootball("OL", 42);
$equipe4 = new EquipeFootball("FC Nantes", 0);
$equipe1->display();
$equipe2->display();
$equipe3->display();
$equipe4->display();
EquipeFootball::nombreEquipesCrees();


?>
