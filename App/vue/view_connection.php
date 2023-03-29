<?php 
    include '../vue/header.php';
    include '../vue/footer.php';
    $message = "";
?>

<div class="login">
        <div class="form-group">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group text-center">
                    
                    <label>Email</label>
                    <input type="text" name="email" class="form-control  my-2"  placeholder="Email">
                    <label>Mot de passe</label>
                    <input type="password" name="mdp" class="form-control  my-2"  placeholder="Mot de passe">
                    <!-- <div><?php echo $message?></div> -->
                </div>

                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary my-2" name="send" value="Valider">Valider</button>
                </div>
                <div class="col-md-12 text-center">
                    <a href="../controller/controllerAddUser.php" title="About Us"><small class="form-text text-muted text-center">Inscription</small></a>
                </div>
                <div><?php echo $message?></div>
            </form>
        </div>
    </div>
