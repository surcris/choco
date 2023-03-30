<?php
if (isset($_SESSION['key'])) {
?>

    
    <div class="container">
    
        <div class="form-group">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group text-center">
                    <label>Nom</label>
                    <input type="text" name="nom" pattern="^[a-zA-Z0-9]+$" class="form-control  my-2"  placeholder="Nom" value="<?php echo isset($user) ? $user->getNom() : ''?>">
                    <label>Prénom</label>
                    <input type="text" name="prenom" pattern="^[a-zA-Z0-9]+$" class="form-control  my-2"  placeholder="Prénom" value="<?php echo isset($user) ? $user->getPrenom() : ''?>">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control  my-2"  placeholder="Email" value="<?php echo isset($user) ? $user->getEmail() : ''?>">
                    <label>Mot de passe</label>
                    <input type="password" name="mdp" class="form-control  my-2"  placeholder="Mot de passe" value="<?php echo isset($user) ? $user->getPassword() : ''?>">
                    <div class="col-md-12 text-center text-danger"><?php echo $message ?></div>
                </div>

                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary my-2" name="send" value="Valider">Valider</button>
                </div>
                

            </form>
        </div>
    </div>

<?php
} else {
    header('Location:http://localhost/choco/404');
}
?>