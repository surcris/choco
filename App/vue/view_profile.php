<?php
if (isset($_SESSION['key'])) {
?>


    <div class="container">

        <div class="form-group">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group text-center">
                    <label>Nom</label>
                    <input type="text" id="nom" name="nom" pattern="^[a-zA-Z0-9]+$" class="form-control  my-2" placeholder="Nom" value="<?php echo isset($user) ? $user->getNom() : '' ?>" disabled>
                    <label>Prénom</label>
                    <input type="text" id="prenom" name="prenom" pattern="^[a-zA-Z0-9]+$" class="form-control  my-2" placeholder="Prénom" value="<?php echo isset($user) ? $user->getPrenom() : '' ?>" disabled>
                    <label>Email</label>
                    <input type="text" id="email" name="email" class="form-control  my-2" placeholder="Email" value="<?php echo isset($user) ? $user->getEmail() : '' ?>" disabled>
                    <label>Mot de passe</label>
                    <input type="password" id="mdp" name="mdp" class="form-control  my-2" placeholder="Mot de passe" value="<?php echo isset($user) ? $user->getPassword() : '' ?>" disabled>
                    <div class="col-md-12 text-center text-danger"><?php echo $message ?></div>
                </div>

                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-success my-2" name="send" >Valider</button>
                    
                </div>
            </form>
            <div class="col-md-12 text-center">
                <button id="modifButton" class="btn btn-primary my-2 text-center" onclick="disableInput()" >Activer</button>
            </div>
        </div>
    </div>


<?php
} else {
    header('Location:http://localhost/choco/404');
}
?>

<script>
    let etat = true;
    function disableInput() {
        etat = !etat;
        if (etat) {
            document.getElementById("modifButton").innerHTML = "Activer";
        }else{
            document.getElementById("modifButton").innerHTML = "Désactiver";
        }
        
        document.getElementById("nom").disabled = etat;
        document.getElementById("prenom").disabled = etat;
        document.getElementById("email").disabled = etat;
        document.getElementById("mdp").disabled = etat;
    }
</script>