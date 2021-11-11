<?php
echo "<h1>TP4</h1>";
echo "<hr>";

echo "<h2>Ex1</h2>";

setlocale(LC_TIME, "fr_FR.utf8");

echo "EN : ".date('l d F Y')."<br>";
echo "FR : ".strftime('%A %d %B %G')."<br>";
echo "Date et heure : ".date('d/m/Y H:i')."<br>";
echo "Il est passé ".time()."s depuis les premières apparitions d'UNIX<br>";

echo "<hr>";

echo "<h2>Ex2</h2>";
$birth = new DateTime("2001-01-18");
$now = new DateTime("now");
echo "Date de naissance : ".$birth->format('d/m/Y')."<br>";
echo "Date du jour : ".$now->format('d/m/Y')."<br>";
$interval = date_diff($birth, $now);
echo "Age : ".$interval->y." ans ".$interval->m." mois ".$interval->d." jours = ".$interval->days." jours = ".($interval->days*86400)." secondes";

echo "<hr>";

echo "<h2>Ex3</h2>";
$oldFullMoon = new DateTime("2020-02-09 08:34:35");
$newFullMoon = $oldFullMoon;
$newFullMoon->modify('+29 days');
$newFullMoon->modify('+12 hour');
$newFullMoon->modify('+44 minutes');
$newFullMoon->modify('+3 seconds');

echo "La nouvelle pleine lune sera : ".$newFullMoon->format('d/m/Y H:i')."<br>";

for ($i = 0; $i != 99; $i++){
    $newFullMoon->modify('+29 days');
    $newFullMoon->modify('+12 hour');
    $newFullMoon->modify('+44 minutes');
    $newFullMoon->modify('+3 seconds');
}

echo "La 100e nouvelle pleine lune sera : ".$newFullMoon->format('d/m/Y H:i');

echo "<hr>";

echo "<h2>Ex4</h2>";
$bool = checkdate(02, 29, 1962);
if ($bool){
    echo "oui<br>";
}
else{
    echo "non<br>";
}

echo "<hr>";

echo "<h2>Ex5</h2>";
$date = mktime(0, 0, 0, 3, 3, 1993);

echo "c'est un ".strftime('%A', $date);

echo "<hr>"; //todo mktime => manipulation de données / affichage FR // new datetime => le reste

echo "<h2>Ex6</h2>";
$year = 2020;
$date = mktime(0,0,0,0,0, $year + 1);

while (date('Y', $date) != 2063){
    if (date('L', $date) == 1){
        echo date('Y', $date)."<br>";
    }
    $year++;
    $date = mktime(0,0,0,0,0, $year + 1);
}

echo "<hr>";

echo "<h2>Ex7</h2>";

$year = 2020;
$date = mktime(0,0,0,5,1, $year);

//echo $date;

while (date('Y', $date) != 2031){
    if ((date('w', $date) == 1) || (date('w', $date) == 5)){
        echo $year." week end prolongé<br>";
    }
    else if ((date('w', $date) == 0) || (date('w', $date) == 6)){
        echo $year." week end non prolongé<br>";
    }
    $year++;
    $date = mktime(0,0,0,5,1, $year);
}

?>