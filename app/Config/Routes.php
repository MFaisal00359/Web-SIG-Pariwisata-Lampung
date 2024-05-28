<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// $routes->get('place_detail', 'Place::detail');
$routes->get('/', 'HomeController::index');
$routes->get('place_detail/(:num)', 'HomeController::placeDetail/$1');
$routes->get('explore_place', 'HomeController::explorePlace');

$routes->get('admin', 'AdminController::login');
$routes->post('admin/loginAuth', 'AdminController::loginAuth');
$routes->get('admin/logout', 'AdminController::logout');
$routes->get('admin/dashboard', 'AdminController::dashboard', ['filter' => 'auth']);
$routes->get('admin/addPlace', 'AdminController::addPlace', ['filter' => 'auth']);
$routes->post('admin/savePlace', 'AdminController::savePlace', ['filter' => 'auth']);
$routes->get('admin/editPlace/(:num)', 'AdminController::editPlace/$1', ['filter' => 'auth']);
$routes->post('admin/updatePlace/(:num)', 'AdminController::updatePlace/$1', ['filter' => 'auth']);
$routes->get('admin/deletePlace/(:num)', 'AdminController::deletePlace/$1', ['filter' => 'auth']);
