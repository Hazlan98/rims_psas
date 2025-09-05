<?php

use App\Modules\Judge\Controllers\JudgeEventController;
use App\Modules\Judge\Controllers\JudgeReviewController;


//Portfolio Route Groups
$routes->group('judge', function ($routes) {
    $routes->group('event', function ($routes) {
        $routes->get('get_judge_event_dashboard/(:any)',                [JudgeEventController::class,     'getJudgeEventDb/$1']);
        $routes->get('judge_event_dashboard',                           [JudgeEventController::class,     'judgeEventDb']);
        $routes->post('register_event_judge',                           [JudgeEventController::class,     'registerEventJudge']);
        $routes->get('assigned-event',                                  [JudgeEventController::class,     'assignedEvent']);
    });
    $routes->group('review', function ($routes) {
        $routes->post('update-review-status',                           [JudgeReviewController::class,     'updateReviewStatus']);
        $routes->get('get-review-full-paper/(:any)',                    [JudgeReviewController::class,     'getReviewFullPaper/$1']);
        $routes->get('review-full-paper',                               [JudgeReviewController::class,     'reviewFullPaper']);
        $routes->post('submit-review',                                  [JudgeReviewController::class,     'submitReview']);
    });
});
