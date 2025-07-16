<?php

use CodeIgniter\Router\RouteCollection;

/*
 * @var RouteCollection $routes
 */
$routes->get('/', 'TaskController::index');

$routes->setDefaultController('TaskController');

$routes->get('tasks/index', 'TaskController::index');
$routes->get('tasks/create', 'TaskController::create');
$routes->get('tasks/delete/(:num)', 'TaskController::delete/$1');
$routes->get('tasks/edit/(:num)', 'TaskController::edit/$1');

$routes->post('tasks/store', 'TaskController::store');
$routes->post('tasks/update', 'TaskController::update');

// API REST
$routes->get('api/list', 'TaskController::APIlist');
$routes->post('api/create', 'TaskController::APIcreate');
$routes->put('api/update/(:num)', 'TaskController::APIupdate/$1');
$routes->delete('api/delete/(:num)', 'TaskController::APIdelete/$1');
