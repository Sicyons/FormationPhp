<h1>VALIDATION INSCRIPTION</h1>

<?php
if (isset($_GET['mail']) && isset($_GET['id'])) {
    $mail = $_GET["mail"];
    $hashedId = $_GET["id"];

    $requete = new Requetes();
    $sql = "UPDATE T_Users SET usemailconfirm=1 WHERE SHA2(Id_users,256)='$hashedId'";

    $result = $requete->update($sql);

    if ($result == 1) {
        $messageValidation = "<div class='ValidationSection'>";
        $messageValidation .= "<div id='ValidationTitle'>OK</div>";
        $messageValidation .= "<div>" . $mail . " a bien été validé</div>";
        $messageValidation .= "</div>";

        echo $messageValidation;
    }
    else {
        $messageErreur = "<div class='ErrorSection'>";
        $messageErreur .= "<div id='ErrorTitle'>ERREUR</div>";
        $messageErreur .= "<div>" . $mail . " n'a pu être validé</div>";
        $messageErreur .= "</div>";

        echo $messageErreur;
    }
}