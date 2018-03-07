<h1>INSCRIPTION</h1>

<?php
if (isset($_POST['frmInscription'])) {
    $nom = $_POST['nom'] ?? "";
    $prenom = $_POST['prenom'] ?? "";
    $mail = $_POST['mail'] ?? "";
    $mdp = $_POST['mdp'] ?? "";

    $erreurs = array();

    if ($nom == "") array_push($erreurs, "Merci de saisir un nom S.V.P");
    if ($prenom == "") array_push($erreurs, "Merci de saisir un prénom S.V.P");
    if ($mail == "") array_push($erreurs, "Merci de saisir une adresse mail S.V.P");
    if ($mdp == "") array_push($erreurs, "Merci de saisir une mot de passe S.V.P");

    if (count($erreurs) > 0) {
        $messageErreurs = "<div class='ErrorSection'>";
        $messageErreurs .= "<span id='ErrorTitle'>ERREURS !</span>";
        $messageErreurs .= "<ul>";
        for ($iCounter = 0; $iCounter < count($erreurs); $iCounter++) {
            $messageErreurs .= "<li>";
            $messageErreurs .= $erreurs[$iCounter];
            $messageErreurs .= "</li>";
        }
        $messageErreurs .= "</ul>";
        $messageErreurs .= "</div>";

        echo $messageErreurs;

        include "frmInscription.inc.php";
    } else {
        // insert in database
    }
} else {
    include "frmInscription.inc.php";
}
?>