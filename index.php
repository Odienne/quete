<?php
//Créer les variables de session si elles n'existent pas
session_start();
if(!isset($_SESSION['personnages'])){
    $_SESSION['personnages'] = array();
}
if(!isset($_SESSION['quetes'])){
    $_SESSION['quetes'] = array();
}
if(!isset($_SESSION['quetes_disponibles'])){
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

<form action="Controller.php" method="post">
    <input type="hidden" name="action" value="creer_personnage">
    <h1>Créer un personnage</h1>
    <label>Nom : <input name="nom" type="text"></label>
    <label>PV : <input name="pv" type="text"></label>
    <label>Attaque : <input name="attaque" type="text"></label>
    <input type="submit" value="Créer">
</form>

<form action="Controller.php" method="post">
    <input type="hidden" name="action" value="choisir_quete">
    <h1>Choisir une quête</h1>
    <select name="quete">
        <?php
        foreach($_SESSION['quetes_disponibles'] as $key => $quest){
            echo "<option value='".$key."'>".$quest["nom"]."</option>";
        }
        ?>
    </select>
    <input type="submit" value="Choisir">
</form>

<form action="Controller.php" method="post">
    <input type="hidden" name="action" value="new_game">
    <h1>Nouvelle partie</h1>
    <input type="submit" value="Recommencer une partie">
</form>