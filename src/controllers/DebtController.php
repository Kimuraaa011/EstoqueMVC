<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Debt;
use \src\models\Sale;
use \src\models\Client;
use src\models\Product;

class DebtController extends Controller {

    public function edit($args) {
        $debt = Debt::select()->where('id', $args['id'])->execute();
        $this->render('debtEdit',[
          'debt' => $debt
        ]);
    }

    public function editAction($args) {
        $parcela = (float) filter_input(INPUT_POST, 'parcela');
        $debt = Debt::select()->where('id', $args['id'])->execute();
        $total = (float) $debt[0]['valor_total'];
        $resultado = $total - $parcela;
        if($resultado == 0){
          echo $debt[0]['saleId'];
          Sale::update()
            ->set('pagamento', 'quitado')
            ->where('id', $debt[0]['saleId'])
            ->execute();
        }
        Debt::update()
          ->set('valor_total', $resultado)
          ->where('id', $args['id'])
          ->execute();

        $this->redirect('/client' . '/' . $debt[0]['clientId']);
        
    }


}