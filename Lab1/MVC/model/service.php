<?php
require_once'baseModel.php';

class Service extends BaseModel {
    
    protected $table_name = 'Service';
    protected $primary_key = "pk_service";
    
    
    protected $service_titre;
    protected $service_description;
    protected $duree;
    protected $tarif;
    protected $actif;
    protected $image;
    
  

    /**
     * service_titre
     * @return unkown
     */
    public function getService_titre(){
        return $this->service_titre;
    }

    /**
     * service_titre
     * @param unkown $service_titre
     * @return Service
     */
    public function setService_titre($service_titre){
        $this->service_titre = $service_titre;
        return $this;
    }

    /**
     * service_description
     * @return unkown
     */
    public function getService_description(){
        return $this->service_description;
    }

    /**
     * service_description
     * @param unkown $service_description
     * @return Service
     */
    public function setService_description($service_description){
        $this->service_description = $service_description;
        return $this;
    }

    /**
     * duree
     * @return unkown
     */
    public function getDuree(){
        return $this->duree;
    }

    /**
     * duree
     * @param unkown $duree
     * @return Service
     */
    public function setDuree($duree){
        $this->duree = $duree;
        return $this;
    }

    /**
     * tarif
     * @return unkown
     */
    public function getTarif(){
        return $this->tarif;
    }

    /**
     * tarif
     * @param unkown $tarif
     * @return Service
     */
    public function setTarif($tarif){
        $this->tarif = $tarif;
        return $this;
    }

    /**
     * actif
     * @return unkown
     */
    public function getActif(){
        return $this->actif;
    }

    /**
     * actif
     * @param unkown $actif
     * @return Service
     */
    public function setActif($actif){
        $this->actif = $actif;
        return $this;
    }

    /**
     * image
     * @return unkown
     */
    public function getImage(){
        return $this->image;
    }

    /**
     * image
     * @param unkown $image
     * @return Service
     */
    public function setImage($image){
        $this->image = $image;
        return $this;
    }
    
    public  function getListOfAllDBObjects() {
    	include $_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/DB/dbConnect.php';
    	
    	$internalAttributes = get_object_vars ( $this);
    	
    	$sql = "SELECT * FROM `" . $this->table_name . "` ORDER BY service_titre ";
    	$result = $conn->query ( $sql );
    	
    	if ($result->num_rows > 0) {
    		$localObjects = array ();
    		while ( $row = $result->fetch_assoc () ) {
    			$anObject = Array ();
    			$anObject ["primary_key"] = $this->primary_key;
    			$anObject ["table_name"] = $this->table_name;
    			foreach ( $row as $aRowName => $aValue ) {
    				$anObject [$aRowName] = $aValue;
    			}
    			
    			$localObjects [$row [$this->primary_key]] = $anObject;
    		}
    		
    		$conn->close ();
    		return $localObjects;
    	}
    	$conn->close ();
    	return null;
    }

}