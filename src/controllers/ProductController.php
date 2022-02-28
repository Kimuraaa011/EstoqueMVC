<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Product;
use \src\models\Categorie;

class ProductController extends Controller {

    public function add() {
        $dataC = Categorie::select()->execute();
        $this->render('addProduct',[
          'data' => $dataC
        ]);
    }

    public function addAction(){
      $name = filter_input(INPUT_POST, 'nome');
      $price = filter_input(INPUT_POST, 'price');
      if(strpos(',', $price) >= 0){
        $price = str_replace(',', '.', $price);
      }
      $price = (float) $price;
      $cor = filter_input(INPUT_POST, 'cor');
      $estoque = filter_input(INPUT_POST, 'estoque');
      $tamanho = filter_input(INPUT_POST, 'tamanho');
      $categoria = filter_input(INPUT_POST, 'categoria');

      if($name && $price && $cor && $estoque && $tamanho && $categoria){
        Product::insert([
          'nome' => $name,
          'price' => $price,
          'cor' => $cor,
          'qtd_estoque' => $estoque,
          'tamanho' => $tamanho,
          'categoria' => $categoria
        ])->execute();
        $this->redirect('/products');
      }
    }

    public function show(){
      $categoria = Categorie::select('nome')->execute();
      $data = Product::select()->execute();
      $this->render('product',[
        'data' => $data,
        'categoria' => $categoria 
      ]);
    }

    public function edit($args){
      $categoria = Categorie::select()->execute();
      $data = Product::select()->where('id', $args['id'])->execute()[0];
      $this->render('productEdit',[
        'data' => $data,
        'categoria' => $categoria
      ]);

      
    }

    public function editAction($args){

      $id = $args['id'];
      $name = filter_input(INPUT_POST, 'nome');
      $price = filter_input(INPUT_POST, 'price');
      $cor = filter_input(INPUT_POST, 'cor');
      $estoque = filter_input(INPUT_POST, 'estoque');
      $tamanho = filter_input(INPUT_POST, 'tamanho');
      $categoria = filter_input(INPUT_POST, 'categoria');
      
      if($name && $price && $cor && $estoque && $tamanho && $categoria){
        Product::update()
          ->set('nome', $name)
          ->set('price', $price)
          ->set('cor', $cor)
          ->set('qtd_estoque', $estoque)
          ->set('tamanho', $tamanho)
          ->set('categoria', $categoria)
          ->where('id', $id)->execute();
        $this->redirect('/products');
      }
      $this->redirect('/productEdit' . '/' . $id);
    }

}

