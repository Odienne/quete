<?php

require('Equipe.php');
require('Joueur.php');
require('Quete.php');
require('Etat.php');
require('Vivant.php');
require('Empoisonne.php');
require('Mort.php');

$action = $_POST['action'];

if (!isset($action)) return;
session_start();

switch ($action) {
    case 'creer_personnage':
    {
        $player = new Joueur($_POST['nom'], $_POST['pv'], $_POST['attaque'], 1, 0, new Vivant());
        array_push($_SESSION['personnages'], $player);
        break;
    }
    case 'creer_equipe':
    {
        $_SESSION['equipe'] = new Equipe($_POST['nom_equipe'], $_SESSION['personnages']);
        break;
    }
    case 'choisir_quete':
    {
        array_push($_SESSION['quetes'], new Quete($_POST['nom_quete'], $_POST['description_quete'], $_POST['recompense_quete']));
        break;
    }
    case 'terminer_quete':
    {
        break;
    }
    case 'endQuest':
    {
        break;
    }
    default:
    {
    }
}

header('Location: /quete');