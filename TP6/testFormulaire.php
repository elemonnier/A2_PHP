<?php

include 'formulaire.php';

$form = new Formulaire();
$form->ajouterZoneTexte('Votre nom : ');
$form->ajouterZoneTexte('Votre code : ');
$form->ajouterBouton('Envoyer');
$form->getForm();