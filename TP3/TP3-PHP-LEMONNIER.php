<?php
echo "<h1>TP3</h1>";
echo "<hr>";

echo "<h2>Ex1</h2>";

function increment(){
    $x = mt_rand(0, 20);
    return $x + 1;
}

echo "<hr>";
echo "<h2>Ex2</h2>";

function increment2($x){
    return $x + 1;
}

$test = 3;
echo "$test + 1 = ";
$return = increment2($test);
echo "$return";

echo "<hr>";
echo "<h2>Ex3</h2>";

$identite = ['alain', 'basile', 'David', 'Edgar'];
$age = [1, 15, 35, 65];
$mail = ['penom.nom@gtail.be', 'truc@bruce.zo', 'caro@caramel.org', 'trop@monmel.fr'];

function split($test) // todo gérer .yncrea.fr
{
    for ($i = 0; $i < count($test); $i++) {
        $a = strstr($test[$i], '@');
        $newstr = substr($a, 1);
        echo "Domain's name: $newstr<br>";
        $a = strstr($newstr, '.');
        $newstr = substr($a, 1);
        echo "Extension's name: $newstr<br>";
    }
}

split($mail);

function q3($identite, $age, $mail){ // todo factoriser mdr
    $i = mt_rand(0, count($identite)-1);
    if ($age[$i] <= 1){
        echo "je me nomme $identite[$i], j'ai $age[$i] an et mon mail est $mail[$i] du domaine ";
        $a = strstr($mail[$i], '@');
        $newstr = substr($a, 1);
        echo "$newstr";
        echo "avec l'extension ";
        $a = strstr($newstr, '.');
        $newstr = substr($a, 1);
        echo "$newstr";
    }
    else{
        echo "je me nomme $identite[$i], j'ai $age[$i] ans et mon mail est $mail[$i] du domaine ";
        $a = strstr($mail[$i], '@');
        $newstr = substr($a, 1);
        echo "$newstr";
        echo "avec l'extension ";
        $a = strstr($newstr, '.');
        $newstr = substr($a, 1);
        echo "$newstr";
    }
}

q3($identite, $age, $mail);

echo "<hr>";
echo "<h2>Ex4</h2>";

function ligne($number){
    for ($i = 0; $i < $number; $i++){
        echo "*";
    }
}

function carre_plein($number){
    for ($i = 0; $i < $number; $i++){
        for ($j = 0; $j < $number; $j++){
            echo "*";
        }
        echo "<br>";
    }
}

function triangle_iso($number){
    for ($i = 0; $i < $number; $i++){
        for ($j = 0; $j <= $i; $j++){
            echo "*";
        }
        echo "<br>";
    }
}

function carre_vide($number){
    for ($i = 0; $i < $number; $i++){
        for ($j = 0; $j < $number; $j++){
            if ($i == 0 || $i == $number-1 || $j == 0 || $j == $number-1){
                echo "*";
            }
            else {
                echo "&nbsp&nbsp";
            }
        }
        echo "<br>";
    }
}

function triangle_vide($number){
    for ($i = 0; $i < $number; $i++){
        for ($j = 0; $j <= $i; $j++){
            if ($i == 0 || $j == $i || $j == 0 || $i == $number-1){
                echo "*";
            }
            else {
                echo "&nbsp&nbsp";
            }
        }
        echo "<br>";
    }
}

function triangle_vide_inv($number){
    for ($i = $number; $i > 0; $i--){
        for ($j = 0; $j < $i; $j++){
            if ($i == 0 || $j == $i-1 || $j == 0 || $i == $number){
                echo "*";
            }
            else {
                echo "&nbsp&nbsp";
            }
        }
        echo "<br>";
    }
}

ligne(10);
echo "<br><hr>";
carre_plein(10);
echo "<br><hr>";
triangle_iso(10);
echo "<br><hr>";
carre_vide(10);
echo "<br><hr>";
triangle_vide(10);
echo "<br><hr>";
triangle_vide_inv(10);

echo "<hr>";
echo "<h2>Ex5</h2>";

