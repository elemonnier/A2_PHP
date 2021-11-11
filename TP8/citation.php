<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/283a4a4102.js" crossorigin="anonymous"></script>
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
<h2>La citation du jour</h2>
<hr>
<i class="fas fa-id-card"></i>
<h4>Il y a <strong><?php
    include 'connexpdo.php';

    $dsn = 'pgsql:host=localhost;port=5432;dbname=citations;';
    $user = 'postgres';
    $password = 'new_password';
    $idcon = connexpdo($dsn, $user, $password);

    $r = $idcon->prepare("SELECT id from citation");
    $r->execute();
    $r = $r->fetchAll();

    $idCitations = [];
    for($counter = 0; $counter < count($r); $counter++){
        array_push($idCitations, $r[$counter][0]);
    }
    echo count($r);
        ?></strong> citations répertoriées.</h4>
    <br>
<h4>Et voici l'une d'entre elles qui est générée aléatoirement :</h4>
<br>
<strong><?php

    $randint = random_int(0, count($r)-1);
    $query2 = "SELECT phrase FROM citation WHERE id = ?";
    $result2 = $idcon->prepare($query2);
    $result2->execute([$r[$randint][0]]);
    $res2 = $result2->fetch();
    echo $res2[0];
    ?> <br>
    <?php
    $query3 = "SELECT a.nom, a.prenom FROM citation c, auteur a WHERE (c.auteurid = a.id AND c.id = ?)";
    $result3 = $idcon->prepare($query3);
    $result3->execute([$r[$randint][0]]);
    $res3 = $result3->fetch();
    echo $res3[0];

    ?>
    (<?php
    $query4 = "SELECT s.numero FROM siecle s, citation c WHERE (c.siecleid = s.id AND c.id = ?)";
    $result4 = $idcon->prepare($query4);
    $result4->execute([$r[$randint][0]]);
    $res4 = $result4->fetch();
    echo $res4[0];
    ?><sup>ème</sup> siècle)
</strong>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>