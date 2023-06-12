<?php
$plats = json_decode(file_get_contents("http://marchestp.alwaysdata.net/plats/".$_GET['nom']));


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
           <td><?= $plat->nom ?> </td>
           <td><?= $plat->pays_creation ?></td>
            <td><?= $plat->plat_calorie?></td>
            <td><?= $plat-> plat_description ?></td>
            <td><?= $plat-> ingrédiant_nom ?></td>
            <td><?= $plat-> ingrédiant_description ?></td>
            <td> <img src="<?=$plat -> plat_image ?>" width="100px;" /></td>
            <td> <img src="<?=$plat -> ingrédiant_image ?>" width="100px;" /></td>
       </tr>
    <?php endforeach; } ?>
</table>

<?php
$content = ob_get_clean();
require_once("template.php");
?>
