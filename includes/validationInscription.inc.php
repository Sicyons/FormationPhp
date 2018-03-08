<h1>VALIDATION INSCRIPTION</h1>

<?php
if (isset($_GET['mail']) && isset($GET['id'])) {

    $HashedId = $_REQUEST["id"];
    echo "<div>mail=" . $_REQUEST["mail"] . "</div>";
    echo "<div>Id: $HashedId</div>";

    $requete = new Requetes();

    $result = $requete->update("UPDATE T_Users SET usemailconfirm=1 WHERE SHA2(Id_users,256)='$HashedId'");

    echo "<div>$result utilisateurs validés</div>";
}