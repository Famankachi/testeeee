<?php 

namespace App\Models;

class Image extends Model{
    protected $id;
    protected $file, $id_prod, $principal;

    public function __construct(){
        $this->table = 'image';
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
     * Get the value of file
     */ 
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set the value of file
     *
     * @return  self
     */ 
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
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
     * Get the value of principal
     */ 
    public function getPrincipal()
    {
        return $this->principal;
    }

    /**
     * Set the value of principal
     *
     * @return  self
     */ 
    public function setPrincipal($principal)
    {
        $this->principal = $principal;

        return $this;
    }
}