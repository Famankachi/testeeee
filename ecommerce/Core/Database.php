<?php

namespace App\Core;
use PDO;
use PDOException;

class Database extends PDO
{
    private static $instance ;
    private const HOST = 'localhost';
    private const USER = 'root';
    private const PWD = '';
    private const DBNAME = 'ecommerce';

    private function __construct()
    {
        $_dsn = 'mysql:dbname='. self::DBNAME.';host='. self::HOST;
        //appel du constructeur de PDO
        try {
            parent::__construct($_dsn, self::USER, self::PWD);
            // utf-8
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,'SET NAMES utf8');
            // fetch mode : chaque fois qu'on fait appel à fetch ou fechall on va
            // obtenir un nom colonne => valeur
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            //
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $ex) {
            die($ex->getMessage());
        }
    }

    //Pattern singleton : une seule instance de Database sera crée
    // quelque soit le nombre de requettes
    public static function getInstance() : self
    {
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

}