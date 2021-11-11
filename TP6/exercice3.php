<form action="exercice3.php" method="post">
    Nom : <input type="text" name="nom"><br><br>
    Prénom : <input type="text" name="prenom"><br><br>
    Mail : <input type="text" name="mail"><br><br>
    Age : <select name="age" name="age">
        <?php for($i = 0; $i <= 100; $i++){
            echo "<option name='age".$i."'>".$i."</option>";
        }
        ?>
    </select><br><br>
    Monsieur : <input type="radio" name="button" value="monsieur">
    Madame : <input type="radio" name="button" value="madame">
    <br><br>
    <input type="submit" value="submit">
</form>

<?php

class RecupValeurs {
    private $nom;
    private $prenom;
    private $mail;
    private $age;
    private $genre;
    public function __construct(){
        $this->nom = $_POST['nom'];
        $this->prenom = $_POST['prenom'];
        $this->mail = $_POST['mail'];
        $this->age = $_POST['age'];
        $this->genre = $_POST['button'];
        echo "CONSTRUCTEUR : Nom : ".$this->nom." Prenom : ".$this->prenom." Mail : ".$this->mail." Age : ".$this->age." Genre : ".$this->genre;
    } //todo
    public function getNom(){
        echo $this->nom;
    }
    public function getPrenom(){
        echo $this->prenom;
    }
    public function getMail(){
        echo $this->mail;
    }
    public function getAge(){
        echo $this->age;
    }
    public function getGenre(){
        echo $this->genre;
    }
}

// todo gérer ne pas afficher 1ere connexion et si on a bien rempli le form et si on garde le texte dans les input

$valeurs = new RecupValeurs();

echo "<br>GETTERS : Nom : ";
$valeurs->getNom();
echo " Prenom : ";
$valeurs->getPrenom();
echo " Mail : ";
$valeurs->getMail();
echo " Age : ";
$valeurs->getAge();
echo" Genre : ";
$valeurs->getGenre();

?>