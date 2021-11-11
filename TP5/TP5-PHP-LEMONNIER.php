<h1>TP5</h1>
<hr>
<h2>Ex1 (réussi)</h2>
<h3>Q1</h3>
<a href='TP5-PHP-LEMONNIER.php?C=55'>Cliquer pour avoir la valeur en degré</a>
<?php
if($_GET['C'] != null || !empty($_GET['C'])){
    $new = ($_GET['C'] - 32) * 5/9;
    echo "<br>La valeur en degré est : ".$new."<br>";
}

?>
<h3>Q2 (get)</h3>
<form action="TP5-PHP-LEMONNIER.php" method="get">
    Valeur en Fahrenheit : <input type="text" name="temp">
    <input type="submit" value="convertir">
</form>
<?php
if($_GET['temp'] != null || !empty($_GET['C'])){
    $new = ($_GET['temp'] - 32) * 5/9;
    echo "<br>La valeur en degré est : ".$new."<br>";
}
?>
<h3>Q2 (post)</h3>
<form action="TP5-PHP-LEMONNIER.php" method="post">
    Valeur en Fahrenheit : <input type="text" name="temp">
    <input type="submit" value="convertir">
</form>
<?php
if($_POST['temp'] != null || !empty($_POST['C'])){
    $new = ($_POST['temp'] - 32) * 5/9;
    echo "<br>La valeur en degré est : ".$new."<br>";
}
?>
<hr>
<h2>Ex2 (réussi)</h2>

<form action="TP5-PHP-LEMONNIER.php" method="post">
    Nom : <input type="text" name="nom" value="<?php if(($_POST['nom'] != null)&&($_POST['bouton']=="Envoyer")){echo $_POST['nom'];} ?>"> Prénom : <input type="text" name="prenom" value="<?php if(($_POST['prenom'] != null)&&($_POST['bouton']=="Envoyer")){echo $_POST['prenom'];} ?>"><br>
    Débutant : <input type="radio" name="genre" value="debutant" <?php if(($_POST['genre']=="debutant")&&($_POST['bouton']=="Envoyer")) {echo "checked";} ?>> Avancé : <input type="radio" name="genre" value="avance" <?php if(($_POST['genre']=="avance")&&($_POST['bouton']=="Envoyer")){echo "checked";} ?>><br>
    <input type="submit" name="bouton" value="Effacer"><input type="submit" name="bouton" value="Envoyer">
</form>
<?php
if (($_POST['nom'] != null && $_POST['prenom'] != null && $_POST['genre'] != null)&&($_POST['bouton']=="Envoyer")) {
    echo "Bonjour " . $_POST['nom'] . " " . $_POST['prenom'] . ". Vous avez un niveau " . $_POST['genre'] . ".";
}
?>

<hr>
<h2>Ex3 (réussi)</h2>

