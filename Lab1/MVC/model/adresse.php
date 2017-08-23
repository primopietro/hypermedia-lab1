<?php 
require_once'baseModel.php';

class Adresse extends BaseModel {
    
    protected $table_name = 'Adresse';
    protected $primary_key = "pk_adresse";
    
    
    protected $pk_adresse;
    protected $no_civique;
    protected $rue;
    protected $code_postal;
    protected $fk_ville;


    /**
     * pk_adresse
     * @return unkown
     */
    public function getPk_adresse(){
        return $this->pk_adresse;
    }

    /**
     * pk_adresse
     * @param unkown $pk_adresse
     * @return Adresse
     */
    public function setPk_adresse($pk_adresse){
        $this->pk_adresse = $pk_adresse;
        return $this;
    }

    /**
     * no_civique
     * @return unkown
     */
    public function getNo_civique(){
        return $this->no_civique;
    }

    /**
     * no_civique
     * @param unkown $no_civique
     * @return Adresse
     */
    public function setNo_civique($no_civique){
        $this->no_civique = $no_civique;
        return $this;
    }

    /**
     * rue
     * @return unkown
     */
    public function getRue(){
        return $this->rue;
    }

    /**
     * rue
     * @param unkown $rue
     * @return Adresse
     */
    public function setRue($rue){
        $this->rue = $rue;
        return $this;
    }

    /**
     * fk_ville
     * @return unkown
     */
    public function getFk_ville(){
        return $this->fk_ville;
    }

    /**
     * fk_ville
     * @param unkown $fk_ville
     * @return Adresse
     */
    public function setFk_ville($fk_ville){
        $this->fk_ville = $fk_ville;
        return $this;
    }

    /**
     * code_postal
     * @return unkown
     */
    public function getCode_postal(){
        return $this->code_postal;
    }

    /**
     * code_postal
     * @param unkown $code_postal
     * @return Adresse
     */
    public function setCode_postal($code_postal){
        $this->code_postal = $code_postal;
        return $this;
    }

}