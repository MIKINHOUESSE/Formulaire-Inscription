<?php

$server = "localhost";
$user = "root";
$mdp = "";
$bdd = "ecole";

try {
    $connexion = new PDO("mysql:host=$server;dbname=$bdd", $user, $mdp);

    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion à la base de données réussie";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

$tableFilier = ["Mathématique Fondamentale (L3)", "Mathématique Fondamentale (M1)", "Mathématique Fondamentale (M2)", "Informatique (L3)", "Informatique (M1)", "Informatique (M2)", "Physique (L3)", "Physique (M1)", "Physique (M2)", "Recherche Opérationnelle (M1)", "Recherche Opérationnelle (M2)"];

$taille = count($tableFilier);
$sql = "INSERT INTO filiere (libFil) VALUES (?)";
$stmt = $connexion->prepare($sql);

for ($i = 0; $i < $taille; $i++) {
    try {
        $stmt->execute([$tableFilier[$i]]);
        echo "Données insérées avec succès.";
    } catch (PDOException $e) {
        echo "Erreur d'insertion : " . $e->getMessage();
    }
}