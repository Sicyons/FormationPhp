<form method="post" action="#">
    <div>
        <label for="nom">Nom : </label>
        <input type="text" name="nom" />
    </div>
    <div>
        <label for="prenom">Prénom : </label>
        <input type="text" name="prenom" />
    </div>
    <div>
        <label for="mail">Mail : </label>
        <input type="text" name="mail" />
    </div>
    <div>
        <label for="mdp">Mot de passe : </label>
        <input type="text" name="mdp" />
    </div>

    <div id="FormValidation">
        <input class="btnForm btnDelete" type="reset" value="EFFACER" />
        <input class="btnForm btnValidate" type="submit" value="VALIDER" />
    </div>

    <input type="hidden" name="frmInscription" />
</form>