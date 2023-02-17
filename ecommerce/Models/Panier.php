<?php 
namespace App\Models;

class Panier extends Model{

    protected $id;
    protected $date_pan;
    protected $id_clt;

    public function __construct(){
        $this->table = 'panier';
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
     * Get the value of date_pan
     */ 
    public function getDate_pan()
    {
        return $this->date_pan;
    }

    /**
     * Set the value of date_pan
     *
     * @return  self
     */ 
    public function setDate_pan($date_pan)
    {
        $this->date_pan = $date_pan;

        return $this;
    }

    /**
     * Get the value of id_clt
     */ 
    public function getId_clt()
    {
        return $this->id_clt;
    }

    /**
     * Set the value of id_clt
     *
     * @return  self
     */ 
    public function setId_clt($id_clt)
    {
        $this->id_clt = $id_clt;

        return $this;
    }
}
?>