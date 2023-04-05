<?php
// include './app/utils/connectBdd.php';
// include './app/model/utilisateur.php';
// include './app/manager/ManagerUtilisateur.php';

function nettoyer($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

$message = "";
if (isset($_POST['send'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);


    if (!empty($_POST['email']) && $email !== false) {

        if (!empty($_POST['mdp'])) {
            
            $mdp = nettoyer($_POST['mdp']);
            $email = nettoyer($_POST['email']);
            
            //initialisation de l'utilisateur
            $user = new ManagerUtilisateur('', '', $email, $mdp);

            
            if ($user->getUserByMail()) {

                //var_dump($user->getUserByMail()[0]["password_utilisateur"]);
                //$message = $user->getUserByMail()[0]["password_utilisateur"];
                if (password_verify($mdp, $user->getUserByMail()[0]["password_utilisateur"])) {
                    $message = "Mot de passe correct";
                    
                    $_SESSION['mail'] = $user->getUserByMail()[0]["mail_utilisateur"];
                   
                    header('Location:http://localhost/choco/accueil');
                } else {
                    $message = "Information incorrect";
                }
            } else {

              
            }
        } else {
            $message = 'Veuillez remplir le mot de passe';
        }
    } else {
        $message = 'Veuillez remplir email';
    }
} else {
    //echo 'Veuillez remplir tout les champs';
}
        
    

include './app/vue/view_connexion.php';

?>