<?php
// Importer le fichier contenant les fonctions de connexion
require_once 'API/api.php';

// Fonction de test pour la connexion à la base de données
function testConnexion() {
    // Appeler la fonction à tester
    $bdd = getConnexion();

    // Vérifier si la connexion est réussie en utilisant une assertion
    assert($bdd instanceof PDO); // Vérifier si l'objet retourné est une instance de PDO

    // Vérifier d'autres aspects de la connexion
    $pdoAttr = $bdd->getAttribute(PDO::ATTR_CONNECTION_STATUS);
    assert($pdoAttr !== false); // Vérifier si la récupération de l'attribut de statut de connexion fonctionne

    echo "Test de connexion réussi !";
}

// Exécuter le test
testConnexion();
?>