function q1($string, $step){
    for ($i = 0; $i < strlen($string); $i++) {
        if (ord($string[$i]) >= 65 && ord($string[$i]) <= 90) {
            $temp = ord($string[$i]) + $step - 65;
            while ($temp >= 26){
                $temp -= 26;
            }
            $string[$i] = chr($temp + 65);
        }
        elseif (ord($string[$i]) >= 97 && ord($string[$i]) <= 122){
            $temp = ord($string[$i]) + $step - 97;
            while ($temp >= 26){
                $temp -= 26;
            }
            $string[$i] = chr($temp + 97);
        }
    }
    echo "$string";
}

q1('ATTAQUEZ ASTERIX', 3);

function q2($string, $step){
    for ($i = 0; $i < strlen($string); $i++) {
        if (ord($string[$i]) >= 65 && ord($string[$i]) <= 90) {
            $temp = ord($string[$i]) - $step - 65;
            while ($temp < 0){
                $temp += 26;
            }
            $string[$i] = chr($temp + 65);
        }
        elseif (ord($string[$i]) >= 97 && ord($string[$i]) <= 122){
            $temp = ord($string[$i]) - $step - 97;
            while ($temp < 0){
                $temp += 26;
            }
            $string[$i] = chr($temp + 97);
        }
    }
    echo "<br>$string";
}

q2('DWWDTXHC DVWHULA', 3);

echo "<hr>";
echo "<h2>Ex6</h2>";

function test($string, $key){
    $indicekey = 0;
    for ($i = 0; $i < strlen($string); $i++) {
        if (ord($string[$i]) >= 65 && ord($string[$i]) <= 90) {
            $step = ord($key[$indicekey]) - 48; // chopper les valeurs de la chaine en dur
            $temp = ord($string[$i]) + $step - 65;
            while ($temp >= 26){
                $temp -= 26;
            }
            $string[$i] = chr($temp + 65);
            if ($indicekey == strlen($key)-1){
                $indicekey = 0;
            }
            else {
                $indicekey++;
            }
        }
        elseif (ord($string[$i]) >= 97 && ord($string[$i]) <= 122){
            $step = ord($key[$indicekey]) - 48;
            $temp = ord($string[$i]) + $step - 97;
            while ($temp >= 26){
                $temp -= 26;
            }
            $string[$i] = chr($temp + 97);
            if ($indicekey == strlen($key)-1){
                $indicekey = 0;
            }
            else {
                $indicekey++;
            }
        }
    }
    echo "$string";
}

test('ATTAQUEZ ASTERIX', '314');

function test2($string, $key){
    $indicekey = 0;
    for ($i = 0; $i < strlen($string); $i++) {
        if (ord($string[$i]) >= 65 && ord($string[$i]) <= 90) {
            $step = ord($key[$indicekey]) - 48;
            $temp = ord($string[$i]) - $step - 65;
            while ($temp < 0){
                $temp += 26;
            }
            $string[$i] = chr($temp + 65);
            if ($indicekey == strlen($key)-1){
                $indicekey = 0;
            }
            else {
                $indicekey++;
            }
        }
        elseif (ord($string[$i]) >= 97 && ord($string[$i]) <= 122){
            $step = ord($key[$indicekey]) - 48;
            $temp = ord($string[$i]) - $step - 97;
            while ($temp < 0){
                $temp += 26;
            }
            $string[$i] = chr($temp + 97);
            if ($indicekey == strlen($key)-1){
                $indicekey = 0;
            }
            else {
                $indicekey++;
            }
        }
    }
    echo "<br>$string";
}

test2('DUXDRYHA EVUIUJB', '314');

echo "<hr>";
echo "<h2>Ex7</h2>";

function printintable($array){
    ksort($array);
    echo "<table class = 'oui'>";
    foreach ($array as $key => $value){
        echo "<tr><td class='oui'>$key</td><td class='oui'>$value</td></tr>";
    }
    echo "<style>.oui{border: medium solid black}</style></table>";
}

