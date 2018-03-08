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
        $requete = new Requetes();
        $mdp = sha1($mdp);
        $nom = strtoupper($nom);

        $sql = "INSERT INTO T_Users (Id_users, usenom, useprenom, usemail, usepassword, id_groupes) VALUES (NULL, '$nom', '$prenom', '$mail', '$mdp', 1)";

        if ($requete->insert($sql)) {
            $messageValidation = "<div class='Section'>";
            $messageValidation .= "<div id='SectionTitle'>OK</div>";
            $messageValidation .= "<div>" . $nom . " " . $prenom . " a bien été inscrit</div>";
            $messageValidation .= "</div>";

            echo $messageValidation;
        }
        else {
            Log::logWrite("Erreur inscription [" . $sql . "]");

            $messageErreurs = "<div class='ErrorSection'>";
            $messageErreurs .= "<div id='ErrorTitle'>ERREUR !</div>";
            $messageErreurs .= "<div>" . $nom . " " . $prenom . " n'a pas été inscrit</div>";
            $messageErreurs .= "</div>";

            echo $messageErreurs;
        }

        include "frmInscription.inc.php";
    }
} else {
    include "frmInscription.inc.php";
}
?>