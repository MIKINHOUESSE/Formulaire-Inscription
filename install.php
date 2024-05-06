<?php
$server = "localhost";
$user = "root";
$mdp = "";
$bdd = "ecole";

try{
    $connexion = new PDO("mysql:host=$server;dbname=$bdd", $user,$mdp);
    echo"Connexion correcte";
}catch(PDOException $e)
{
    echo"Erreur : ".$e->getMessage();
}

$sql="
    CREATE TABLE IF NOT EXISTS filiere(codFil INT AUTO_INCREMENT PRIMARY KEY, libFil varchar(255));
    CREATE TABLE IF NOT EXISTS etudiant(id INT AUTO_INCREMENT PRIMARY KEY, numEtudiant varchar(2200) NOT NULL, nom varchar(256) NOT NULL, age INT NOT NULL, sexe varchar(100) NOT NULL, codFil INT, FOREIGN KEY (codFil) REFERENCES filiere(codFil));
";
try {
    $connexion->exec($sql);
    echo "Table crée avec succès";
} catch (PDOException $e) {
    echo "Erreur : ".$e->getMessage();
}
?>