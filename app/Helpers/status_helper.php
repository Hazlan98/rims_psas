<?php

// Admin Status
if (!function_exists('get_rims_admin_status')) {
    function get_rims_admin_status($rims_status)
    {
        switch ($rims_status) {
            case 'Submit':
                $badge = 'primary';
                $admin_rims_status = 'Awaiting Abstract Acceptance';
                break;
            case 'awaiting payment approval':
                $badge = 'warning';
                $admin_rims_status = 'Awaiting Payment Verification';
                break;
            case 'Payment Rejected':
                $badge = 'danger';
                $admin_rims_status = 'Payment Rejected';
                break;
            case 'approved':
                $badge = 'success';
                $admin_rims_status = 'Registration Approved';
                break;
            case 'Rejected':
                $badge = 'danger';
                $admin_rims_status = 'Registration Rejected';
                break;
            case 'Pending Payment':
                $badge = 'info';
                $admin_rims_status = 'Registration Rejected';
                break;
            case 'Payment Approved':
                $badge = 'success';
                $admin_rims_status = 'Payment has been Approved';
                break;
            case 'Awaiting Review':
                $badge = 'secondary';
                $admin_rims_status = 'Awaiting Review';
                break;
            case 'Reviewed':
                $badge = 'success';
                $admin_rims_status = 'Registration Rejected';
                break;
            case 'Awaiting Approval':
                $badge = 'warning';
                $admin_rims_status = 'Registration Rejected';
                break;
            case 'Awaiting Reviewer Acceptance':
                $badge = 'warning';
                $admin_rims_status = 'Awaiting Reviewer Acceptance';
                break;

            case 'Cancelled':
                $badge = 'dark';
                $admin_rims_status = 'Registration Rejected';
                break;
            default:
                $badge = 'danger';
                $admin_rims_status = 'Unkown Status';
                break;
        }

        return "<span class='badge bg-$badge'>$admin_rims_status</span>";
    }
}

if (!function_exists('get_rims_participant_status')) {
    function get_rims_participant_status($rims_status)
    {
        switch ($rims_status) {
            case 'Draft':
                $badge = 'secondary';
                $participant_rims_status = 'Draft';
                break;
            case 'Submit':
                $badge = 'warning';
                $participant_rims_status = 'Awaiting Admin Verification';
                break;
            case 'Payment Rejected':
                $badge = 'danger';
                $participant_rims_status = 'Payment Rejected';
                break;
            case 'approved':
                $badge = 'success';
                $participant_rims_status = 'Registration Approved';
                break;
            case 'Rejected':
                $badge = 'danger';
                $participant_rims_status = 'Registration Rejected';
                break;
            case 'awaiting payment approval':
                $badge = 'warning';
                $participant_rims_status = 'Awaiting Payment Verification';
                break;
            case 'Payment Approved':
                $badge = 'success';
                $participant_rims_status = 'Payment Approved';
                break;
            case 'returned':
                $badge = 'danger';
                $participant_rims_status = 'Registration Returned!';
                break;
            case 'Full Report Draft':
                $badge = 'secondary';
                $participant_rims_status = 'Draft';
                break;
            case 'Reviewed':
                $badge = 'success';
                $participant_rims_status = 'Registration Rejected';
                break;
            case 'Awaiting Approval':
                $badge = 'warning';
                $participant_rims_status = 'Registration Rejected';
                break;
            case 'Awaiting Review':
                $badge = 'secondary';
                $participant_rims_status = 'Review in process';
                break;
            case 'Approved':
                $badge = 'success';
                break;
            case 'Minor Correction':
                $badge = 'warning';
                $participant_rims_status = 'Minor Correction';
                break;
            case 'Major Correction':
                $badge = 'warning';
                $participant_rims_status = 'Major Correction';
                break;
            case 'Cancelled':
                $badge = 'dark';
                $participant_rims_status = 'Registration Rejected';
                break;
            default:
                $badge = 'danger';
                $participant_rims_status = 'Unkown Status';
                break;
        }

        return "<span class='badge bg-$badge'>$participant_rims_status</span>";
    }
}

