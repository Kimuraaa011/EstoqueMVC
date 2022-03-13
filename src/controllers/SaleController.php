<?php
namespace src\controllers;

use \core\Controller;
use src\models\Categorie;
use \src\models\Product;
use \src\models\Client;
use \src\models\Sale;
use \src\models\SaleProduct;
use \src\models\Debt;


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

    public function addSaleAction($args){
      $qtdList = []; // armazena a quantidade de cada produto
      $pagamento = filter_input(INPUT_POST, 'pagamento'); // forma de pagamento
      $idList = explode(',', filter_input(INPUT_POST, 'productIds')); // pega os id's de todos os produtos
      sort($idList);

      $products = Product::select() // Vai filtrar os produtos de acordo com os id's
      ->where('id', 'in', $idList)
      ->execute();

      $total = 0; // O valor total do pagamento
      $count = 0;
      $estoque = [];

      foreach(array_unique($idList) as $id){

        $qtdList[] = (int) filter_input(INPUT_POST, 'quantidade'.$id); // pega a quantidade na ordem dos respectivos produtos
        $estoque[] = (int) Product::select()->where('id', $id)->execute()[0]['qtd_estoque'];// Pega a quantidade de estoque de cada produto
        if($qtdList[$count] > $estoque[$count]){ 

          $_SESSION['qtdWarn'] = 'A quantidade escolhida do produto execede a quantidade de estoque!';
          $this->redirect('/addSale/client' . '/' . $args['id']);

        }

        Product::update() // vai atualizar a quantida de estoque dos produtos vendidos
          ->set('qtd_estoque', ($estoque[$count] - $qtdList[$count]))
          ->where('id', $id)
          ->execute();
        $total += $products[$count]['price'] * $qtdList[$count]; // valor total da venda
        $count++;

      }
      
      $today = date('Y-m-d', time() - 3*60*60);

      Sale::insert([  //inserção dos dados na tabela Sales
        'clientId' => $args['id'],
        'data' => $today,
        'valor_total' => $total,
        'pagamento' => $pagamento
      ])->execute();

      $lastInsertedId = Sale::select('id')->last();

      if($pagamento === 'fiado'){
        Debt::insert([  //inserção dos dados na tabela Sales
          'clientId' => $args['id'],
          'saleId' => $lastInsertedId['id'],
          'data' => $today,
          'valor_total' => $total
        ])->execute();
      }

      $count = 0;
      foreach(array_unique($idList) as $id){

        SaleProduct::insert([ // adicionando produtos na tabela SaleProduts, foi necessário mais um foreach para adicionar cada produto a seu último id de venda
          'productId' => $id,
          'salesId' => $lastInsertedId['id'],
          'quantidade' => $qtdList[$count],
          'data' => $today
        ])->execute();
        $count++;
      }

      $this->redirect('/client' . '/' . $args['id']);
      
      

    }

    public function show(){
      $client = Client::select()->execute();
      $product = Product::select()->execute();
      $sale = Sale::select()->execute();
      $saleProduct = SaleProduct::select()->execute();

      $this->render('sales',[
        'client' => $client,
        'product' => $product,
        'sale' => $sale,
        'saleProduct' => $saleProduct,
      ]);
    }

}