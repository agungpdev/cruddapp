<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\RegisterController;
use App\Controllers\Dashboard\DashboardController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [LoginController::class, 'index']);
$routes->post('/login', [LoginController::class, 'login']);
$routes->get('/create-account', [RegisterController::class, 'index']);
$routes->post('/create-account/admin', [RegisterController::class, 'create_account']);
$routes->get('dashboard/index', [DashboardController::class, 'index']);
$routes->post('dashboard/post/store', [DashboardController::class, 'store_post']);
