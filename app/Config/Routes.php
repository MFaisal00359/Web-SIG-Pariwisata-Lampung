<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('place_detail', 'Place::detail');
$routes->get('explore_place', 'ExplorePage::index');

$routes->group('admin', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('login', 'Auth::showLoginForm', ['as' => 'admin.showLoginForm']);
    $routes->post('login', 'Auth::authenticate', ['as' => 'admin.authenticate']);
    $routes->get('dashboard', 'Admin::dashboard', ['as' => 'admin.dashboard']);
    $routes->get('place_data', 'Admin::place_data', ['as' => 'admin.place_data']);
    $routes->get('logout', 'Auth::logout', ['as' => 'admin.logout']);
});
