<?php 
namespace App\Models;

class Categorie extends Model{

    protected $id;
    protected $nom_cat;
    protected $img_cat;

    public function __construct(){
        $this->table = 'categorie';
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom_cat
     */ 
    public function getNom_cat()
    {
        return $this->nom_cat;
    }

    /**
     * Set the value of nom_cat
     *
     * @return  self
     */ 
    public function setNom_cat($nom_cat)
    {
        $this->nom_cat = $nom_cat;

        return $this;
    }

    /**
     * Get the value of img_cat
     */ 
    public function getImg_cat()
    {
        return $this->img_cat;
    }

    /**
     * Set the value of img_cat
     *
     * @return  self
     */ 
    public function setImg_cat($img_cat)
    {
        $this->img_cat = $img_cat;

        return $this;
    }
}

?>