if (!function_exists('get_rims_participant_status_alert')) {
    function get_rims_participant_status_alert($rims_status)
    {
        switch ($rims_status) {
            case 'Draft':
                $alert = 'alert-secondary';
                $participant_rims_status = 'Draft';
                break;
            case 'Submit':
                $alert = 'alert-warning';
                $participant_rims_status = 'Awaiting Admin Verification';
                break;
            case 'Payment Rejected':
                $alert = 'danger';
                $participant_rims_status = 'Payment Rejected';
                break;
            case 'approved':
                $alert = 'alert-success';
                $participant_rims_status = 'Registration Approved';
                break;
            case 'returned':
                $alert = 'alert-danger';
                $participant_rims_status = 'Registration Abstract Returned';
                break;
            case 'awaiting payment approval':
                $alert = 'alert-warning';
                $participant_rims_status = 'Awaiting Payment Verification';
                break;
            case 'Payment Approved':
                $alert = 'alert-success';
                $participant_rims_status = 'Payment Approved';
                break;
            case 'Awaiting Reviewer Acceptance':
                $alert = 'alert-info';
                $participant_rims_status = 'Checking In Process';
                break;
            case 'Awaiting Review':
                $alert = 'secondary';
                $participant_rims_status = 'Registration Rejected';
                break;
            case 'Reviewed':
                $alert = 'success';
                $participant_rims_status = 'Registration Rejected';
                break;
            case 'Full Report Draft':
                $alert = 'alert-secondary';
                $participant_rims_status = 'Draft';
                break;
            case 'Minor Correction':
                $alert = 'alert-warning';
                $participant_rims_status = 'Minor Correction';
                break;
            case 'Major Correction':
                $alert = 'alert-warning';
                $participant_rims_status = 'Major Correction';
                break;
            case 'Approved':
                $alert = 'success';
                break;

            case 'Cancelled':
                $alert = 'dark';
                $participant_rims_status = 'Registration Rejected';
                break;
            default:
                $alert = 'danger';
                $participant_rims_status = 'Unkown Status';
                break;
        }

        return "<div class='alert $alert text-center fw-bold' role='alert'>
                    Project Status: $participant_rims_status
                </div>";
    }
}


// Reviewer Status
if (!function_exists('get_rims_reviewer_status')) {
    function get_rims_reviewer_status($rims_status)
    {
        switch ($rims_status) {
            case 'Submit':
                $badge = 'primary';
                $admin_rims_status = 'Awaiting Abstract Acceptance';
                break;
            case 'awaiting payment approval':
                $badge = 'warning';
                $admin_rims_status = 'Awaiting Payment Verification';
                break;
            case 'Payment Rejected':
                $badge = 'danger';
                $admin_rims_status = 'Payment Rejected';
                break;
            case 'approved':
                $badge = 'success';
                $admin_rims_status = 'Registration Approved';
                break;
            case 'Rejected':
                $badge = 'danger';
                $admin_rims_status = 'Registration Rejected';
                break;
            case 'Pending Payment':
                $badge = 'info';
                $admin_rims_status = 'Registration Rejected';
                break;
            case 'Payment Approved':
                $badge = 'success';
                $admin_rims_status = 'Payment has been Approved';
                break;
            case 'Awaiting Review':
                $badge = 'secondary';
                $admin_rims_status = 'Awaiting Review';
                break;
            case 'Reviewed':
                $badge = 'success';
                $admin_rims_status = 'Registration Rejected';
                break;
            case 'Awaiting Approval':
                $badge = 'warning';
                $admin_rims_status = 'Registration Rejected';
                break;
            case 'Awaiting Reviewer Acceptance':
                $badge = 'warning';
                $admin_rims_status = 'Awaiting Reviewer Acceptance';
                break;
            case 'Minor Correction':
                $badge = 'info';
                $admin_rims_status = 'Minor Correction';
                break;
            case 'Major Correction':
                $badge = 'info';
                $admin_rims_status = 'Major Correction';
                break;
            case 'Cancelled':
                $badge = 'dark';
                $admin_rims_status = 'Registration Rejected';
                break;
            default:
                $badge = 'danger';
                $admin_rims_status = 'Unkown Status';
                break;
        }

        return "<span class='badge bg-$badge'>$admin_rims_status</span>";
    }
}
