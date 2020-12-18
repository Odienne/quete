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
        $quete = $_SESSION['quetes_disponibles'][$_POST['quete']];
        array_push($_SESSION['quetes'], new Quete($quete['nom'], $quete['description'], $quete['recompense']));
        unset($_SESSION['quetes_disponibles'][$_POST['quete']]);
        break;
    }
    case 'terminer_quete':
    {
        break;
    }
    case 'change_etat':
    {
        $player = $_SESSION['personnages'][$_POST['reference']];
        $etat = $_POST['etat'];
        switch ($etat) {
            case "1":
            {
                $etat = new Vivant();
                break;
            }
            case "2":
            {
                $etat = new Mort();
                break;
            }
            case "3":
            {
                $etat = new Empoisonne();
                break;
            }
        }
        var_dump($etat);
        $player->transitionTo($etat);
        $_SESSION['personnages'][$_POST['reference']] = $player;
        break;
    }
    case 'recommencer_partie':
    {
        session_destroy();
        break;
    }
    default:
    {
    }
}

header('Location: /quete');