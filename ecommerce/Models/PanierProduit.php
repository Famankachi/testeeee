<?php 

namespace App\Models;

class PanierProduit extends Model{
    protected $id_prod, $id_pan;
    protected $quantite;

    public function __construct(){
        $this->table = 'panier_produit';
    }
    
    /**
     * Get the value of id_prod
     */ 
    public function getId_prod()
    {
        return $this->id_prod;
    }

    /**
     * Set the value of id_prod
     *
     * @return  self
     */ 
    public function setId_prod($id_prod)
    {
        $this->id_prod = $id_prod;

        return $this;
    }

    /**
     * Get the value of id_pan
     */ 
    public function getId_pan()
    {
        return $this->id_pan;
    }

    /**
     * Set the value of id_pan
     *
     * @return  self
     */ 
    public function setId_pan($id_pan)
    {
        $this->id_pan = $id_pan;

        return $this;
    }

    /**
     * Get the value of quantite
     */ 
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set the value of quantite
     *
     * @return  self
     */ 
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function updateQty($tab){
        return $this->requete('UPDATE '.$this->table.' SET quantite = ? WHERE id_pan = ? and id_prod = ?', $tab);
    }
    public function deleteProd($tab){
        return $this->requete('DELETE FROM '.$this->table.' WHERE id_pan = ? and id_prod = ?', $tab);
    }
}