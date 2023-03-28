<?php 
//les chemin se font a partir du fichier addUser.php car ces la que la classe manager est appelé.


class ManagerUtilisateur extends Utilisateur{


    public function getUserByMail(){
        try {
            $bdd = ConnectBdd::getBdd('mysql:host=localhost;dbname=chocoblast','root','');
            $mail = $this->getEmail();

            $req = $bdd->prepare('SELECT id_utilisateur,nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur,image_utilisateur,id_roles,statut_utilisateur FROM utilisateur WHERE mail_utilisateur = ?');
            $req->bindParam(1, $mail, PDO::PARAM_STR);
            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;

        } catch (Exception $e) {
            die('Erreur getUserByMail : '.$e->getMessage());
        }

    }

    public function insertUser(){
        try {
            
            $bdd = ConnectBdd::getBdd('mysql:host=localhost;dbname=chocoblast','root','');

            $nom = $this->getNom();
            $prenom = $this->getPrenom();
            $mail = $this->getEmail();
            $password = password_hash($this->getPassword(), PASSWORD_DEFAULT);;
            $image = $this->getImage();
            $statut = $this->getStatus();
            $role = $this->getRole();


            $req = $bdd->prepare('INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur,image_utilisateur,id_roles,statut_utilisateur) VALUES
            (?, ?, ?, ?, ?, ?, ?)');
            $req->bindParam(1, $nom, PDO::PARAM_STR);
            $req->bindParam(2, $prenom, PDO::PARAM_STR);
            $req->bindParam(3, $mail, PDO::PARAM_STR);
            $req->bindParam(4, $password, PDO::PARAM_STR);
            $req->bindParam(5, $image, PDO::PARAM_STR);
            $req->bindParam(6, $role, PDO::PARAM_STR);
            $req->bindParam(7, $statut, PDO::PARAM_STR);

            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;

        } catch (Exception $e) {
            die('Erreur Insert : '.$e->getMessage());
        }
    }

    public function activeUser(){
        try {
            $bdd = ConnectBdd::getBdd('mysql:host=localhost;dbname=chocoblast','root','');

            $id = $this->getId();
            $statut = $this->getStatus();
            
            $req = $bdd->prepare('UPDATE utilisateur SET statut_utilisateur = ? WHERE id_utilisateur = ?');

           
            $req->bindParam(1, $statut, PDO::PARAM_STR);
            $req->bindParam(2, $id, PDO::PARAM_STR);
            
            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;

        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}

?>