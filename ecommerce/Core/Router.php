<?php

namespace App\Core;
use App\Controllers\RouterController;
// Routeur principal
class Router{
    
    public function start(){
        // demarrer la session
        session_start();
        // on récupère l'URI
        $uri = $_SERVER['REQUEST_URI'];
        //echo($uri."<br/>");
        // on va retirer le dernier slash (/) de l'URI
        // on verifie si l'uri n'est pas vide et se termine par /
        if(!empty($uri) && $uri != '/' && $uri[-1] === "/"){
            // on enlève le dernier / (indice -1)
            $uri = substr($uri , 0, -1);
            //echo($uri."<br/>");
            // on envoie un code de redirection permanente
            http_response_code(301);
            // on redirige vers l'uri sans /
            if(empty($_GET['p']))
                $uri = $uri.'/router';
            header('Location: '.$uri);
        }
        // on gère les paramètres de l'uri
        // p= controlleur/methode/parametre1/parametre2/....
        // on récupère les paramètres dans un tableau
        $parametres = [];
        if(isset($_GET['p']))
            $parametres = explode('/', $_GET['p']);
        //var_dump($parametres);
        if($parametres[0]!= ''){
            // on a au moins un paramètre (c'est le controlleur)
            // on récupère le nom de ce controlleur pour l'instancier
            // on met sa 1ère lettre en majuscule et on ajoute Controller
            // Exple : post => PostController
            // on ajoute le namespace complet
            $controller = '\\App\\Controllers\\'.ucfirst(array_shift($parametres)).'Controller';
            // on instancie le controlleur
            $controller = new $controller();
            // Post/delete/1
            // on récupère le 2ème paramètre d'uri (indice 0) = action (fonction du controlleur)
            $action = (isset($parametres[0])) ? array_shift($parametres): 'index';

            if(method_exists($controller, $action)){
                // y ' a t'il des paramètres à passer à la fonction ?
                (isset($parametres[0]))? call_user_func_array([$controller, $action], $parametres) :
                        $controller->$action();
            }else{
                // page n'existe pas
                http_response_code(404);
                echo "cette page n'existe pas";
            }
        }else{
            // aucun paramètre
            // on instancie le controlleur par défaut
            $controller = new RouterController();

            // on appelle la méthode index
            $controller->index();
        }
    }
}