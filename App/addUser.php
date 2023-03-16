<?php
    include './utils/connectBdd.php';

    //tester si le formulaire est submit
    if (isset($_POST['send'])) {
       // and !empty($_POST['prenom']) and !empty($_POST['email']) and !empty($_POST['mdp']) AND !empty($_POST['fichier'])
        //tester si les champs sont remplis
        if (!empty($_POST['nom']) )
        {
            if (!empty($_POST['prenom'])) {
                
                if (!empty($_POST['email'])) {
                    # code...
                    if (!empty($_POST['mdp'])) {
                        # code...
                        if ($_FILES['fichier']['tmp_name']) {
                            
                            $nom = $_POST['nom'];
                            $prenom = $_POST['prenom'];
                            $email = $_POST['email'];
                            $mdp = $_POST['mdp'];
                            $fichier = $_FILES['fichier'];
                            $destination = '../Public/asset/images/';
                            if(getUserByEmail($bdd, $email)){
                                echo "Cette utilisateur existe déjà.";
                            }else{
                                //ajouter en BDD
                                addUser($bdd, $nom, $prenom, $email,$mdp,$fichier);
                                //afficher une confirmation d'ajout
                                move_uploaded_file($_FILES['fichier']['tmp_name'], $destination.$_FILES['fichier']['name']);
                                echo $nom . " " . $prenom . " " . $email." a été ajouter";
                            }
                            
                            
                            
                        }else {
                            $nom = $_POST['nom'];
                            $prenom = $_POST['prenom'];
                            $email = $_POST['email'];
                            $mdp = $_POST['mdp'];
                            $fichier = "";

                            if(getUserByEmail($bdd, $email)){
                                echo "Cette utilisateur existe déjà.";
                            }else{
                                //ajouter en BDD
                                addUser($bdd, $nom, $prenom, $email,$mdp,$fichier);
                                //afficher une confirmation d'ajout
                                move_uploaded_file($_FILES['fichier']['tmp_name'], $destination.$_FILES['fichier']['name']);
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
            //stocker le contenu du formulaire
            
        } else {
            echo 'Veuillez remplir nom';
        }
    }

    function addUser($bdd, $nom, $prenom, $email,$mdp,$fichier){
        try{
            //récupération des paramètres
            $l_nom = $nom;
            $l_prenom = $prenom;
            $l_email = $email;
            $l_mdp = password_hash($mdp, PASSWORD_DEFAULT);
            if ($fichier == "") {
                $l_fichier = '../Public/asset/images/default.png';
            }else{
                $l_fichier = $fichier;
            }
            $l_role = 1;
            //préparation de la requête
            $req2 = $bdd->prepare('INSERT INTO Utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur,image_utilisateur,id_roles) VALUES
            (?, ?, ?, ?, ?, ?)');
            //affectation des variables
            $req2->bindParam(1, $l_nom, PDO::PARAM_STR);
            $req2->bindParam(2, $l_prenom, PDO::PARAM_STR);
            $req2->bindParam(3, $l_email, PDO::PARAM_STR);
            $req2->bindParam(4, $l_mdp, PDO::PARAM_STR);
            $req2->bindParam(5, $l_fichier, PDO::PARAM_STR);
            $req2->bindParam(6, $l_role, PDO::PARAM_STR);
            //exécution de la requête
            $req2->execute();
        }
        catch(Exception $e){
            die('Error: '.$e->getMessage());
        }
    }

    function getUserByEmail($bdd, $email){
        try {
            //récupérer les paramètres
            $l_email = $email;
            $req = $bdd->prepare('SELECT mail_utilisateur FROM utilisateur WHERE mail_utilisateur = ?');
            $req->bindParam(1, $l_email, PDO::PARAM_STR);
            $req->execute();
            //stocker les différents enregistrements dans un tableau associatif
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } 
        catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
?>