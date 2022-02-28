<?php
namespace src\controllers;

use \core\Controller;
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

    public function add(){
      $data = Client::select()->execute();
      $this->render('/addSale',[
        'data' => $data
      ]);
    }

}

