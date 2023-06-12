<?php
session_start();
$hote = 'mysql-marchestp.alwaysdata.net';
$utilisateur = 'marchestp_';
$mdp = 'Conan13600_';
$nombdd = 'marchestp_bdd'; // Nom de la base de donnÃ©es
$bdd = new PDO("mysql:host=$hote;dbname=$nombdd", $utilisateur, $mdp);

if (isset($_POST['inscription'])) {
    if (!empty($_POST['pseudo']) and !empty($_POST['mdp'])) {
        $username = htmlspecialchars($_POST['pseudo']);;
        $password = htmlspecialchars($_POST['mdp']) ;;
        $mail = htmlspecialchars($_POST['mail']);;
        $prenom = htmlspecialchars($_POST['prenom']);;
        $nom = htmlspecialchars($_POST['nom']);;



        $insertUser = $bdd->prepare("INSERT INTO utilisateur(pseudo, mdp,nom,prenom, email) VALUES (?,?,?,?,?)");
        $insertUser->bindParam(1, $username);
        $insertUser->bindParam(2, $password);
        $insertUser->bindParam(3, $nom);
        $insertUser->bindParam(4, $prenom);
        $insertUser->bindParam(5, $mail);
        $insertUser->execute();

        echo "Utilisateur créé";
        header("Location: login.php");
        exit();
        //header("Location: https://apimiam.alwaysdata.net/login.php");
    } else {
        echo "Veuillez compléter les champs";
    }
}
?>