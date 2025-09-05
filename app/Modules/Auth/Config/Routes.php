<?php

use App\Modules\Auth\Controllers\LoginController;
use App\Modules\Auth\Controllers\RegisterController;

//Portfolio Route Groups
$routes->group('auth', function ($routes) {
    // Login Route 
    $routes->get('login',                       [LoginController::class,     'login']);
    $routes->post('attempt_login',              [LoginController::class, 'attempt_login']);
    $routes->get('logout',                      [LoginController::class, 'logout']);

    // Register Route
    $routes->get('register',                    [RegisterController::class,     'register']);
    $routes->post('attempt_register',           [RegisterController::class, 'attempt_register']);
});
