<?php
include 'prop.php';
$prop = new utilisateur();
extract($_POST);
$prop->nomcomplet = $nomcompl;
$prop->login = $login;
$prop->password = $password;
$prop->etat = $etat;
$prop->profil = $profil;

$prop->addutilisateur();
header('location:affichage.php');
