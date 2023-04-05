<?php 
include './App/model/utilisateur.php';
include './App/manager/ManagerUtilisateur.php';
class ApiUtilisateur extends ManagerUtilisateur{
    public function addUser(){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header('Content Type: application/json');

        echo json_encode(['erreur : '=>'Bienvenue sur chocoblast']);
    }
}


?>