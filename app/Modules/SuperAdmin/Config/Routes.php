<?php

use App\Modules\SuperAdmin\Controllers\EventController;
use App\Modules\SuperAdmin\Controllers\UserAccessController;
use App\Modules\SuperAdmin\Controllers\AdminResearchController;
use App\Modules\SuperAdmin\Controllers\AdminReviewerController;
use App\Modules\SuperAdmin\Controllers\EventCategoryController;
use App\Modules\SuperAdmin\Controllers\AdminParticipantController;

//Portfolio Route Groups
$routes->group('superAdmin', function ($routes) {

    // Event Route Groups
    $routes->group('event', function ($routes) {
        $routes->get('event_list',                          [EventController::class,     'eventList']);
        $routes->post('submit_event',                       [EventController::class,     'submitEvent']);
        $routes->post('add_event_field',                    [EventController::class,     'addEventField']);
        $routes->post('delete_event/(:any)',                [EventController::class,     'deleteEvent/$1']);
        $routes->get('event_list',                          [EventController::class,     'eventList']);
        $routes->get('get_event_details/(:any)',            [EventController::class,     'getEventDetails/$1']);
        $routes->get('event_details',                       [EventController::class,     'eventDetails']);
        $routes->get('event_category_and_field',            [EventController::class,     'eventCategoryAndField']);
        $routes->delete('remove_event_fields/(:any)',          [EventController::class,     'removeEventFields/$1']);
    });

    $routes->group('participant', function ($routes) {
        $routes->get('get-participation-data/(:any)',                    [AdminParticipantController::class,     'getParticipationData/$1']);
        $routes->get('participation-data',                               [AdminParticipantController::class,     'participationData']);
    });


    // Submission Route Groups
    $routes->group('research', function ($routes) {
        $routes->get('admin-research-db',                                       [AdminResearchController::class,     'adminResearchDb']);
        $routes->get('get-research-data/(:any)',                                [AdminResearchController::class,     'getResearchData/$1']);
        $routes->get('research-data',                                           [AdminResearchController::class,     'researchData']);
        $routes->get('get-participant-research-data/(:any)',                    [AdminResearchController::class,     'getParticipantResearchData/$1']);
        $routes->get('participant-research-data',                               [AdminResearchController::class,     'participantResearchData']);
    });

    // Review
    $routes->group('review', function ($routes) {
        // Admin Approve or Reject
        $routes->post('update_status',                                          [AdminReviewerController::class,     'update_status']);
        $routes->post('assign_reviewer',                                        [AdminReviewerController::class,     'assignReviewer']);
        $routes->post('reassign_reviewer',                                        [AdminReviewerController::class,     'reAssignReviewer']);
    });

    // User access control
    $routes->group('userAccess', function ($routes) {
        // Admin Approve or Reject
        $routes->get('list-of-user',                                            [UserAccessController::class,     'listOfUser']);
        $routes->post('assignRole',                                             [UserAccessController::class,     'assignRole']);
        $routes->post('removeRole',                                             [UserAccessController::class,     'removeRole']);
    });
    $routes->group('category', function ($routes) {
        $routes->post('insert-new-field',                                       [EventCategoryController::class,     'insertNewField']);
        $routes->post('delete-field',                                           [EventCategoryController::class,     'deleteField']);
    });
});
