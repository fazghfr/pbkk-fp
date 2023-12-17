<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'auth']);

// routing for product
$routes->get('/product', 'ProductController::index', ['filter' => 'auth']);
$routes->get('/transaction', 'TransactionController::index', ['filter' => 'auth']);
$routes->post('/product', 'ProductController::index', ['filter' => 'auth']);
$routes->get('/product/view/(:num)', 'ProductController::view/$1', ['filter' => 'auth']);
$routes->get('/product/edit/(:num)', 'ProductController::edit/$1', ['filter' => 'auth']);
$routes->get('/product/add-form', 'ProductController::addForm', ['filter' => 'auth']);
$routes->post('/product/add/', 'ProductController::add/', ['filter' => 'auth']);
$routes->get('/product/delete/(:num)', 'ProductController::delete/$1', ['filter' => 'auth']);
$routes->post('/product/update/(:num)', 'ProductController::update/$1', ['filter' => 'auth']);

// routing for transaction
$routes->get('/home-transaction', 'TransactionController::beforeSes', ['filter' => 'auth']);
$routes->get('/startsession', 'TransactionController::createSes', ['filter' => 'auth']);
$routes->get('/transaction/(:num)', 'TransactionController::onSes/$1', ['filter' => 'auth']);
$routes->post('/transaction/(:num)', 'TransactionController::onSes/$1', ['filter' => 'auth']);
$routes->post('/transaction/detail/(:num)', 'TransactionController::detail/$1', ['filter' => 'auth']);
$routes->post('transaction/addItem', 'TransactionController::addItem', ['filter' => 'auth']);
$routes->post('/confirm', 'TransactionController::confirm', ['filter' => 'auth']);

// routing for admin feature
$routes->get('/employees', 'EmployeeController::index', ['filter' => 'admin']);
$routes->post('/employees/delete/(:num)', 'EmployeeController::delete/$1', ['filter' => 'admin']);

// see list of employee

service('auth')->routes($routes);
