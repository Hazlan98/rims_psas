<?php

use App\Modules\Participant\Controllers\ResearchController;
use App\Modules\Participant\Controllers\ParticipantController;
use App\Modules\Participant\Controllers\ResearchProjectController;
use App\Modules\Participant\Controllers\ParticipantEventController;

//Portfolio Route Groups
$routes->group('participant', function ($routes) {

    $routes->group('event', function ($routes) {
        $routes->get('get_joined_event',                            [ParticipantEventController::class,     'getJoinedEvent']);
        $routes->get('get_participant_event_dashboard/(:any)',      [ParticipantEventController::class,     'getParticipantEventDashboard/$1']);
        $routes->get('participant_event_dashboard',                 [ParticipantEventController::class,     'participantEventDashboard']);
        // Save Registration
        $routes->post('save-participation-form-draft',              [ParticipantEventController::class,     'saveParticipationFormDraft']);
        $routes->post('submit-participation-form',                  [ParticipantEventController::class,     'submitParticipationForm']);

        // active event list
        $routes->get('active_event_list',                           [ParticipantEventController::class,     'activeEventList']);
        // Delete Draft Participation
        $routes->delete('delete_draft_participation/(:any)',        [ParticipantEventController::class,     'deleteDraftParticipation/$1']);
    });

    $routes->group('research_project', function ($routes) {
        $routes->get('get_rp_details/(:any)',                       [ResearchProjectController::class,     'getRPDetails/$1']);
        $routes->get('rp_details',                                  [ResearchProjectController::class,     'rPDetails']);
        $routes->get('get-rp-update-form/(:any)',                   [ResearchProjectController::class,     'getRPUpdateForm/$1']);
        $routes->get('rp-update-form',                              [ResearchProjectController::class,     'rPUpdateForm']);


        // Update full report and payment form
        $routes->get('get-rp-update-full-rp-form/(:any)',                   [ResearchProjectController::class,     'getRPUpdateFullRPForm/$1']);
        $routes->get('rp-update-full-rp-form',                              [ResearchProjectController::class,     'rPUpdateFullRPForm']);

        // Make correction
        $routes->get('get-rp-make-correction/(:any)',                   [ResearchProjectController::class,     'getRPMakeCorrection/$1']);
        $routes->get('rp-make-correction',                              [ResearchProjectController::class,     'rPMakeCorrection']);

        // Update form route
        $routes->post('delete-file',                                [ResearchProjectController::class,     'deleteFile']);
        $routes->post('update-participation-research-project',      [ResearchProjectController::class,     'updateParticipationResearchProject']);
        $routes->post('submit-participation-research-project',      [ResearchProjectController::class,     'submitParticipationResearchProject']);
        $routes->post('update_full_researh_project',                [ResearchProjectController::class,     'updateFullResearhProject']);
        $routes->post('draft_full_research_project',                [ResearchProjectController::class,     'draftFullResearchProject']);
        $routes->post('update_correction',                [ResearchProjectController::class,     'updateCorrection']);
        $routes->post('draft_correction',                [ResearchProjectController::class,     'draftCorrection']);
    });

    $routes->group('research', function ($routes) {
        // $routes->get('new_participation_form',                           [ParticipantController::class,     'new_participation_form']);

        // $routes->get('get_rp_dashboard/(:any)',                             [ResearchController::class,     'get_rp_dashboard/$1']);
        // $routes->get('rp_dashboard',                                        [ResearchController::class,     'rp_dashboard']);
        // $routes->post('submit-research-paper',                              [ResearchController::class,     'submitResearchPaper']);
        // $routes->get('get-research-paper-details/(:any)',                   [ResearchController::class,     'getResearchPaperDetails/$1']);
        // $routes->get('research-paper-details',                   [ResearchController::class,     'researchPaperDetails/$1']);
        // // Get research Update Form
        // $routes->get('get-rpi-update-form/(:any)',                          [ResearchController::class,     'getRpiUpdateForm/$1']);
        // $routes->get('rpi-update-form',                                     [ResearchController::class,     'rpiUpdateForm']);
        // $routes->post('update-research-paper',                              [ResearchController::class,     'updateResearchPaper']);
        // $routes->post('save-research-draft',                                [ResearchController::class,     'saveResearchDraft']);

        // // Delete Attachment File
        // $routes->post('delete-file',                                        [ResearchController::class,     'deleteFile']);
    });
});