$annuaire=array(
    "PUJOL Olivier"=>"03 89 72 84 48",
    "IMBERT Jo"=>"03 89 36 06 05",
    "SPIEGEL Pierre"=>"03 87 67 92 37",
    "THOUVENOT Frédéric"=>"01 42 86 02 12",
    "MEGEL Pierre"=>"09 59 71 46 96",
    "SUCHET Loïc"=>"03 89 33 10 54",
    "GIROIS Francis"=>"03 88 01 21 15",
    "HOFFMANN Emmanuel"=>"03 89 69 20 05",
    "KELLER Fabien"=>"04 18 52 34 25",
    "LEY Jean-Marie"=>"03 89 43 17 85",
    "ZOELLE Thomas"=>"04 18 65 67 69",
    "WILHELM Olivier"=>"03 89 60 48 78",
    "BLIN Nathalie"=>"01 28 59 23 25",
    "BICARD Pierre-Eric"=>"03 89 69 25 82",
    "ZIEGLER Thierry"=>"03 89 06 33 89",
    "BADER Jean"=>"03 89 25 65 72",
    "ROSSO Anne-Sophie"=>"01 56 20 02 36",
    "ROTTNER Thierry"=>"03 88 29 61 54",
    "WEBER Joao"=>"03 89 35 45 20",
    "SCHILLINGER Olivier"=>"03 84 21 38 40",
    "BICARD Muriel"=>"03 89 33 47 99",
    "KELLER Christian"=>"03 88 19 16 10 ",
    "GROELLY Antonio"=>"03 89 33 60 63",
    "ALLARD Aline"=>"03 89 56 49 19",
    "WINNINGER Bénédicte"=>"04 16 14 86 66");

printintable($annuaire);
ksort($annuaire);


echo "<hr>";
echo "<h2>Ex8</h2>";

function isOn($a1, $a2, $a3, $a4, $a5, $a6){
    if (($a1 == 1 && $a3 == 1) || ($a1 == 1 && $a4 == 1 && $a5 == 1) || ($a2 == 1 && $a6 == 1)){
        echo "Light is turn on";
        return;
    }
    echo "Light is turn off";
}

isOn(mt_rand(0,1), mt_rand(0,1), mt_rand(0,1), mt_rand(0,1), mt_rand(0,1), mt_rand(0,1));

echo "<hr>";
echo "<h2>Ex9</h2>";

$clients = ["1"=>"Dulong","ville 1"=>"Paris","age 1"=>"35",
    "2"=>"Leparc","ville 2"=>"Lyon","age 2"=>"47",
    "3"=>"Dubos","ville 3"=>"Tours","age 3"=>"58"];

$clients["7"] = 'Duval';
$clients["ville 7"] = 'Nantes';
$clients["age 7"] = '24';

print_r($clients);

function printintablecv2($clients){
    echo "<table class = 'oui'><tr><td class = 'oui'>Client</td><td class = 'oui'>Nom</td><td class = 'oui'>Ville</td><td class = 'oui'>Age</td></tr>";
    $i = 0;
//    $j = 0;
    echo "<tr>";
    foreach($clients as $key => $value){
        if ($i%3 == 0){
            echo "</tr><tr><td class='oui'>Client $key</td><td class = 'oui'>$value</td>";
        }
        else {
            echo "<td class = 'oui'>$value</td>";
        }
        $i++;
    }
    echo "</tr></table>";
}

printintablecv2($clients);

echo "<hr>";
echo "<h2>Ex10</h2>";

function isPalindrome($string){
    $length = strlen($string);
    $temp = strtolower($string);
    for ($i = 0; $i < $length; $i++){
        if ($temp[$i] != $temp[$length-1-$i]){
            echo "This is not a palindrome!";
            return;
        }
    }
    echo "This is a palindrome!";
}

isPalindrome('MadAm');

echo "<hr>";
echo "<h2>Ex11</h2>";

function isid($string){
    $sum = 0;
    for ($i = 0; $i < strlen($string); $i++){
        $temp = ord($string[$i]) - 48;
        if ($i%2 != 0){
            $temp *= 2;
            while ($temp > 9){
                $temp -= 9;
            }
        }
        $sum += $temp;
    }
    if ($sum%10 != 0){
        echo "This is not a valid id";
        return;
    }
    echo "This is a valid id";
}

isid('972487086');

?>