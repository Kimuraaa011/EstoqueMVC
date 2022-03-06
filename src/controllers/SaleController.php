<?php
namespace src\controllers;

use \core\Controller;
use src\models\Categorie;
use \src\models\Product;
use \src\models\Client;
use \src\models\Sale;
use \src\models\SaleProduct;


class SaleController extends Controller {

    public function add(){
      $data = Client::select()->execute();
      $this->render('/addSale',[
        'data' => $data
      ]);
    }

    public function addProduct($args){
      $data = Client::select()->where('id', $args['id'])->execute()[0];
      $products = Product::select()->execute();
      $categoria = Categorie::select('nome')->execute();
      $this->render('/addSaleProduct',[
        'data' => $data,
        'products' => $products,
        'categoria' => $categoria
      ]);
    }

}

