<?php 
require_once'baseModel.php';

class Ville extends BaseModel {
    
    protected $table_name = 'Ville';
    protected $primary_key = "pk_ville";
    
    
    protected $pk_ville;
    protected $ville;
    

    /**
     * pk_ville
     * @return unkown
     */
    public function getPk_ville(){
        return $this->pk_ville;
    }

    /**
     * pk_ville
     * @param unkown $pk_ville
     * @return Ville
     */
    public function setPk_ville($pk_ville){
        $this->pk_ville = $pk_ville;
        return $this;
    }

    /**
     * ville
     * @return unkown
     */
    public function getVille(){
        return $this->ville;
    }

    /**
     * ville
     * @param unkown $ville
     * @return Ville
     */
    public function setVille($ville){
        $this->ville = $ville;
        return $this;
    }

}