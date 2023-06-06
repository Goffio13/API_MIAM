<?php
ob_start();
?>
<h1> Bienvenu sur un site qui liste les différents plats afin de gagner du temps </h1>

<?php
$content = ob_get_clean();
require_once("template.php");
?>