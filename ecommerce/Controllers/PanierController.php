<?php


namespace App\Controllers;
use App\Models\{Panier, Produit, Image, PanierProduit};

class PanierController extends Controller{

    public function index(){
        $panierModel = new Panier();
        $panier = $panierModel->findBy(['id_clt' => $_SESSION['id']]);
        $panProdModel = new PanierProduit();
        $idPan = $panier[0]->id;
        $panProds = $panProdModel->findBy(['id_pan' => $panier[0]->id]);
        $prodModel = new Produit();
        $prods = [];
        foreach($panProds as $prodPan):
            $prod = $prodModel->find($prodPan->id_prod);
            $prod->qty = $prodPan->quantite;
            array_push($prods, $prod);
        endforeach;
        /* Recuperation de l'image principale */
        $imageModel = new Image();
        foreach($prods as $prod):
            $image = $imageModel->findBy(['id_prod' => $prod->id, 'principal' => 1], ['=', '=']);
            $prod->img = $image;
        endforeach;
        /* --- */
        $this->render('Panier/index', compact('prods', 'idPan'));
    }

    public function updateQty(){
        $model = new PanierProduit();
        $model->updateQty([$_POST['qty'], $_POST['idPan'], $_POST['idProd']]);
        echo "done";
    }

    public function deleteProd(){
        $model = new PanierProduit();
        $model->deleteProd([$_POST['idPan'], $_POST['idProd']]);
        echo "done";
    }

    public function addToCart(){
        $model = new PanierProduit();
        if(!isset($_SESSION['id']))
            echo "notLoged";
        else if(!empty($model->findBy(['id_prod' => $_POST['idProd'], 'id_pan' => $_POST['idPan']], ['=', '=']))){
            echo "exist";
        }else{
            $model->setId_prod($_POST['idProd'])->setId_pan($_POST['idPan'])->setQuantite(1);
            $model->create();
            echo "done";
        }
    }
}