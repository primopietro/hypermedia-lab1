<?php
require_once'baseModel.php';

class TA_Facture_Service extends BaseModel {
    
    protected $table_name = 'TA_Facture_Service';
    protected $primary_key = "pk_facture_service";
    
    
    protected $montant_rabais;
    protected $tarif_facture;
    protected $fk_service;
    protected $fk_facture;
    
        
    

    /**
     * montant_rabais
     * @return unkown
     */
    public function getMontant_rabais(){
        return $this->montant_rabais;
    }

    /**
     * montant_rabais
     * @param unkown $montant_rabais
     * @return Facture
     */
    public function setMontant_rabais($montant_rabais){
        $this->montant_rabais = $montant_rabais;
        return $this;
    }

    /**
     * tarif_facture
     * @return unkown
     */
    public function getTarif_facture(){
        return $this->tarif_facture;
    }

    /**
     * tarif_facture
     * @param unkown $tarif_facture
     * @return Facture
     */
    public function setTarif_facture($tarif_facture){
        $this->tarif_facture = $tarif_facture;
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
     * @return Facture
     */
    public function setFk_service($fk_service){
        $this->fk_service = $fk_service;
        return $this;
    }

    /**
     * fk_facture
     * @return unkown
     */
    public function getFk_facture(){
        return $this->fk_facture;
    }

    /**
     * fk_facture
     * @param unkown $fk_facture
     * @return Facture
     */
    public function setFk_facture($fk_facture){
        $this->fk_facture = $fk_facture;
        return $this;
    }

}