<?php
$hote = 'mysql-marchestp.alwaysdata.net';
$utilisateur = 'marchestp_';
$mdp = 'Conan13600_';
$nombdd = 'marchestp_bdd'; // Nom de la base de donnÃ©es
$bdd = new PDO("mysql:host=$hote;dbname=$nombdd", $utilisateur, $mdp);
?>

<!DOCTYPE html>
<html lang="fr">

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Inscription</title>
</head>

<body>

<body>
    <h1>Inscription</h1>

    
            <form action="bddinscription.php" method="POST">

                        <label for="pseudo">Pseudonyme :</label>
                        <input type="text" class="z-input" id="pseudo" placeholder="Votre pseudonyme" name="pseudo" value="<?php if(isset($pseudo))?>" required>


                        <label for="nom">Nom :</label>
                        <input type="text" class="z-input" id="nom" placeholder="Votre nom" name="nom" value="<?php if(isset($nom))?>" required>


                        <label for="prenom">Prénom :</label>
                        <input type="text" class="z-input" id="prenom" placeholder="Votre prénom" name="prenom" value="<?php if(isset($prenom))?>" required>


                        <label for="mail">Mail :</label>
                        <input type="email" class="z-input" id="mail" placeholder="Adresse mail" name="mail" value="<?php if(isset($mail))?>" required>


                        <label for="mdp">Mot de passe :</label>
                        <input type="password" class="z-input" id="mdp" placeholder="Mot de passe" name="mdp" value="<?php if(isset($mdp))?>" required>

                    <button type="submit" name="inscription" id="submit1">S'inscrire</button>
                    <a href="login.php">Retour</a>

            </form>

</body>

</html>
