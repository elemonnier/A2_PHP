<?php

include 'connexpdo.php';

// initializing the database
$dsn = 'pgsql:host=localhost;port=5432;dbname=grapheactions;';
$user = 'postgres';
$password = 'new_password';
$idcon = connexpdo($dsn, $user, $password);

// display image
header ("Content-type: image/png");
$image = imagecreate(300,200);

$gris = imagecolorallocate($image, 96, 96, 96);
$rouge = imagecolorallocate($image, 255, 0,0);
$blanc = imagecolorallocate($image, 255, 255, 255);
$vert = imagecolorallocate($image, 0, 255, 0);

// number of lines of the table
$q1 = "SELECT COUNT(*) FROM statistique";
$res1 = $idcon->prepare($q1);
$res1->execute();
$r1 = $res1->fetch();

imagestring($image, 4, 10, 15, "Cours des actions Als et For en 2010", $vert);
imagestring($image, 4, 10, 150, "For", $rouge);
imagestring($image, 4, 100, 150, "Als", $blanc);

$als = Array();
$for = Array();

// put all the actions from each company in two arrays
for ($counter2 = 1; $counter2 <= (int)$r1[0]; $counter2++){
    $q4 = "SELECT actions FROM statistique WHERE id = ?";
    $res4 = $idcon->prepare($q4);
    $res4->execute(array("$counter2"));
    $r4 = $res4->fetch();
    if ($r4[0] == "Als"){
        $q5 = "SELECT valeur FROM statistique WHERE id = ?";
        $res5 = $idcon->prepare($q5);
        $res5->execute(array("$counter2"));
        $r5 = $res5->fetch();
        array_push($als, $r5[0]);
    }
    if ($r4[0] == "For"){
        $q5 = "SELECT valeur FROM statistique WHERE id = ?";
        $res5 = $idcon->prepare($q5);
        $res5->execute(array("$counter2"));
        $r5 = $res5->fetch();
        array_push($for, $r5[0]);
    }
}


// displaying als's actions
for ($counter = 0; $counter < count($als) - 1; $counter++){
    $x1 = 27*($counter);
    $x2 = 27*($counter+1);
    $y1 = 2*(40 - (int)$als[$counter]) + 80;
    $y2 = 2*(40 - (int)$als[$counter + 1]) + 80;
    imageline($image, $x1, $y1, $x2, $y2, $blanc);
}

// displaying for's actions
for ($counter = 0; $counter < count($for) - 1; $counter++){
    $x1 = 27*($counter);
    $x2 = 27*($counter+1);
    $y1 = 2*(40 - (int)$for[$counter]) + 80;
    $y2 = 2*(40 - (int)$for[$counter + 1]) + 80;
    imageline($image, $x1, $y1, $x2, $y2, $rouge);
}

imagepng($image);