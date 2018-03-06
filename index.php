<?php
include "includes/header.php";

echo "<h2>Ceci est le corps de mon index.php</h2>";

if (isset($_GET['page']))
    $page = $_GET['page'] != "" ? $_GET["page"] : "accueil";
else
    $page = "accueil";

$file = "./includes/" . $page . ".inc.php";
$files = glob("./includes/*.inc.php");

include in_array($file, $files) ? $file : "./includes/accueil.inc.php";

include "includes/footer.php";