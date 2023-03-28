<!-- partie affichage HTML -->
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Public/asset/style/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Public/asset/style/index.css">
    <script src="../../Public/asset/script/script.js" defer></script>
    <title>Inscription</title>
</head>

<body>
    <header></header>
    <div class="login">
        <div class="form-group">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group text-center">
                    <label>Nom</label>
                    <input type="text" name="nom" pattern="^[a-zA-Z0-9]+$" class="form-control  my-2"  placeholder="Nom">
                    <label>Prénom</label>
                    <input type="text" name="prenom" pattern="^[a-zA-Z0-9]+$" class="form-control  my-2"  placeholder="Prénom">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control  my-2"  placeholder="Email">
                    <label>Mot de passe</label>
                    <input type="password" name="mdp" class="form-control  my-2"  placeholder="Mot de passe">
                    <label>Image</label>
                    <input type="file" name="fichier" class="form-control  my-2" >
                    <!-- <div><?php echo $message?></div> -->
                </div>

                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary my-2" name="send" value="Valider">Valider</button>
                </div>
                
            </form>
        </div>
    </div>

    <footer></footer>
</body>

</html>