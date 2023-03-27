<?php
    
    include './manager/ManagerUtilisateur.php';
    //$bddChocoblast = new ConnectBdd('mysql:host=localhost;dbname=chocoblast','root','');
    //tester si le formulaire est submit
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
                            echo $nom . " " . $prenom . " " . $email." a été ajouter";
                            //initialisation de l'utilisateur
                            $user = new ManagerUtilisateur($nom,$prenom,$email,$mdp);
                            $user->setImage($fichier);

                            $destination = '../Public/asset/images/';
                            if($user->getUserByMail()){
                                echo "Cette utilisateur existe déjà.";
                            }else{
                                
                                //ajouter en BDD
                                $user->insertUser();
                                //addUser($bddChocoblast->getBdd(), $nom, $prenom, $email,$mdp,$fichier);
                                //import de l'image
                                move_uploaded_file($_FILES['fichier']['tmp_name'], $destination.$_FILES['fichier']['name']);
                                //afficher une confirmation d'ajout
                                echo $nom . " " . $prenom . " " . $email." a été ajouter";
                            }
                            
                        }else {
                            $nom = $_POST['nom'];
                            $prenom = $_POST['prenom'];
                            $email = $_POST['email'];
                            $mdp = $_POST['mdp'];
                            //initialisation de l'utilisateur
                            $user = new ManagerUtilisateur($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mdp']);
                            if($user->getUserByMail()){
                                echo "Cette utilisateur existe déjà.";
                            }else{
                                
                                //ajouter en BDD
                                $user->insertUser();
                                //addUser($bddChocoblast->getBdd(), $nom, $prenom, $email,$mdp,$fichier);
                                //afficher une confirmation d'ajout
                                echo $nom . " " . $prenom . " " . $email." a été ajouter";
                            }
                            
                            
                        }

                    }else {
                        echo 'Veuillez remplir mdp';
                    }

                }else {
                    echo 'Veuillez remplir email';
                }

            }else {
                echo 'Veuillez remplir prenom';
            }
            
        } else {
            echo 'Veuillez remplir nom';
        }
    }

    // function addUser($bdd, $nom, $prenom, $email,$mdp,$fichier){
    //     try{
    //         //récupération des paramètres
    //         $l_nom = $nom;
    //         $l_prenom = $prenom;
    //         $l_email = $email;
    //         $l_mdp = password_hash($mdp, PASSWORD_DEFAULT);
    //         if ($fichier == "") {
    //             $l_fichier = '../Public/asset/images/default.png';
    //         }else{
    //             $l_fichier = $fichier;
    //         }
    //         $l_role = 1;
    //         //préparation de la requête
    //         $req2 = $bdd->prepare('INSERT INTO Utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur,image_utilisateur,id_roles) VALUES
    //         (?, ?, ?, ?, ?, ?)');
    //         //affectation des variables
    //         $req2->bindParam(1, $l_nom, PDO::PARAM_STR);
    //         $req2->bindParam(2, $l_prenom, PDO::PARAM_STR);
    //         $req2->bindParam(3, $l_email, PDO::PARAM_STR);
    //         $req2->bindParam(4, $l_mdp, PDO::PARAM_STR);
    //         $req2->bindParam(5, $l_fichier, PDO::PARAM_STR);
    //         $req2->bindParam(6, $l_role, PDO::PARAM_STR);
    //         //exécution de la requête
    //         $req2->execute();
    //     }
    //     catch(Exception $e){
    //         die('Error: '.$e->getMessage());
    //     }
    // }

    // function getUserByEmail($bdd, $email){
    //     try {
    //         //récupérer les paramètres
    //         $l_email = $email;
    //         $req = $bdd->prepare('SELECT mail_utilisateur FROM utilisateur WHERE mail_utilisateur = ?');
    //         $req->bindParam(1, $l_email, PDO::PARAM_STR);
    //         $req->execute();
    //         //stocker les différents enregistrements dans un tableau associatif
    //         $data = $req->fetchAll(PDO::FETCH_ASSOC);
    //         return $data;
    //     } 
    //     catch (Exception $e) {
    //         die('Erreur : '.$e->getMessage());
    //     }
    // }
?>