<?php

include 'connexpdo.php';

// initializing the database
$dsn = 'pgsql:host=localhost;port=5432;dbname=graphenotes;';
$user = 'postgres';
$password = 'new_password';
$idcon = connexpdo($dsn, $user, $password);

// display image
header ("Content-type: image/png");
$image = imagecreate(800,200);

$gris = imagecolorallocate($image, 96, 96, 96);
$noir = imagecolorallocate($image, 0, 0,0);
$blanc = imagecolorallocate($image, 255, 255, 255);
$bleu = imagecolorallocate($image, 0, 0, 255);

// number of lines of the table
$q1 = "SELECT COUNT(*) FROM notes";
$res1 = $idcon->prepare($q1);
$res1->execute();
$r1 = $res1->fetch();

// get the average marks of each student
imagestring($image, 4, 300, 15, "Notes des etudiants E1 et E2", $noir);
$q2 = "SELECT round(avg(note), 4) FROM notes WHERE etudiant = ?";
$res2 = $idcon->prepare($q2);
$res2->execute(array("E1"));
$r2 = $res2->fetch();
imagestring($image, 4, 500, 160, "Moyenne des notes de E1 : ".$r2[0], $noir);
$q3 = "SELECT round(avg(note), 4) FROM notes WHERE etudiant = ?";
$res3 = $idcon->prepare($q3);
$res3->execute(array("E2"));
$r3 = $res3->fetch();
imagestring($image, 4, 500, 180, "Moyenne des notes de E2 : ".$r3[0], $noir);
imagestring($image, 4, 10, 150, "E1", $blanc);
imagestring($image, 4, 100, 150, "E2", $bleu);

$e1 = Array();
$e2 = Array();

// put all the marks from each student in two arrays
for ($counter2 = 1; $counter2 <= (int)$r1[0]; $counter2++){
    $q4 = "SELECT etudiant FROM notes WHERE id = ?";
    $res4 = $idcon->prepare($q4);
    $res4->execute(array("$counter2"));
    $r4 = $res4->fetch();
    if ($r4[0] == "E1"){
        $q5 = "SELECT note FROM notes WHERE id = ?";
        $res5 = $idcon->prepare($q5);
        $res5->execute(array("$counter2"));
        $r5 = $res5->fetch();
        array_push($e1, $r5[0]);
    }
    if ($r4[0] == "E2"){
        $q5 = "SELECT note FROM notes WHERE id = ?";
        $res5 = $idcon->prepare($q5);
        $res5->execute(array("$counter2"));
        $r5 = $res5->fetch();
        array_push($e2, $r5[0]);
    }
}


// displaying e1's marks from its resp. array
for ($counter = 0; $counter < count($e1) - 1; $counter++){
    $x1 = 90*($counter);
    $x2 = 90*($counter+1);
    $y1 = 2*(20 - (int)$e1[$counter]) + 80;
    $y2 = 2*(20 - (int)$e1[$counter + 1]) + 80;
    imageline($image, $x1, $y1, $x2, $y2, $blanc);
}

// displaying e2's marks from its resp. array
for ($counter = 0; $counter < count($e2) - 1; $counter++){
    $x1 = 90*($counter);
    $x2 = 90*($counter+1);
    $y1 = 2*(20 - (int)$e2[$counter]) + 80;
    $y2 = 2*(20 - (int)$e2[$counter + 1]) + 80;
    imageline($image, $x1, $y1, $x2, $y2, $bleu);
}

imagepng($image);