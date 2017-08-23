<?php 
require_once'baseModel.php';

class Client extends BaseModel {
    
    protected $table_name = 'Client';
    protected $primary_key = "pk_client";
    
    
    protected $nom;
    protected $prenom;
    protected $infolettre;
    protected $telephone;
    protected $fk_adresse;
    protected $fk_utilisateur;

    

    /**
     * nom
     * @return unkown
     */
    public function getNom(){
        return $this->nom;
    }

    /**
     * nom
     * @param unkown $nom
     * @return Client
     */
    public function setNom($nom){
        $this->nom = $nom;
        return $this;
    }

    /**
     * prenom
     * @return unkown
     */
    public function getPrenom(){
        return $this->prenom;
    }

    /**
     * prenom
     * @param unkown $prenom
     * @return Client
     */
    public function setPrenom($prenom){
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * infolettre
     * @return unkown
     */
    public function getInfolettre(){
        return $this->infolettre;
    }

    /**
     * infolettre
     * @param unkown $infolettre
     * @return Client
     */
    public function setInfolettre($infolettre){
        $this->infolettre = $infolettre;
        return $this;
    }

    /**
     * telephone
     * @return unkown
     */
    public function getTelephone(){
        return $this->telephone;
    }

    /**
     * telephone
     * @param unkown $telephone
     * @return Client
     */
    public function setTelephone($telephone){
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * fk_adresse
     * @return unkown
     */
    public function getFk_adresse(){
        return $this->fk_adresse;
    }

    /**
     * fk_adresse
     * @param unkown $fk_adresse
     * @return Client
     */
    public function setFk_adresse($fk_adresse){
        $this->fk_adresse = $fk_adresse;
        return $this;
    }

    /**
     * fk_utilisateur
     * @return unkown
     */
    public function getFk_utilisateur(){
        return $this->fk_utilisateur;
    }

    /**
     * fk_utilisateur
     * @param unkown $fk_utilisateur
     * @return Client
     */
    public function setFk_utilisateur($fk_utilisateur){
        $this->fk_utilisateur = $fk_utilisateur;
        return $this;
    }

}