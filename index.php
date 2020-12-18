<?php
include 'Joueur.php';
include 'Etat.php';
include 'Vivant.php';
include 'Mort.php';
include 'Empoisonne.php';
include 'Equipe.php';
include 'Quete.php';

//Créer les variables de session si elles n'existent pas
session_start();

if (!isset($_SESSION['personnages'])) {
    $_SESSION['personnages'] = array();
}
if (!isset($_SESSION['quetes'])) {
    $_SESSION['quetes'] = array();
}
if (!isset($_SESSION['quetes_disponibles'])) {
    $_SESSION['quetes_disponibles'] = [
        ["nom" => "Sauver Billy", "description" => "C'est très simple", "recompense" => "100"],
        ["nom" => "Tuer le dragon de feu", "description" => "C'est très dur", "recompense" => "10000"],
        ["nom" => "Cueillir des fleurs", "description" => "C'est moyennement dur", "recompense" => "1000"]
    ];
}

echo "<br><br>Session : ";
print_r($_SESSION);
echo "<br><br>";
?>

<link href="style.css" rel="stylesheet">

<h1>Nom de l'équipe</h1>
<?php
if (!empty($_SESSION['equipe'])) {
    echo "<p class='gras'>" . $_SESSION['equipe']->nom . "</p>";
    foreach ($_SESSION['equipe']->joueurs as $key => $joueur) {
        echo "<p>-" . $joueur->nom . "</p>";
    }
} else {
    echo "Vide";
}
?>

<h1>Liste des joueurs</h1>
<?php
if (!empty($_SESSION['personnages'])) {
    foreach ($_SESSION['personnages'] as $key => $joueur) {
        ?>
        <div class="joueur">
            <p class="gras">Nom : <?php echo $joueur->nom ?></p>
            <p>Niveau : <?php echo $joueur->niveau ?></p>
            <p>XP : <?php echo $joueur->xp ?></p>
            <p>PV : <?php echo $joueur->pv ?></p>
            <p>Attaque : <?php echo $joueur->attaque ?></p>
            <p>Etat : <?php echo $joueur->etat->getNom() ?></p>
            <form action="Controller.php" method="post">
                <input type="hidden" name="action" value="change_etat">
                <input type="hidden" name="reference" value="<?php echo $key ?>">
                <select name="etat">
                    <option value="1">Vivant</option>
                    <option value="2">Mort</option>
                    <option value="3">Empoisonné</option>
                </select>
                <input type="submit" value="Changer d'état">
            </form>
        </div>
        <?php
    }
} else {
    echo "Vide";
}
?>

<h1>Liste des quêtes</h1>
<?php
if (!empty($_SESSION['quetes'])) {
    foreach ($_SESSION['quetes'] as $key => $quete) {
        ?>
        <p>-<?php echo $quete->nom ?></p>
        <form action="Controller.php" method="post">
            <input type="hidden" name="action" value="fini_quete">
            <input type="hidden" name="reference" value="<?php echo $key ?>">
            <input type="submit" value="Finir la quête">
        </form>
        <?php
    }
} else {
    echo "Vide";
}
?>

<form action="Controller.php" method="post">
    <input type="hidden" name="action" value="creer_personnage">
    <h1>Créer un personnage</h1>
    <label>Nom : <input required name="nom" type="text"></label>
    <label>PV : <input required name="pv" type="text"></label>
    <label>Attaque : <input required name="attaque" type="text"></label>
    <input type="submit" value="Créer">
</form>

<form action="Controller.php" method="post">
    <input type="hidden" name="action" value="creer_equipe">
    <h1>Créer une équipe</h1>
    <label>Nom : <input required name="nom_equipe" type="text"></label>
    <input type="submit" value="Créer">
</form>

<form action="Controller.php" method="post">
    <input type="hidden" name="action" value="choisir_quete">
    <h1>Choisir une quête</h1>
    <?php
    if (!empty($_SESSION['quetes_disponibles'])) {
        ?>
        <select name="quete" required>
            <?php
            foreach ($_SESSION['quetes_disponibles'] as $key => $quest) {
                echo "<option value='" . $key . "'>" . $quest["nom"] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Choisir">
        <?php
    } else {
        echo "Vide";
    }
    ?>
</form>

<form action="Controller.php" method="post">
    <input type="hidden" name="action" value="recommencer_partie">
    <h1>Nouvelle partie</h1>
    <input type="submit" value="Recommencer une partie">
</form>