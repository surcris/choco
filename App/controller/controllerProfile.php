<?php
// include './app/utils/connectBdd.php';
// include './app/model/utilisateur.php';
// include './app/manager/ManagerUtilisateur.php';




$message = "";
if (isset($_SESSION['mail'])) {
    $user = new ManagerUtilisateur('','',$_SESSION['mail'],'');
    if ($user->getUserByMail()) {
        $user->setNom($user->getUserByMail()[0]["nom_utilisateur"]);
        $user->setPrenom($user->getUserByMail()[0]["prenom_utilisateur"]);
        $user->setEmail($user->getUserByMail()[0]["mail_utilisateur"]);
        $user->setPassword($user->getUserByMail()[0]["password_utilisateur"]);

    }else{
        $message = "Erreur de l'id";
    }
}

if (isset($_POST['send'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (!empty($_POST['nom'])) {

        if (!empty($_POST['prenom'])) {

            if (!empty($_POST['email']) && $email !== false) {

                if (!empty($_POST['mdp'])) {

                    $nom = htmlEntities(strip_tags($_POST['nom']), ENT_QUOTES);
                    $prenom = htmlEntities(strip_tags($_POST['prenom']), ENT_QUOTES);
                    $mdp = htmlEntities(strip_tags($_POST['mdp']), ENT_QUOTES);
                    

                    $user = new ManagerUtilisateur($nom, $prenom, $email, $mdp);
                    $user->updateUserByMail($_SESSION['mail']);
                    $_SESSION['mail'] = $email;
                } else {
                    $message = 'Veuillez remplir mdp';
                }
            } else {
                $message = 'Veuillez remplir email';
            }
        } else {
            $message = 'Veuillez remplir prenom';
        }
    } else {
        $message = 'Veuillez remplir nom';
    }
}


        
    

include './App/vue/view_profile.php';

?>