<form action="TP5-PHP-LEMONNIER.php" method="post">
    Nom <input type="text" name="nom3" value="<?php if(($_POST['nom3'] != null)&&($_POST['bouton3']=="ENVOI")){echo $_POST['nom3'];} ?>">
    Prénom <input type="text" name="prenom3" value="<?php if(($_POST['prenom3'] != null)&&($_POST['bouton3']=="ENVOI")){echo $_POST['prenom3'];} ?>">
    Age <input type="text" name="age3" value="<?php if(($_POST['age3'] != null)&&($_POST['bouton3']=="ENVOI")){echo $_POST['age3'];} ?>"><br><br>
    Langues pratiquées (choisir au minimum 2) <br>
    <select name="langues[]" multiple="multiple">
        <option name="langue1" value="français"> français</option>
        <option name="langue2" value="anglais"> anglais</option>
        <option name="langue3" value="allemand"> allemand</option>
        <option name="langue4" value="espagnol"> espagnol</option>
    </select><br><br>
    Compétences informatiques (choisir au minimum 2)<br>
        HTML <input type="checkbox" name="langages[]" value="html" <?php if(($_POST['langages[]']=="html")&&($_POST['bouton3']=="ENVOI")) {echo "checked";} ?>>
        CSS <input type="checkbox" name="langages[]" value="css" <?php if(($_POST['langages[]']=="css")&&($_POST['bouton3']=="ENVOI")) {echo "checked";} ?>>
        PHP <input type="checkbox" name="langages[]" value="php" <?php if(($_POST['langages[]']=="php")&&($_POST['bouton3']=="ENVOI")) {echo "checked";} ?>>
        SQL <input type="checkbox" name="langages[]" value="sql" <?php if(($_POST['langages[]']=="sql")&&($_POST['bouton3']=="ENVOI")) {echo "checked";} ?>>
        C <input type="checkbox" name="langages[]" value="c" <?php if(($_POST['langages[]']=="c")&&($_POST['bouton3']=="ENVOI")) {echo "checked";} ?>>
        C++ <input type="checkbox" name="langages[]" value="c++" <?php if(($_POST['langages[]']=="c++")&&($_POST['bouton3']=="ENVOI")) {echo "checked";} ?>>
        JS <input type="checkbox" name="langages[]" value="js" <?php if(($_POST['langages[]']=="js")&&($_POST['bouton3']=="ENVOI")) {echo "checked";} ?>>
        Python <input type="checkbox" name="langages[]" value="python" <?php if(($_POST['langages[]']=="python")&&($_POST['bouton3']=="ENVOI")) {echo "checked";} ?>><br>
    <input type="submit" name="bouton3" value="EFFACER"><input type="submit" name="bouton3" value="ENVOI">
</form>

<?php
if (($_POST['nom3'] != null)&&($_POST['prenom3'] != null)&&($_POST['age3'] != null)&&($_POST['bouton3']=="ENVOI")&&(count($_POST['langues']) >= 2)&&(count($_POST['langages']) >= 2)){
    echo "<h2>Récapitulatif de votre fiche d'information personnelle</h2>";
    echo "Vous êtes ".$_POST['prenom3']." ".$_POST['nom3'];
    echo "<br>Vous avez ".$_POST["age3"]." ans";
    echo "<br>Vous parlez :";
    echo "<ul>";
    $langues=$_POST['langues'];
    foreach($langues as $valeur){
        echo " <li> $valeur </li>";
    }
    $langages=$_POST['langages'];
    echo "</ul>Vous avez des compétences en informatique en : <ul>";
    foreach($langages as $valeur){
        echo " <li> $valeur </li>";
    }
    echo "</ul>";
}
?>

<hr>
<h2>Ex4 (réussi)</h2>

<form action="TP5-PHP-LEMONNIER.php" method="post">
    <strong>Nombre 1</strong> <input type="text" name="number1" value="<?php if ((($_POST['b1']=="Addition x+y") or ($_POST['b2']=="Soustraction x-y") or ($_POST['b3']=="Division x/y") or ($_POST['b4']=="Puissance x^y")) and ($_POST['number1'])!=null){ echo $_POST['number1']; } ?>"><br>
    <strong>Nombre 2</strong> <input type="text" name="number2" value="<?php if ((($_POST['b1']=="Addition x+y") or ($_POST['b2']=="Soustraction x-y") or ($_POST['b3']=="Division x/y") or ($_POST['b4']=="Puissance x^y")) and ($_POST['number2'])!=null){ echo $_POST['number2']; } ?>"><br>
    <strong>Résultat</strong> <input type="text" name="number3" value="<?php if (($_POST['b1']=="Addition x+y")&&($_POST['number1']!=null)&&($_POST['number2']!=null)){echo $_POST['number1'] + $_POST['number2'];} if (($_POST['b2']=="Soustraction x-y")&&($_POST['number1']!=null)&&($_POST['number2']!=null)){echo $_POST['number1'] - $_POST['number2'];} if (($_POST['b3']=="Division x/y")&&($_POST['number1']!=null)&&($_POST['number2']!=null)){echo $_POST['number1'] / $_POST['number2'];} if (($_POST['b4']=="Puissance x^y")&&($_POST['number1']!=null)&&($_POST['number2']!=null)){echo $_POST['number1'] ** $_POST['number2'];}?>"><br>
    <strong>Cliquer sur un bouton !</strong>
    <input type="submit" name="b1" value="Addition x+y">
    <input type="submit" name="b2" value="Soustraction x-y">
    <input type="submit" name="b3" value="Division x/y">
    <input type="submit" name="b4" value="Puissance x^y">
