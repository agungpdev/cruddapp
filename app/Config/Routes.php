<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Auth\AuthController as Auth;
use App\Controllers\Dashboard\DashboardController as Dashboard;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Auth::class, 'index']);
$routes->get('/create-account', [Auth::class, 'signup']);
$routes->group('auth', static function ($routes) {
  $routes->post('signin', [Auth::class, 'login']);
  $routes->post('signup', [Auth::class, 'create_account']);
  $routes->get('signout', [Auth::class, 'logout']);
});
$routes->group('dashboard', static function ($routes) {
  $routes->get('index', [Dashboard::class, 'index']);
});
$routes->post('dashboard/post/store', [DashboardController::class, 'store_post']);
