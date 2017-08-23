<?php 
require_once'baseModel.php';

class Utilisateur extends BaseModel {
    
    protected $table_name = 'Utilisateur';
    protected $primary_key = "pk_utilisateur";
    
    
    protected $courriel;
    protected $mot_de_passe;
    protected $administrateur;

    

    /**
     * courriel
     * @return unkown
     */
    public function getCourriel(){
        return $this->courriel;
    }

    /**
     * courriel
     * @param unkown $courriel
     * @return Utilisateur
     */
    public function setCourriel($courriel){
        $this->courriel = $courriel;
        return $this;
    }

    /**
     * mot_de_passe
     * @return unkown
     */
    public function getMot_de_passe(){
        return $this->mot_de_passe;
    }

    /**
     * mot_de_passe
     * @param unkown $mot_de_passe
     * @return Utilisateur
     */
    public function setMot_de_passe($mot_de_passe){
        $this->mot_de_passe = $mot_de_passe;
        return $this;
    }

    /**
     * administrateur
     * @return unkown
     */
    public function getAdministrateur(){
        return $this->administrateur;
    }

    /**
     * administrateur
     * @param unkown $administrateur
     * @return Utilisateur
     */
    public function setAdministrateur($administrateur){
        $this->administrateur = $administrateur;
        return $this;
    }

}