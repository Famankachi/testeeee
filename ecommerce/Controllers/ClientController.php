<?php 
namespace App\Controllers;

use App\Models\{Client, Panier};

class ClientController extends Controller{
    
    public function login($from){
        $this->template = 'loginContainer';
        $this->render('Client/login', compact('from'));
    }

    public function logout(){
        session_unset();
        session_destroy();
        header('Location: http://localhost/ecommerce/router');
    }

    public function verifier($from){
        $model = new Client();
        $clients = $model->findAll();
        $exist = false;
        foreach($clients as $client):
            if($client->username === $_POST['username'] && $client->password === $_POST['password']){
                $exist = true;
                break;
            }
        endforeach;
        if($exist){
            //session_start();
            $panModel = new Panier();
            $pan = $panModel->find($client->id);
            $_SESSION['id'] = $client->id;
            $_SESSION['username'] = $client->username;
            $_SESSION['password'] = $client->password;
            $_SESSION['nom_clt'] = $client->nom_clt;
            $_SESSION['idPan'] = $pan->id;
            if($from === "fromLogin")
                header('Location: http://localhost/ecommerce/router/index');
            else
                header('Location: http://localhost/ecommerce/panier');
        }
        else{
            $this->template = 'loginContainer';
            $err = true;
            $this->render('Client/login', compact('err', 'from'));
        }
    }
}

?>