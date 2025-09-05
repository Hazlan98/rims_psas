<?php

use App\Modules\User\Controllers\UserController;
use App\Modules\User\Controllers\NotificationController;

//Portfolio Route Groups
$routes->group('user', function ($routes) {
    $routes->get('dashboard',                           [UserController::class,     'dashboard']);

    $routes->group('notification', function ($routes) {
        $routes->post('mark-as-read',                   [NotificationController::class,     'markAsRead']);
        $routes->post('mark-all-read',                   [NotificationController::class,     'markAllRead']);
    });
});
