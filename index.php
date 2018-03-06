<?php
include "includes/header.php";

echo "<h2>Ceci est les corps de mon index.php</h2>";

if (isset($_GET['page']))
    $page = $_GET['page'] != "" ? $_GET["page"] : "accueil";
else
    $page = "accueil";

$file = "./includes/" . $page . ".inc.php";
$files = glob("./includes/*.inc.php");

if (in_array($file, $files)) include $file;

include "includes/footer.php";