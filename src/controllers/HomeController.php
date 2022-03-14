<?php
namespace src\controllers;

use ClanCats\Hydrahon\Query\Sql\Func;
use \core\Controller;
use \src\models\Expense;
use src\models\Product;
use \src\models\Sale;
use src\models\SaleProduct;

class HomeController extends Controller {

    

    public function index() {

        $productList = SaleProduct::select('p.nome')->innerJoin('products as p', 'saleproducts.productid', '=', 'p.id')->groupBy('p.nome')->addFieldSum('saleproducts.quantidade', 'soma')->orderBy('soma', 'desc')->limit(5)->execute();


        $all_months = ['Janeira', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];


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
            'salesCount' => $salesCount,
            'all_months' => $all_months,
            'productList' => $productList
        ]);

    }

    public function dataFilter(){

        $years = Sale::select()->where('pagamento', '!=', 'fiado')->addField(new Func('YEAR', 'data'), 'year')->distinct()->execute();
        $months = Sale::select()->where('pagamento','!=', 'fiado')->addField(new Func('MONTH', 'data'), 'month')->distinct()->execute();

        $all_months = ['Janeira', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];      

        $yearSelected = filter_input(INPUT_POST, 'year');
        $aux1 = $yearSelected;
        $monthSelected = filter_input(INPUT_POST, 'month');
        $aux2 = $monthSelected;

        if(($monthSelected == 0) && ($yearSelected == 0)){
            $this->redirect('/');
        }

        if($yearSelected == 0){
            $yearSelected = '%';
        }

        if($monthSelected == 0){
            $monthSelected = '%';
        }



        $productList = SaleProduct::select('p.nome')->innerJoin('products as p', 'saleproducts.productid', '=', 'p.id')->groupBy('p.nome')->addFieldSum('saleproducts.quantidade', 'soma')->orderBy('soma', 'desc')->limit(5)->execute();



        $productSale = SaleProduct::select()->where('data', 'like', $yearSelected . '-%' . $monthSelected . '-%')->addFieldCount('productId', 'quantidade')->execute()[0];

        $salesCount = Sale::select()->where('data', 'like',  $yearSelected . '-%' . $monthSelected . '-%')->addFieldCount('id', 'quantidade')->execute()[0];

        $total = Sale::select()->where('pagamento', '!=', 'fiado')->where('data', 'like', $yearSelected . '-%' . $monthSelected . '-%')->addFieldSum('valor_total', $alias = 'name')->execute()[0]['name'];

        $sales = (float) Sale::select()->where('pagamento', '!=', 'fiado')->where('data', 'like', $yearSelected . '-%' . $monthSelected . '-%')->addFieldSum('valor_total', $alias = 'name')->execute()[0]['name'];

        $expenses = (float) Expense::select()->where('data', 'like', $yearSelected . '-%' . $monthSelected . '-%')->addFieldSum('valor', $alias = 'name')->execute()[0]['name'];

        $profit = $sales - $expenses;

        $this->render('index',[
            'total' => $total,
            'years' => $years,
            'months' => $months,
            'productSale' => $productSale,
            'profit' => $profit,
            'salesCount' => $salesCount,
            'yearSelected' => $aux1,
            'monthSelected' => $aux2,
            'all_months' => $all_months,
            'productList' => $productList
        ]);


    }




}