<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Client;
use \src\models\Sale;
use \src\models\SaleProduct;
use \src\models\Product;
use \src\models\Debt;

class ClientController extends Controller {

    public function add() {
        $this->render('addClient');
    }

    public function addAction(){
      $name = filter_input(INPUT_POST, 'nome');
      $cel = filter_input(INPUT_POST, 'celular');
      $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

      if($name && $cel && $email){
        $data = Client::select()->where('email', $email)->execute();
        if(count($data) === 0){
          Client::insert(
            [
              'nome' => $name,
              'celular' => $cel,
              'email' => $email
            ]
          )->execute();
          echo '<br>' . 'também funfou até aqui';
          $this->redirect('/');
        }
        $this->redirect('/addClient');
      }
    }

    public function show(){
      $data = Client::select()->execute();
      $this->render('client',[
        'data' => $data 
      ]);
    }

    public function details($args){
      $client = (Client::select()->where('id', $args['id'])->execute())[0];
      $product = Product::select()->execute();
      $sale = Sale::select()->execute();
      $saleProduct = SaleProduct::select()->execute();
      $debt = Debt::select()->where('clientId', $args['id'])->execute();
      $this->render('clientDetails',[
        'client' => $client,
        'product' => $product,
        'sale' => $sale,
        'saleProduct' => $saleProduct,
        'debt' => $debt
      ]);
    }
    
    public function edit($args){
      $data = (Client::select()->where('id', $args['id'])->execute())[0];
      if(count($data) > 0){
        $this->render('clientEdit',[
          'data' => $data
        ]);
      }
    }

    public function editAction($args){
      $id = filter_input(INPUT_POST, 'id');
      $name = filter_input(INPUT_POST, 'nome');
      $cel = filter_input(INPUT_POST, 'celular');
      $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

      if($name && $cel && $email){
        Client::update()
          ->set('nome', $name)
          ->set('celular', $cel)
          ->set('email', $email)
          ->where('id', $id)
          ->execute();
        $this->redirect('/client'. '/' . $id);
      }
    }
}

