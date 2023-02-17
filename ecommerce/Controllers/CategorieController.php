<?php


namespace App\Controllers;
use App\Models\{Categorie, Produit, Image};

class CategorieController extends Controller{

    public function index(){
        $model = new Categorie();
        $cats = $model->findAll();
        $this->render('Categories/index', compact('cats'));
    }

    public function read(int $id){
        $model = new Categorie();
        $cats = $model->findAll();
        $cat = $model->find($id);
        $produitModel = new Produit();
        $prods = $produitModel->findBy(['id_cat' => $cat->id]);
        /* Recuperation de l'image principale */
        $imageModel = new Image();
        foreach($prods as $prod):
            $image = $imageModel->findBy(['id_prod' => $prod->id, 'principal' => 1], ['=', '=']);
            $prod->img = $image;
        endforeach;
        /* --- */
        $this->render('Produits/index', compact('cats','cat', 'prods'));
    }
}