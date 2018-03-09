<h1>INSCRIPTION</h1>

<?php
if (isset($_POST['frmLogin'])) {
    $mail = $_POST['mail'] ?? "";

    $erreurs = array();

    if ($mail == "") array_push($erreurs, "Merci de saisir une adresse mail S.V.P");

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

        include "frmLogin.inc.php";
    } else {
        $requete = new Requetes();

        $sql = "SELECT * FROM t_users WHERE usemail='$mail' and usemailconfirm=1";

        $results = $requete->select($sql);
        if ($results->rowCount() == 0){
            $messageErreurs = "<div class='ErrorSection'>";
            $messageErreurs .= "<span id='ErrorTitle'>ERREURS !</span>";
            $messageErreurs .= "<div>Aucun utilisateur correspondant n'a été trouvé.</div>";
            $messageErreurs .= "</div>";

            echo $messageErreurs;
        }
    }
} else {
    include "frmLogin.inc.php";
}