</form>

<hr>
<h2>Ex5 (réussi)</h2>

<form action="TP5-PHP-LEMONNIER.php" method="post" enctype="multipart/form-data">
    Fichier 1 <input type="file" name="f1" value="Choisir un fichier"><br>
    Fichier 2 <input type="file" name="f2" value="Choisir un fichier"><br>
    <input type="submit">
</form>

<style>
    .border{
        border: medium solid black;
    }
</style>

<?php
    echo "<table class='border'><tr><td class='border'></td><td class='border'><strong>Fichier 1</strong></td><td class='border'><strong>Fichier 2</strong></td></tr>";
    echo "<tr><td class='border'>name</td><td class='border'>" .$_FILES["f1"]["name"]. "</td><td class='border'>" .$_FILES["f2"]["name"]. "</td></tr>";
    echo "<tr><td class='border'>type</td><td class='border'>" .$_FILES["f1"]["type"]. "</td><td class='border'>" .$_FILES["f2"]["type"]. "</td></tr>";
    echo "<tr><td class='border'>tmp_name</td><td class='border'>" .$_FILES["f1"]["tmp_name"]. "</td><td class='border'>" .$_FILES["f2"]["tmp_name"]. "</td></tr>";
    echo "<tr><td class='border'>error</td><td class='border'>" .$_FILES["f1"]["error"]. "</td><td class='border'>" .$_FILES["f2"]["error"]. "</td></tr>";
    echo "<tr><td class='border'>size</td><td class='border'>" .$_FILES["f1"]["size"]. "</td><td class='border'>" .$_FILES["f2"]["size"]. "</td></tr>";
    $result1 = move_uploaded_file($_FILES["f1"]["tmp_name"],$_FILES["f1"]["name"]);
    $result2 = move_uploaded_file($_FILES["f2"]["tmp_name"],$_FILES["f2"]["name"]);
    if ($result1 and $result2){
        ?>
            <tr><td class='border'>Image</td><td class='border'><img src="<?php echo $_FILES['f1']['name']; ?>"</td><td class='border'><img src="<?php echo $_FILES['f2']['name']; ?>"></td></tr>";
        <?php
    }
    echo "</table>";
?>

<hr>
<h2>Ex7 (pas réussi)</h2>

<?php
session_start();
//todo voir probleme de suppression : voir au debut du html
setcookie('cookie0', 'test0');
setcookie('cookie1', 'test1', time()+3600*24*14);
echo $_COOKIE['cookie0'];
echo "<br>";
echo $_COOKIE['cookie1'];
echo "<br>";
print_r($_COOKIE);
echo "<br><br>";
setcookie('cookie0');
setcookie('cookie1',"",time()-3600*24*14);
echo $_COOKIE['cookie0'];
echo "<br>";
echo $_COOKIE['cookie1'];
echo "<br>";
print_r($_COOKIE);

?>

<hr>
<h2>Ex8 (pas réussi)</h2>
<!--todo voir pour afficher tableau-->
<?php

$table = [$key1="cookie1" => $val1="value1", $key2="cookie2" => $val2="value2", $key3="cookie3" => $val3="value3"];
setcookie($key1, $val1);
setcookie($key2, $val2);
setcookie($key3, $val3);

?>

<hr>
<h2>Ex9 (réussi)</h2>
<?php
echo "ID : ".session_id();
$date = date('d/m/Y H:i:s');
$_SESSION['nom'] = "elemonnier";
$_SESSION['mail'] = "etienne.lemonnier44@gmail.com";
$_SESSION['date'] = $date;
$_SESSION['site'] = "https://i.ytimg.com/vi/5sqkhbntO3s/maxresdefault.jpg";
?>
<br><a href="page.php">Nouvelle session</a>
<?php
?>

<hr>
<h2>Ex10 (réussi)</h2>

<?php

