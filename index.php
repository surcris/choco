<?php
// include './App/utils/connectBdd.php';
// include './App/manager/ManagerUtilisateur.php';
// include './App/model/utilisateur.php';
// include './App/Api/apiUtilisateur.php';


// $api = new ApiUtilisateur('','','','');
// $managerUser = new ManagerUtilisateur('','','','');
// $utilisateur = new Utilisateur('','','','');
// $connectBdd = new ConnectBdd();


//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';
/*--------------------------ROUTER -----------------------------*/
//test de la valeur $path dans l'URL et import de la ressource
switch ($path) {
        //route /projet/inscription -> ./app/controller/controllerAddUser.php
    case $path === "/choco/inscription":
        include './app/controller/controllerAddUser.php';
        break;
        //route /projet/connexion -> ./app/controller/controllerConnexion.php
    case $path === "/choco/connexion":
        include './app/controller/controllerConnexion.php';
        break;
        //route /projet/accueil -> ./app/controller/controllerAccueil.php
    case $path === "/choco/accueil" or $path === "/choco/":
        include './app/controller/controllerAccueil.php';
        break;
    case $path === "/choco/profile" :
        include './app/controller/controllerProfile.php';
        break;
    default:
        include './app/controller/controller404.php';
}
?> 
