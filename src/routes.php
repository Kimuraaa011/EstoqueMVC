<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->post('/', 'HomeController@dataFilter');

// Clients

$router->get('/addClient', 'ClientController@add');
$router->post('/addClient', 'ClientController@addAction');
$router->get('/clients', 'ClientController@show');
$router->get('/client/{id}', 'ClientController@details');
$router->get('/clientEdit/{id}', 'ClientController@edit');
$router->post('/clientEdit/{id}', 'ClientController@editAction');

// Products

$router->get('/products', 'ProductController@show');
$router->get('/addProduct', 'ProductController@add');
$router->post('/addProduct', 'ProductController@addAction');
$router->get('/productEdit/{id}', 'ProductController@edit');
$router->post('/productEdit/{id}', 'ProductController@editAction');

// Sales

$router->get('/addSale', 'SaleController@add');
$router->get('/addSale/client/{id}', 'SaleController@addProduct');
$router->post('/addSale/client/{id}', 'SaleController@addSaleAction');
$router->get('/sales', 'SaleController@show');

// Debts

$router->get('/debtEdit/{id}', 'DebtController@edit');
$router->post('/debtEdit/{id}', 'DebtController@editAction');

// Expenses

$router->get('/addExpense', 'ExpenseController@add');
$router->post('/addExpense', 'ExpenseController@addAction');
$router->get('/expenses', 'ExpenseController@show');