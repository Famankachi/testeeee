<?php


namespace App\Models;
use App\Core\Database;

class Model extends Database
{
    // représente une table de la bdd
    protected $table;
    // instance de Database
    private $db;

    public function requete(string $sql, array $attributs = null){
        $this->db = Database::getInstance();
        if($attributs !== null){
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        }else{
            return $this->db->query($sql);
        }
    }

    public function findAll(){
        $query = $this->requete('SELECT * FROM '.$this->table);
        return $query->fetchall();
    }

    public function find($id){
        return $this->requete("SELECT * FROM ".$this->table." WHERE id = $id")->fetch();
    }

    public function findBy(array $criteres, array $operator = ['=']){
        $champs = [];
        $valeurs = [];
        // on itere sur l'array $critères pour l'eclater en 2
        foreach($criteres as $champ => $valeur){
            // SELECT *  FROM posts WHERE titre = ? AND contenu = ?
            //$op = array_shift($operator);
            $champs[] = "$champ ".array_shift($operator)." ?";
            $valeurs[] = $valeur;
        }
        //transformation du tableau $champs en une chaine de caractères
        $liste_champs = implode(' AND ',$champs);
        // execution de la requete
        return $this->requete('SELECT * FROM '.$this->table.' WHERE '.$liste_champs, $valeurs)->fetchAll();
    }

    public function create(){
        $champs = [];
        $params = [];
        $valeurs = [];
        // on itere sur l'array $critères pour l'eclater en 2
        foreach($this as $champ => $valeur){
            // INSERT INTO POSTS (id, titre, contenu, date_creation)
            //             VALUES (?, ?, ?, ?)
            if($valeur !== null && $champ != 'db' && $champ != 'table'){
                $champs[] = $champ;
                $param[] = "?";
                $valeurs[] = $valeur;
            }
        }
        //transformation du tableau $champs en une chaine de caractères
        $liste_champs = implode(' , ',$champs);
        $liste_params = implode(' , ',$param);
        // execution de la requete
        return $this->requete('INSERT INTO '.$this->table.' ('.$liste_champs.') VALUES ('. $liste_params.')', $valeurs);
    }
    public function update(){
        $champs = [];
        $valeurs = [];
        // on itere sur l'array $critères pour l'eclater en 2
        foreach($this as $champ => $valeur){
            // UPDATE POSTS SET titre = ?, contenu = ?, date_creation = ? WHERE id = ?
            if($valeur !== null && $champ != 'db' && $champ != 'table'){
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
            }
        }
        $valeurs[] = $this->id;
        //transformation du tableau $champs en une chaine de caractères
        $liste_champs = implode(' , ',$champs);
        // execution de la requete
        return $this->requete('UPDATE '.$this->table.' SET '.$liste_champs.' WHERE id = ?', $valeurs);
    }
    public function delete(int $id){
        return $this->requete("DELETE FROM ".$this->table." WHERE id = ?",[$id]);
    }

}