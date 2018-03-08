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
            $lastId = $requete->getLastId();
            $lastId = hash('sha256', $lastId);

            $messageMail = "<h1>Confirmation compte</h1>";
            $messageMail.="<p>Pour confirmer votre compte, cliquez ici S.V.P.</p>";
            $messageMail.="<div><a href='http://localhost/auxitec2/index.php?page=validationInscription&mail=$mail&id=$lastId'>Validation mail</a></div>";
            ini_set('smtp_port', 1025);
            mail($mail, 'Confirmation compte', $messageMail);

            $messageValidation = "<div class='Section'>";
            $messageValidation .= "<div id='SectionTitle'>OK</div>";
            $messageValidation .= "<div>" . $nom . " " . $prenom . " a bien été enregistré et nécessite une validation</div>";
            $messageValidation .= "</div>";

            echo $messageValidation;
        } else {
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