<?php

use App\Autoloader;
use App\Core\Router;

require_once 'Autoloader.php';

Autoloader::register();

// instancier le routeur principal
$router = new Router();

// demarrer l'application
$router->start();