<?php
// include './app/utils/connectBdd.php';
// include './app/model/utilisateur.php';
// include './app/manager/ManagerUtilisateur.php';

$message = "";

function nettoyer($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

if (isset($_POST['send'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (!empty($_POST['nom']) ){

        if (!empty($_POST['prenom'])) {
            
            if (!empty($_POST['email']) && $email !== false) {
                
                if (!empty($_POST['mdp'])) {
                    
                    if ($_FILES['fichier']['tmp_name']) {
                        
                        $nom = nettoyer($_POST['nom']);
                        $prenom = nettoyer($_POST['prenom']);
                        $mdp = nettoyer($_POST['mdp']);
                        $email = nettoyer($_POST['email']);
                        
                        $fichier = $_FILES['fichier'];
                        $message = $nom . " " . $prenom . " " . $email." a été ajouter";
                        //initialisation de l'utilisateur
                        $user = new ManagerUtilisateur($nom,$prenom,$email,$mdp);
                        

                        $destination = '../../Public/asset/images/';
                        $user->setImage($destination.$_FILES['fichier']['name']);
                        if($user->getUserByMail()){
                            $message = "Cette utilisateur existe déjà.";
                        }else{
                            
                            //ajouter en BDD
                            $user->insertUser();
                            //addUser($bddChocoblast->getBdd(), $nom, $prenom, $email,$mdp,$fichier);
                            //import de l'image
                            move_uploaded_file($_FILES['fichier']['tmp_name'], $destination.$_FILES['fichier']['name']);
                            //afficher une confirmation d'ajout
                            $message = $nom . " " . $prenom . " " . $email." a été ajouter";
                        }
                        
                    }else {
                        
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $email = $_POST['email'];
                        $mdp = $_POST['mdp'];
                        //initialisation de l'utilisateur
                        $user = new ManagerUtilisateur($nom,$prenom,$email,$mdp);
                        if($user->getUserByMail()){
                            $message = "Cette utilisateur existe déjà.";
                        }else{
                            
                            //ajouter en BDD
                            $user->insertUser();
                            //addUser($bddChocoblast->getBdd(), $nom, $prenom, $email,$mdp,$fichier);
                            //afficher une confirmation d'ajout
                            $message = $nom . " " . $prenom . " " . $email." a été ajouter";
                        }
                        
                        
                    }

                }else {
                    $message = 'Veuillez remplir mdp';
                }

            }else {
                $message = 'Veuillez remplir email';
            }

        }else {
            $message = 'Veuillez remplir prenom';
        }
        
    } else {
        $message = 'Veuillez remplir nom';
    }
}


include './app/vue/view_add_user.php';

?>