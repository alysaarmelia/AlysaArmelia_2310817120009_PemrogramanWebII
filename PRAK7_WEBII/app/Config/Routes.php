<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index',['filter' => 'guest']);

$routes->get('/dashboard', 'Dashboard::index',['filter' => 'auth']);

$routes->post('/dashboard/create', 'Dashboard::create',['filter' => 'auth']);
$routes->post('/dashboard/update/(:num)', 'Dashboard::update/$1',['filter' => 'auth']);
$routes->post('/dashboard/delete/(:num)', 'Dashboard::delete/$1',['filter' => 'auth']);


$routes->post('/login/valid', 'Login::valid', ['filter' => 'guest']);
$routes->get('/logout', 'Login::logout');

