<?php 
require_once'baseModel.php';

class Facture extends BaseModel {
    
    protected $table_name = 'Facture';
    protected $primary_key = "pk_facture";
    
    
    protected $pk_facture;
    protected $date_service;
    protected $paiement_status;
    protected $fk_client;

    



    /**
     * pk_facture
     * @return unkown
     */
    public function getPk_facture(){
        return $this->pk_facture;
    }

    /**
     * pk_facture
     * @param unkown $pk_facture
     * @return Facture
     */
    public function setPk_facture($pk_facture){
        $this->pk_facture = $pk_facture;
        return $this;
    }

    /**
     * date_service
     * @return unkown
     */
    public function getDate_service(){
        return $this->date_service;
    }

    /**
     * date_service
     * @param unkown $date_service
     * @return Facture
     */
    public function setDate_service($date_service){
        $this->date_service = $date_service;
        return $this;
    }

    /**
     * paiement_status
     * @return unkown
     */
    public function getPaiement_status(){
        return $this->paiement_status;
    }

    /**
     * paiement_status
     * @param unkown $paiement_status
     * @return Facture
     */
    public function setPaiement_status($paiement_status){
        $this->paiement_status = $paiement_status;
        return $this;
    }

    /**
     * fk_client
     * @return unkown
     */
    public function getFk_client(){
        return $this->fk_client;
    }

    /**
     * fk_client
     * @param unkown $fk_client
     * @return Facture
     */
    public function setFk_client($fk_client){
        $this->fk_client = $fk_client;
        return $this;
    }
    
    public  function getListOfAllDBObjects() {
    	include $_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/DB/dbConnect.php';
    	
    	$internalAttributes = get_object_vars ( $this);
    	
    	$sql = "SELECT * FROM `" . $this->table_name . "` ORDER BY date_service DESC ";
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