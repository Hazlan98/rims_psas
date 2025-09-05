<?php

use App\Modules\Finance\Controllers\FinanceResearchProjectController;


//Portfolio Route Groups
$routes->group('finance', function ($routes) {
    $routes->group('research_project', function ($routes) {
        $routes->get('finance-research-db',                           [FinanceResearchProjectController::class,     'financeResearchDb']);
        $routes->post('update-payment-status',                        [FinanceResearchProjectController::class,     'updatePaymentStatus']);
    });
});
