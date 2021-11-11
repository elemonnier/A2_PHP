<?php
// ici un session start a été delete (l'erreur peut venir de la)
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Accueil (déconnexion admin)</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container"><div class="row"><div class="col-md-12">

<?php
include 'controller.php';
include 'connexpdo.php';
displayStudentsInArray();
?>
<br/>
<h2>Moyenne étudiants :
<?php
average();
?>
</h2>
<br/>
<form method="post" action="controller.php?editStudent=true">
    <h2>Modification étudiant</h2>
    <select class="form-control" id="exampleFormControlSelect1" name="etudiant">
    <?php
    putStudentsOnSelect();
    ?>
    </select>
    <div class="form-group">
        Note <br/>
        <input type="text" name="5" required/>
    </div>
    <input type="submit" name="b2" class="btn btn-primary"/>
</form>


<br/>
<h2>Suppression étudiant</h2>
<form action="controller.php?deleteStudent=true" method="post">
    <div class="form-group">
        <select class="form-control" id="exampleFormControlSelect1" name="sup">
            <?php
            putStudentsOnSelect();
            ?>
        </select>
    </div>
    <input type="submit" name="supprimer" class="btn btn-primary" value="Supprimer">
</form>
<br/>
<h2>Ajouter un étudiant</h2>
<form action="controller.php?goToNewStudent=true" method="post">
    <input type="submit" name="a" value="Ajouter étudiant" class="btn btn-primary"/>
</form>

<br/>
<h2>Retour accueil (déconnexion admin) :</h2>
<form action="controller.php?welcome=true" method="post">
    <input type="submit" name="b" value="Retourner vers l'accueil" class="btn btn-primary"/>
</form>
        </div></div></div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>