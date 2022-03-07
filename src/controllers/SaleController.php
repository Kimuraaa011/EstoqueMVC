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

    public function addProductAction($args){
      $qtdList = [];
      $idList = explode(',', filter_input(INPUT_POST, 'productIds'));
      sort($idList);

      $products = Product::select()
      ->where('id', 'in', $idList)
      ->execute();

      $total = 0;
      $count = 0;

      foreach($idList as $id){
        $qtdList[] = filter_input(INPUT_POST, 'quantidade'.$id);
        $total += $products[$count]['price'] * $qtdList[$count];
        $count++;
      }

      Sale::insert([
        'clientId' => $args['id'],
        'data' => date('Y-m-d', time() - 3*60*60),
        'valor_total' => $total,
        'pagamento' => 'dinheiro'
      ])->execute();

      $lastInsertedId = Sale::select('id')->last();

      foreach($idList as $id){
        SaleProduct::insert([
          'productId' => $id,
          'salesId' => $lastInsertedId['id']
        ])->execute();
      }


      
      

    }

}