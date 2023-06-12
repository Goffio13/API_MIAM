<?php
$formation = json_decode(file_get_contents("http://dev.h2prog.com/API_TEST/formation/".$_GET['numero']));
ob_start();
?>
<h1>Formation : <?= $formation->libelle ?> - <?= $formation->categorie ?></h1>
<img src="<?= $formation->image ?>" width="400px;" />
<div>
    <?= $formation->description ?>
</div>

<?php
$content = ob_get_clean();
require_once("template.php");