<?php 
class Utilisateur{
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $password;
    private $image = '../Public/asset/images/default.png';
    private $statut = 0;
    private $role = 1;

    public function __construct($nom,$prenom,$mail,$password)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getEmail()
    {
        return $this->mail;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getStatus()
    {
        return $this->statut;
    }
    public function getRole()
    {
        return $this->role;
    }
    //SETTER=====================//
    
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function setEmail($mail)
    {
        $this->mail = $mail;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function setStatus($statut)
    {
        $this->statut = $statut;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }


    
}
?>

