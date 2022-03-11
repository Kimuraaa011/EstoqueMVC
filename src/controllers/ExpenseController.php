<?php
namespace src\controllers;

use \core\Controller;
use src\models\Expense;

class ExpenseController extends Controller {

  public function add(){

    $this->render('addExpense');

  }

  public function addAction(){
    $nome = filter_input(INPUT_POST, 'nome');
    $valor = (float) filter_input(INPUT_POST, 'valor');
    $pagamento = filter_input(INPUT_POST, 'pagamento');
    $data = date('Y-m-d', time() - 3*60*60); // -3h
    echo $pagamento;

    Expense::insert([
      'nome' => $nome,
      'valor' => $valor,
      'pagamento' => $pagamento,
      'data' => $data
    ])->execute();


    $this->redirect('/expenses');
  }

  public function show(){
    $data = Expense::select()->execute();
    $this->render('expenses', [
      'data' => $data
    ]);
  }

}