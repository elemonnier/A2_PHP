<?php

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


$randint = random_int(0, count($r)-1);
echo $randint;