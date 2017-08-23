<?php
require_once'baseModel.php';

class TA_Promotion_Service extends BaseModel {
    
    protected $table_name = 'TA_Promotion_Service';
    protected $primary_key = "pk_promotion_service";
    
    
    protected $pk_promotion_service;
    protected $date_debut;
    protected $date_fin;
    protected $code;
    protected $fk_promotion;
    protected $fk_service;
    
    

    /**
     * pk_promotion_service
     * @return unkown
     */
    public function getPk_promotion_service(){
        return $this->pk_promotion_service;
    }

    /**
     * pk_promotion_service
     * @param unkown $pk_promotion_service
     * @return TA_Promotion_Service
     */
    public function setPk_promotion_service($pk_promotion_service){
        $this->pk_promotion_service = $pk_promotion_service;
        return $this;
    }

    /**
     * date_debut
     * @return unkown
     */
    public function getDate_debut(){
        return $this->date_debut;
    }

    /**
     * date_debut
     * @param unkown $date_debut
     * @return TA_Promotion_Service
     */
    public function setDate_debut($date_debut){
        $this->date_debut = $date_debut;
        return $this;
    }

    /**
     * date_fin
     * @return unkown
     */
    public function getDate_fin(){
        return $this->date_fin;
    }

    /**
     * date_fin
     * @param unkown $date_fin
     * @return TA_Promotion_Service
     */
    public function setDate_fin($date_fin){
        $this->date_fin = $date_fin;
        return $this;
    }

    /**
     * code
     * @return unkown
     */
    public function getCode(){
        return $this->code;
    }

    /**
     * code
     * @param unkown $code
     * @return TA_Promotion_Service
     */
    public function setCode($code){
        $this->code = $code;
        return $this;
    }

    /**
     * fk_promotion
     * @return unkown
     */
    public function getFk_promotion(){
        return $this->fk_promotion;
    }

    /**
     * fk_promotion
     * @param unkown $fk_promotion
     * @return TA_Promotion_Service
     */
    public function setFk_promotion($fk_promotion){
        $this->fk_promotion = $fk_promotion;
        return $this;
    }

    /**
     * fk_service
     * @return unkown
     */
    public function getFk_service(){
        return $this->fk_service;
    }

    /**
     * fk_service
     * @param unkown $fk_service
     * @return TA_Promotion_Service
     */
    public function setFk_service($fk_service){
        $this->fk_service = $fk_service;
        return $this;
    }

}