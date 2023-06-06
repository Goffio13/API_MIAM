<?php
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
"://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));

//envoie des données à l'API
function getPlat() {
    $pdo = getConnexion();
    $req = "SELECT p.nom, p.pays_creation, p.calories as 'plat calorie', p.description_plat as 'plat_description', p.image as 'plat_image', i.nom as'ingrédiant_nom', i.image as 'ingrédiant_img', i.description
    FROM plat p INNER JOIN ingrédiant i ON p.id_ingrédiant= i.id;";
    $stmt = $pdo -> prepare($req);
    $stmt-> execute();
    $plats = $stmt-> fetchAll(PDO::FETCH_ASSOC); //récup donnée plat
    $stmt->closeCursor();
    print_r($plats);
    sendJSON($plats);

}

function getPlatByIngrediant($ingrediant) {
    $pdo = getConnexion();
    $req = "SELECT p.nom, p.pays_creation, p.calories as 'plat calorie', p.description_plat as 'plat_description', p.image as 'plat_image', i.nom as'ingrédiant_nom', i.image as 'ingrédiant_img', i.description
    FROM plat p INNER JOIN ingrédiant i ON p.id_ingrédiant= i.id
    where i.nom = :ingrediant";
    $stmt = $pdo -> prepare($req);
    $stmt-> bindValue(":ingrediant", $ingrediant, PDO::PARAM_STR);
    $stmt-> execute();
    $plats = $stmt-> fetchAll(PDO::FETCH_ASSOC); //récup donnée plat
    $stmt->closeCursor();
    print_r($plats);
    sendJSON($plats);
}

function getPlatById($id){
    $pdo = getConnexion();
    $req = "SELECT p.id_plat, p.nom, p.pays_creation, p.calories as 'plat calorie', p.description_plat as 'plat_description', p.image as 'plat_image', i.nom as'ingrédiant_nom', i.image as 'ingrédiant_img', i.description
    FROM plat p INNER JOIN ingrédiant i ON p.id_ingrédiant= i.id
    WHERE p.id_plat = :id";
    $stmt = $pdo -> prepare($req);
    $stmt-> bindValue(":id", $id, PDO::PARAM_INT);
    $stmt-> execute();
    $plats = $stmt-> fetchAll(PDO::FETCH_ASSOC); //récup donnée plat
    $stmt->closeCursor();
    print_r($plats);
    sendJSON($plats);
}

function getConnexion(){
    return new PDO("mysql:host=mysql-goffi.alwaysdata.net;dbname=goffi_api;","goffi","Conan13600_");
}

function sendJSON($infos){
    header("Acces-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($infos, JSON_UNESCAPED_UNICODE);
}