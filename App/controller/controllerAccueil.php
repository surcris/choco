<?php

//include './app/utils/connectBdd.php';
//include './app/model/utilisateur.php';
//include './app/manager/ManagerUtilisateur.php';



if (isset($_SESSION['mail'])) {
    $message = "Vous êtes connecté";
}else{
    $message = "Vous êtes pas connecté";
}


include './app/vue/view_accueil.php';

?>