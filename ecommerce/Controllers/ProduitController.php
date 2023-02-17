<?php

namespace App\Controllers;

use App\Models\{Produit,Image};

class ProduitController extends Controller{

    public function index(){
        $model = new Produit();
        $prods = $model->findAll();
        /* Recuperation de l'image principale */
        $imageModel = new Image();
        foreach($prods as $prod):
            $image = $imageModel->findBy(['id_prod' => $prod->id, 'principal' => 1], ['=', '=']);
            $prod->img = $image;
        endforeach;
        /* --- */
        $this->render('Produits/index', compact('prods'));
    }

    public function details(int $id){
        $model = new Produit();
        $prod = $model->find($id);
        $imageModel = new Image();
        $images = $imageModel->findBy(['id_prod' => $prod->id]);
        $this->render('Produits/details', compact('prod', 'images'));
    }

    public function promo(){
        $model = new Produit();
        $prods = $model->findBy(['promo' => 0], ['>']);
        /* Recuperation de l'image principale */
        $imageModel = new Image();
        foreach($prods as $prod):
            $image = $imageModel->findBy(['id_prod' => $prod->id, 'principal' => 1], ['=', '=']);
            $prod->img = $image;
        endforeach;
        /* --- */
        $this->render('Produits/index', compact('prods'));
    }
}