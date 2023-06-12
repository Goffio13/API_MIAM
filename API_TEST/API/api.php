<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));

// Envoie des données à l'API
function getPlat()
{
    $pdo = getConnexion();
    $req = "SELECT p.nom, p.pays_creation, p.calories as 'plat_calorie', p.description_plat as 'plat_description', p.image as 'plat_image', i.nom as 'ingrédiant_nom', i.image as 'ingrédiant_img', i.description as 'ingrédiant_description'
    FROM plat p INNER JOIN ingrédiant i ON p.id_ingrédiant= i.id";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $plats = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupération des données plat
    $stmt->closeCursor();

    sendJSON($plats);

    // Log de l'appel à la fonction
    error_log("getPlat() called. URL: " . URL);
}

function getPlatByIngrediant($ingrediant)
{
    $pdo = getConnexion();
    $req = "SELECT p.nom, p.pays_creation, p.calories as 'plat_calorie', p.description_plat as 'plat_description', p.image as 'plat_image', i.nom as 'ingrédiant_nom', i.image as 'ingrédiant_img', i.description as 'ingrédiant_description'
    FROM plat p INNER JOIN ingrédiant i ON p.id_ingrédiant= i.id
    WHERE i.nom = :ingrediant";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":ingrediant", $ingrediant, PDO::PARAM_STR);
    $stmt->execute();
    $plats = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupération des données plat
    $stmt->closeCursor();

    sendJSON($plats);

    // Log de l'appel à la fonction
    error_log("getPlatByIngrediant() called. Ingredient: " . $ingrediant . " URL: " . URL);
}

function getPlatById($id)
{
    $pdo = getConnexion();
    $req = "SELECT p.id_plat, p.nom, p.pays_creation, p.calories as 'plat_calorie', p.description_plat as 'plat_description', p.image as 'plat_image', i.nom as 'ingrédiant_nom', i.image as 'ingrédiant_img', i.description as 'ingrédiant_description'
    FROM plat p INNER JOIN ingrédiant i ON p.id_ingrédiant= i.id
    WHERE p.id_plat = :id";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $plats = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupération des données plat
    $stmt->closeCursor();

    sendJSON($plats);

    // Log de l'appel à la fonction
    error_log("getPlatById() called. ID: " . $id . " URL: " . URL);
}

function getConnexion()
{
    return new PDO("mysql:host=mysql-marchestp.alwaysdata.net;dbname=marchestp_bdd;", "marchestp_", "Conan13600_");
}

function sendJSON($infos)
{
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($infos, JSON_UNESCAPED_UNICODE);
}

