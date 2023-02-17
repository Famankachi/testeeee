<?php


namespace App\Controllers;


abstract class Controller
{
    protected $template ='default';
    public function render(string $fichier, array $donnees=[]){
        // extraire le contenu des données
        extract($donnees);

        // démarrer le buffer de sortie
        ob_start();
        // à partir d'ici tout sera enregistré dans la mémoire


        // exemple : $fichier = Posts/index
        // créer le chemin vers la vue :
        require_once './Views/'.$fichier.'.php';

        //on transfère le contenu du buffer vers la variable $contenu
        $contenu = ob_get_clean();
        //faire appel à la template de la page
        require_once './Views/'.$this->template.'.php';
    }
}