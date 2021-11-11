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
<h2>Rechercher une citation</h2>
<hr>
<form action="recherche.php" method="post">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Auteur</label>
        <select class="form-control" id="exampleFormControlSelect1" name="auteur">
            <?php
            include 'connexpdo.php';

            $dsn = 'pgsql:host=localhost;port=5432;dbname=citations;';
            $user = 'postgres';
            $password = 'new_password';
            $idcon = connexpdo($dsn, $user, $password);

            $query1 = "SELECT * FROM auteur";
            $result1 = $idcon->query($query1);
            $i = 0;
            foreach($result1 as $data) {
                $i++;
            }
            for ($j = 1; $j <= $i; $j++){
                $query2 = "SELECT nom FROM auteur where id = $j";
                $result2 = $idcon->prepare($query2);
                $result2->execute();
                $res2 = $result2->fetch();
                echo "<option>".$res2[0]."</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Siècle</label>
        <select class="form-control" id="exampleFormControlSelect1" name="siecle">
            <?php
            $query3 = "SELECT * FROM siecle";
            $result3 = $idcon->query($query3);
            $k = 1;
            foreach($result3 as $data) {
                $k++;
            }
            for ($j = 2; $j <= $k; $j++){
                $query4 = "SELECT numero FROM siecle where id = $j";
                $result4 = $idcon->prepare($query4);
                $result4->execute();
                $res4 = $result4->fetch();
                echo "<option>".$res4[0]."</option>";
            }
            ?>
        </select>
    </div>
    <input type="submit" name='button' value="Rechercher" class="btn btn-primary">
</form>
<?php
if ($_POST['button']) {
    $requeteRecherche = $idcon->prepare("select c.phrase, a.nom, s.numero from citation c, auteur a, siecle s 
                where c.auteurid=(select id from auteur where nom =:nomAuteur)
                  and c.siecleid=(select id from siecle where numero =:siecle)
                  and s.id = siecleid and a.id= auteurid");
    $requeteRecherche->execute(array("nomAuteur" => $_POST["auteur"], "siecle" => $_POST['siecle']));
    $res = $requeteRecherche->fetchAll();
    echo "
    <table class=\"table table-striped\">
    <thead>
    <tr>
        <th scope=\"col\">Citation</th>
        <th scope=\"col\">Auteur</th>
        <th scope=\"col\">Siècle</th>
    </tr>
    </thead>
    <tbody>";
    for ($counter = 0; $counter < count($res); $counter++) {
        echo "<tr><td>" . $res[$counter][0] . "</td><td>" . $res[$counter][1] . "</td><td>" . $res[$counter][2] . "</td></tr><br/>";
    }
    echo "</tbody>
    </table>";
}
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
