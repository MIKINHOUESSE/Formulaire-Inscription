<?php

$server = "localhost";
$user = "root";
$mdp = "";
$bdd = "ecole";

$url = '/';
try {
    $connexion = new PDO("mysql:host=$server;dbname=$bdd", $user, $mdp);

    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion à la base de données réussie";
    header('location: '.$url, true, $statusCode = 302);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}


$sql = "INSERT INTO etudiant (numEtudiant, nom, age, sexe, codFil) VALUES (?, ?, ?, ?, ?)";
$stmt = $connexion->prepare($sql);

$numEtudiant = $_POST['numEtudiant'];
$nom = $_POST['nom'];
$age = $_POST['age'];
$sexe = $_POST['sexe'];
$filiere = $_POST['filiere'];

try {
    $stmt->execute([$numEtudiant, $nom, $age, $sexe, $filiere]);
    echo "Données insérées avec succès.";
} catch (PDOException $e) {
    echo "Erreur d'insertion : " . $e->getMessage();
}
