<?php 
namespace App\Models;

class Produit extends Model{

    protected $id;
    protected $nom_prod, $libelle, $prix, $promo, $decsription;
    protected $id_cat;

    public function __construct(){
        $this->table = 'produit';
    }


    /**
     * Get the value of id
     */ 
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    

    /**
     * Get the value of name
     */ 
    public function getNomProd(){
        return $this->nom_prod;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setNomProd($nom_prod){
        $this->nom_prod = $nom_prod;
        return $this;
    }

    /**
     * Get the value of libelle
     */ 
    public function getLibelle(){
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle){
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of decsription
     */ 
    public function getDecsription(){
        return $this->decsription;
    }

    /**
     * Set the value of decsription
     *
     * @return  self
     */ 
    public function setDecsription($decsription){
        $this->decsription = $decsription;
        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix(){
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix){
        $this->prix = $prix;
        return $this;
    }

    /**
     * Get the value of promo
     */ 
    public function getPromo(){
        return $this->promo;
    }

    /**
     * Set the value of promo
     *
     * @return  self
     */ 
    public function setPromo($promo){
        $this->promo = $promo;
        return $this;
    }

    

    /**
     * Get the value of id_cat
     */ 
    public function getId_cat(){
        return $this->id_cat;
    }

    /**
     * Set the value of id_cat
     *
     * @return  self
     */ 
    public function setId_cat($id_cat){
        $this->id_cat = $id_cat;
        return $this;
    }
}

?>