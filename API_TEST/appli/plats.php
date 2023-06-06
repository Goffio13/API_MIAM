<?php
$plats = json_decode(file_get_contents("http://localhost/API_TEST/API/plats"));
ob_start();
?>


<table class="table">
    <tr>
        <td>Nom</td>
        <td>Pays création</td>
        <td>Calorie du plat</td>
        <td>Description du plat</td>
        <td>Nom de l'ingrédient</td>
        <td>Description de l'ingrédient</td>
        <td>Image de l'ingrédient</td>
        <td>Image du plat</td>
    </tr>
    <?php
     if ($plats !== null) {
        foreach ($plats as $plat) :
    ?>
           <tr>
           <td>Tomate Mozza </td>
           <td> Italie</td>
            <td>56 calories</td>
            <td>Un plat rafrichissant aux gouts d'Italie</td>
            <td>Tomate</td>
            <td> Un aliment rond, rouge et juteux</td>
            <td> tomate.jpg </td>
            <td>mozza.png</td>
       </tr>
    <?php endforeach; } ?>
</table>

<?php
$content = ob_get_clean();
require_once("template.php");
?>
