<?php
session_start();

function newUser()
{
    include 'connexpdo.php';

    $dsn = 'pgsql:host=localhost;port=5432;dbname=etudiants;';
    $user = 'postgres';
    $password = 'new_password';
    $idcon = connexpdo($dsn, $user, $password);

    $i = 1;
    $alreadyUsedId = true;
    while ($alreadyUsedId){ // it's also possible to create a new id which is the "max+1" one, using max(id) in the query, both choices are actually great
        $result = $idcon->prepare("SELECT COUNT(*) FROM utilisateur WHERE id = ?");
        $result->execute([$i]);
        $result = $result->fetch();
        if($result[0] == 0){
            $alreadyUsedId = false;
        }
        else {
            $i++;
        }
    }

    if ($_POST['bouton'] && $_POST['1'] && $_POST['2'] && $_POST['3'] && $_POST['4'] && $_POST['5']) {
        $res = $idcon->prepare('INSERT INTO utilisateur (id, login, password, mail, nom, prenom) VALUES (?, ?, ?, ?, ?, ?)');
        $res->execute([($i), $_POST['1'], password_hash($_POST['2'],PASSWORD_DEFAULT), $_POST['3'], $_POST['4'], $_POST['5']]);
        header('Location: viewlogin.php');
        exit();
    }

    $r = $idcon->prepare('INSERT INTO conges (user_id, nom, prenom)');
}

function login()
{
    include 'connexpdo.php';

    $dsn = 'pgsql:host=localhost;port=5432;dbname=etudiants;';
    $user = 'postgres';
    $password = 'new_password';
    $idcon = connexpdo($dsn, $user, $password);

    if ($_POST['bouton'] && $_POST['1'] && $_POST['2']) {
        $q = "SELECT password, id FROM utilisateur WHERE login = ?";
        $res = $idcon->prepare($q);
        $res->execute([$_POST['1']]);
        $r = $res->fetchAll();
        if (password_verify($_POST['2'], $r[0][0])) {
            $_SESSION['__userSession'] = ["idUser" => $r[0][1]];
            header('Location: viewadmin.php');
        } else {
            header('Location: viewlogin.php?loginError=true');
        }
    }
}

function newStudent()
{
    include 'connexpdo.php';

    $dsn = 'pgsql:host=localhost;port=5432;dbname=etudiants;';
    $user = 'postgres';
    $password = 'new_password';
    $idcon = connexpdo($dsn, $user, $password);

    $i = 1;
    $alreadyUsedId = true;
    while ($alreadyUsedId){
        $result = $idcon->prepare("SELECT COUNT(*) FROM etudiant WHERE id = ?");
        $result->execute([$i]);
        $result = $result->fetch();
        if($result[0] == 0){
            $alreadyUsedId = false;
        }
        else {
            $i++;
        }
    }

    if ($_POST['button'] && $_POST['2'] && $_POST['3'] && $_POST['4']) {
        $res = $idcon->prepare('INSERT INTO etudiant (id, user_id, nom, prenom, note) VALUES (?, ?, ?, ?, ?)');
        $res->execute([($i), $_SESSION['__userSession']['idUser'], $_POST['2'], $_POST['3'], $_POST['4']]);
        header('Location: viewadmin.php');
        exit();
    }
}

function editStudent(){
    include 'connexpdo.php';

    $dsn = 'pgsql:host=localhost;port=5432;dbname=etudiants;';
    $user = 'postgres';
    $password = 'new_password';
    $idcon = connexpdo($dsn, $user, $password);

    if ($_POST['b2'] && $_POST['5']){
        $res = $idcon->prepare("UPDATE etudiant SET note = ? WHERE nom = ?");
        $res->execute([$_POST['5'], $_POST['etudiant']]);
        header('Location: viewadmin.php');
        exit();
    }
}

function deleteStudent() {
    include 'connexpdo.php';

    $dsn = 'pgsql:host=localhost;port=5432;dbname=etudiants;';
    $user = 'postgres';
    $password = 'new_password';
    $idcon = connexpdo($dsn, $user, $password);

    if ($_POST['supprimer']) {
        $sql = "DELETE from etudiant WHERE nom = ?";
        $sqlR = $idcon->prepare($sql);
        $sqlR->execute([$_POST['sup']]);
        header('Location: viewadmin.php');
    }
}

function goToNewStudent() {
    header('Location: view-newetudiant.php');
}

function welcome() {
    header('Location: index.php');
}

if ($_GET['newUser']){
    newUser();
}

if ($_GET['login']){
    login();
}

if ($_GET['newStudent']){
    newStudent();
}

if ($_GET['editStudent']){
    editStudent();
}

if ($_GET['deleteStudent']){
    deleteStudent();
}

if ($_GET['goToNewStudent']){
    goToNewStudent();
}

if ($_GET['welcome']){
    welcome();
}

// other methods

function displayStudentsInArray() {
    echo '<h1>Bonsoir ';

    $dsn = 'pgsql:host=localhost;port=5432;dbname=etudiants;';
    $user = 'postgres';
    $password = 'new_password';
    $idcon = connexpdo($dsn, $user, $password);

    $r = $idcon->prepare("SELECT nom, prenom FROM utilisateur WHERE id = ?");
    $r->execute([$_SESSION['__userSession']['idUser']]);
    $r = $r->fetchAll();
    echo $r[0][0]." ".$r[0][1]."</h1>";

    echo "<h2>Tes étudiants sont :</h2>";
    echo "<table class='table'><thead><tr><th scope='col'>Nom</th><th scope='col'>Prénom</td><th scope='col'>Note</td></tr></thead><tbody>";

    $res = $idcon->prepare("SELECT nom, prenom, note FROM etudiant WHERE user_id = ?");
    $res->execute([$_SESSION["__userSession"]['idUser']]);
    $res = $res->fetchAll();
    for ($i = 0; $i < count($res); $i++) {
        echo "<tr><td>".$res[$i][0]."</td><td>".$res[$i][1]."</td><td>".$res[$i][2]."</td></tr>";
    }
    echo "</tbody></table>";
}

function average() {
    $dsn = 'pgsql:host=localhost;port=5432;dbname=etudiants;';
    $user = 'postgres';
    $password = 'new_password';
    $idcon = connexpdo($dsn, $user, $password);
    $test = $idcon->prepare("SELECT COUNT(*) FROM etudiant WHERE user_id = ?");
    $test->execute([$_SESSION['__userSession']['idUser']]);
    $test = $test->fetch();
    if ($test[0] != 0) {
        $res3 = $idcon->prepare("SELECT round(avg(note), 2) FROM etudiant WHERE user_id = ?");
        $res3->execute([$_SESSION['__userSession']['idUser']]);
        $res3 = $res3->fetch();
        echo "$res3[0]";
    }
    else echo "/";
}

function putStudentsOnSelect() {
    $dsn = 'pgsql:host=localhost;port=5432;dbname=etudiants;';
    $user = 'postgres';
    $password = 'new_password';
    $idcon = connexpdo($dsn, $user, $password);
    $res = $idcon->prepare("SELECT nom FROM etudiant WHERE user_id = ?");
    $res->execute([$_SESSION['__userSession']['idUser']]);
    $res = $res->fetchAll();
    for ($i = 0; $i < count($res); $i++){
        echo "<option>".$res[$i][0]."</option>";
    }
}