$id_file = fopen('test-fic.txt', 'a+');
if($id_file){
    while ($ligne=fgets($id_file)){
        echo $ligne.'<br>';
    }
//    fwrite($id_file, 'LEMONNIER Etienne');
    fseek($id_file, 0);
    while ($ligne=fgets($id_file)){
        echo $ligne.'<br>';
    }
    fclose($id_file);
}
?>

<hr>
<h2>Ex11 (réussi)</h2>

<?php

$id_file = fopen('contact.txt', 'a+');
if($id_file) {
    fseek($id_file, 0);
    echo "<table class='border'>";
    while ($ligne=fgets($id_file)){
        echo '<tr><td class="border">'.str_replace(';', '</td><td class="border">', $ligne)."</td></tr>";
    }
    echo "</table>";

    fclose($id_file);
}

?>

<hr>
<h2>Ex12 (réussi)</h2>

<h3>Enregistrez vos informations personnelles</h3>
<form method="post">
    <strong>Votre prénom  </strong><input type="text" name="prenom" value="<?php if(($_POST['button1']=="Enregistrer") and $_POST['prenom'] != null and $_POST['nom'] != null){echo $_POST['prenom'];}  ?>"><br/><br>
    <strong>Votre nom  </strong><input type="text" name="nom" value="<?php if($_POST['button1']=="Enregistrer" and $_POST['prenom'] != null and $_POST['nom'] != null){echo $_POST['nom'];}  ?>"><br/><br>
    <input type="submit" name="button1" value="Enregistrer"> <input type="submit" value="Effacer">
</form>

<?php
    $inc = 0;
    if ($_POST['prenom']!=null and $_POST['nom'] != null and $_POST['button1']=="Enregistrer"){
        $id_file = fopen('ex12.txt', 'a+');
        while ($ligne = fgets($id_file)){
            $inc++;
        }
        fwrite($id_file, $inc);
        fwrite($id_file, ";");
        fwrite($id_file, $_POST['prenom']);
        fwrite($id_file, ";");
        fwrite($id_file, $_POST['nom']);
        fwrite($id_file, ";");
        fwrite($id_file, date('d/m/Y H:i:s'));
        fwrite($id_file, "\n");
        fseek($id_file, 0);
        echo "<h3>Merci ".$_POST['prenom']." ".$_POST['nom']. " de ta visite</h3>";
        echo "<table class='border'>";
        while ($ligne=fgets($id_file)){
            echo '<tr><td class="border">'.str_replace(';', '</td><td class="border">', $ligne)."</td></tr>";
        }
        echo "</table>";
        fclose($id_file);
    }
?>

<hr>
<h2>Ex13 (pas réussi)</h2>

<strong>Choisir votre délégué</strong>
<form method="post">
    Etudiant 1 <input type="radio" name="etudiant" value="e1" <?php if ($_POST['etudiant'] == "e1" and $_POST['bt1'] == "Voter"){echo "checked";} ?>><br>
    Etudiant 2 <input type="radio" name="etudiant" value="e2" <?php if ($_POST['etudiant'] == "e2" and $_POST['bt1'] == "Voter"){echo "checked";} ?>><br>
    Etudiant 3 <input type="radio" name="etudiant" value="e3" <?php if ($_POST['etudiant'] == "e3" and $_POST['bt1'] == "Voter"){echo "checked";} ?>><br><br>
    <input type="submit" name="bt1" value="Voter">
    <input type="submit" name="bt2" value="Afficher les résultats">
</form>

<?php
if($_POST['bt1'] == "Voter" and ($_POST['etudiant']=="e1" or $_POST['etudiant']=="e2" or $_POST['etudiant']=="e3")){
    if ($_POST['etudiant']=="e1"){
        $id_file = fopen('ex13.txt', 'a+');
        fwrite($id_file, "e1\n");
        fclose($id_file);
        echo "Vous avez voté e1";
    }
    if ($_POST['etudiant']=="e2"){
        $id_file = fopen('ex13.txt', 'a+');
        fwrite($id_file, "e2\n");
        fclose($id_file);
        echo "Vous avez voté e2";
    }
    if ($_POST['etudiant']=="e3"){
        $id_file = fopen('ex13.txt', 'a+');
        fwrite($id_file, "e3\n");
        fclose($id_file);
        echo "Vous avez voté e3";
    }
}
?>