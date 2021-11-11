<h1>Auteurs de la BD</h1>

<?php

include 'connexpdo.php';

$dsn = 'pgsql:host=localhost;port=5432;dbname=citations;';
$user = 'postgres';
$password = 'new_password';
$idcon = connexpdo($dsn, $user, $password);

$query1 = "SELECT * FROM auteur";
$result1 = $idcon->query($query1);
echo "<table><tr><td>Prenom</td><td>Nom</td></tr>";
foreach($result1 as $data)
{
    echo "<tr><td>".$data['prenom']."</td><td>".$data['nom']."</td></tr>";
}
echo "</table>";

?>

<h1>Citations de la BD</h1>

<?php

$query1 = "SELECT * FROM citation";
$result1 = $idcon->query($query1);
foreach($result1 as $data)
{
    echo $data['phrase']."<br>";
}

?>

<h1>Siècles de la BD</h1>

<?php

$query1 = "SELECT * FROM siecle";
$result1 = $idcon->query($query1);
foreach($result1 as $data)
{
    echo $data['numero']."<br>";
}

?>