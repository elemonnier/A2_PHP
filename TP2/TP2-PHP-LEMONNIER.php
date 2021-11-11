<?php
echo "<h1>TP2</h1>";
echo "<hr>";

echo "<h2>Ex1</h2>";
echo "<h3>Q1</h3>";

$age = mt_rand(0, 100);
if ($age >= 70){
    echo "$age";
    echo " ans : agé";
}
elseif ($age >= 50){
    echo "$age";
    echo " ans : sénior";
}
elseif ($age >= 20){
    echo "$age";
    echo " ans : adulte";
}
elseif ($age >= 13){
    echo "$age";
    echo " ans : ado";
}
else {
    echo "$age";
    echo " ans : enfant";
}
echo "<h3>Q2</h3>";
switch ($age){
    case ($age >= 70):
        echo "$age";
        echo " ans : agé";
        break;
    case ($age >= 50):
        echo "$age";
        echo " ans : sénior";
        break;
    case ($age >= 20):
        echo "$age";
        echo " ans : adulte";
        break;
    case ($age >= 13):
        echo "$age";
        echo " ans : ado";
        break;
    case ($age >= 0):
        echo "$age";
        echo " ans : enfant";
        break;
}
echo "<hr>";

echo "<h2>Ex2</h2>";
echo "<h3>Q1</h3>";

echo "<table><tr>";

$fibonacci = array();
$fibonacci[0] = 0;
$fibonacci[1] = 1;
$i = 0;


while ($i != 20){
    echo "<td>F$i</td>";
    $i++;
}

echo "</tr> <tr>";

$i=2;

echo "<td>$fibonacci[0]</td>";
echo "<td>$fibonacci[1]</td>";

while ($i != 20){
    $fibonacci[$i] = $fibonacci[$i-1] + $fibonacci[$i-2];
    echo "<td>$fibonacci[$i]</td>";
    $i++;
}

echo "</tr>";

echo "<style>td, table{border: medium solid black;}</style>";
$i = 1;
echo "<tr>";
do {
    $temp = $fibonacci[$i+1]/$fibonacci[$i];
    echo "<td class='non'>$temp</td>";
    $i++;
}
while ($i != 21);

echo "</tr>";

echo "</table>";

echo "<hr>";
echo "<h2>Ex3</h2>";


$n = 0;
$sum = 0;

for ($i = 1; $i <= 150000; $i++){
    $sum += (1/$i)**2;
}

$pi = sqrt(6*$sum);
echo "$pi";

echo "<hr>";
echo "<h2>Ex4</h2>";

$tableaucitation = array('gkbbrfvbugbug', 'vifhuirehvuirehvuierhvu', 'ljsfhdhfrguirehgureihgurieguy', 'fnsdfjknbjrbnjdktnjntjbn');
foreach ($tableaucitation as $value){
    echo "oui : $value<br>";
}

echo "<hr>";
echo "<h2>Ex5</h2>";

$value = mt_rand(0, 20); // todo gérer problemes de row
echo "<table><tr class = 'ui'>Table de $value</tr>";
$t1 = $value*1;
$t2 = $value*2;
$t3 = $value*3;
$t4 = $value*4;
echo "<tr><td>1 x $value</td><td>$t1</td></tr>";
echo "<tr><td>2 x $value</td><td>$t2</td></tr>";
echo "<tr><td>3 x $value</td><td>$t3</td></tr>";
echo "<tr><td>4 x $value</td><td>$t4</td></tr><style>.ui{border: medium solid black;}</style></table>";

echo "<hr>";
echo "<h2>Ex6</h2>";

function printPrimes(){ // todo à faire
    for ($i = 2; $i < 98; $i++){
        for ($j = 2; $j < 98; $j++){
            if ($i%$j != 0){
                break;
            }
        }
        echo "$i";
    }
}

printPrimes();

echo "<hr>";
echo "<h2>Ex7</h2>";

// todo faire exo 7

?>