<!-- partie affichage HTML -->
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/asset/style/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./Public/asset/style/index.css">
    <script src="./Public/asset/script/script.js" defer></script>
    
</head>

<body>
    <header>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="accueil">Accueil</a>
            </li>
            <?php
            if (!isset($_SESSION['mail'])) {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="inscription">Inscription</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="connexion">Connexion</a>
            </li>
            <?php
            } 
            ?>
            <?php
            if (isset($_SESSION['mail'])) {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="./profile">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./logout">Déconnexion</a>
            </li>
            <?php
            } 
            ?>
        </ul>
    </header>