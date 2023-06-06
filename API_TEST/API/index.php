<?php
require_once("./api.php");
//www.monsite.fr/plats => www.monsite.fr/index.php?demande=plats
//www.monsite.fr/plats/:ingrédiant (pomme de terre, tomate)
//www.monsite.fr/plat/:id (pomme de terre, tomate)
try{
    if (!empty($_GET['demande'])) {     //si j'ai bien reçu une demande faire un traitement spécifique
        $url = explode("/", filter_var($_GET['demande'], FILTER_SANITIZE_URL));
        switch($url[0]){
                case "plats":
                    if(empty($url[1])){ //si il n'y a pas d'ingrédiant
                        getPlat();

                    } else {            //si ingrédiant
                        getPlatByIngrediant($url[1]);
                    }
                break;
                case "plat":
                    if(!empty($url[1])) {
                    getPlatById($url[1]);
                    } else {
                        throw new Exception("Vous n'avez pas renseigné le numéro du plat");
                    }
                break;
                default : throw new Exception("La demande n'est pas valide, vérifiez l'url");      //si l'utilisateur ne demande pas "plat" ni "plats" alors indiquer qu'il c'est trompé
        }
    } else {    
        throw new Exception("Problème de récupération de données.");  //Si non
    }
}   catch(Exception $e){        //attrape l'erreur et l'affiche
    $erreur =[
        "message" => $e->getMessage(),
        "code_erreur" => $e->getCode()
    ];
    print_r($erreur);
}
