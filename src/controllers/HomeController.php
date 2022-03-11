<?php
namespace src\controllers;

use ClanCats\Hydrahon\Query\Sql\Func;
use \core\Controller;
use \src\models\Expense;
use \src\models\Sale;
use src\models\SaleProduct;

class HomeController extends Controller {

    

    public function index() {


        $years = Sale::select()->where('pagamento', '!=', 'fiado')->addField(new Func('YEAR', 'data'), 'year')->distinct()->execute();
        $months = Sale::select()->where('pagamento','!=', 'fiado')->addField(new Func('MONTH', 'data'), 'month')->distinct()->execute();

        $productSale = SaleProduct::select()->addFieldCount('productId', 'quantidade')->execute()[0];

        $salesCount = Sale::select()->addFieldCount('id', 'quantidade')->execute()[0];

        $total = Sale::select()->where('pagamento', '!=', 'fiado')->addFieldSum('valor_total', $alias = 'name')->execute()[0]['name'];

        $sales = (float) Sale::select()->where('pagamento', '!=', 'fiado')->addFieldSum('valor_total', $alias = 'name')->execute()[0]['name'];

        $expenses = Expense::select()->addFieldSum('valor', $alias = 'name')->execute()[0]['name'];

        $profit = $sales - $expenses;
        
        $this->render('index',[
            'total' => $total,
            'years' => $years,
            'months' => $months,
            'productSale' => $productSale,
            'profit' => $profit,
            'salesCount' => $salesCount
        ]);

    }


}