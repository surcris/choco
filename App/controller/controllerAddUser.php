<?php
include '../utils/connectBdd.php';
include '../model/utilisateur.php';
include '../manager/ManagerUtilisateur.php';


if (isset($_POST['send'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (!empty($_POST['nom']) ){

        if (!empty($_POST['prenom'])) {
            
            if (!empty($_POST['email']) && $email !== false) {
                
                if (!empty($_POST['mdp'])) {
                    
                    if ($_FILES['fichier']['tmp_name']) {
                        
                        $nom = htmlEntities(strip_tags($_POST['nom']), ENT_QUOTES);
                        $prenom = htmlEntities(strip_tags($_POST['prenom']), ENT_QUOTES);
                        $mdp = htmlEntities(strip_tags($_POST['mdp']), ENT_QUOTES);
                        $fichier = $_FILES['fichier'];
                        $message = $nom . " " . $prenom . " " . $email." a été ajouter";
                        //initialisation de l'utilisateur
                        $user = new ManagerUtilisateur($nom,$prenom,$email,$mdp);
                        

                        $destination = '../../Public/asset/images/';
                        $user->setImage($destination.$_FILES['fichier']['name']);
                        if($user->getUserByMail()){
                            echo "Cette utilisateur existe déjà.";
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
                            echo "Cette utilisateur existe déjà.";
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

include '../vue/header.php';
include '../vue/view_add_user.php';
include '../vue/footer.php';
?>