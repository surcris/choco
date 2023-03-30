<?php
include './app/utils/connectBdd.php';
include './app/model/utilisateur.php';
include './app/manager/ManagerUtilisateur.php';
session_start();

$message = "";
if ($_SESSION['key']) {
    
}
        
    
include './app/vue/header.php';
include './app/vue/view_profile.php';
include './app/vue/footer.php';
?>