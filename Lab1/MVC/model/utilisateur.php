<?php 
require_once'baseModel.php';

class Utilisateur extends BaseModel {
    
    protected $table_name = 'Utilisateur';
    protected $primary_key = "pk_utilisateur";
    
    
    protected $pk_utilisateur;
    protected $courriel;
    protected $mot_de_passe;
    protected $administrateur;

    
    
    function getPk_utilisateur(){
    	return $this->pk_utilisateur ;
    }
    
    function setPk_utilisateur($pk){
    	$this->pk_utilisateur = $pk;
    }
    

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
    
    public function checkValidUser(){
    	//Include database connection
    	require_once '../DB/dbConnect.php';
    	
    	//Variables
    	$query = "SELECT * 
    			FROM utilisateur 
    			WHERE courriel = '" . $this->courriel ."'
    			AND  mot_de_passe = '" . $this->mot_de_passe ."'";
    	
    	//Execute query 
    	$result = $conn->query($query);
    	
    	//If user exists
    	if($result->num_rows > 0){
    		
    		//Set data for current object
	    	while ($row = $result->fetch_assoc()) {
	    		
		    	$this->pk_utilisateur = $row["pk_utilisateur"];
		    	$this->administrateur = $row["administrateur"];
		    }
		    
		    
		    //Return statement
    		return true;
    	}
    	else{
    		
    		//Return statement
    		return false;
    	}
    	
    }

}