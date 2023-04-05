<?php

class Commentaire extends ConnectBdd{

    private ?int $id_commentaire;
    private ?string $note_commentaire;
    private ?string $texte_commentaire;
    private ?string $date_commentaire;
    private ?bool $statut_commentaire;
    private ?utilisateur $auteur_commentaire;
    private ?chocoblast $chocoblast_commentaire;

    public function __construct()
    {
        $this->auteur_commentaire = new Utilisateur('','','','');
        $this->chocoblast_commentaire = new chocoblast();
        
    }

    //=============GETTER==================//


    public function getIdCommentaire():?int
    {
        return $this->id_commentaire;
    }
    public function getNoteCommentaire():?string
    {
        return $this->note_commentaire;
    }
    public function getTexteCommentaire():?string
    {
        return $this->texte_commentaire;
    }
    public function getDateCommentaire():?string
    {
        return $this->date_commentaire;
    }
    public function getStatutCommentaire():?bool
    {
        return $this->statut_commentaire;
    }
    public function getAuteurCommentaire():?utilisateur
    {
        return $this->auteur_commentaire;
    }
    public function getChocoCommentaire():?chocoblast
    {
        return $this->chocoblast_commentaire;
    }

    //=============SETTER==================//

    public function setIdCommentaire(?int $var)
    {
        $this->id_commentaire = $var;
    }
    public function setNoteCommentaire(?string $var)
    {
        $this->note_commentaire = $var;
    }
    public function setTexteCommentaire(?string $var)
    {
        $this->texte_commentaire = $var;
    }
    public function setDateCommentaire(?string $var)
    {
        $this->date_commentaire = $var;
    }
    public function setStatutCommentaire(?bool $var)
    {
        $this->statut_commentaire = $var;
    }
    public function setAuteurCommentaire(?utilisateur $var)
    {
        $this->auteur_commentaire = $var;
    }
    public function setChocoCommentaire(?chocoblast $var)
    {
        $this->chocoblast_commentaire = $var;
    }


    public function addCommentaire(?ConnectBdd $var)
    {
        
    }
    public function deleteCommentaire(?ConnectBdd $var,?Commentaire $commentaire_var)
    {
        
    }
    public function showAllCommentaire(?ConnectBdd $var)
    {
        

        return ;
    }

    public function validateCommentaire(?ConnectBdd $var,?bool $bool_var)
    {
        
    }

}

?>