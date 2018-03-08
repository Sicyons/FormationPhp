<?php
include "./functions/classAutoLoader.php";

spl_autoload_register('classAutoLoader');

ini_set('smtp_port', 1025);
mail('aidenam@free.fr', 'Weed', 'Test de message');
?>
<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="utf-8"/>
        <title>Auxiblog</title>
        <link rel="stylesheet" href="assets/css/styles.css"/>
    </head>
    <body>
        <div id="container">
            <?php
            include "includes/header.php";
            ?>

            <main>
                <?php
                $file = "./includes/accueil.inc.php";
                if (isset($_GET['page'])) {
                    $page = $_GET['page'] != "" ? $_GET["page"] : "accueil";

                    $file = "./includes/" . $page . ".inc.php";

                    $files = glob("./includes/*.inc.php");
                    if (!in_array($file, $files)) $file = "./includes/accueil.inc.php";
                }

                include $file;
                ?>
            </main>

            <aside></aside>

            <?php
            include 'includes/footer.php';
            ?>
        </div>
    </body>
</html>
