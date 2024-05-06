<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="containers">
        <fieldset>
            <h2>INSCRIPTION</h2>
            <hr>
            <form action="insertion.php" method="post">
                <div>
                    <label for="numEtudiant">Numero Etudiant: </label>
                    <input type="text" name="numEtudiant" required>
                </div>
                <div>
                    <label for="nom">Nom: </label>
                    <input type="text" name="nom" required>
                    <label for="age">age: </label>
                    <input type="number" name="age" id="age" min="0" required>
                </div>
                <div>
                    <label for="sexe">Sexe: </label>
                    <select name="sexe" id="sexe">
                        <option value="feminin">Féminin</option>
                        <option value="masculin">Masculin</option>
                    </select>
                    <label for="filiere">Filière: </label>
                    <select name="filiere" id="filiere">
                    <?php
                            $server = "localhost";
                            $user = "root";
                            $mdp = "";
                            $bdd = "ecole";

                            try {
                                $connexion = new PDO("mysql:host=$server;dbname=$bdd", $user, $mdp);
                            } catch (PDOException $e) {
                                echo "Erreur de connexion : " . $e->getMessage();
                            }

                            $sql = 'SELECT * FROM filiere ORDER BY libFil';

                            $req = $connexion->prepare($sql);
                            $req->execute();

                            $reqs = $req->fetchAll();

                            foreach ($reqs as $requet) {
                                echo '<option value="' . $requet['codFil'] . '"> ' . $requet['libFil'] . '</option>';
                            }
                            ?>
                    </select>
                </div>
                <div class="val">
                    <input type="reset" value="Annuler">
                    <input type="submit" value="Enrégistrer">
                </div>
            </form>
        </fieldset>
    </div>

    <div>

    <div>
        <h2>La liste des étudiants inscrits est :</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Numero etudiant</th>
                    <th>Nom</th>
                    <th>Age</th>
                    <th>Sexe</th>
                    <th>Filière</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $server = "localhost";
                $user = "root";
                $mdp = "";
                $bdd = "ecole";

                try {
                    $connexion = new PDO("mysql:host=$server;dbname=$bdd", $user, $mdp);
                } catch (PDOException $e) {
                    echo "Erreur de connexion : " . $e->getMessage();
                }

                
                $sql = 'SELECT * FROM etudiant JOIN filiere where etudiant.codFil = filiere.codFil';


                $req = $connexion->prepare($sql);
                $req->execute();
                $reqs = $req->fetchAll();

                $i=1;
                foreach ($reqs as $a) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $a['numEtudiant'] . "</td>";
                    echo "<td>" . $a['nom'] . "</td>";
                    echo "<td>" . $a['age'] . "</td>";
                    echo "<td>" . $a['sexe'] . "</td>";
                    echo "<td>" . $a['libFil'] . "</td>";
                    echo "</tr>";
                    $i=$i+1;
                }
                ?>
            </tbody>
        </table>
    </div>
    
    
</body>
</html>
