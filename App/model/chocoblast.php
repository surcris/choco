<?php 

class chocoblast extends ConnectBdd{

    private ?int $id_chocoblast;
    private ?string $slogan_chocoblast;
    private ?string $date_chocoblast;
    private ?bool $statut_chocoblast;
    private ?utilisateur $cible_chocoblast;
    private ?utilisateur $auteur_chocoblast;

    public function __construct()
    {
        $this->cible_chocoblast = new Utilisateur('','','','');
        $this->auteur_chocoblast = new Utilisateur('','','','');
        
    }

    //=============GETTER==================//


    public function getIdChocoblast():?int
    {
        return $this->id_chocoblast;
    }
    public function getSloganChocoblast():?string
    {
        return $this->slogan_chocoblast;
    }
    public function getDateChocoblast():?string
    {
        return $this->date_chocoblast;
    }
    public function getStatutChocoblast():?bool
    {
        return $this->statut_chocoblast;
    }
    public function getCibleChocoblast():?utilisateur
    {
        return $this->cible_chocoblast;
    }
    public function getAuteurChocoblast():?utilisateur
    {
        return $this->auteur_chocoblast;
    }

    //=============SETTER==================//

    public function setIdChocoblast(?int $var)
    {
        $this->id_chocoblast = $var;
    }
    public function setSloganChocoblast(?string $var)
    {
        $this->slogan_chocoblast = $var;
    }
    public function setDateChocoblast(?string $var)
    {
        $this->date_chocoblast = $var;
    }
    public function setStatutChocoblast(?bool $var)
    {
        $this->statut_chocoblast = $var;
    }
    public function setCibleChocoblast(?utilisateur $var)
    {
        $this->cible_chocoblast = $var;
    }
    public function setAuteurChocoblast(?utilisateur $var)
    {
        $this->auteur_chocoblast = $var;
    }

    public function addChocoblast(?ConnectBdd $var)
    {
        
    }

    public function validateChocoblast(?ConnectBdd $var,?bool $bool_var)
    {
        
    }
    public function showChocoblast(?ConnectBdd $var):?chocoblast
    {
        

        return $this->getCibleChocoblast();
    }

    public function showAllChocoblast(?ConnectBdd $var)
    {
        

        return $this->getCibleChocoblast();
    }
    public function showTopChocoblast(?ConnectBdd $var,?int $int_var)
    {
        

        return $this->getCibleChocoblast();
    }

}

?>