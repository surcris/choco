<?php
session_start();
include './app/utils/connectBdd.php';
include './app/model/utilisateur.php';
include './app/manager/ManagerUtilisateur.php';



if (isset($_SESSION['key'])) {
    $message = "Vous êtes connecté";
}else{
    $message = "Vous êtes pas connecté";
}

include './app/vue/header.php';
include './app/vue/view_accueil.php';
include './app/vue/footer.php';
?>