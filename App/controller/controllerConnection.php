<?php
include '../utils/connectBdd.php';
include '../model/utilisateur.php';
include '../manager/ManagerUtilisateur.php';


if (isset($_POST['send'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if (!empty($_POST['email']) && $email !== false) {

        if (!empty($_POST['mdp'])) {

            $mdp = htmlEntities(strip_tags($_POST['mdp']), ENT_QUOTES);
            
            //$message = $nom . " " . $prenom . " " . $email . " a été ajouter";
            //initialisation de l'utilisateur
            $user = new ManagerUtilisateur('', '', $email, $mdp);

            
            if ($user->getUserByMail()) {

                //var_dump($user->getUserByMail()[0]["password_utilisateur"]);
                //$message = $user->getUserByMail()[0]["password_utilisateur"];
                if (password_verify($mdp, $user->getUserByMail()[0]["password_utilisateur"])) {
                    $message = "Mot de passe correct";
                } else {
                    $message = "Mot de passe incorrect";
                }
            } else {

              
            }
        } else {
            $message = 'Veuillez remplir mdp';
        }
    } else {
        $message = 'Veuillez remplir email';
    }
} else {
    //echo 'Veuillez remplir tout les champs';
}
        
    
include '../vue/header.php';
include '../vue/view_connection.php';
include '../vue/footer.php';
?>