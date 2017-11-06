<?php
require_once'baseModel.php';

class Promotion extends BaseModel {
    
    protected $table_name = 'Promotion';
    protected $primary_key = "pk_promotion";
    
    
    protected $pk_promotion;
    protected $promotion_titre;
    protected $rabais;
    

    /**
     * pk_promotion
     * @return unkown
     */
    public function getPk_promotion(){
        return $this->pk_promotion;
    }

    /**
     * pk_promotion
     * @param unkown $pk_promotion
     * @return Promotion
     */
    public function setPk_promotion($pk_promotion){
        $this->pk_promotion = $pk_promotion;
        return $this;
    }

    /**
     * promotion_titre
     * @return unkown
     */
    public function getPromotion_titre(){
        return $this->promotion_titre;
    }

    /**
     * promotion_titre
     * @param unkown $promotion_titre
     * @return Promotion
     */
    public function setPromotion_titre($promotion_titre){
        $this->promotion_titre = $promotion_titre;
        return $this;
    }

    /**
     * rabais
     * @return unkown
     */
    public function getRabais(){
        return $this->rabais;
    }

    /**
     * rabais
     * @param unkown $rabais
     * @return Promotion
     */
    public function setRabais($rabais){
        $this->rabais = $rabais;
        return $this;
    }
    
    public function getPromotionByTitle($aTitle){
        include $_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/DB/dbConnect.php';
        
        
        $sql = "SELECT * FROM `promotion` WHERE `promotion_titre` LIKE '".$aTitle."' ";
        $result = $conn->query ( $sql );
      
        $numRows = $result->num_rows;
        if ($numRows> 0) {
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