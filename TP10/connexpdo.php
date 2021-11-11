<?php

function connexpdo($base, $user, $password){
    try {
        return new PDO($base, $user, $password);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

