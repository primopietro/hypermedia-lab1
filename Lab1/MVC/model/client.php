<?php
require_once 'baseModel.php';
class Client extends BaseModel {
	protected $table_name = 'Client';
	protected $primary_key = "pk_client";
	protected $pk_client;
	protected $nom;
	protected $prenom;
	protected $infolettre;
	protected $telephone;
	protected $fk_adresse;
	protected $fk_utilisateur;
	public function setPk_client($aPK) {
		$this->pk_client = $aPK;
	}
	public function getPk_client() {
		return $this->pk_client;
	}
	
	/**
	 * nom
	 * 
	 * @return unkown
	 */
	public function getNom() {
		return $this->nom;
	}
	
	/**
	 * nom
	 * 
	 * @param unkown $nom        	
	 * @return Client
	 */
	public function setNom($nom) {
		$this->nom = $nom;
		return $this;
	}
	
	/**
	 * prenom
	 * 
	 * @return unkown
	 */
	public function getPrenom() {
		return $this->prenom;
	}
	
	/**
	 * prenom
	 * 
	 * @param unkown $prenom        	
	 * @return Client
	 */
	public function setPrenom($prenom) {
		$this->prenom = $prenom;
		return $this;
	}
	
	/**
	 * infolettre
	 * 
	 * @return unkown
	 */
	public function getInfolettre() {
		return $this->infolettre;
	}
	
	/**
	 * infolettre
	 * 
	 * @param unkown $infolettre        	
	 * @return Client
	 */
	public function setInfolettre($infolettre) {
		$this->infolettre = $infolettre;
		return $this;
	}
	
	/**
	 * telephone
	 * 
	 * @return unkown
	 */
	public function getTelephone() {
		return $this->telephone;
	}
	
	/**
	 * telephone
	 * 
	 * @param unkown $telephone        	
	 * @return Client
	 */
	public function setTelephone($telephone) {
		$this->telephone = $telephone;
		return $this;
	}
	
	/**
	 * fk_adresse
	 * 
	 * @return unkown
	 */
	public function getFk_adresse() {
		return $this->fk_adresse;
	}
	
	/**
	 * fk_adresse
	 * 
	 * @param unkown $fk_adresse        	
	 * @return Client
	 */
	public function setFk_adresse($fk_adresse) {
		$this->fk_adresse = $fk_adresse;
		return $this;
	}
	
	/**
	 * fk_utilisateur
	 * 
	 * @return unkown
	 */
	public function getFk_utilisateur() {
		return $this->fk_utilisateur;
	}
	
	/**
	 * fk_utilisateur
	 * 
	 * @param unkown $fk_utilisateur        	
	 * @return Client
	 */
	public function setFk_utilisateur($fk_utilisateur) {
		$this->fk_utilisateur = $fk_utilisateur;
		return $this;
	}
	public function getInfoFromPk_utilisateur($pkUser) {
		// Include database connection
		require$_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/DB/dbConnect.php';
		
		$pkUser = htmlspecialchars ( $pkUser );
		
		// Variables
		$query = "SELECT *
    			FROM client
    			WHERE fk_utilisateur = '" . $pkUser . "'";
		
		// Execute query
		$result = $conn->query ( $query );
		
		// If user exists
		if ($result->num_rows > 0) {
			
			// Set data for current object
			while ( $row = $result->fetch_assoc () ) {
				$this->pk_client = $row ["pk_client"];
				$this->fk_utilisateur = $pkUser;
				$this->prenom = $row ["prenom"];
				$this->nom = $row ["nom"];
				$this->fk_adresse = $row ["fk_adresse"];
				$this->telephone = $row ["telephone"];
				$this->infolettre = $row ["infolettre"];
			}
			
			// Return statement
			echo "success";
			return true;
		} else {
			
			// Return statement
			echo "fail";
			return false;
		}
	}
}