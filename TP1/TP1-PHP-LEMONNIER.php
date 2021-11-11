<?php

function extractDate($date) {
    $secondes = $date[seconds];
    $minutes = $date[minutes];
    $heures = $date[hours];
    $date = "Il est : ".$heures.":".$minutes.":".$secondes;

    $subarray = array("hours" => $heures, "minutes" => $minutes, "secondes" => $secondes);
    return array($date, $subarray);
}


$data = extractDate(getdate());
//$json = json_encode($data);
//print_r($json);

echo $data[0];
echo $data[1][hours];

//echo "<h1>TP1</h1>";
//echo "<hr>";
//
//echo "<h2>Ex1</h2>";
//echo "<h3>Q1</h3>";
//echo '1 - le livre "ma vie" est terrible !! <br>';
//echo "2 - le livre \"ma vie\" est terrible !! <br>";
//echo '3 - le livre "ma vie" est terrible !! <br>';
//echo "4 - le livre \"ma vie\" est terrible !! et le public l'apprécie<br><br>";
//$mavie = "ma vie";
//echo "5 - le livre $mavie est terrible !! <br>";
//echo '6 - le livre '."$mavie".' est terrible !! <br>';
//echo "<hr>";
//
//echo "<h2>Ex2</h2>";
//echo "<h3>Q1</h3>";
//echo "J'ai l'esprit large et je n'admets pas qu'on dise le contraire. ";
//echo strtoupper("<i><b>Citation de Coluche</b></i><br>");
//echo "<hr>";
//
//echo "<h2>Ex3</h2>";
//echo "<h3>Q1</h3>";
//$citation = "J'ai l'esprit large et je n'admets pas qu'on dise le contraire. ";
//$auteur = strtoupper("<i><b>Citation de Coluche</b></i><br>");
//echo "citation auteur<br>";
//echo "<h3>Q2</h3>";
//echo "$citation $auteur";
//echo "<h3>Q3</h3>";
//const AUTEUR = "<i><b>Citation de Coluche</b></i><br>";
//echo "$citation".strtoupper(AUTEUR);
//unset ($AUTEUR);
//unset ($citation);
//echo "<hr>";
//
//echo "<h2>Ex4</h2>";
//echo "<h3>Q1</h3>";
//var_dump ($_SERVER);
//echo "<br>";
//echo "<h3>Q2</h3>";
//var_dump ($GLOBALS);
//echo "<br>";
//echo "<hr>";
//
//echo "<h2>Ex5</h2>";
//echo "<h3>Q1 a</h3>";
//phpinfo();
//
//ini_set('display_errors', 1);
//
//echo ini_get('display_errors');
?>