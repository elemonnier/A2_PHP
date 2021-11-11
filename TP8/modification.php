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
                <a class="nav-link" href="citation.php">Informations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="recherche.php">Recherche</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="modification.php">Modification</a>
            </li>
        </ul>
    </div>
</nav>
<h2>Ajout</h2><hr/>
<form action="modification.php" method="post">
    <div class="form-group">
        ID de l'auteur<br/>
        <input type="text" class="form-control" name="1">
    </div>
    <div class="form-group">
        Nom de l'auteur <br/>
        <input type="text" class="form-control" name="2">
    </div>
    <div class="form-group">
        Prénom de l'auteur <br/>
        <input type="text" class="form-control" name="3">
    </div>
    <div class="form-group">
        ID du siècle <br/>
        <input type="text" class="form-control" name="4">
    </div>
    <div class="form-group">
        Siècle <br/>
        <input type="text" class="form-control" name="5">
    </div>
    <div class="form-group">
        Citation <br/>
        <input type="text" class="form-control" name="6">
    </div>
    <input type="submit" name="ajouter" value="Ajouter" class="btn btn-primary">
</form>

<?php
include 'connexpdo.php';

$dsn = 'pgsql:host=localhost;port=5432;dbname=citations;';
$user = 'postgres';
$password = 'new_password';
$idcon = connexpdo($dsn, $user, $password);


$i = 1;
$alreadyUsedId = true;
while ($alreadyUsedId){
    $result = $idcon->prepare("SELECT COUNT(*) FROM citation WHERE id = ?");
    $result->execute([$i]);
    $result = $result->fetch();
    if($result[0] == 0){
        $alreadyUsedId = false;
    }
    else {
        $i++;
    }
}

if ($_POST['ajouter'] && $_POST['1'] && $_POST['2'] && $_POST['3'] && $_POST['4'] && $_POST['5'] && $_POST['6'] ) {
    $i++;
    $sql = "INSERT INTO auteur (id, nom, prenom) VALUES (?, ?, ?)";
    $sqlR = $idcon->prepare($sql);
    $sqlR->execute([$_POST['1'], $_POST['2'], $_POST['3']]);
    $sql = "INSERT INTO citation (id, phrase, auteurid, siecleid) VALUES (?, ?, ?, ?)";
    $sqlR = $idcon->prepare($sql);
    $sqlR->execute([$i, $_POST['6'], $_POST['1'], $_POST['4']]);
    $sql = "INSERT INTO siecle (id, numero) VALUES (?, ?)";
    $sqlR = $idcon->prepare($sql);
    $sqlR->execute([$_POST['4'], $_POST['5']]);
    header('Location: modification.php');
}
?>

<br/><br/>
<h2>Suppression</h2><hr/>
<form action="modification.php" method="post">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Sélectionner l'ID d'une citation</label>
        <select class="form-control" id="exampleFormControlSelect1" name="sup">
            <?php
            $r = $idcon->prepare("SELECT id from citation");
            $r->execute();
            $r = $r->fetchAll();

            $idCitations = [];
            for($counter = 0; $counter < count($r); $counter++){
                array_push($idCitations, $r[$counter][0]);
            }
            for ($counter = 0; $counter < count($idCitations); $counter++) {
                echo "<option>" . $idCitations[$counter] . "</option>";
            }
            ?>
        </select>
    </div>
    <input type="submit" name="supprimer" class="btn btn-primary" value="Supprimer">
</form>
<?php
if ($_POST['supprimer']) {
    $sql = "DELETE from citation WHERE id = ?";
    $sqlR = $idcon->prepare($sql);
    $sqlR->execute([$_POST['sup']]);
    header('Location: modification.php');
}
?>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>