<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connexion à la base de données
    $hote = 'mysql-marchestp.alwaysdata.net';
    $utilisateur = 'marchestp_';
    $mdp = 'Conan13600_';
    $nombdd = 'marchestp_bdd'; // Nom de la base de données

    try {
        $bdd = new PDO("mysql:host=$hote;dbname=$nombdd;charset=utf8", $utilisateur, $mdp);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour vérifier les informations d'identification
        $requete = $bdd->prepare("SELECT * FROM utilisateur WHERE pseudo = ?");
        $requete->execute([$username]);
        $user = $requete->fetch(PDO::FETCH_ASSOC);


        if ($user) {
            $hashedPassword = $user['mdp']; // Récupérer le mot de passe haché de la base de données
            // Appliquez le même processus de hachage sur le mot de passe fourni par l'utilisateur
            $hashedInputPassword = hash('sha256', $password); 
            // Comparez les mots de passe hashés
            $isPasswordCorrect = $hashedInputPassword === $hashedPassword;


            // Comparer le mot de passe fourni par l'utilisateur avec le mot de passe haché
            if ($isPasswordCorrect) {
                // Les informations d'identification sont correctes, l'utilisateur est connecté
                $_SESSION['username'] = $user['pseudo'];
                $_SESSION['logged_in'] = true;
                header('Location: index.php');
                exit();
            } else {
                // Mot de passe incorrect
                $erreur = "Mot de passe incorrect";
                echo($erreur);
                exit();
            }
        } else {
            // Utilisateur non trouvé
            $erreur = "Utilisateur non trouvé";
            echo($erreur);
            exit();
        }
    } catch (PDOException $e) {
        $erreur = "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <h1>Connexion</h1>
    <?php if (isset($erreur)) : ?>
        <p><?php echo $erreur; ?></p>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <label for="username">Pseudonyme :</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>

    <a href="inscription.php">Inscription</a>
</body>

</html>
