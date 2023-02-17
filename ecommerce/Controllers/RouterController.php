<?php

namespace App\Controllers;

use App\Models\{Produit, Categorie, Image};

class RouterController extends Controller
{
    public function index(){
        $prodModel = new Produit();
        $prods = $prodModel->findBy(['id' => '(SELECT count(*) from produit) - 10'], ['>']);
        $catModel = new Categorie();
        $cats = $catModel->findAll();
        /* Recuperation de l'image principale */
        $imageModel = new Image();
        foreach($prods as $prod):
            $image = $imageModel->findBy(['id_prod' => $prod->id, 'principal' => 1], ['=', '=']);
            $prod->img = $image;
        endforeach;
        /* --- */
        $this->render('Principal/index', compact('prods', 'cats'));
    }
}